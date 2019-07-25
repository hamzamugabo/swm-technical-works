<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "", "swm");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 
// Escape user inputs for security
$comment = mysqli_real_escape_string($link, $_POST['comment']);
$name = mysqli_real_escape_string($link, $_POST['name']);


// attempt insert query execution
$sql = "INSERT INTO comments (name,comment ) VALUES ( '$name','$comment ')";
if(mysqli_query($link, $sql)){
	 header("location:blog-details.php? data entered");
     include_once("blog-details.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>