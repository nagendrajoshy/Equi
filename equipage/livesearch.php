<?php
error_reporting(E_PARSE);

$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementsByTagName('table');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0)
{
$hint="";
for($i=0; $i<($x->length); $i++)
  {
  $z=$x->item($i)->getElementsByTagName('column');
  if ($z->item(0)->nodeType==1)
    {
   //find a link matching the search text
    if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q))
      {
      if ($hint=="")
        {
        $hint= 
        $z->item(0)->childNodes->item(0)->nodeValue; 
        
        }
      else
        {
        $hint=$hint . "<br />" . 
        $z->item(0)->childNodes->item(0)->nodeValue;
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>