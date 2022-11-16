<?php
 include_once("conn.php");
if(isset($_POST['postDetails'])){

   $myname= $_POST['myname'];
   $Age= $_POST['Age'];
   $mother= $_POST['mother'];
   $dad= $_POST['dad'];

  $sql = "INSERT INTO postDetails(name, age, mother, dad) VALUE(' $myname','$Age','$mother','$dad')";
  $result = mysqli_query($con, $sql);
  if($result = 1) {
   echo "<script>alert('Record Added successfully...');</script>";
  }else{
    echo "<script>alert('Failed...');</script>";  
  }
}


if(isset($_POST['delete'])) {
  $hiddenInput = $_POST['hiddenInput'];
  
  $sql = "DELETE FROM postDetails WHERE id=$hiddenInput";
  $result = mysqli_query($con, $sql);
  if($result=1){
    echo "<script>alert('Deleteated successfully...');</script>";
}else{
  echo "<script>alert('Failed to Delete...');</script>";  
}
  

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APPLICATION</title>
</head>
<body>
    <!-- Form data to db for create -->

    <div>
        <h2>Post data to Database:</h2>
        <form action="index.php" method="post">
            <input type="text" name="myname" placeholder="Enter name" required> <br><br>
            <input type="text" name="Age"  placeholder="Enter age" required> <br><br>
            <input type="text" name="mother"  placeholder="Enter Mother's name" required> <br><br>
            <input type="text" name="dad"  placeholder="Enter dad's name" required> <br><br>

            <button name="postDetails">POST DETAILS</button>
        </form>
    </div>

    <!-- Fetch the data from database -->

    <div>
        <h3>The data from the database</h3>

        <!-- Display Data from database -->
        <?php
    include_once("conn.php");
    
    $sql = "SELECT * FROM postDetails";
    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);
    if($queryResult){
       while($row =mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $age = $row['age'];
        $Mothername = $row['mother'];
        $Dadname = $row['dad'];
        $id = $row['id'];

        echo "

        <p>Name: $name</p>
        <p>Age: $age</p>
        <p>Mother's Name: $Mothername</p>
        <p>Dad's Name: $Dadname</p>

        <a href = edit.php?id=$id> <button style='color: green;'>Edit</button></a>

        <form action = 'index.php' method='post'>
        <input type='hidden' name='hiddenInput' value=$id>
        <button name='delete' style='color: red;'>Delete</button>
        </form>
        ";

       }
    }
        
        
        ?>
    </div>
    <!-- Edit and Delete -->
</body>
</html>