<?php
    $servername = 'localhost';
    $user = 'root';
    $pw = '';
    $db = 'classroom';

    $conn = new mysqli($servername, $user, $pw, $db) or die("Connection Failed");

    $username = '0'; 
    // will need to change to $_COOKIE['site_username']
    $message = $_GET['msg'];
    $sentDate = date('m/d/Y h:i:s a');

    $sql = "INSERT INTO messages (username, message, sentDate) 
        VALUES ('$username', '$message', '$sentDate')";
    
    $conn -> query($sql);


    echo "<!DOCTYPE html><html lang='en'><meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='MessageStyle.css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <head>
            <style>
            body, button
            {
                font-family: 'Montserrat', sans-serif
            }
        
            div 
            {
                background-color: inherit;
                margin: 0;
                padding: 20px;
                width: 100%;
            }
        </style>
        </head>
        <body>";

    echo "<h2><br>Message sent! ".$sentDate."<br></h2>";
    echo "</body></html>";

    $conn -> close();
?>