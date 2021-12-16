
<link rel="stylesheet" type="text/css" href="../css/signup.css">
	   
     <?php
    $erfn=$erln=$erem=$erc=$erpa="";
    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      $username = $_POST['username'];
      $password = base64_encode($_POST['password']);

      $conn = new mysqli("localhost","root","","peachblossom");

        if (empty($fname)) {
          $erfn= "firstname cannot be empty";
        }
        else{
         if (is_numeric($fname)) {
         $erfn = "Firstname cannot be numeric";
          }
        }
        if (empty($lname)) {
          $erln= "Lastname cannot be empty";
        }  
        else{
         if (is_numeric($lname)) {
         $erln = "Lastname cannot be numeric";
          }    
        }   
        if (empty($email))  {
          $erem= "Email cannot be empty";
        }
        else{
         if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $erem ="Email is not in format";
          }
        }
        if (empty($contact)) {
        $erc= "Contact cannot be empty";
        }
          else{
             if (!is_numeric($contact)) {
             $erc = "Contact must be numeric";
          }
          else {
              if(strlen($contact)<10){
              $erc= "Contact must be of 10 digits";
            } 
          }
        }

        if (empty($password)) {
          $erpa= "Password cannot be empty";
        }      
        else if(strlen($password)<=5){
            $erpa= "Password must be greater than 5 characters";
        }
           
      else{
      //for unique email
        

      if($contact && $email && $username && $fname && $lname && $password){ 
     
        
        $sq = "INSERT INTO ADMIN(firstname,lastname,email,username,contact,password)
        VALUES('$fname','$lname','$email','$username','$contact','$password')";

          if ($conn->query($sq) == TRUE) {
            echo '<script>window.location="login.php";</script>';
         }
          else{
           echo "Error".$conn->error;
          }
        } 
      }
    
  }
  ?>   
    
 		<div id="sec4">
      <div class="row">
 		<div class="col-md-7">
		<p class="heading">WELCOME !</p>
		<!-- <img class="image" src="image/human.png" name="icon"> -->
		<form class="sign" name="sign" method="POST" action="">
	
		<label>First Name:<input type="text" name="fname" id="namef"><br><span class="error"><?php echo $erfn;?></span><br></label>

		<label>Last Name: <input type="text" name="lname" id="namel"><br><span class="error"><?php echo $erln;?></span><br></label>
    
    <label>Contact: <input type="text" name="contact" id="user"><br>
     <span class="error"><?php echo $erc;?></span><br></label>

    <label>Email: <input type="text" name="email" id="email"><br>
      <span class="error"><?php echo $erem;?></span><br></label>

       <label>Username: <input type="text" name="username" id="email"><br>
      <span class="error"><?php echo $erem;?></span><br></label>
 
    <label>Password: <input type="password" name="password" id="pass"><br><span class="error"><?php echo $erpa;?></span><br></label>

		<button name="submit" id="signin" value="signin" onclick="return signup()">Sign Up</button><br><br>
    <p class="login">Already have an account? <a href="login.php">Login</a></p>
		</form>
	</div>
  <div class="col-md-5">
    <img src="image/pb.jpg" class="image1">
  </div>
  </div>
</div>

<?php include('js.php') ;?>
<?php include('footer.php') ;?>