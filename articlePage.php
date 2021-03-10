<html>
<body>
<?php

echo "<div><a href='index.php'>Home</a><div><br>";

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

$article_id = $_GET['id'];
if(isset($article_id)) {

  $sql = "SELECT article_id, article_title, article_text, user_name, article_date FROM article LEFT JOIN user ON article.author_id = user.user_id WHERE article_id=$article_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
      echo "<div>"; 
          echo "<h3>" . $row['article_title'] . "</h3>";
          echo "<h6>by " . $row['user_name'] . " - " . $row['article_date'] . "</h6><br>";
          echo "<p>" . $row['article_text'] . "</p>";
      echo "</div><br>";
    }
  }
}else{
  echo 'error';
}

$conn->close();

?>


</body>
</html>