<?php

   //include ("../WFDocument.php");
	include ("../scripts.php");
 
    $filetype = $_GET['filetype'];
    $filename = $_GET['file'];
    $filepath = UPLOADEDFILES.$filename;
	
	if($stream = fopen($filepath, "rb")){
      $file_contents = stream_get_contents($stream);
      header("Content-type: ".$filetype);
      print($file_contents);
   }
   //$wfdocument = new WFDocument($filename, $filetype);
   //$wfdocument->download();

?>