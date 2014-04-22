<?php 
session_start();
error_reporting(E_PARSE);
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
<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			
			$('#suggestions').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} 
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>

<style type="text/css">
		body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	.focus {
    border: 2px solid #AA88FF;
    background-color: #FFEEAA;
}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: absolute;
		left: 231px;
		margin: 10px 0px 0px 0px;
		width: 560px;
		background-color: #fff;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #B0AEAE;	
		color: #020202;
		font-family: Times New Roman;
		font-size: 14px;

	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>

</head>
<body background="images/result_back.png">
<form name="form" id="form" action="results.php" method="post">

<div style="float:top;">
<table><tr><td rowspan=2>
<p align="center">
&nbsp;<a href="index.php"><img src="images/equi_result.png" height="70" width="200"></a></td>
<td>
&nbsp;&nbsp;
<?php echo"<INPUT type=\"text\" name=\"inputString\" value=\"".$_SESSION["inputString"]."\" id=\"inputString\" onkeyup=\"lookup(this.value);\" onblur=\"fill();\" STYLE=\"color:\"black\" ; font-family: Times New Roman; font-weight: bold; font-size: 12px; background-color:\"white\" ;border:\"blue\"; size=\"90\" >";?>
</td><td>
&nbsp;&nbsp;<input type="image" src="images/sea.png"  value=1 name="submit" style="height: 25px; "> 
<div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
</div>
</div>	
</td></tr>
<tr><td>
&nbsp;&nbsp;&nbsp;
<img src="images/hea1.png" usemap="#MyMap">
<map name="MyMap">
<area shape="rect" coords="0,0,50,50" href="index.php">
<area shape="rect" coords="65,0,120,50" href="images.php">
<area shape="rect" coords="135,0,180,45" href="news.php">
<area shape="rect" coords="195,0,265,45" href="equimail.php">
<area shape="rect" coords="280,0,420,45" href="advanced_search.php">
</map>
</td></tr>
</table>

</div>
			

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
$in1=$_SESSION['prev1'];
$in2=$_SESSION['prev2'];
//echo $in1." ".$in2."<br>";
$select_query="select * from equi where equi.id IN (Select id from content where (content.title like '%$in1%' and content.title like '%$in2%') or (content.keywords like '%$in1%' and content.keywords like '%$in2%' ))
Order By rank DESC";
//echo $select_query;
$list=mysql_query($select_query);
$num = mysql_num_rows($list);
$t2=time();
$t3=$t2-$t1;
$in1=$in1." and ".$in2;
echo "<font size=4 color=#B40404><p align=\"center\">Showing Search Results for: ".$in1."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=#B40404>Search Results: ".$num." in ".$t3." seconds</p></font><br/>";

echo "<div id=\"container\"><div id=\"side\" style=\"width:220px; float:left;\">
<p align=\"center\"><font size=3 color=#B40404>FILTER BY:<br>
</font>
<br><font size=2>
<a href=\"www.wikipedia.org\"><font size=3 color=#2E64FE>Wikipedia</font></a><br>
<a href=\"#\"><font size=3 color=#2E64FE>Yahoo Answers</font></a><br>
<a href=\"#\"></a><br>
<br></font>

<p align=\"center\">
<font size=3  color=#B40404>
SUGGESTIONS:</font><br><br>";
/*
if(isset($_COOKIE['pre']))
{
echo "<table>";
echo "<tr><td><a href=\"sugg1.php\"><p align=\"center\"><font size=4 color=#2E64FE>".$_COOKIE['current']." and ".$_COOKIE['pre']."</font></a><br></td></tr>";
if(isset($_COOKIE['prev']))
{
echo "<tr><td><a href=\"sugg2.php\"><p align=\"center\"><font size=3 color=#2E64FE>".$_COOKIE['pre']." and ".$_COOKIE['prev']."</font></a><br></td></tr>";
echo "<tr><td><a href=\"sugg3.php\"><p align=\"center\"><font size=2 color=#2E64FE>".$_COOKIE['current']." and ".$_COOKIE['prev']."</font></a><br></td></tr>";
//$_COOKIE['pre2pre']=$_COOKIE['pre'];
}
echo "</table>";
//if(($_COOKIE['']!=$inputString))
//$_COOKIE['equi']=$_COOKIE['equinext'];
}
*/


echo "</p>
</div>
";

echo "<div id=\"result\" style=\"float:left;width:1000px;\"><table border='0'>";

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
echo "<br><br><p align=\"center\">";
if($_SESSION['pgno']>0)
echo "<a href=\"pre.php\"><img src=\"images/arrow_left.png\" width=\"50\" height=\"50\" alt=\"Previous\"></a>";
if($record)
echo "&nbsp;&nbsp;<a href=\"next.php\"><img src=\"images/arrow_right.png\" width=\"50\" height=\"50\" alt=\"Next\"></a>";
echo "</p></div></div>";
//$_COOKIE['equi']=$inputString;

?>
<div style=\"float:bottom;">
<p align="center"><img src="images/footer1.png" usemap="#Myfooter"></p>
<map name="Myfooter">
<area shape="rect" coords="650,0,700,150" href="#">
<area shape="rect" coords="715,0,817,150" href="#">
<area shape="rect" coords="825,0,880,150" href="#">
<area shape="rect" coords="900,0,980,150" href="#">
</map>


</div>
</body>
</html>
