<?php
include('config.php');
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql_login = 'INSERT INTO `user`(`name`, `email`, `password`) VALUES ("' . $name . '", "' . $email . '", md5("' . $password . '"))';
    if ($conn->query($sql_login) === true) {
        header('Location: index.php?login=true');
    } else {
        $output = $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- font awesome cdn link  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Story Keeper-Online Book Store</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <h4 id="error"><?php if(isset($output)){ echo $output; } ?></h4>
        <form method="POST" action="signup.php">
            <div class="input-box">
                <input name="name" id="name" type="text" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <input name="email" id="email" type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input name="password" id="password" type="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input name="re-password" id="re-password" type="password" placeholder="Confirm password" required>
            </div>
            <div class="policy">
                <input id="policy" name="policy" type="checkbox">
                <h3>I accept all terms & condition</h3>
            </div>
            <div style="display:none;" class="input-box button">
                <input id="btn_reg" type="Submit" value="Register Now">
            </div>
        </form>
        <div class="input-box button signup">
            <input onclick="signup()" type="Submit" value="Register Now">
        </div>
        <div class="text">
            <h3>Already have an account? <a href="index.php?login=true">Login now</a></h3>
        </div>
    </div>
</body>

<script>
    function signup() {
        var name = document.getElementById("name");
        var email = document.getElementById("email");
        var policy = document.getElementById("policy");
        var password = document.getElementById("password");
        var re_password = document.getElementById("re-password");
        var btn_reg = document.getElementById("btn_reg");
        var error = document.getElementById("error");
        if (name.value == "" && name.value == null) {
            error.innerHTML = "Enter your name";
        } else if (email.value == "" && email.value == null) {
            error.innerHTML = "Enter your email";
        } else if (re_password.value != password.value) {
            error.innerHTML = "Password must be same.";
        } else if (!policy.checked) {
            error.innerHTML = "Need to accept all terms & condition.";
        } else {
            btn_reg.click();
        }
    }
</script>

</html>