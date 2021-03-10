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
    $sql = "SELECT * FROM `user` WHERE `user_name` = '$user_name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            header("Location: createAccountPage.php?err=1");
            die();
        }
    } else {
        $sql = "INSERT INTO user (user_name, user_pwd)
            VALUES ('$user_name', '$user_pwd')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: loginPage.php");
        die();
        } else {
        
        //header("Location: createArticle.php");
        echo "Error: " . $sql . "<br>" . $conn->error;

        }

    }
}
$conn->close();
?>

</body>
</html>

