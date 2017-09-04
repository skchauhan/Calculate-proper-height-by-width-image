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
  




===============================
	
	
	function resize_image($file, $w, $h, $crop=FALSE) {
	    list($width, $height) = getimagesize($file);
	    echo "$width, $height";
	    $r = $width / $height;
	    if ($crop) {
	        if ($width > $height) {
	            $width = ceil($width-($width*abs($r-$w/$h)));
	        } else {
	            $height = ceil($height-($height*abs($r-$w/$h)));
	        }
	        $newwidth = $w;
	        $newheight = $h;
	    } else {
	        if ($w/$h > $r) {
	            $newwidth = $h*$r;
	            $newheight = $h;
	        } else {
	            $newheight = $w/$r;
	            $newwidth = $w;
	        }
	    }
	    $src = imagecreatefromjpeg($file);
	    $dst = imagecreatetruecolor($newwidth, $newheight);
	    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	    return $dst;
	}

	$img = resize_image('12.jpg', '500', '150');
	//If you need resize height 150px 
	// If you need resize proper pass width , height and set true crop;

	 imagejpeg($img, 'newimage.jpg');   //save image 
 ?> 
