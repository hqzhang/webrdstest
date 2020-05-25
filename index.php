<?php
$domain = "mysqldb.cgsocunza83a.us-east-1.rds.amazonaws.com";
$user = "myuser";
$passwd = "mypassword";
$ip = gethostbyname($domain);
$link = mysql_connect($ip, $user, $passwd);
//$link = mysql_connect('mysqldb.cgsocunza83a.us-east-1.rds.amazonaws.com', 'myuser', 'mypasswordd');
if (!$link)
{
die('Could not connect: ' . mysql_error());
}
else
{
$selectdb = mysql_select_db("mydb");
if (!$selectdb)
{
die('Could not connect: ' . mysql_error());
}
else
{
$data = mysql_query("SELECT visits FROM counter");
if (!$data)
{
//create table due not exit
$sql = mysql_query("CREATE TABLE counter(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    visits INT UNSIGNED
    )");
print_r($sql);
//insert data

$sql = mysql_query("INSERT INTO counter (visits) VALUES (10)");
print_r($sql);
print_r('No existing table: ' . mysql_error());

//die('Could not connect: ' . mysql_error());
}
else
{
$add=mysql_query("UPDATE counter SET visits = visits+1");
if(!$add)
{
die('Could not connect: ' . mysql_error());
}
else
{
print "<table><tr><th>Visits</th></tr>";
while($value=mysql_fetch_array($data))
{
print "<tr><td>".$value['visits']."</td></tr>";
}
print "</table>";
}
}
}
}
mysql_close($link);
?>
