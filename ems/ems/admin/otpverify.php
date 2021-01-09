<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="forgot.css">
    <title>OTP Verification</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../webpage/forgot.jpg"></div>
                <div class="formBx">
                    <form action="" method="POST" autocomplete="off">
                        <h2>OTP Verification</h2>
                        <input type="text" name="otp" placeholder="Enter OTP">
                        <input type="submit" name="verifyotp" value="Verify OTP">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php

    session_start();
    if(isset($_POST['verifyotp']))
    {
        if($_POST['otp'] = $_SESSION['otp'])
        {
            $_SESSION['mobile'] = $_SESSION['mob'];
            header('Location: ../index.php');
        }
        else
        {
            echo "OTP not verified";
        }
    }

?>