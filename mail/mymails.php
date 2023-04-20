<?php

    require '../database/db.inc.php';
    if(!isset($_SESSION))
    {
      session_start();
    }
    $mail = $_SESSION['mail'];
    $lname = $_SESSION['lname'];
    $fname = $_SESSION['fname']; 
 
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=0  AND draft=0;";
    $inbox=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail' AND trash=0  AND draft=0;";
    $sent=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail' AND draft=1;";
    $draft=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail'  AND trash=1 ;";
    $trash1=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=1 ;";
    $trash2=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $trash = $trash1 + $trash2;
    $sql = "SELECT * FROM mails WHERE c_1= '$mail'  AND trash=0  AND draft=0 AND star=1;";
    $star1=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=0  AND draft=0 AND star=1;";
    $star2=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $star= $star1 + $star2;
    
    $sql = "SELECT * FROM `theme` WHERE  `C_id`= '$mail';";
    $result=mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        if($row = mysqli_fetch_array($result))
        {
            $theme = $row['theme'];
        }
    }
    $x = "background-image: url('../repository/img/";
    $x = 'theme';
    $x .= ".jpg');";
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (isset($_POST['submit'])) { 
    
        require '../forms/send.php';
            
        }
    }

    //first we leave this input field blank
                    $recipient = "";
                    //if user click the send button
                    if(isset($_POST['send'])){
                        //access user entered data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                       $sender = "From: tejasvispute42@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient) || empty($subject) || empty($message)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                            <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                            <div class="alert alert-success text-center">
                                <?php echo "Your mail successfully sent to $recipient"?>
                            </div>
                           <?php
                           $recipient = "";
                           }else{
                            ?>
                            <!-- display an alert message if somehow mail can't be sent -->
                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending your mail!" ?>
                            </div>
                           <?php
                           }
                       }
                    }
                ?> <!-- end of php code -->
    


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>iMails</title>
  <meta charset="utf-8">
   <link rel="icon" href="../repository/images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../repository/css/bootstrap.min.css">
  <link rel="stylesheet" href="../repository/css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="../repository/js/jquery.min.js"></script>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="../repository/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   
</head>

<body  style="<?php echo $x; ?>">
<div class="container-fluid"> 
  <div class="row ">
    <div class="col-sm-2">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="logo">iMails</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-10"><br>
       <div class="row" >
        <div class="col-sm-1">
          <a href="#"><i class="bar  fas fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9">
          <input class="bar" type="text" placeholder="Search mail" id="SearchBox" onkeyup="SearchMailFunction()">
        </div>
        <div class="col-sm-2">
          <i class="fas fa-user-circle" data-toggle="dropdown"></i>
            <div class="dropdown-menu">
              <a class="dropdown-item"><i class="fas fa-user"></i>&nbsp;&nbsp; <?php echo $fname; ?> <?php echo $lname; ?></a>
              <a class="dropdown-item"><i class="fas fa-envelope-open"></i>&nbsp;&nbsp; <?php echo $mail; ?></a>
              <a class="dropdown-item" href="../settings"><i class="fas fa-wrench"></i> &nbsp;&nbsp;Settings</a>
              <a class="dropdown-item" href="../forms/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp; Logout</a>
            </div>
        </div>
      </div><br>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2" >
      <center>
        <div class="compose_btn" data-toggle="modal" data-target="#myModal">
          <i class="fas fa-plus" id="comp" onclick="speakText()"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Compose
        </div>
      </center><br>
                    <!-- The Modal -->
                      <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title" >Compose</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <style>
                                .box .input-box{
                                        position: relative;
                                    }
                                    .box .input-box input,textarea,select{
                                        width: 100%;
                                        padding: 10px,0;    
                                        font-size: 16px;
                                        margin-bottom: 10px;
                                        border: none;
                                        outline: none;
                                        border-bottom: 1px solid #09BCFF;
                                    }
                                    .box .input-box label{
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        color: #909090;
                                        padding: 10px,0;
                                        font-size: 16px;
                                        pointer-events: none;
                                        transition: .5s;
                                    }

                                    .box .input-box input:focus, textarea:focus{
                                        border-bottom: 2px solid #09BCFF;
                                    }

                                    .box .input-box input:focus ~ label, .box .input-box textarea:focus ~ label,
                                    .box .input-box input:valid ~ label, .box .input-box textarea:valid ~ label{
                                        top: -18px;
                                        left: 0;
                                        color: #09BCFF;
                                        font-size: 13px;
                                    }       
                            </style>
                            <div class="modal-body">
                              <div class="box">
                                <form method="post" action="mymails.php" enctype="multipart/form-data"><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <input type="text" id="email"  name="email" type="email" on value="<?php echo $recipient ?>">
                                        <label>To *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <input type="text" id="subject" name="subject"   autocomplete="off"/>
                                        <label>Sub *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <textarea   name="message" id="message" rows="4" autocomplete="off"></textarea>
                                        <label>Message *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <center>
                                          <button  name="send" id="send" value="send" type="submit" class="btn btn-primary" onclick="speakText2()">Next</button>
                                      </div></center>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/1.1.0/annyang.min.js"></script>
                        <script>
                          
                           if (annyang) {
                                var commands = {
                                          'send email *tag' : function(variable){
                                            let comp = document.getElementById("comp").click();
                                            
                                                 },
                                        'email *tag' : function(variable){
                                            let email = document.getElementById("email");
                                            email.value = variable.split(" ").join("");
                                                 },
                                        'subject *tag' : function(variable){
                                            let subject = document.getElementById("subject")
                                            subject.value = variable;
                                        },
                                        'message *tag' : function(variable){
                                            let message = document.getElementById("message")
                                            message.value = variable;
                                        },
                                        'submit *tag' : function(){
                                            let send = document.getElementById("send").click();
                                        },
                                        'received mails *tag' : function(){
                                          window.open("https://mail.google.com/mail/u/0/#inbox")
                                        },
                                        'close form *tag' : function(){
                                          window.close("mymails.php")
                                        }
                                        
                                        
                                             };
                                                annyang.addCommands(commands);
                                                 annyang.start(); 
                                            }
                        </script>
                      
                      <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
                      <script>
                            function speakText(){
               
                              responsiveVoice.speak('To send email say compose email and to enter subject say subject and also for entering message say message then for submitting only say submit');

                
                                                 }
                      </script>

                        <script>
                        $(document).ready(function(){
                              $("send").click(function(){
                                $("email.value").append("@gmail.com");
                            });
                          });
                    </script>

                    <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
                      <script>
                            function speakText2(){
               
                              responsiveVoice.speak('your email is sended successfully');
                
                                                 }
                      </script>

                      <script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script>
        <script>
            document.getElementById("email").addEventListener("focusout",speaker)
            function speaker(){
                    responsiveVoice.speak('email is successfully entered');
            }
        </script>
        <script>
            document.getElementById("subject").addEventListener("focusout",speaker1)
            function speaker1(){
                    responsiveVoice.speak('subject is successfully entered');
            }
        </script>
        <script>
            document.getElementById("message").addEventListener("focusout",speaker2)
            function speaker2(){
                    responsiveVoice.speak('message is successfully entered');
            }
        </script>
                  
                  
                     
   

      <div class="row">
          <div class="pils" onclick="inbox()">
            <i class="fas fa-inbox"></i>&nbsp;&nbsp;Inbox
            <spam class="mCount"><?php echo $inbox; ?></spam>
          </div>  
      </div>
      <div class="row">
          <div class="pils" onclick="sent()">
            <i class="fab fa-telegram-plane"></i>&nbsp;&nbsp;&nbsp;Sent
            <spam class="mCount"><?php echo $sent; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="star()">
            <i class="far fa-star"></i>&nbsp;&nbsp;Starred
            <spam class="mCount"><?php echo $star; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="draft()">
            <i class="fas fa-file"></i>&nbsp;&nbsp;&nbsp;Drafts
            <spam class="mCount"><?php echo $draft; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="trash()">
            <i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Trash
            <spam class="mCount"><?php echo $trash; ?></spam>
          </div>
      </div>
    </div>
    <div class="col-sm-10" id="demo">
    </div>
</div>   
</body>
<script src="../repository/js/main.js" type="text/javascript"></script>
</html>
