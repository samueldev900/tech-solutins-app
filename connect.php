<?php 

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername,$username,$password);

if($conn->connect_error){

    die("A conexão falhou: " . $conn->connect_error);
}
