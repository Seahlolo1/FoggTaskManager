<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConnection
 *
 * @author My Computer
 */


class dbConnection 
{
    // Database global variables:
    public   $link;
    private  $host;
    private  $username;
    private  $password;
    private  $DatebaseName;
    
    function __construct() 
    {
       // Leaving the Constructor empty since php doesn't allow you to overload the constructor.
       // I will force it to overload through methods because it is neat that way, according to me and helping me to reuse code. 
    }
    
    // I will use the Connector(My own method) Instead of the constructor so i can call the constructor without passing it parameters when
    // I need to connect and get data from the database.
    function Connector($host, $username, $password, $DatebaseName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->DatebaseName = $DatebaseName;
    }
    
    function Connect()
    {
        $this->Connector("Localhost", "Ahlolang", 123, "foggtaskdb");
        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->DatebaseName);
        return $this->link; // Every Class that requires a database connection will only get this link only, which will be the state of the database(open/closed)
    }
    
    function CloseConnection()
    {
        mysqli_close($this->link);
    }
    
}
$conn = new dbConnection();
$conn->Connect();
