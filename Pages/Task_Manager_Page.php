<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<?php
   session_start();
   require_once '../Data_Source/dbConnection.php';
   require_once '../Data_Source/dbTask_Manager.php';
?>
<html ng-app="TaskGenerator">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../fonts/glyphicons-halflings-regular.svg"/>
        <link href="../css/Custom_css.css" rel="stylesheet" type="text/css"/>
        <link href="../css/animate.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <form method="POST">
          <!-- The Navigation Bar goes within the Nav tag-->
        <nav class="navbar navbar-Custom navbar-fixed-top">
            <header class="container">
                <a href="#"><img id="logo" src="../img/fogg-logo.png" alt="fogg">   <strong id="logo_Title">TASK MANAGER</strong></a>
                <section class="navbar-header pull-right" id="navbar-options">
                    <br/>
                    <button name="btn_Logout" class="btn btn-primary">Log out </button>
                    <?php
                    if (isset($_POST['btn_Logout'])) 
                    {
                        header("Location:Index_Home.php");    
                    }
                    ?>
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
       <br/>
      
       <!-- Task Container-->
       <section id="Task_id" class="container" ng-controller="GenTask">
           
           <section class="row">
               <aside class="col-lg-6">
                   <button name="btnCreateTask" class="form-control btn-info glyphicon glyphicon-plus-sign" ng-click="CreateTask()"> New Task </button>    
               </aside>
               
               <aside class="col-lg-6">
                   <button class="form-control btn-danger glyphicon glyphicon-minus-sign" ng-click="RemoveTask()"> Clear Added Task </button>    
               </aside>
               <br/>
               <br/>
               <br/>
               <section class="row">
                   <aside class="col-lg-3 animated bounceIn">
                    <label>TASK - Debug Code</label>
                    <ol class='list-unstyled list-group-item'>
                      <li><input class='form-control' type='text' name='txtTaskName' value='Debug' /></li><br/>
                      <li><input class='form-control' type='text' name='txtUserID' value='12504' /></li><br/>
                      <li><textarea class='form-control 'type='text' name='txtDescription' rows='4' cols='20'>Debug the Login Code</textarea></li><br/>
                      <li>Due Date <input class='form-control' type='date' name='dtDueDate' value='2017-03-08' /></li><br/>
                      <li><h3 class='lead text-center alert-info'>Status</h3></li>
                      <li>Inactive <input class='form-control' type='checkbox' name='Inactive' value='ON'  /></li><br/>
                      <li>Active <input class='form-control' type='checkbox' name='Active' value='ON' checked="true" /></li><br/>
                      <li>In Progress <input class='form-control' type='checkbox' name='In_Progress' value='ON' /></li><br/>
                      <li>Complete <input class='form-control' type='checkbox' name='Complete' value='ON' /></li><br/>
                      <li><button name='btnSubmitTask' class='form-control btn btn-success' type='submit'>Edit Task</button></li>
                    </ol>
                   </aside>
                   
                   <aside class="col-lg-3 animated flipInX">
                       <label>TASK - Web page Gallery</label>
                    <ol class='list-unstyled list-group-item'>
                      <li><input class='form-control' placeholder='Task name' type='text' name='txtTaskName' value='Web page Gallery' /></li><br/>
                      <li><input class='form-control' placeholder='User ID' type='text' name='txtUserID' value='12503' /></li><br/>
                      <li><textarea class='form-control' placeholder='Description' type='text' name='txtDescription' rows='4' cols='20'>Fix the Gallery Slider</textarea></li><br/>
                      <li>Due Date <input class='form-control' type='date' name='dtDueDate' value='2017-04-04' /></li><br/>
                      <li><h3 class='lead text-center alert-info'>Status</h3></li>
                      <li>Inactive <input class='form-control' type='checkbox' name='Inactive' value='ON' /></li><br/>
                      <li>Active <input class='form-control' type='checkbox' name='Active' value='ON' checked="true" /></li><br/>
                      <li>In Progress <input class='form-control' type='checkbox' name='In_Progress' value='ON' checked="true" /></li><br/>
                      <li>Complete <input class='form-control' type='checkbox' name='Complete' value='ON' /></li><br/>
                      <li><button name='btnSubmitTask' class='form-control btn btn-success' type='submit'>Edit Task</button></li>
                    </ol>
                   </aside>
                   
                   <aside class="col-lg-3 animated wobble">
                       <label>TASK - Software Testing</label>
                    <ol class='list-unstyled list-group-item'>
                      <li><input class='form-control' placeholder='Task name' type='text' name='txtTaskName' value='Software Testing' /></li><br/>
                      <li><input class='form-control' placeholder='User ID' type='text' name='txtUserID' value='12509' /></li><br/>
                      <li><textarea class='form-control' placeholder='Description' type='text' name='txtDescription' rows='4' cols='20'>Test the Software before deploying it</textarea></li><br/>
                      <li>Due Date <input class='form-control' type='date' name='dtDueDate' value='2017-09-02' /></li><br/>
                      <li><h3 class='lead text-center alert-info'>Status</h3></li>
                      <li>Inactive <input class='form-control' type='checkbox' name='Inactive' value='ON' checked="true" /></li><br/>
                      <li>Active <input class='form-control' type='checkbox' name='Active' value='ON' /></li><br/>
                      <li>In Progress <input class='form-control' type='checkbox' name='In_Progress' value='ON' /></li><br/>
                      <li>Complete <input class='form-control' type='checkbox' name='Complete' value='ON' /></li><br/>
                      <li><button name='btnSubmitTask' class='form-control btn btn-success' type='submit'>Edit Task</button></li>
                    </ol>
                   </aside>
                   
                   <aside class="col-lg-3 animated fadeIn">
                       <label>TASK - Hardware Configuration</label>
                    <ol class='list-unstyled list-group-item'>
                      <li><input class='form-control' placeholder='Task name' type='text' name='txtTaskName' value='Hardware Configuration' /></li><br/>
                      <li><input class='form-control' placeholder='User ID' type='text' name='txtUserID' value='111111' /></li><br/>
                      <li><textarea class='form-control' placeholder='Description' type='text' name='txtDescription' rows='4' cols='20'>Configure the Arduino uno Board</textarea></li><br/>
                      <li>Due Date <input class='form-control' type='date' name='dtDueDate' value='2017-05-23' /></li><br/>
                      <li><h3 class='lead text-center alert-info'>Status</h3></li>
                      <li>Inactive <input class='form-control' type='checkbox' name='Inactive' value='ON' /></li><br/>
                      <li>Active <input class='form-control' type='checkbox' name='Active' value='ON' checked="true" /></li><br/>
                      <li>In Progress <input class='form-control' type='checkbox' name='In_Progress' checked="true" value='ON' /></li><br/>
                      <li>Complete <input class='form-control' type='checkbox' name='Complete' value='ON' checked="true" /></li><br/>
                      <li><button name='btnSubmitTask' class='form-control btn btn-success' type='submit'>Edit Task</button></li>
                    </ol>
                   </aside>                 
               </section>
               
           </section>
           
           <!-- Load Data Tasks from the Database-->
            <section class="row" id="Task_Container">
               <?php
                   //$UserID = $_SESSION['UserID'];
                   //$ArrayData = array();
                   //$ArrayData = $TaskManagement->GetSpecificUserTask($UserID);
                   //var_dump($ArrayData);
               ?>
            </section>     
        <?php
          if (isset($_POST['btnSubmitTask'])) 
           {
              $TaskName             = $_POST['txtTaskName'];
              $Description          = $_POST['txtDescription'];
              $DueDate              = $_POST['dtDueDate'];
              $StatusInActive       = $_POST['Inactive'];
              $StatusActive         = $_POST['Active'];
              $StatusInProgress     = $_POST['In_Progress'];
              $Complete             = $_POST['Complete'];

              $Status = 0;
              
              if ($StatusActive==true) 
              {
                  $Status = 1;
              }
              else if($StatusInProgress==true) 
              {
                  $Status = 2;
              }
              else if ($Complete==true) 
              {
                  $Status = 3;
              }
              //var_dump($Complete+'  '+$StatusInActive+' '+$StatusActive+' '+$StatusInProgress);
              $TaskManagement->NewTask($TaskName,$Description,$DueDate,date("Y-m-d h:i:sa"),$Status);
           }
       ?>
                       
           <!-- Of Loading Ends here-->
       </section>
       <!--End of Task Container-->
     </form>

       
     <script src="../js/jquery.js" type="text/javascript"></script>
     <script src="../js/bootstrap_1.js" type="text/javascript"></script>
     <script src="../js/angular.js" type="text/javascript"></script>
     <script src="../js/Custom_-Angular.js" type="text/javascript"></script>
    </body>
</html>
