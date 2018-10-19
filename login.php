<?php

include("config.php"); 

// connect to the mysql server
$link = mysql_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysql_select_db($db_name)
or die ("Could not select database because ".mysql_error());

$match = "select id from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$name = "select username from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$isAdmin = "select admin from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$admin_test = mysql_query($isAdmin)
or die ("Could not match data because ".mysql_error());

$row = mysql_result($admin_test, 0);
if ($row == 0){
    $admin = 0;
}else{
    $admin = 1;
}

$qry = mysql_query($match)
or die ("Could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry); 


$namequery = mysql_query($name)
or die ("Could not match data because ".mysql_error());
$username = mysql_result($namequery, 0);

if ($num_rows <= 0) { 
echo "Sorry, there is no username $username with the specified password.<br>";
echo "<a href=login.html>Try again</a>";
exit; 
} else {
setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("site_username", "$username");
setcookie("site_admin", $admin);
echo "You are now logged in!<br>"; 
echo "Continue to the <a href=members.html>members</a> section.";
}
?>
