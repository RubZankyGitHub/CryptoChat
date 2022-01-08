<?
    $nmess = $_POST[unums];
    $arrmes = explode("P", $nmess);

    //list number
    $showsqlnumber = new mysqli ("localhost", "root", "root", "messages");
    $showsqlnumber->query("SET NAMES 'utf8'");
    
    $sqllisttextnumber = $showsqlnumber->query("SELECT `Number` FROM `list`");
    
    //number mes
    $mesi = 1;
    $newmesi = 1;
    $dd = "";
    $dd .= "<script> console.log(";
    //-------------------
    while (($rowtextnumber = mysqli_fetch_row($sqllisttextnumber))) {
    //count($a)
    
            for ($j = 0 ; $j < 1 ; ++$j){
                
                $locallisttextnumber = $rowtextnumber[$j];

                for ($i = 0 ; $i < $rowtextnumber[$j] ; $i++){
                    if ($locallisttextnumber == $arrmes[$i]){

                        
                        $mysqli = new mysqli ("localhost", "root", "root", "messages");
                        $mysqli->query("SET NAMES 'utf8'");
                        //UPDATE `messages`.`list` SET `Aes` = '' WHERE `list`.`Number` =1;

                        $mysqli->query("DELETE FROM `messages`.`list` WHERE `list`.`Number` = $arrmes[$i];");
                        //$mysqli->query("UPDATE `messages`.`list` SET `Sha` = 'Deleted' WHERE `list`.`Number` = $arrmes[$i];");

                        $mysqli->close();
                    }
                }
            } 
    }
    
    $dd .= ");</script>";
    $dd .= "<script> console.log('All ok.');</script>";
    echo $dd;

    $showsqlnumber->close();
    
    ?>