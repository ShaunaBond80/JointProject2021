<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Bonds Medical Center</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Bonds Medical Center</h3>  
                <br />  
                <?php 
				
				
?>
                <h3 align="center">Covid-19 Check List</h3>  
                <br />  
                <h4 alighn="center">Please fill out this form HONESTLY!</h4>
                <form action="action_handler.php" method="POST">
    <p1>1. Do you have a Fever (temperature over 100.30F) without having taken any fever reducing medications?<br/></p1>
    <input type="radio" value="yes" name="feveryes" id="feveryes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="feverno" id="feverno" > 
    <label  for="no"> No</label> <br/>
    <p2>2. Do you have a Loss of Smell or Taste? <br/> </p2>
    <input type="radio" value="yes" name="smellyes" id="smellyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="smellno" id="smellno" >
    <label  for="no"> No</label> <br/>
    <p3>3. Do you have a Cough? <br/></p3>
    <input type="radio" value="yes" name="coughyes" id="coughyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="coughno" id="coughno" > 
    <label  for="no"> No</label> <br/>
    <p4>4. Do you have Muscle Aches?  <br/> </p4>
    <input type="radio" value="yes" name="achesyes" id="achesyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="achesno" id="achesno" > 
    <label  for="no"> No</label> <br/>
    <p2>5. Do you have a Sore Throat?<br/></p2>
    <input type="radio" value="yes" name="throatyes" id="throatyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="throatno" id="throatno" > 
    <label  for="no"> No</label> <br/>
    <p2>6. Do you have Shortness of Breath?<br/></p2>
    <input type="radio" value="yes" name="breathyes" id="breathyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="breathno" id="breathno" > 
    <label  for="no"> No</label> <br/>
    <p2>7. Do you have Chills?<br/></p2>
    <input type="radio" value="yes" name="chillsyes" id="chillsyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="chillsno" id="chillsno" >
    <label  for="no"> No</label> <br/>
    <p2>Do you have a Headache?<br/></p2>
    <input type="radio" value="yes" name="headacheyes" id="headacheyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="headacheno" id="headacheno" > 
    <label  for="no"> No</label> <br/>
    <p2>Have you experienced any gastrointestinal symptoms such as nausea/vomiting, diarrhea, loss of appetite?<br/></p2>
    <input type="radio" value="yes" name="vomityes" id="vomityes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="vomitno" id="vomitno" > 
    <label  for="no"> No</label> <br/>
    <p2>Have you, or anyone you have been in close contact with been diagnosed with COVID-19, or been placed on quarantine for possible contact with COVID-19<br/></p2>
    <input type="radio" value="yes" name="closeyes" id="closeyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="closeno" id="closeno" >
    <label  for="no"> No</label> <br/>
    <p2>Have you been asked to self-isolate or quarantine by a medical professional or a local public health official?<br/></p2>
    <input type="radio" value="yes" name="isolateyes" id="isolateyes" >
    <label  for="yes"> Yes</label> <br/>
    <input type="radio" value="no" name="isolateno" id="isolateno" >
    <label  for="no"> No</label> <br/>

    I agree to the <a href="file:///C:/xampp/htdocs/JointProject/termsofservice.html">Terms of Service and Privacy Policy</a><br>
  <input type="radio" id="termsYes" name="terms" value="termsYes" required/>
    <label for="termsYes">Yes</label><br>
    
    <input type="reset" value="Clear">

    <p><input type="submit" value="Submit"></p>
  </form>

  <script type = "text/javascript">
        function YesCovid() {
            if(document.getElementById("feveryes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("smellyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else  (document.getElementById("coughyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("achesyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("throatyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("breathyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("chillsyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("headachesyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("vomityes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("closeyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }

            if else (document.getElementById("isolateyes").checked) {
                event.preventDefault();
          window.location = "http://localhost/JointProj/covid.html";
            }


            else {
                    event.preventDefault();
                    window.location = "http://localhost/JointProj/homepage.php";
            }
        }

        </script>

</div>  
</body>  
</html>