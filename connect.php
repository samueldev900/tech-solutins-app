<?php 

$servername = "techsolutionsdb2.cnya4ws6ctnq.us-east-2.rds.amazonaws.com";
$username = "samueloliveira";
$password = "rWrzb763Jeg8bSJvZ0xj";
$database = "techsolutionsdb2";

$conn = new mysqli($servername,$username,$password);

if(!$conn){
    echo "Não foi possivel conectar";
}