<?php
session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] =="POST")
  {
    //sometihng was posted
    $user_name = $_POST['user_name'];
    $password =  $_POST['password'];
    $Email = $_POST['Email'];

    if (!empty($Email) &&!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
      if($_POST['password'] != $_POST['passwordrepeat']){
        echo "Your passwords did not match. Please try again";
        //exit();
        }
      else {
  // code...
        // The hash of the password that
        // can be stored in the database
        $hash = password_hash($password,
        PASSWORD_DEFAULT);

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password,Email) values ('$user_id','$user_name','$hash','$Email')";

        mysqli_query($con,$query);

        header("Location: login.php");
        die;
      }
    }else
    {
      echo "Please enter some valid information!";
    }

  }

 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title>Sign up</title>
</head>
<body style="background-image: url('images/brooklyncollege.png'); background-repeat: no-repeat;  background-attachment: fixed;
  background-size: cover;">
  <style type="text/css">
  #text{

  		height: 25px;
  		border-radius: 5px;
  		padding: 4px;
  		border: solid thin #aaa;
  		width: 100%;
  	}

  	#button{

  		padding: 10px;
  		width: 100px;
  		color: white;
  		background-color: lightblue;
  		border: none;
  	}

  	#box{

  		background-color: grey;
  		margin: auto;
  		width: 300px;
  		padding: 20px;
  	}
  </style>
  <div id="box">
    <form method ="post">
      <div style="font-size:20px; margin: 10px; color:black;" >Sign up</div>

      <label for="Email"><b>Email</b></label>
      <input id="text" type="text" name="Email" /> <br />
      <label for="user_name"><b>Username</b></label>
      <input id="text" type="text" name="user_name" /> <br />
      <label for="psw"><b>Password</b></label>
      <input id="text" type="password" name="password" /><br />
       <label for="psw-repeat"><b>Repeat Password</b></label>
      <input id="text" type="password" name="passwordrepeat" /><br />

      <input id="button" type="submit" value="Sign up" /><br />

      <a href="login.php">Click to Login</a> <br />

    </form>

  </div>
</body>
</html>
