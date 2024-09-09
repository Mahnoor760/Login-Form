<?php
$servername="localhost";
$username="root";
$password="";
$db="RGform";
$connection=mysqli_connect($servername,$username,$password,$db);

if(!$connection){
    die("connection failed" .mysqli_connect_error());
}

$sqldb = "create database if not exists RGform";

$res = mysqli_query($connection, $sqldb);
if ($res) {
   //echo "db is created";
}

$sqltbl = "create table if not exists info(
    Id int primary key not null auto_increment,
    FirstName varchar(255),
    LastName varchar(255),
    Gender varchar(255),
    Email varchar(255),
    Password varchar(255),
    Phone varchar(255)
    )";
    
    $res = mysqli_query($connection, $sqltbl);
    
    if ($res) {
        // echo "tbl is created";
    }



?>