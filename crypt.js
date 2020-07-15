var changepas = $('#nevidimka').html();

function show(){  
  var uppasshash = sha256( $('#urpass').val() );
  uppasshash = sha256( uppasshash );

  var messagessum = $('.anonmes').length;

  $.ajax({
      url         : 'updatechat.php',
      type        : 'POST',
      data        : {uhash: uppasshash, uchange: changepas, summessages: messagessum},
      success: function(data){
        if (changepas != uppasshash){
          $('#content').html('');
          $('#nevidimka').html('0');
        }
        if (messagessum == $('#nevidimka').html()){
          $('#content').append(data);
        }
      }
  });
}

let code = (function(){
    return{
      encryptMessage: function(messageToencrypt = '', secretkey = ''){
        var encryptedMessage = CryptoJS.AES.encrypt(messageToencrypt, secretkey);
        return encryptedMessage.toString();
      },
      decryptMessage: function(encryptedMessage = '', secretkey = ''){
        var decryptedBytes = CryptoJS.AES.decrypt(encryptedMessage, secretkey);
        var decryptedMessage = decryptedBytes.toString(CryptoJS.enc.Utf8);

        return decryptedMessage;
      }
    }
})();
//----------------------------------------------------------------------------------------
$('#sendmess').click(function() {

    var passhash = sha256( $('#urpass').val() );

    var unick = $('#urnick').val();
    if (unick == '') { unick = 'Anonymous'; }

    var aesmessage = '<text id="anonnick">' + unick +': </text>'+ $('#urtext').val();
    aesmessage = code.encryptMessage( aesmessage , passhash )
    message = code.decryptMessage( aesmessage , passhash );
    passhash = sha256( passhash );
    
    
    $.ajax({
        url         : 'sendmessage.php',
        type        : 'POST',
        data        : { umess: aesmessage , uhash: passhash}
    });

    show();
    $('#urtext').val('');
});

//$(yourcolor).css({"backgroundColor": local});

$(function() {
  $(document).on('click touchstart', '.anonmes', function(){ 
    
    elid = "#" + jQuery(this).attr("id") + "> img";

    var imgstyle = document.querySelector(elid);

    if ( imgstyle.style.width != '100%' ) {
        imgstyle.style.width = '100%';
    }
    else {
        imgstyle.style.width = '16%';
    }

    
  });
});
      
setInterval( show, 2000);
show();

