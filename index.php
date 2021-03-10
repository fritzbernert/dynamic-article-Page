<?php
  session_start();
?>

<html>
<body>
<?php



if(!isset($_COOKIE['user'])) {
  echo "<div>
    <a href='loginPage.php'>Log In</a><br>
    <a href='createAccountPage.php'>Create Account</a><br>
  <div><br>";
}else{
  $username = explode("*", $_COOKIE['user'])[0];
  $userId = explode("*", $_COOKIE['user'])[1];

  echo "<div>
    <p>Logged in as ". $username ."
    <a href='logout.php'>Logout</a>
    <a href='createArticle.php'>Create Article</a>
  <div><br>";
}

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

$sql = "SELECT article_id, article_title, user_name, article_date FROM article LEFT JOIN user ON article.author_id = user.user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { 
    echo "<a href='articlePage.php?id=" . $row['article_id'] . "'><div>"; 
        echo "<h3>" . $row['article_title'] . "</h3>";
        echo "<h6>by " . $row['user_name'] . " - " . $row['article_date'] . "</h6>";
    echo "</div></a><br>";
  }
}
$conn->close();

?>


</body>
</html>