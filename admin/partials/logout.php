<?php
session_start();
session_unset();
session_destroy();

header("location:/cashzone/index.php");
exit;



?>