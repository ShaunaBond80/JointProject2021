
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    //** CSS taken from previous year labs with Catherine Maloney, used w3schools website*/
body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], input[type=date], input[type=password]  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
} 
</style>
</head>
<body>


<?php
 //* Taken and modified from Martins Lab10 and Lab11.
$host = 'localhost';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password);

$cipher = 'AES-128-CBC';
$key = 'thebestsecretkey';

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

$sql = 'CREATE DATABASE IF NOT EXISTS doctor;';
if (!$conn->query($sql) === TRUE) {
  die('Error creating database: ' . $conn->error);
}

$sql = 'USE doctor';
if (!$conn->query($sql) === TRUE) {
  die('Error using database: ' . $conn->error);
}

$sql = 'CREATE TABLE IF NOT EXISTS testtable1 (
id int NOT NULL AUTO_INCREMENT,
drname varchar(256) NOT NULL,
email varchar(256) NOT NULL,
iv varchar(32) NOT NULL,
PRIMARY KEY (id));';


if (!$conn->query($sql) === TRUE) {
  die('Error creating table: ' . $conn->error);
}
?>
<?php
if(isset ($_POST['testtable1'])){

$iv= random_bytes(16);
$iv_hex = bin2hex($iv);

$escaped_drname = $conn -> real_escape_string($_POST['drname']);
$encrypted_drname = openssl_encrypt($escaped_drname,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$drname_hex = bin2hex($encrypted_drname);

$escaped_email =$conn -> real_escape_string($_POST['email']);
$encrypted_email = openssl_encrypt($escaped_email,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$email_hex = bin2hex($encrypted_surname);



$sql = "INSERT INTO testtable1 (drname, email, iv ) VALUES ('$drname_hex','$email_hex','$iv_hex')";

if ($conn->query($sql) === TRUE) {
  header("Location: http://localhost/JointProject/patientsD.php");
}
else {
  die('Error creating patient:'.$conn->error);
}


}



?>

</head>
<body>

<h2>Doctors Login Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="drname"><b>Name</b></label>
      <input type="text" placeholder="Enter Dr. Name" id="drname" name="drname" required>

      <label for="surname"><b>email</b></label>
      <input type="text" placeholder="Enter email address....." id="email" name="email" required>

  	
        I agree to the <a href="https://www.privacypolicies.com/live/56c33258-ef36-4264-a13a-a69d3248b359">Terms of Service and Privacy Policy</a><br>
  <input type="radio" id="termsYes" name="terms" value="termsYes" required/>
    <label for="termsYes">Yes</label><br>
    
        
      <button type="submit" name="testtable1">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    <input type="reset" value="Clear">
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>