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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>equipage</title>
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
<body background="images/head12345.png" onLoad="focus();equipage.inputString.focus()">
<br><br><br>
<p align="center">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<form action="" name="equipage" method="post">
<p align="center">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT type="text"  name="inputString" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" onmouseover="checkMouse(true);" onmouseout="checkMouse(false);" STYLE="color:"black" ; font-family: Times New Roman; font-weight: bold; font-size: 12px; background-color:"white" ;border:"blue"; size="90">&nbsp;&nbsp;&nbsp;<font size="3"><a href="#" STYLE="TEXT-DECORATION: NONE">Advanced Search</a></font>

<p align="center"><div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
</div></p>
<p align="center"><br><br><input type="submit" name="submit" value="equiSearch" style="height: 30px; width: 150px">
&nbsp;&nbsp;&nbsp;<input type="submit" name="equinstan" value="equInstant" style="height: 30px; width: 150px"><br><br><br>

<font size="3"><a href="index.php" STYLE="TEXT-DECORATION: NONE">Go to equipageIndia.com</a></font>


</p>
</form>
</body>
</html>
