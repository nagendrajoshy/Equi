<?php 
session_start();
error_reporting(E_PARSE);
//if(stripslashes(trim($_POST['inputString']))&&isset($_POST["submit"]))
if(stripslashes(trim($_POST['inputString']))&&isset($_POST[submit_x]))
{$inputString=stripslashes(trim($_POST['inputString']));
$inputString1=stripslashes(trim($_POST['inputString']));

if(isset($_COOKIE['pre']))
{
	include_once setcookie("prev");
    $_COOKIE['prev']= $_SESSION['prev'];
	
}

$_SESSION["prev"]=$_SESSION['inputString'];
$_COOKIE['pre']=$_SESSION['inputString'];

$_SESSION['inputString']=$inputString;
include_once setcookie("pre");

//$_COOKIE['pre']=$_COOKIE["current"];
$_COOKIE['current']=$inputString;

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
<head><title><?php print $_SESSION["inputString"]; ?> - equiPage</title>
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

	function lookup1(inputString1, inputString2, no) {
		 {
			 if(no==1)
			 {
			 $('#suggestions2').hide();
			 $('#suggestions3').hide();
			 }
			 if(no==2)
			 {
				 $('#suggestions1').hide();
				 $('#suggestions3').hide();	 
			 }
			 if(no==3)
			 {
				 $('#suggestions2').hide();
				 $('#suggestions1').hide();	 
			 }	 
			$.post("rpc1.php", {queryString1: ""+inputString1+"", queryString2: ""+inputString2+""}, function(data){
				if(data.length >0) {
					$('#suggestions1').show();
					$('#autoSuggestionsList1').html(data);
				}
			});
		}
	} 
	
	function lookup2(inputString) {
		 {
			 $('#suggestions1').hide();
			 $('#suggestions3').hide();	 
			 
			$.post("rpc2.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions2').show();
					$('#autoSuggestionsList2').html(data);
				}
			});
		}
	} 

	function lookup3(inputString) {
		 {
			 $('#suggestions2').hide();
			 $('#suggestions1').hide();	 
			 
			$.post("rpc3.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions3').show();
					$('#autoSuggestionsList3').html(data);
				}
			});
		}
	} 

	function fill1() {
		
//		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions1').hide();", 200);
	}

	function fill2() {
		
//		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions2').hide();", 200);
	}

	function fill3() {
		
//		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions3').hide();", 200);
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
	

	.suggestionsBox1 {
		position: absolute;
		left: 231px;
		margin: 10px 0px 0px 0px;
		width: 560px;
		background-color: #F2F2F2;
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
    .sugg {
    cursor: pointer;
    }
</style>

</head>
<body background="images/result_back.png" link=blue>
<form name="form" id="form" action="results.php" method="post" autocomplete="off">

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
function microtime_float()
{
	list($usec, $sec)=explode(" ", microtime());
	return ((float)$usec +(float)$sec);
}
$t1=microtime_float();
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
$select_query="select * from equi where equi.id IN (Select id from content where content.title like '%$inputString%' or content.keywords like '%$inputString%' )
Order By rank DESC";
$list=mysql_query($select_query);
$num = mysql_num_rows($list);
$t2=microtime_float();
$t3=$t2-$t1;
$t3=round($t3,4);
echo "<font size=4 color=#B40404><p align=\"center\">Showing Search Results for: ".$inputString."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=#B40404>Search Results: ".$num." in ".$t3." seconds</p></font><br/>";

echo "<div id=\"container\"><div id=\"side\" style=\"width:220px; float:left;\">
<p align=\"center\"><font size=3 color=#B40404>FILTER BY:<br>
</font>
<br><font size=2>
<a href=\"www.wikipedia.org\"><font size=3 color=#2E64FE>Wikipedia</font></a><br>
<a href=\"#\"><font size=3 color=#2E64FE>Yahoo Answers</font></a><br>
<a href=\"#\"></a><br>
<br></font>
";

if(isset($_COOKIE['pre']))
{
	echo "<p align=\"center\">
<font size=3  color=#B40404>
SUGGESTIONS:</font><br>";
	
//	if($_SESSION['pgno']==0)
$_SESSION['prev1']=$_COOKIE['pre'];	
echo "<div class=\"sugg\" id=\"sug\"><p align=\"center\"><table>
<tr><td><font color=#A4A4A4 size=2>
Search for results that contain<br><p align=center>both:</p>
</td></tr>
";
echo "<tr><td><a  onMouseOver='lookup1(\"".$_SESSION['inputString']."\",\"".$_SESSION['prev1']."\",1)' onMouseDown='fill1()' ><p align=\"center\"><font size=4 color=#2E64FE>".$_COOKIE['current']." and ".$_COOKIE['pre']."</font></a></td></tr>";
echo "<div class=\"suggestionsBox1\" id=\"suggestions1\"  style=\"display: none;\">
				<div class=\"suggestionList\" id=\"autoSuggestionsList1\">
					&nbsp;
</div>
</div>";	

if(isset($_COOKIE['prev']))
{
//	if($_SESSION['pgno']==0)
$_SESSION['prev2']=$_COOKIE['prev'];	
	
echo "<tr><td><a onMouseOver='lookup1(\"".$_SESSION['prev1']."\",\"".$_SESSION['prev2']."\",2)' onMouseDown='fill1()'><p align=\"center\"><font size=3 color=#2E64FE>".$_COOKIE['pre']." and ".$_COOKIE['prev']."</font></a></td></tr>";

echo "<tr><td><a onMouseOver='lookup1(\"".$_SESSION['inputString']."\",\"".$_SESSION['prev2']."\",3)' onMouseDown='fill1()'><p align=\"center\"><font size=2 color=#2E64FE>".$_COOKIE['current']." and ".$_COOKIE['prev']."</font></a></td></tr>";
//$_COOKIE['pre2pre']=$_COOKIE['pre'];
}
echo "</table></p></div>";
//if(($_COOKIE['']!=$inputString))
//$_COOKIE['equi']=$_COOKIE['equinext'];
}



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
{
	
echo "<tr>
<td><a href=\"".$record['url']."\">".str_ireplace($inputString, "<b>$inputString</b>", $record_title['title'])."</a>&nbsp;&nbsp;&nbsp;";
}
else 
{

echo "<tr>
<td><a href=\"".$record['url']."\">".substr(str_ireplace($inputString, "<b>$inputString</b>", $record_title['title']),0,70)."<font style=\"bold\">...</font></a>&nbsp;&nbsp;&nbsp;";
}

	if($record['safe']==0)
	{
	echo "<img src=\"images/is.png\" width=\"20\" height=\"20\">";
	}
	else 
	echo "<img src=\"images/safe.png\" width=\"20\" height=\"20\">";

	if(strlen($record['url'])<70)
	echo "<br><font color=green size=2>".str_ireplace($inputString, "<b>$inputString</b>", $record['url'])."</font><br><br></td>";
	else
	echo "<br><font color=green size=2>".substr(str_ireplace($inputString, "<b>$inputString</b>", $record['url']), 0, 50)."...".substr($record['url'], strlen($record['url'])-20, strlen($record['url']))."</font><br><br></td>";
	
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
