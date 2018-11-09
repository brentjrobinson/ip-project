<?php

    include("../config.php"); 
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die("Connection Failed");

    $message = $_GET['msg'];
    $sentDate = date('m/d/Y h:i:s a');

    $site_admin = $_COOKIE['site_username'];
    $query = "SELECT admin FROM users WHERE username='$site_admin' limit 1";
    $find_admin;
    if ($result = $conn->query($query))
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row['admin'])
                $find_admin = 1;
            else
                $find_admin = 0;
        }
    }
    

    $sql = "INSERT INTO messages (admin, message, sentDate) 
        VALUES ('$find_admin', '$message', '$sentDate')";
    
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

    echo "<center><div><h2><br>Message sent at ".$sentDate."<br><br></h2>";
    echo "<a href='http://localhost/ip-project/messageBoard.php' class='btn' target='_parent'>";
    echo "Back to Messages";
    echo "</center></div></a></body></html>";

    $conn -> close();
?>