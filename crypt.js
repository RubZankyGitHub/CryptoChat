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
  //console.log(1);
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

    var uimg = $('#urimage').val();
    if (uimg != '') { 
      uimg = '<img src="' + uimg + '" width="16%">'; 
    }

    var aesmessage = '<text class="anonnick">' + unick +': </text>' + uimg + '<text class="anontxt">' + $('#urtext').val() + '</text>';
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
    $('#urimage').val('');
});

//$(yourcolor).css({"backgroundColor": local});

$(function() {
  $(document).on('click touchstart', '.anonmes', function(){ 
    
    elid = "#" + jQuery(this).attr("id") + "> img";

    var imgstyle = document.querySelector(elid);

    try{
      if ( imgstyle.style.width != '100%' ) {
          imgstyle.style.width = '100%';
      }
      else {
          imgstyle.style.width = '16%';
      }
    } catch{
    
    }

    
  });
});

function clearbox(){  
  $('#urtext').val('');
  $('#urimage').val('');
}

document.onkeydown = function(e) {
  e = e || window.event;
  if (e.shiftKey && e.keyCode == 13) {
    document.getElementById("sendmess").click();
    setTimeout(clearbox , 100);
  }
  if (e.keyCode == 13) {
    var localtext = $('#urtext').val() + '<br>';
    $('#urtext').val(localtext);
  }
  return true;
}
      
setInterval( show, 2000);
show();

