<?php

	$md5=md5(rand(65,132));
	$code=substr($md5,0,5);
	header('Content-Type:Image/png');

	$img=imagecreate(60,30);

	imagecolorallocate($img,230,230,194);

	imagestring($img,10,5,5,$code,255);

	imagepng($img);
	imagedestroy($img);

?>