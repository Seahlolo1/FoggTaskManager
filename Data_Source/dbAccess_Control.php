<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbAccess_Control
 *
 * @author My Computer
 */
//require_once './dbConnection.php';
class dbAccess_Control 
{
    //put your code here
    public  $Connect;
    public  $Link;
    
    
    // Method to Validate User at Login if the user is registered to gain access to the System
    function Authenticate_User($Username,$Password) 
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect();
        
        $EncryptedPassword = md5($Password);
        
        $query = "SELECT * FROM user_tbl WHERE `User_Password`='$EncryptedPassword' AND `User_Name`='$Username'";
        
        $Results = mysqli_query($this->Link, $query);
        
        $User_ID = mysqli_fetch_array($Results,1); 
        $User_IDD = '';
        while ($row = mysqli_fetch_array($Results,MYSQLI_ASSOC)) 
        {
            $User_IDD = $row['User_ID'];
        }
        
        $bFound = '';
        
        if (!empty($User_ID)) // Should the Query come the results this will mean the User was found.
        {
           $bFound = $User_IDD;    
        }
        else 
        {
              return 'DENIED';
              
        }
        $this->Connect->CloseConnection();
        return $bFound;
    }
    
    // Method to Register User to the System
    function Register_User($User_Name,$Surname,$Email,$User_Password) 
    {
        $this->Connect = new dbConnection();
        $this->Link = $this->Connect->Connect();
        
        $EncryptPassword = md5($User_Password);
        
        $User_ID = date("Y-m-d h:i:sa")+rand(1000, 10000);                                                                   
        $query = "INSERT INTO user_tbl(`User_ID`,`User_Name`,`Surname`,`Email`,`User_Password`) VALUES('$User_ID','$User_Name','$Surname','$Email','$EncryptPassword')";
        
        mysqli_query($this->Link, $query);
        $this->Connect->CloseConnection();
    }
}

$Access_Control = new dbAccess_Control();
//$Access_Control->Authenticate_User('Ahlo', '12504');
        
        

