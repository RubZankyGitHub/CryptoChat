<?
    $mess = $_POST[umess];
    $pass = $_POST[uhash];

    $mysqli = new mysqli ("localhost", "root", "", "messages");
    $mysqli->query("SET NAMES 'utf8'");
    
    $mysqli->query("INSERT INTO `messages`.`list` (`Number`, `Aes`, `Sha`) VALUES (NULL, '$mess', '$pass');");

    $mysqli->close();
?>