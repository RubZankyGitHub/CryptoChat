function delfmes(){

    var MesNumbers = "";
    for (iindex = 0; iindex < document.getElementsByClassName("anonmes").length; iindex++) {
        MesNumbers += document.getElementsByClassName("anonmes")[iindex].id.toString().split('n')[1] + "P";        
    }
    /*for (iindex = 0; iindex < document.getElementsByClassName("deleted").length; iindex++) {
        MesNumbers += document.getElementsByClassName("deleted")[iindex].id.toString().split('n')[1] + "P";        
    }*/
    

    $.ajax({
        url         : 'deletemessages.php',
        type        : 'POST',
        data        : {unums: MesNumbers},
        success: function(data){
            $('#content').append(data);
        }
    });
    console.log(MesNumbers);
}