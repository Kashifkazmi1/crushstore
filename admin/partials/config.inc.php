<?php

$conn = mysqli_connect("localhost","root","","cashzone");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/crushstore/admin/');
define('SITE_PATH','http://localhost/crushstore/admin/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

?>