<?php
require_once 'dblogin.php';
$conn =  mysqli_connect($hn,$un,$pw,$db);

if(mysqli_connect_errno()) die("Fatal Error");

if(isset($_POST['signup']));
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

//HASHING THE PASSWORD
$hashed = password_hash($pass,PASSWORD_DEFAULT);

add_user($conn,$fname,$lname,$mail,$hashed);

function add_user($conn,$fn,$ln,$ma,$pw){
    $stmt = mysqli_prepare($conn,'INSERT INTO users VALUES(?,?,?,?)');
    mysqli_stmt_bind_param($stmt,'ssss',$fn,$ln,$ma,$pw);
    mysqli_stmt_execute($stmt);
    //$stmt->bind_result($fn,$ln,$ma,$pw);
    mysqli_close($stmt);
}
printf("Success... %s\n", mysqli_get_host_info($conn));
?>