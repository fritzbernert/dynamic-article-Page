<?php
    setcookie('user', '', time() - 10000, "/");
?>

<html>
<body>

<?php
    header("Location: index.php");
    die();
?>

</body>
</html>

