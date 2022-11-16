<?php

if(isset($_POST['editDetails'])) {
    include_once("conn.php");
    $hiddenInput = $_POST['hiddenInput']; 
    $myname= $_POST['myname'];
    $Age= $_POST['Age'];
    $mother= $_POST['mother'];
    $dad= $_POST['dad'];

    $sql = "UPDATE postDetails SET name='$myname', age='$Age',
     mother='$mother', dad='$dad' WHERE id='$hiddenInput'";

    $result = mysqli_query($con, $sql);
    if($result == 1) {
        echo "<script>alert('Record edited successfully...');</script>";
        echo "<script>location.replace('edit.php?id=$hiddenInput');</script>";
    }else{
      echo "<script>alert('Failed...');</script>";  
      echo "<script>location.replace('edit.php?id=$hiddenInput');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Crud</title>
</head>
<body>

<div>
        <h2>Edit data From Database:</h2>
        <form action="edit.php" method="post">
        <input type="hidden" name="hiddenInput" value= "<?php $id=$_GET['id']; echo $id;?>"> <br><br>
            <input type="text" name="myname" placeholder="Enter name" required> <br><br>
            <input type="text" name="Age"  placeholder="Enter age" required> <br><br>
            <input type="text" name="mother"  placeholder="Enter Mother's name" required> <br><br>
            <input type="text" name="dad"  placeholder="Enter dad's name" required> <br><br>

            <button name="editDetails">Edit DETAILS</button>
        </form>
    </div>
    
</body>
</html>


