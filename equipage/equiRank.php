<?php
$con=mysql_connect("localhost","root","");
if(! $con)
die("couldn't connect to database");
mysql_select_db("sphiderplus",$con) or die ("cannot select db");

$select_query="select * from equi";
$list=mysql_query($select_query);
$num = mysql_num_rows($list);

/////////remove sinks
echo "Removing sinks<br>";
$select_sink="select * from equi where outlinks=0";
$list_sink=mysql_query($select_sink);
$num_sink = mysql_num_rows($list_sink);

echo $num_sink." Sinks identified<br>";
while(($record_sink=mysql_fetch_array($list_sink)))
{
$update_sink="update equi
set outlinks=".$num." 
where id=".$record_sink['id'];	
mysql_query($update_sink)or die(mysql_error());
//echo "hello";
}
echo $num_sink." sinks removed Successfully<br>";


//////////////////////


$sum = 0;
$tempout = 0;
$count = 0;
    
while(($record=mysql_fetch_array($list)))
{
	$sum = 0;
    $tempout = 0;
    $count = 0;
    $urltemp = $record['url'];
    $idtemp = $record['id'];
    $select_query1="Select * FROM `ll` where url like '".$urltemp."'";
    $list1=mysql_query($select_query1);
    
    
    while(($record1=mysql_fetch_array($list1)))
    {
    	$tempid=$record1['id'];
        $select_query2="Select * FROM `equi` where id = ".$tempid;
        $list2=mysql_query($select_query2);
        while(($record2=mysql_fetch_array($list2)))
        {
        	$sum=$sum+($record2['rank']/$record2['outlinks']);
        	$tempout=$tempout+$record2['outlinks'];
        }
        ++$count;	
    }
     $d = $count/$tempout;
     $sum = $sum * $d;
     $sum += ((1 - $d)/$num);
     echo $record['id']." &nbsp;&nbsp;&nbsp;&nbsp;".$sum."<br>";       
}
?>