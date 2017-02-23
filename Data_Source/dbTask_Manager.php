<script>
    
</script>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbTask_Manager
 *
 * @author My Computer
 */
class dbTask_Manager 
{
    //put your code here
    public  $Connect;
    public  $Link;
    
    // Gets all the Tasks
    function GetAllTasks()
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect(); // Get the Link from the DbConnection class;
        
        // Query to retrive all Task from Database:
        $query = "SELECT * FROM tbl_task";
        
        $results = mysqli_query($this->Link, $query);
        
        $ArrayTask = array();
        
        while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)) 
        {
            $Task_ID = $row['Task_ID'];
            $Task_Name = $row['Task_Name'];
            $Task_Description = $row['Task_Description'];
            $DueDate = $row['DueDate'];
            $DateCreated = $row['DateCreated'];
            $Status = $row['Status'];
        }
        $this->Connect->CloseConnection();
        return $ArrayTask;
    }
    
    // Gets a Users Tasks
    function GetSpecificUserTask($User_ID)
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect(); // Get the Link from the DbConnection class;
        
        // Query to retrive all Task from Database:
        $query = "SELECT * FROM tbl_task WHERE Task_ID IN(SELECT Task_ID FROM tbl_user_task as TU,user_tbl as UT WHERE TU.User_ID=UT.User_ID AND UT.User_ID='$User_ID')";
        
        $results = mysqli_query($this->Link, $query);
        
        $ArrayTask = array();
        
        while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)) 
        {
            $ArrayTask[0] = $row['Task_ID'];
            $ArrayTask[1] = $row['Task_Name'];
            $ArrayTask[2] = $row['Task_Description'];
            $ArrayTask[3] = $row['DueDate'];
            $ArrayTask[4] = $row['DateCreated'];
            $ArrayTask[5] = $row['Status'];
        }
        $this->Connect->CloseConnection();
        return $ArrayTask;
    }
    
    // Creates a New Task
    function NewTask($Task_Name,$Task_Description,$DueDate,$DateCreated,$Status)
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect(); // Get the Link from the DbConnection class;
        
        $Task_ID = date("Y-m-d h:i:sa")+rand(1000, 10000); // Creats a Task_ID
        
        $query = "INSERT INTO tbl_task(`Task_ID`,`Task_Name`,`Task_Description`,`DueDate`,`DateCreated`,`Status`) VALUES('$Task_ID','$Task_Name','$Task_Description','$DueDate','$DateCreated','$Status')";
        
        mysqli_query($link, $query);
        $this->Connect->CloseConnection();
    }
    
    // This Method Updates a Task
    function UpdateTask($TaskID,$Task_Name,$Task_Description,$DueDate,$DateCreated,$Status)
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect();
        
        $query = "UPDATE tbl_task set `Task_Name`='$Task_Name',`Task_Description`='$Task_Description',`DueDate=`'$DueDate',`DateCreated`='$DateCreated',`Status`='$Status' WHERE `Task_ID`='$TaskID'";
        mysqli_query($link, $query);
        $this->Connect->CloseConnection();
    }
    
    // This Method Removes a Task when called
    function RemoveTask($Task_ID)
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect();
        $query = "Delete * FROM tbl_task WHERE `Task_ID`='$Task_ID'";
        mysqli_query($link, $query);
        $this->Connect->CloseConnection();
    }
}

$TaskManagement = new dbTask_Manager();
