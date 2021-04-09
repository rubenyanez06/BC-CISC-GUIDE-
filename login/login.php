<?php
session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] =="POST")
  {
    //sometihng was posted
    $user_name = $_POST['user_name'];
    $password =  $_POST['password'];


    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from  database
        $query = "select * from users where user_name = '$user_name' limit 1 ";
        $result = mysqli_query($con,$query);

        if($result)
        {
          if($result && mysqli_num_rows($result) > 0)
          {
            $user_data = mysqli_fetch_assoc($result);
            $hash =$user_data['password'];
            if(password_verify($password,$hash))
            {
              $_SESSION['user_id'] = $user_data['user_id'];
              header("Location: home.html");
              die;
            }
          }
      }
        }
          echo "Wrong username or password";
    }else
    {
      echo "Please enter some valid information!";
    }



 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title>Login</title>
</head>
<body style="background-image: url('images/brooklyncollege.png'); background-repeat: no-repeat;  background-attachment: fixed;
  background-size: cover;" >


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

  		background-color: pink;
  		margin: auto;
  		width: 300px;
  		padding: 20px;


  	}


  </style>
  <div id="box"  >
    <form method ="post">
      <div style="font-size:20px; margin: 10px; color:black;" >Login</div>

      <input id="text" type="text" name="user_name" /> <br />
      <input id="text" type="password" name="password" /><br />
      <a href="ForgotPassword.php">Forgot Password</a> <br />
      <input id="button" type="submit" value="Login" /><br />
      <a href="signup.php">Click to Sign up</a> <br />

    </form>

  </div>
</body>
</html>
