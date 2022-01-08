<?php

$pass = $_POST['uhash'];
$changepass = $_POST['uchange'];
$messagessumm = $_POST['summessages'];

//text
$showsqltext = new mysqli ("localhost", "root", "root", "messages");
$showsqltext->query("SET NAMES 'utf8'");

$sqllisttext = $showsqltext->query("SELECT `Aes` FROM `list`");

//list sha
$showsqlsha = new mysqli ("localhost", "root", "root", "messages");
$showsqlsha->query("SET NAMES 'utf8'");

$sqllistsha = $showsqlsha->query("SELECT `Sha` FROM `list`");

//list number
$showsqlnumber = new mysqli ("localhost", "root", "root", "messages");
$showsqlnumber->query("SET NAMES 'utf8'");

$sqllisttextnumber = $showsqlnumber->query("SELECT `Number` FROM `list`");

//number mes
$mesi = 1;
$newmesi = 1;
//-------------------
while (($rowtextnumber = mysqli_fetch_row($sqllisttextnumber)) && ($rowtext = mysqli_fetch_row($sqllisttext)) && ($rowsha = mysqli_fetch_row($sqllistsha))) {


        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistsha = $rowsha[$j];
            $locallisttext = $rowtext[$j];
            $locallisttextnumber = $rowtextnumber[$j];

            if ( $locallistsha == $pass){
                
                if ($mesi > $messagessumm || $newmesi > $messagessumm){
                    $output = '<div class="anonmes" id="messn';
                    $output .= $locallisttextnumber;
                    $output .= '"><div class="anonident">№';
                    $output .= $locallisttextnumber;
                    $output .= ': <script>';
                    $output .= 'var passhash = sha256( $("#urpass").val() );';
                    $output .= 'var dbmessage = code.decryptMessage( "';
                    $output .= $locallisttext;
                    $output .= '", passhash );';
                    $output .= 'document.getElementById("messn';
                    $output .= $locallisttextnumber;
                    $output .= '").children[0].insertAdjacentHTML("beforeEnd",';

                    $output .='dbmessage';
                    $output .=');';
                    
                    $output .= 'changepas = "';
                    $output .= $locallistsha;
                    $output .= '"; $("#nevidimka").html("';
                    $output .= $newmesi;
                    $output .='")';
                    $output .= '</script></div> </div><br>';

                
                    echo $output;
                    $mesi = $mesi + 1;
                }
                $newmesi = $newmesi + 1;
            }
        } 
}

$showsqltext->close();
$showsqlsha->close();
$showsqlnumber->close();

?>