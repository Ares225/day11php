<?php
header('Content-type: image/jpeg');

$con = mysqli_connect('localhost','root','','a_database');
mysqli_select_db('a_database');




if(isset($_GET['id'])) {
$id = $_GET['id'];
 $query = mysqli_query($con, "SELECT `email` FROM `users` WHERE `id`='".mysqli_real_escape_string($id)."'");
 if (mysqli_num_rows($query)>=1) {
 $email = mysqli_result($query, 0, 'email');
 } else {
   $email = 'ID not found.';
 }
} else {
  $email = 'No ID specified.';
}

$email_length = strlen($email);

$font_size = 4;

$image_height = ImageFontHeight($font_size);
$image_width = ImageFontWidth($font_size) * $email_length;

$image = imagecreate($image_width, $image_height);

imagecolorallocate($image, 255, 255, 255);
$font_color = imagecolorallocate($image, 0 ,0, 0);

imagestring($image, $font_size, 0, 0, $email, $font_color);
imagejpeg($image);
?>