<?php

        session_start();
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=event_manage_sys', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = '';
        $email = '';
        $mobile = '';
        $password = '';
        $cpassword = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if ($password === $cpassword)
            {
                $statement = $pdo->prepare("INSERT INTO users (username, email, mobile, password) VALUES (:username, :email, :mobile, :password)");
                $statement->bindValue(':username', $username);                           
                $statement->bindValue(':email', $email);
                $statement->bindValue(':mobile', $mobile);
                $statement->bindValue(':password', $password);
                $statement->execute();
                header('Location: login.php');
                $_SESSION['status'] = "Successfully Signedup, Please Sign-in";
            }
            else
            {
                $_SESSION['status'] = "Password Mismatch";
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Sign-In</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="user signupBx">
                <div class="formBx">
                    <form action="login.php" method="POST" autocomplete="off">
                        <h2>Create an Account</h2>
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email Address">
                        <input type="text" name="mobile" placeholder="Mobile No.">
                        <input type="password" name="password" placeholder="Create Password">
                        <input type="password" name="cpassword" placeholder="Confirm Password">
                        <input type="submit" name="" value="Sign-Up">
                        <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                            echo '<p class="signup"> '.$_SESSION['status'].' </p>';
                            unset($_SESSION['status']);
                        }
                        ?>
                        <p class="signup">Already have an account ? <a href="#" onclick="toggleForm();">Sign-In</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="../webpage/register.jpg"></div>
            </div>
            <div class="user signinBx">
                <div class="imgBx"><img src="../webpage/login.jpg"></div>
                <div class="formBx">
                    <form action="logincheck.php" method="POST" autocomplete="off">
                        <h2>Sign-In</h2>
                        <input type="text" name="lusername" placeholder="Username">
                        <input type="text" name="lmobile" placeholder="Mobile No.">
                        <input type="password" name="lpassword" placeholder="Password">
                        <input type="submit" name="" value="Login">
                        <?php
                        if(isset($_SESSION['stats']) && $_SESSION['stats'] !='')
                        {
                            echo '<p class="signup"> '.$_SESSION['stats'].' </p>';
                            unset($_SESSION['stats']);
                        }
                        ?>
                        <p class="signup">Forgot Password ? <a href="otp.php">Get OTP</a></p>
                        <p class="signup">Dont have an account ? <a href="#" onclick="toggleForm();">Sign-Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function toggleForm() {
            var container = document.querySelector('.container');
            container.classList.toggle('active');
        }
    </script>
</body>
</html>