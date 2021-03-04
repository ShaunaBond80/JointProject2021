
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

$sql = 'CREATE DATABASE IF NOT EXISTS patient;';
if (!$conn->query($sql) === TRUE) {
  die('Error creating database: ' . $conn->error);
}

$sql = 'USE patient';
if (!$conn->query($sql) === TRUE) {
  die('Error using database: ' . $conn->error);
}

$sql = 'CREATE TABLE IF NOT EXISTS testtable1 (
id int NOT NULL AUTO_INCREMENT,
fname varchar(256) NOT NULL,
surname varchar(256) NOT NULL,
DOB varchar(256) NOT NULL,
PPSN varchar(256) NOT NULL,
telephone varchar(256) NOT NULL,
Doctor varchar(256) NOT NULL,
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

$escaped_fname = $conn -> real_escape_string($_POST['fname']);
$encrypted_fname = openssl_encrypt($escaped_fname,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$fname_hex = bin2hex($encrypted_fname);

$escaped_surname =$conn -> real_escape_string($_POST['surname']);
$encrypted_surname = openssl_encrypt($escaped_surname,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$surname_hex = bin2hex($encrypted_surname);

$escaped_DOB =$conn -> real_escape_string($_POST['DOB']);
$encrypted_DOB = openssl_encrypt($escaped_DOB,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$DOB_hex = bin2hex($encrypted_DOB);

$escaped_PPSN =$conn -> real_escape_string($_POST['PPSN']);
$encrypted_PPSN = openssl_encrypt($escaped_PPSN,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$PPSN_hex = bin2hex($encrypted_PPSN);

$escaped_telephone =$conn -> real_escape_string($_POST['telephone']);
$encrypted_telephone = openssl_encrypt($escaped_telephone,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$telephone_hex = bin2hex($encrypted_telephone);

$escaped_Doctor =$conn -> real_escape_string($_POST['Doctor']);
$encrypted_Doctor = openssl_encrypt($escaped_Doctor,$cipher,$key,OPENSSL_RAW_DATA,$iv);
$Doctor_hex = bin2hex($encrypted_Doctor);

$sql = "INSERT INTO testtable1 (fname, surname, DOB, PPSN, telephone, Doctor, iv ) VALUES ('$fname_hex','$surname_hex','$DOB_hex', '$PPSN_hex','$telephone_hex','$Doctor_hex','$iv_hex')";

if ($conn->query($sql) === TRUE) {
  header("Location: http://localhost/JointProject/verification.php");
}
else {
  die('Error creating patient:'.$conn->error);
}


}



?>

</head>
<body>

<h2>Patient Check-In Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter first name" id="fname" name="fname" required>

      <label for="surname"><b>surname</b></label>
      <input type="text" placeholder="Enter surname" id="surname" name="surname" required>

      <label for="DOB"><b>DOB</b></label>
      <input type="date" placeholder="Enter DOB" id="DOB" name="DOB" required>

      <label for="PPSN">PPSN Number:</label>
      <input type="text" id="PPSN" name="PPSN" placeholder="Enter PPSN">
  
  	  <label for="telephone">Telephone:</label>
  	  <input type="text" id="telephone" name="telephone" placeholder="XXX-XXXXXXX">

        <label for="Doctor">Doctor:</label>
      <input type="text" id="Doctor" name="Doctor" placeholder="Enter Doctors name">
  	
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