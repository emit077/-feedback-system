<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body style="top:0">
  <header>
    <div id="headcontainer">
      <h1>FEEDBACK SYSTEM</h1>
    </div>
    <div class="navbar">
        <a  href="#home"><img src="images/home.svg" style="width: 50px;height: 50px;"><br>Home
          </a>
      <a href="#contact"><img src="images/contact-128.png" style="width: 50px;height: 50px;"><br>Contact Us</a>
        <a href="#about"><img src="images/aboutUs2.png" style="width: 50px;height: 50px;"><br>About Us</a>
        <a class="active" href="login.php" style="position:absolute;right: 0px "><img src="images/login2.svg" style="width: 50px;height: 50px;"><br>Login</a>
    </div>
  </header>

 <div class="container">
  <img src="images/fb.jpg" alt="Avatar" class="image"><span id 
  <div class="overlay"> <!-- <span class="textdemo"><br> <br>
    -->
    <div style="padding-top: 30px;padding-left: 20px;padding-right: 20px; text-align: justify;font-size: 20px;color: white">
      We all know how hard it can be to make a site look like the demo, so to make your start into the world of X as easy as possible we have included the demo content from our showcase site. Simply import the sample files we ship with the theme and the core structure for your site is already built. Keep in mind that even if you don’t use the demo content, you’ll be much better off than with most other themes since all of the customization options are done right from within the WordPress Customizer making it super easy to configure your site as compared to most of the typical admin panels. You will be pleasantly surprised how easy it is to setup and configure your site with X – with or without the demo content.<br>
      
      </div>
    
 <!--  </span>
   -->
  </div>
</div>


 
<div class="logincont">
  <span class="rtitle">Login</span>
  <br>
  <br>
  <form action="validate.php" method="POST">
    <input  type="text" name="username" placeholder="Username" class="textinput" >

    <input type="password"  id="myPassword" name="password" placeholder="Password" class="textinput" ><br>
    <input type="checkbox" style="margin-left: 30px" onclick="showPassword()" > Show Password
    <button class="submit" type="submit" style="">
      <img src="css/arrow-right.png" height="24px" />
    </button>
    <script type="text/javascript">
      function showPassword() {
        var x = document.getElementById("myPassword");
        if (x.type == "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
 

  </form>
</div>


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
<html>