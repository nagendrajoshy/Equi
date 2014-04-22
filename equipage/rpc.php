<html>
<head>
<style type="text/css"><!--
		ul.specials li { color:white; }
		ul.specials li span { color:black; }
		
</style>
</head>
<body>

<?php
	
	$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");

	else {
	$db=mysql_select_db("sphiderplus",$con) or die ("cannot select db");

		
		if(isset($_POST['queryString'])) {
		
            $queryString = $_POST['queryString']; 			
			
			if(strlen($queryString) >0) {
				
				$query ="SELECT title FROM content WHERE title LIKE '%$queryString%' LIMIT 5";
				$list=mysql_query($query);
				if($query) {echo "<ul class=\"specials\">";
		     			while($record=mysql_fetch_array($list)){
						  echo '<li onClick="fill(\''.$record['title'].'\');"><span>'.$record['title'].'</span></li>';	         		
//					echo "<li onClick=\"fill(".$record['url'].");\">".$record['url']."</li>";
		     			}
		     			echo "</ul>";
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				
			} 
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>