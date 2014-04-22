<?php
/*
error_reporting(E_PARSE);

session_start();

	$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");

	else {
	$db=mysql_select_db("sphiderplus",$con) or die ("cannot select db");

		
		//if(isset($_POST['queryString']))
		 {
		
            $queryString = $_POST['queryString']; 			
			
			if(strlen($queryString) >0) {
				
//				$query ="SELECT title FROM content WHERE title LIKE '%$queryString%' LIMIT 5";
$in2=$_SESSION['prev1'];
$in1=$_SESSION['inputString'];
//echo $in1." ".$in2."<br>";
$query="select * from equi where equi.id IN (Select id from content where (content.title like '%$in1%' and content.title like '%$in2%') or (content.keywords like '%$in1%' and content.keywords like '%$in2%' ))
Order By rank DESC LIMIT 5";
//echo $query;
				$list=mysql_query($query);
				if($query) {echo "<ul class=\"specials\">";
		     			while($record=mysql_fetch_array($list)){
						  echo '<li><span>'.$record['url'].'</span></li>';	         		
//					echo "<li onClick=\"fill(".$record['url'].");\">".$record['url']."</li>";
		     			}
		     			echo "</ul>";
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				
			} 
		} //else {
			//echo 'There should be no direct access to this script!';
		//}
	}
*/?>
<?php 
session_start();
error_reporting(E_PARSE);
//echo $_POST['queryString1']." ".$_POST['queryString2'];

//if(stripslashes(trim($_POST['inputString']))&&isset($_POST["submit"]))
if(stripslashes(trim($_POST['inputString']))&&isset($_POST[submit_x]))
{$inputString=stripslashes(trim($_POST['inputString']));
$inputString1=stripslashes(trim($_POST['inputString']));


//$_COOKIE['pre']=$_COOKIE["current"];
$_SESSION['pgno']=0;
}

?>
<?php
/*$key=$_SESSION['key'];
$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");
mysql_select_db("sphiderplus",$con) or die ("cannot select db");
//echo "<p align=\"center\">";
{
$select_query="select * from links where url like '_______%$key%'";
$list=mysql_query($select_query);
$num = mysql_num_rows($list);
echo "<p align=\"center\">Showing Search Results for: ".$key."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Results: ".$num."</p><br/>";
echo "<p align=\"center\"><table border='0'>";
//echo "<tr> <td> <a href=\"http://www.wikipedia.org\">Wikipedia</a></td><td></td></tr>";
$k=0;
$a=0;
echo $_SESSION['pgno'];
$pg=$_SESSION['pgno'];
while(($a<($pg*10))&&($record=mysql_fetch_array($list)))
{
$a++;
}
while(($record=mysql_fetch_array($list)) && $k<10)
{
	
$k++;
	echo "<tr>
<td><a href=\"".$record['url']."\">".$record['url']."</a></td>";
}
echo "</table>";
}
echo "<br><br>";
if($_SESSION['pgno']>0)
echo "<a href=\"pre.php\"><img src=\"images/pre.png\" alt=\"Previous\"></a>";
if($record)
echo "&nbsp;&nbsp;<a href=\"next.php\"><img src=\"images/next.png\" alt=\"Next\"></a>";
echo "</p>";
*/?>
<html>
<head><title>equipage</title>
<link REL="SHORTCUT ICON" HREF="images/e1.ico"> 
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>

</head>
<body>
<form name="form" id="form" action="results.php" method="post">


</form>
<?php
$t1=time();
$t2=0;
$w=0;
//while($w<10000000)
//{$w++;
//}
$inputString=$_SESSION['inputString'];
$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");
mysql_select_db("sphiderplus",$con) or die ("cannot select db");
//echo "<p align=\"center\">";
{
//$select_query="select * from equi where url like '_______%$inputString%'";
$in2=$_POST['queryString2'];
$in1=$_POST['queryString1'];
//echo $in1." ".$in2."<br>";
$select_query="select * from equi where equi.id IN (Select id from content where (content.title like '%$in1%' and content.title like '%$in2%') or (content.keywords like '%$in1%' and content.keywords like '%$in2%' ))
Order By rank DESC";
//echo $select_query;
$list=mysql_query($select_query);
$num = mysql_num_rows($list);
$t2=time();
$t3=$t2-$t1;
$in1=$_POST['queryString1']." and ".$_POST['queryString2'];
echo "<font size=4 color=#B40404><p align=\"center\">Showing Search Results for: ".$in1."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size=2 color=#B40404>Search Results: ".$num." in ".$t3." seconds</p></font><br/>";


echo "<p align=left><table border='0'>";

$k=0;
$a=0;
$pg=$_SESSION['pgno'];
while(($a<($pg*10))&&($record=mysql_fetch_array($list)))
{
$a++;
}
while(($record=mysql_fetch_array($list)) && $k<10)
{
$select_title="select * from content where id =".$record['id'];
$list_title=mysql_query($select_title);
while($record_title=mysql_fetch_array($list_title))
{
$k++;
if(strlen($record_title['title'])<70)
{echo "<tr>
<td><a href=\"".$record['url']."\">".$record_title['title']."</a>&nbsp;&nbsp;&nbsp;";
}
else 
{echo "<tr>
<td><a href=\"".$record['url']."\">".substr($record_title['title'],0,70)."<font style=\"bold\">...</font></a>&nbsp;&nbsp;&nbsp;";
}

	if($record['safe']==0)
	{
	echo "<img src=\"images/is.png\" width=\"20\" height=\"20\">";
	}
	else 
	echo "<img src=\"images/safe.png\" width=\"20\" height=\"20\">";

	if(strlen($record['url'])<70)
	echo "<br><font color=green size=2>".$record['url']."</font><br><br></td>";
	else
	echo "<br><font color=green size=2>".substr($record['url'], 0, 50)."...".substr($record['url'], strlen($record['url'])-20, strlen($record['url']))."</font><br><br></td>";
	
}
}
echo "</table>";
}
//$_COOKIE['equi']=$inputString;

?>



</body>
</html>
