<?php
session_start();
$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");
mysql_select_db("sphiderplus",$con) or die ("cannot select db");
$file_ptr=fopen("links\link.txt","r+") or exit("unable to open file");
while(!feof($file_ptr))
{
	$url=fgets($file_ptr);
	$add_new="insert into linkstest(url) values ('$url')";
    $add_query=mysql_query($add_new) or die(mysql_error());
	        
}
?>