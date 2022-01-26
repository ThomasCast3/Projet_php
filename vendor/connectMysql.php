<?php
function connectMysql(){

    try{
        $servername = "mysql-rttaphp.alwaysdata.net";
        $database = "rttaphp_formulaire";
        $username = "rttaphp_rui";
        $password = "justrunnz";
        
        // Create connection
        $connect = new PDO(
            "mysql:host=$servername;port=3306;bdname = $database",
            $username, 
            $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8;", PDO::MYSQL_ATTR_DIRECT_QUERY => true));
            
        
        $connect->query( 'USE rttaphp_formulaire;' ); //FORCE USING DATABASE

        // echo "La base de donnes est bien connectée <br>";


        return $connect;
    }catch(Exception $e){
        die('Erreur :' .$e->getMessage());
    }

}

?>