<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articlewebpage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  header("Location: loginPage.php?err=2");
  die("Connection failed: " . $conn->connect_error);
}

$user_name = mysqli_real_escape_string($conn, $_REQUEST['user_name']);

//pwd encryption

$ciphering = "AES-128-CTR"; 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
$encryption_iv = '1234567891011121'; 
$encryption_key = "userPwd"; 
$user_pwd = openssl_encrypt(mysqli_real_escape_string($conn, $_REQUEST['user_pwd']), $ciphering, 
            $encryption_key, $options, $encryption_iv); 


if(isset($user_name) && isset($user_pwd)){

    //compare login info and database info
    $sql = "SELECT * FROM `user` WHERE `user_name` = '$user_name' AND `user_pwd` = '$user_pwd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]."<br>";

        //set user cookie with user id after successful login
        setcookie('user', $row['user_name'] . '*' . $row['user_id'], time() + 3600, "/");//1 hour expire

        header("Location: index.php");
        die();
      }
    } else {
      header("Location: loginPage.php?err=1");
      die();
    }
}

$conn->close();
?>

</body>
</html>

