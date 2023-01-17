<?php

$conn = mysqli_connect("localhost","root","","cashzone");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/cashzone/admin/');
define('SITE_PATH','http://127.0.0.1/cashzone/admin/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

?>