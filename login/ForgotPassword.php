<!DOCTYPE html>
<html>
<head>
 <title>Forgot Password</title>
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

     background-color: pink;
     margin: auto;
     width: 300px;
     padding: 20px;
   }
 </style>
 <div id="box">
   <form method ="post">
     <div style="font-size:20px; margin: 10px; color:black;" >Forgot Password</div>

     <label for="Email"><b>Email</b></label>
     <input id="text" type="text" name="Email" /> <br />
     <label for="user_name"><b>Username</b></label>
     <input id="text" type="text" name="user_name" /> <br />

     <input id="button" type="submit"  value="Send Email" /><br />
       <a href="login.php">Click to go back to Login</a> <br />


   </form>

 </div>
</body>
</html>
