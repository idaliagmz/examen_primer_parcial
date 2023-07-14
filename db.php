<?php 

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'gmz'
) or die(mysqli_erro($mysqli));
 ?>