<?php 

    require('./creds.php');


    $host = $db_host;
    $username = $db_username;
    $password = $db_password;


    $link = mysqli_connect($host, $username, $password);

    if(!$link){
        echo "MySQL could not connect".mysqli_connect_error()." \n";
        die();
    }
    $sql_db = "CREATE DATABASE accounts";
    if(mysqli_query($link,$sql_db)){
        echo "Database accounts successfully created \n";
    } else {
        echo "Could not execute $sql_db ".mysqli_error($link)." \n";
    }
    mysqli_close($link);

?>