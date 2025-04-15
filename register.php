<?php

$server ="localhost";
$username ="root";
$password ="";
$db = "ift302";

$conn = mysqli_connect( $server, $username, $password,$db);

if(isset($_POST['save'])){
    $spro =$_POST['sprogram'];
    $sname =$_POST['sname'];
    $sreg =$_POST['sreg'];
    $slevel =$_POST['slevel'];

    $query =mysqli_query($con , "INSERT INTO users (studentprogram, studentname, studentRegno,studentLevel) VALUES('$spro', '$sname', '$sreg', '$slevel')");
    if(!$query){
        echo"Error had occur";
    }else{
        echo"Record inserted successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="">
<style>
    .header{
        width: 100%;
        height:20%;
        background-color:black;
        color:white;
        align-content:center;
        padding-left: 100px;
        padding-top: 30px;
        padding-bottom: 30px;
    }
    </style>
    </head>
<body>
<h4 class="header">REGISTRATION PAGE</H4>
<div class="container">
<div class="row">
<div class="col-log-6">
    <form action="#" class="group" method="pot">
        <label for="">student Program</label><input type="text" required name="sprogram"><br></br>
        <label for="">student NAME</label><input type="text" required name="sname"><br></br>
        <label for="">student REGNO</label><input type="text" required name="sreg"><br></br>
        <label for="">student LEVEL</label><input type="text" required name="slevel"><br></br>
        
        <input type="submit" class="btn-btn-primary value="save" name="save">
    </form>
</div>
</div>
</div>
</div>


</body>
</html>