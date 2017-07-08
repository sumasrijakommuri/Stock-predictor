<?php
$connect_to_localhost = mysqli_connect('localhost', 'root', '','WebApps');
        if (!$connect_to_localhost){
            die('Connection unsuccessful' . mysqli_connect_error_error());
          }
        else
            echo("Database Connection successful.</br>");
$insert_query2="truncate table current"	;
			  mysqli_query($connect_to_localhost,$insert_query2) or die(mysqli_error($connect_to_localhost));
?>