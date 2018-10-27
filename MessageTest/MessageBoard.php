<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<!-- Style Sheet by Tori McCullah -->
<link rel="stylesheet" href="MessageStyle.css">
<!-- Import font available for re-use via Google Apis Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

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

<body>
    <div>
    <?php      
        $servername = 'localhost';
        $user = 'root';
        $pw = '';
        $db = 'classroom';

        $conn = new mysqli($servername, $user, $pw, $db) or die("Connection Failed");
    
        $query = "SELECT * FROM messages";
    
        if ($result = $conn->query($query))
        {
            $count = 0;
            echo "<hr>";
            while ($row = $result->fetch_assoc())
            {
                // change to cookie value!!
                if ($count % 2 == 0) 
                {
                    echo "<div align='left'><table class='teacher'>";
                    echo "<tr><td><b>TEACHER on ".$row['sentDate'].":</b></td></tr>";
                    echo "<tr><td>".$row['message']."</td></tr>";
                    echo "</table></div>";
                }
                else
                {
                    echo "<div align='right'><table class='student'>";
                    echo "<tr><td><b>STUDENT on ".$row['sentDate'].":</b></td></tr>";
                    echo "<tr><td>".$row['message']."</td></tr>";
                    echo "</table></div>";
                }
                $count++; // change when cookie is updated
            }
            echo "<hr>";
            $result->free();
        }
    ?>
    
    <br><br>Message:<br>
    
    <p id='msg-post'></p>
    
    <form method="get" action='MessageBoard-send.php'>
        <textarea name="msg" rows='10' cols='75'></textarea>
        <br><br><center>
        <button class='btn' type="submit" value="send">send</button>
        </center>
    </form>
    </div>
    <br>
</body>
</html>
