<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body >
	<header>
	<div id="headcontainer">
		<h1>FEEDBACK SYSTEM</h1>
	</div>
	<div class="navbar">
      <a class="active" href="#home"><img src="images/home.svg" style="width: 50px;height: 50px;"><br>Home
      	</a>
 	  <a href="#contact"><img src="images/contact-128.png" style="width: 50px;height: 50px;"><br>Contact Us</a>
      <a href="#about"><img src="images/aboutUs2.png" style="width: 50px;height: 50px;"><br>About Us</a>
      <a href="login.php" style="position: absolute;right: 0px;"><img src="images/login2.svg" style="width: 50px;height: 50px;"><br>Login</a>
	</div>
	</header>

			<!-- <h2>Automatic Slideshow</h2> -->

<div style="display: inline-block;width: 99.8%; padding: 1px; background-color: grey; height:350px; position: relative;">

			<div class="slideshow-container">

					<div class="mySlides fade">
					  <div class="numbertext">1 / 3</div>
					  <img src="images/feedback-1825515_1280.jpg" class="responsive" style=" width:100%">
					  
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">2 / 3</div>
					  <img src="images/feedback-surveys-conversion-images.jpg" class="responsive" style="display: inline-block width:100%" >
					  
					</div>

					<div class="mySlides fade">
					  <div class="numbertext">3 / 3</div>
					  <img src="images/Comments2.jpg" class="responsive" style="display: inline-block width:100%">
					  
					</div>
			</div>
						
			
				<div class="container" style="position: absolute; right: 8px; top: 8px;">
					<img src="images/question-mark-1872665_1280.jpg" alt="pic" height="334px" width="1500px">
					<div class="content" style="right: 0px;top: 0px;width:30%;height:88%;">
						<h2>Feedback</h2>
					    <p>Feedback is an essential part of education. It helps learners to maximise their potential at different stages and  raise their awareness of strengths and areas for improvement, and identify actions to be taken to improve performance.</p>
					</div>					 
			   </div>
			

</div>
</body>
<br>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
   
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block";  
    
    setTimeout(showSlides, 2000); // Change image every 2 
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    seconds
}
</script>



	<footer>
			<div id="footcontainer">
				|| <a href="index.php">Home</a> ||
				<a href="contact.php">Contact Us</a> ||
				<a href="about.php">About Us</a> ||	
				<a href="login.php">Login</a> ||
				<br>
				Feedback System is optimized to give feedback.We do not warrent the correctness of its content.			
				<br>
				&copy; 2018 by amitrimaanjali. All rights reserved

			</div>
	</footer>
</body>
</html>
