<?php

session_start();
error_reporting(E_PARSE);
if(isset($_POST[equiSearch_x]) && stripslashes(trim($_POST['inputString'])))
{
$_SESSION['inputString']=stripslashes(trim($_POST['inputString']));
setcookie("current", $_SESSION['inputString']);
$_SESSION['pgno']=0;
header('Location: ../equipage/results.php');

}
if(isset($_POST[equInstant_x]) && stripslashes(trim($_POST['inputString'])))
{
    $con=mysql_connect("localhost","root","");
    if(! $con)
    die("couldn't connect to database");
    mysql_select_db("sphiderplus",$con) or die ("cannot select db");
	$inputString=stripslashes(trim($_POST['inputString']));
	$select_query="select * from equi where url like '_______%$inputString%'";
    $list=mysql_query($select_query);
//    echo $inputString;
    $record=mysql_fetch_array($list);
//    echo $record['url']."<br>";
    header('Location: '.$record['url']);
    	
    
}

?>
<html>
<head>
<link REL="SHORTCUT ICON" HREF="images/e1.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>equipage India</title>
<script type="text/javascript" src="jquery-1.2.1.pack.js"></script>
<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
		document.getElementById("inputString").style.borderColor="#FF8000";
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);

		setTimeout("$('#suggestions').hide();", 200);
	}

	var changed = false;
	function checkMouse(check) {
	if (!changed) {
	if (check) document.getElementById("inputString").style.borderColor="#FF8000";
	else document.getElementById("inputString").style.borderColor="#BDBDBD";
	}
	}

	function checkText (check) {
	if (check) {
	document.getElementById("inputString").style.borderColor="#FF8000";
	if (document.testform.test.value != "") changed=true;
	else changed=false;
	}
	else if (check && !changed) document.getElementById("inputString").style.borderColor="#FF8000";
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
		left: 360px;
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
<body background="images/head123.png" onLoad="focus();equipage.inputString.focus()" link=#4000FF alink=#8904B1 vlink=#4000FF>

<br><br><br>
<p align="center">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="" name="equipage" method="post" autocomplete="off">
<p align="center">


<img src="images/hea1.png" usemap="#MyMap">
<map name="MyMap">
<area shape="rect" coords="0,0,50,50" href="index.php">
<area shape="rect" coords="65,0,120,50" href="images.php">
<area shape="rect" coords="135,0,180,45" href="news.php">
<area shape="rect" coords="195,0,265,45" href="equimail.php">
<area shape="rect" coords="280,0,420,45" href="advanced_search.php">

</map>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="text"  name="inputString" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" onmouseover="checkMouse(true);" onmouseout="checkMouse(false);"  size="90">&nbsp;&nbsp;&nbsp;<font size="3"></font>

<p align="center"><div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
				<p align="center"><input type="image" name="equiSearch" src="images/equiSearch.png">
&nbsp;&nbsp;&nbsp;<input type="image" name="equInstant" src="images/equInstant.png">
</div></p>
<p align="center"><br><br><input type="image" name="equiSearch" src="images/equiSearch.png" >
&nbsp;&nbsp;&nbsp;<input type="image" name="equInstant" src="images/equInstant.png">
<br><br><br>
<font size="3"><a href="equipage.php" STYLE="TEXT-DECORATION: NONE">Go to equipage.com</a></font>


</p>
</form>
<br><br><br><br><br><br><br><br><br><br>

<p align="center"><img src="images/footer1.png" usemap="#Myfooter"></p>
<map name="Myfooter">
<area shape="rect" coords="645,0,690,150" href="#">
<area shape="rect" coords="705,0,804,150" href="#">
<area shape="rect" coords="815,0,870,150" href="#">
<area shape="rect" coords="885,0,960,150" href="#">
</map>
</body>
</html>
