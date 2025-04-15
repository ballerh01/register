<?php

$server = "localhost";
$database = "ift302";
$username = "root";
$password = "";

//Establish a connection
$conn = mysqli_connect($server,$username, $password, $database);

//check connection
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}

if(isset($_POST['save'])){
    $sprogram  = $_POST['sprogram'];
    $sname = $_POST['sname'];
    $sregno = $_POST['sregno'];
    $slevel= $_POST['slevel'];

    //insert Query
    $query = mysqli_query($con, "INSERT INTO users(sprogram, sname, sregno, slevel) VALUES('$spro', '$sname', '$sreg', '$slevel')");

    if(!$query){
        echo "Error had occur";
    }else{
        echo"Record inserted successfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset= "UTF-8">
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
            padding-top:30px;
            padding-bottom: 30px;
        }

        table{
            width: 100%;
            border-collapse:collapse;
            border:2px solid black; /*makes the borders visible*/
        }  
        
        th, td{
            border:2px solid black;
            padding:10px;
            text-align:center;

        }

        .btn-update{
            background-color: #007bff;
            color:white;
        }

        .btn-delete{
            background-color: #dc3545;
            color:white;
        }
        </style>
    </head>
    <body>
        <h4 class="header">PRESENTATION PAGE</h4>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="strip">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Student Program</th>
                            <th>Student Name</th>
                            <th>Student Registration</th>
                            <th>Studen Level</th>
                            <th>Update</th>
                            <th>Delete</th>
                            </tr>
                        </thead>
    <tbody>
                            
                       

        <?php

        $result = mysqli_query($conn, "SELECT * FROM users");

       
        while($row = mysqli_fetch_assoc($result)){
            ?> 
            <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['sprogram']; ?> </td>
            <td><?php echo $row['sname']; ?> </td>
            <td><?php echo $row['sregno']; ?> </td>
            <td><?php echo $row['slevel']; ?> </td>
            <td> <a class="btn btn-update" href = "update.php?id=<?php echo $row['id']; ?>">Update</a> </td>
            <td> <a class="btn btn-delete" href = "delete.php?id=<?php echo $row['id']; ?>">Delete</a> </td>
            </tr>
        
            
            <?php
        }
        ?> 

    </tbody>
</table>                 
                </div>
            </div>
        </div>
<script>
    function confirmDelete(){
        let confirmation = confirm("Are you sure you want to delete this record? This action is irreversible.");

        if(confirmation){
            //if user confirms, proceed
            window.location.href = "delete.php?id=" + id;
        }else{
            alert("Deletion canceled. The record remains.");
        }
    }
<td><button class="btn btn-delete" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button></td>
</script>

    </body>
</html>


    

