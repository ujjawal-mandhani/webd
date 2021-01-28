<?php


session_start();


$conn = mysqli_connect("localhost","root","","MUUSIC");


if(!$conn)

	echo"Error connecting".mysqli_error();


if(isset($_POST['user_name']) && isset($_POST['pass_word']))
{
$username = $_POST['user_name'];

$password = $_POST['pass_word'];


$login_query = mysqli_query($conn,"SELECT user_id,user_name FROM users WHERE pass_word='$password' AND user_name='$username'");

$login = mysqli_fetch_assoc($login_query);


if(mysqli_num_rows($login_query) != 0)
{
	echo"logged in";

	$_SESSION['user_id'] = $login['user_id'];

	$_SESSION['user_name'] = $login['user_name'];

}

}

?>



<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	background-color : black;
  font-family: cursive;
}

.glow {
  font-size: 80px;
  color: #fff;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}
</style>
</head>

	<body>

		<link rel="stylesheet" type="text/css" href="navigation.css">


<div class="glow">MUUSIC</div>
<?php 

if(isset($_SESSION['user_name']))

{
	echo"<a href=''> My reviews </a>";

	
	if((mysqli_num_rows(mysqli_query($conn,"SELECT artist_id,user_id FROM artist_users WHERE user_id=$_SESSION[user_id];")))!=0)
	
{
		
echo"<a href='my_music.php' > My music </a>";

	}

}
	
?>



<?php
 
if(isset($_SESSION['user_name']))

	 echo"<a id ='logout' href='logout.php'>logout</a>";

else
	
{
		
echo"<a id='login' href = 'login\index.php' style=\" font-family: UNICORN;text-decoration: none\" ><h3 align='right'><font color='white'>LOGIN</font></h3></a>";
	
		
echo"<a id='signup' href='signup\index.php' style=\" font-family: UNICORN;text-decoration: none\" ><h3 align='right'><font color='white'>SIGN UP</font></h3></a>";	// add a link to sign up page
}



?>






<div class="top_nav">

<div id="logged_in"> 

<?php 
if(isset($_SESSION['user_name']))

{
	echo"logged in as".$_SESSION['user_name']; 

}


?> 
</div>


<a href="proj.php" > Home </a>

<a href=""> Genres </a>


</div>
</br>
</br>
<form action="search.php" align="center" method="post">

<input type="text" size="100" align="center" name="searching" placeholder="search...">

</form>



<br>