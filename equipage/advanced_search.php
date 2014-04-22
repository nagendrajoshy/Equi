<?php

session_start();
error_reporting(E_PARSE);
if(isset($_POST["submit"]) && stripslashes(trim($_POST['inputString'])))
{
$_SESSION['inputString']=stripslashes(trim($_POST['inputString']));
$_SESSION['pgno']=0;
header('Location: ../equipage/results.php');

}
?>
<html>
<head>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
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
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);

		setTimeout("$('#suggestions').hide();", 200);
	}

	var changed = false;
	function checkMouse(check) {
	if (!changed) {
	if (check) document.getElementById("inputString").style.borderColor="lightblue";
	else document.getElementById("inputString").style.borderColor="grey";
	}
	}

	function checkText (check) {
	if (check) {
	document.getElementById("inputString").style.borderColor="#FF0000";
	if (document.testform.test.value != "") changed=true;
	else changed=false;
	}
	else if (check && !changed) document.getElementById("inputString").style.borderColor="#666666";
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
		position: relative;
		left: 330px;
		margin: 10px 0px 0px 0px;
		width: 575px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
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
<body background="hea51.png" onLoad="focus();equipage.inputString.focus()">

<br><br><br>
<p align="center">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="" name="equipage" method="post">
<p align="center">


<img src="images/hea5.png" usemap="#MyMap">
<map name="MyMap">
<area shape="rect" coords="0,0,50,50" href="index.php">
<area shape="rect" coords="65,0,120,50" href="images.php">
<area shape="rect" coords="135,0,180,45" href="news.php">
<area shape="rect" coords="195,0,265,45" href="equimail.php">
<area shape="rect" coords="280,0,420,45" href="advanced_search.php">

</map>
<br>
<table border="0" width="70%">
<tr>
<td><p align="center">
<font color="white">Use the form below for your advanced search...</font><br><br>
</p></td>
</tr>
<tr>
<td>
<font><b>Find web pages that have...</b><br><br></font></td>
</tr><br>
<tr><td>all these words:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="allwords" size=100><br></td></tr>
<tr><td>this exact wording or phrase:&nbsp;&nbsp;&nbsp;<input type="text" name="exact" size=100><br></td></tr>
<tr><td>one or more of these words:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="oneormore1" size=27> OR <input type="text" name="oneormore2" size=27> OR <input type="text" name="oneormore3" size=27><br></td></tr>
<tr><td><br><b>But don't show words that have... </b><br><br></td></tr>
<tr><td>any of these unwanted words:&nbsp;<input type="text" name="unwanted" size=100><br></td></tr>
<tr>
<td><br><b>More tools...</b></td></tr>
<tr>
<td><br>

Results per page:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="resultno" size=30>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="Advanced Search">
</td></tr>

</table></form>
</body>
</html>














































<html>

</html>