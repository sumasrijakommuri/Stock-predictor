<?php
$open_conn = mysqli_connect('localhost', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
//echo "Connection Successful!</br>";


$name = isset($_POST['name'])       ? htmlspecialchars(trim($_POST['name']))      : null;
$username = isset($_POST['username'])       ? htmlspecialchars(trim($_POST['username']))      : null;
$email = isset($_POST['email'])       ? htmlspecialchars(trim($_POST['email']))      : null;
$password = isset($_POST['password'])       ? htmlspecialchars(trim($_POST['password']))      : null;
$confirm = isset($_POST['confirm'])       ? htmlspecialchars(trim($_POST['confirm']))      : null;

if ($password != $confirm)
{
  header("Location: incorrect_password.php");
}
else 
{

  $insertquery = "insert into userdata values ('".$username."','".$name."','".$email."','".$password."')";
    $historyquery = "create table ".$username." (company VARCHAR(20),type VARCHAR(50),prediction VARCHAR(30),date VARCHAR(20))";

  if(mysqli_query($open_conn,$insertquery))
  {
  	session_start();
  	if(isset($_SESSION['username']) or isset($_SESSION['name']))
  	{
        $_SESSION['username'] = $username;
  	     $_SESSION['name'] = $name;
        mysqli_query($open_conn,$historyquery) or die(mysqli_error($open_conn));
  		header("Location: home.php");
  	}
  	else
  	{
  	$_SESSION['username'] = $username;
  	$_SESSION['name'] = $name;
        mysqli_query($open_conn,$historyquery) or die(mysqli_error($open_conn));
  	header("Location: home.php");
  }
  	
  }

  else
  	{if (strpos( mysqli_error($open_conn), "PRIMARY" )) {
  die(header("Location: username_error.php")); 
  }
  else if (strpos( mysqli_error($open_conn), "email" ))
  {
  	die(header("Location: email_error.php"));
  }
}


}

}

?>
