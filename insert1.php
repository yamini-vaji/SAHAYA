<?php
$username = $_POST['uname'];
$password = $_POST['psw'];
$gender = $_POST['gender'];
$tel = $_POST['tel'];
$state = $_POST['stateslist'];
$reg = $_POST['reg'];
$email = $_POST['email'];
if (!empty($reg) || !empty($password) || !empty($gender) || !empty($email) || !empty($tel) || !empty($state)) {
 $host = "localhost";
    $dbUsername = "yamini";
    $dbPassword = "kerala32";
    $dbname = "user";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
     $stmt=$conn->prepare("INSERT Into user_reg (reg, uname, psw, tel, email, gender, state) values(?,?,?,?,?,?,?)");
     
      $stmt->bind_param("sssisss", $reg, $username, $password, $tel, $email, $gender, $state);
      $stmt->execute();
      echo "New record inserted sucessfully. ";
     $stmt->close();
     $conn->close();
     echo "Go back to ";
     ?>
     <!DOCTYPE html>
     <html>
     <head>
       <title>redirect</title>
     </head>
     <body>
     <a href="home1.html">home page</a>
     </body>
     </html>
    <?php
} 
}
else {
 echo "All field are required";
 die();
}
?>