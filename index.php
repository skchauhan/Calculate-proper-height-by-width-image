<?php 
  $fileName = "";
	$size = getimagesize($fileName);
	$ratio = $size[0]/$size[1]; // width/height
	if( $ratio > 1) {
	    $width = 100;
	    $height = 100/$ratio;
	}
	else {
	    $width = 100*$ratio;
	    $height = 100;
	}
  
 ?> 
