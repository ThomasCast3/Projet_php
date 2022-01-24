<?php
function connectMysql(){

    try{
        $servername = "mysql-rttaphp.alwaysdata.net";
        $database = "rttaphp_formulaire";
        $username = "rttaphp_rui";
        $password = "justrunnz";
        
        // Create connection
        $connect = new PDO(
            "mysql:host=$servername;bdname = $database",
            $username, 
            $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;", PDO::MYSQL_ATTR_DIRECT_QUERY => true));
        echo "Base de donnes est bien connecte";


        return $connect;
    }catch(Exception $e){
        die('Erreur :' .$e->getMessage());
    }

}
connectMysql();

?>