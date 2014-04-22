<?php
	
	$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");

	else {
	$db=mysql_select_db("aapkapc",$con) or die ("cannot select db");

		
		//if(isset($_POST['submit'])) 
		{
		
            $queryString1 = $_POST['queryString1']; 			
			
			if(strlen($queryString1) >0) {
				
				$query ="SELECT products FROM products WHERE id=$queryString1";
				$list=mysql_query($query);
				if($query) {
		     			while($record=mysql_fetch_array($list)){
						  echo "<li>".$record['model']."</li>";	         		
//					echo "<li onClick=\"fill(".$record['url'].");\">".$record['url']."</li>";
		     			}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				
			} 
		}
		// else {
			//echo 'There should be no direct access to this script!';
		//}
	}
?>