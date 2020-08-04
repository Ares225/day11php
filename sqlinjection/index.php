<?php
$connect = mysqli_connect('localhost','root','','a_database');
mysqli_select_db($connect, 'a_database');

if(isset($_POST['username'])&&isset($_POST['password']))  {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(!empty($username)&&!empty($password)) {
     echo $username.'<br>'.$password.'<br>';
    $query = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password'";
    $query_run = mysqli_query($connect, $query);

    if(mysqli_num_rows($query_run)>=1) {
      echo 'Login success.';
    } else {
      echo 'Invalid username/password combination.';
    }

  }
}
?>
<form action="index.php" method="POST">
Username: <input type="text" name="username">
Password: <input type="text" name="password">
<input type="submit" value="Submit">
</form>