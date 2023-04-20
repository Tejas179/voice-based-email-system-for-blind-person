<!-- saved from url=(0035)https://www.google.com/gmail/about/ -->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>iMails</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="icon" href="https://www.google.com/images/favicon.ico" type="image/ico">  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald'>
  <link rel="stylesheet" href="main.min.css">
  <link rel="stylesheet" href="my.css"> 
</head>
<body onload="speakText()">
<nav class="navbar navbar-expand-sm bg-light justify-content-end rounded">
<h3>iMails</h3>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" id="newone" href="forms/signup.php">SIGN-UP</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="oldone" href="forms/signin.php">LOGIN</a>
    </li>
  </ul>
</nav>
<div>
  <div >
  <div>
      <center><img src="images/8.jpg"></center>
  </div>
    <div class="hero_home__copy" style="width:700px;">
      <h1 style="color:black; z-index:10; padding-top:15%;">The ease &amp; simplicity of iMails</h1>
      <a id="btnTest" class="btn btn-danger" style="height:50px;" data-g-label="Get Gmail" href="forms/signup.php" target="_blank">CREATE AN ACCOUNT</a>
    </div>
  </div>
<script>

var col = "danger";
setInterval(function() {
  if (col == "danger") { 
    $("#btnTest").attr('class', 'btn btn-warning');
    col = "warning";
  } else if (col == "warning") {
    $("#btnTest").attr('class', 'btn btn-info');
    col = "info";
  } else if (col == "info") {
    $("#btnTest").attr('class', 'btn btn-danger');
    col = "danger";
  }
}, 1250);
$("#btnTest").event('hover')
</script>
<div class="jumbotron rounded">
      <div>
        <div style="text-align:center; padding:3%;">
		<h2>Meet your new inbox</h2>
<pre>New customizable tabs put you back in control so that 
you can see what’s new at a glance and decide which emails you want to read and when.</pre>
		</div>
      </div>	
</div>
<div class="jumbotron rounded">
      <div>	  
        <div style="text-align:center; padding:2%;">
		<h2>Custom Themes</h2>
<pre>Select your own image to use as a custom theme,
or choose from a selection of photos.</pre>
		</div>
      </div>	
</div>
<div class="jumbotron rounded">
      <div>
        <div style="text-align:center; padding:2%;">
		<h2>A better compose</h2>
<pre>Compose new messages while keeping an eye on your inbox.
Gmail’s compose is fast, easy to use, and packed with features.</pre>
		</div>
		<div style="width:50%;">
		</div>
      </div>
</div>
</div>

<script>
            function speakText(){
               
                responsiveVoice.speak('welcome to imails if you created account say sign in if not created say create new');
                
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/1.1.0/annyang.min.js"></script>
        <script>
                             if (annyang) {
                                var commands = {
                                        'sign in *tag' : function(){
                                          let oldone = document.getElementById("oldone").click();
                                            
                                                 },
                                        'sign up *tag' : function(){
                                            let newone = document.getElementById("newone").click();
                                        },
                                        
                                             };
                                                annyang.addCommands(commands);
                                                 annyang.start(); 
                                            }
                        </script>                    

<!-- Footer -->
<footer class="container-fluid" style="background-color:#d7dae0;">
	 <ul class="nav nav-tabs">
      <li class="nav-item"><a class="nav-link" href="">Help</a></li>
      <li class="nav-item"><a class="nav-link" href="">For work</a></li>
      <script async="" defer="" src="./Gmail - Free Storage and Email from Google_files/plusone.js.download" gapi_processed="true">
      </script>
        <li class="nav-item"><a class="nav-link" href="">About us</a></li>
        <li class="nav-item"><a class="nav-link" href="">Privacy</a></li>
        <li class="nav-item"><a class="nav-link" href="">Terms</a></li>
	</ul> 
</footer> 
</body></html>