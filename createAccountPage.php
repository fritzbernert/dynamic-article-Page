<html>
<body>

<?php

if(isset($_GET['err'])) {
    $error_id = $_GET['err'];
    if($error_id == 1){
        echo "Name already taken!";
    }else if($error_id == 2){
        echo "No connection to database!";
    }
}
?>

<form action="createAccount.php" method="post">

    <p>
        <label for="user_name">Username:</label>
        <input type="text" name="user_name" id="user_name">
    </p>
    <p>
        <label for="user_pwd">Password:</label>
        <input type="password" name="user_pwd" id="user_pwd">
    </p>

    <input type="submit" value="Submit">
</form>

</body>
</html>