<?php
function connection(){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'schools_library';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if(!$conn){
        die("Connection Error: " . mysqli_connect_error());
    }

    return $conn;
}