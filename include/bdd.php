<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli -> connect_errno){
    echo "failed to connect to my MySQL" .$mysqli -> connect_error; 
    exit();
}
?>