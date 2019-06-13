<?php

require('./creds.php');


$host = $db_host;
$username = $db_username;
$password = $db_password;
$db = 'accounts';

$link = mysqli_connect($host, $username, $password, $db);
		if(!$link){
			echo "Connection to database failed: ".mysqli_connect_error()." \n";
			die();
		}
		$sql_table_drop = "DROP TABLE IF EXISTS users";
		$sql_table_create = "CREATE TABLE users(
			`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`first_name` VARCHAR(50) NOT NULL,
			`surname` VARCHAR(50) NOT NULL,
			`email` VARCHAR(100) NOT NULL UNIQUE,
            `password` VARCHAR(100) NOT NULL,
            `hash` VARCHAR(32) NOT NULL,
            `active` BOOL NOT NULL DEFAULT 0,
            PRIMARY KEY (`id`)
            )";
            
		if(mysqli_query($link, $sql_table_drop)){
			echo "old users table dropped in accounts \n";
		} else {
			echo "Could not execute $sql_table_drop ".mysqli_error($link);
        }
        
		if(mysqli_query($link, $sql_table_create)){
			echo "users table successfully created in accounts \n";
		} else {
			echo "Could not execute $sql_table_create ".mysqli_error($link);
		}
        mysqli_close($link);
        
?>