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
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_COOKIE['user'])) {
  $username = explode("*", $_COOKIE['user'])[0];
  $userId = explode("*", $_COOKIE['user'])[1];
}

$author_id = mysqli_real_escape_string($conn, $userId);
$article_title = mysqli_real_escape_string($conn, $_REQUEST['article_title']);
$article_text = mysqli_real_escape_string($conn, $_REQUEST['article_text']);
$date = mysqli_real_escape_string($conn, date('d/m/Y H:i:s', time()));

$sql = "INSERT INTO article (author_id, article_title, article_text, article_date)
    VALUES ('$author_id', '$article_title', '$article_text', '$article_date')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: index.php");
  die();
} else {
  
  //header("Location: createArticle.php");
  echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?>


</body>
</html>