<?php
require('lib/lib-function.php');
$query = $_GET['q'];
$fungsi = new Fungsi();
echo $fungsi->fetchData($query,'tab');
?>