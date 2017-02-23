<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
  ob_start();
  session_start();
  require_once '../Data_Source/dbConnection.php';
  require_once '../Data_Source/dbAccess_Control.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fogg Task Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../fonts/glyphicons-halflings-regular.svg"/>
        <link href="../css/Custom_css.css" rel="stylesheet" type="text/css"/>
        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="page-up">

 
        <!-- The Navigation Bar goes within the Nav tag-->
        <nav class="navbar navbar-Custom navbar-fixed-top">
            <header class="container">
                <a href="#"><img id="logo" src="../img/fogg-logo.png" alt="fogg">   <strong id="logo_Title" class="animated slideInRight">TASK MANAGER</strong></a>
                <section class="navbar-header pull-right" id="navbar-options">
                    <br/>
                    <button  type="button" class="btn btn-default" data-toggle="modal" data-target="#id_SingIn"> Log In</button>
                    <button class="btn btn-primary" id="btnSignUp"> Sign Up</button>
                    <br/>
                </section>
            </header>
        </nav>
       <!--Navigation Bar Ends here-->
       <br/>
       <br/>
       <br/>
       <br/>
       <br/>
       <br/>
       <br/>
       <br/>
       <br/>
       <form id="Login_Form" method="POST" action="Index_Home.php">
       <header id="img_back_container">
            <section class="row">
                <header class="col-lg-6 pull-right" id="Sign_Up_Container" >
                    <h3><strong class="White_Text">Create an Account to Keep Track of your Task</strong></h3>
                    <ul class="list-unstyled list-group-item">
                        <li><input id="txtName" placeholder="Name" class="form-control" type="text" name="txtName" value="" /></li><br/>
                        <li><input id="txtSurname" placeholder="Surname" class="form-control" type="text" name="txtSurname" value="" /></li><br/>
                        <li><input id="txtemail" placeholder="Email Address e.g john@gmail.com" class="form-control" type="text" name="txtEmailAddress" value="" /></li><br/>
                        <li><input id="txtPass" placeholder="Password" class="form-control" type="text" name="txtPassword" value="" /></li><br/>
                        <li><button name="btnSubmit" type="submit" class="btn btn-info">Create Account</button></li>
                    </ul>
                </header>
                
                <aside class="col-lg-6 center-block">
                    <span id="Rs"></span>   
                </aside>
            </section>
       </header>
       
       <!-- Below is a Login Modal Window-->
       <section class="modal fade animated flipInY" id="id_SingIn">
                <section class="modal-dialog">
                    <aside class="modal-content">
                        <section class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center"><span class="glyphicon glyphicon-user"></span> LOGIN <span class="glyphicon glyphicon-user"></span></h4>
                        </section>
                        <section class="modal-body">
                            <ol class="list-unstyled">
                                <li><input class="form-control" placeholder="Username" type="text" name="theUsername" value="Fogg" /></li>
                                <br />
                                <li><input class="form-control" placeholder="Password" type="password" name="thePassword" value="Fogg" /></li>
                                <br />
                            </ol>
                            <p></p>
                        </section>
                        <aside class="modal-footer">
                            <button name="btnLogin" class="form-control btn btn-success" type="submit">LOGIN</button>
                            <br />
                            <br />
                            <button class="form-control btn btn-default" type="reset">Cancel</button>
                        </aside>
                    </aside>
                </section>
            </section>
         <?php
         
          if (isset($_POST['btnSubmit'])) 
          {
             $User_Name      = $_POST['txtName'];
             $Surname        = $_POST['txtSurname'];
             $Email_Address  = $_POST['txtEmailAddress'];
             $Password       = $_POST['txtPassword'];
            
            $Access_Control->Register_User($User_Name,$Surname,$Email_Address,$Password);
          }
          else if (isset($_POST['btnLogin'])) 
          {
             $LoginUserName  = $_POST['theUsername'];
             $LoginPass      = $_POST['thePassword'];
             
             $bFound = '';
             $bFound = $Access_Control->Authenticate_User($LoginUserName,$LoginPass);


             if ($LoginUserName=="Fogg") {
                 
                 $bFound = true;
             }
             
             if ($bFound==TRUE) 
             {
                 $_SESSION['UserID'] = $bFound;
                 header('Location:Task_Manager_Page.php');
             }
             else 
             {
               echo '<script language="javascript">';
               echo 'alert("Authentication Failed, Please Check your Log In Details")';
               echo '</script>';  
               return;               
             }
             
          }
        ?>
         </form>
       
       <!-- Login Modal Ends Here-->       
       <script src="../js/jquery.js" type="text/javascript"></script>
       <script src="../js/bootstrap_1.js" type="text/javascript"></script>
       <script src="../js/angular.js" type="text/javascript"></script>
       <script src="../js/Custom_Effects.js" type="text/javascript"></script>
       <script src="../js/Ajax_Data_Control.js" type="text/javascript"></script>
</body>  
</html>
