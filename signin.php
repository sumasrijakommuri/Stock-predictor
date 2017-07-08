<?php
$open_conn = mysqli_connect('localhost', 'root' , '', 'WebApps');
if(!$open_conn)
{
	echo("Connection Failed!");
}
else
{
	$username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : null;
	$password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;
	
	$loginquery = "SELECT password, name FROM userdata WHERE username = '".$username."'";
	$result = mysqli_query($open_conn,$loginquery) or die(mysqli_error($open_conn));
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($row['password'] == $password)
	{

		session_start();
		/*if(isset($_SESSION["username"]) or isset($_SESSION["name"]))
		{		
		header("Location: home.php");
		exit;
		}
		else
		{*/
		$namequery = "SELECT name FROM userdata WHERE username = '".$username."'";
		$name = mysqli_query($open_conn,$namequery) or die(mysqli_error($open_conn));

		$namerow = mysqli_fetch_array($name, MYSQLI_ASSOC);
		$_SESSION["username"] = $username;
		$_SESSION["name"] = $namerow['name'];
		header("Location: home.php");
		exit;
		//}
	}

  else 
  {
    header('Location: authentication_fail.php');
  }

}
?>
