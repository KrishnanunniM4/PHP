<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="forgot.css">
    <title>Forgot Password</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../webpage/forgot.jpg"></div>
                <div class="formBx">
                    <form action="" method="POST" autocomplete="off">
                        <h2>Forgot Password ?</h2>
                        <input type="text" name="mobile" placeholder="Mobile No.">
                        <input type="submit" name="sendotp" value="Generate OTP">
                        <p class="signup">Back to Login Page ? <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
session_start();
if(isset($_POST['sendotp']) && $_POST['mobile'] != '')
{
    $mobile = $_POST['mobile'];
    $_SESSION['mob'] = $mobile;
    $rand = mt_rand(10000,99999);
    $_SESSION['otp'] = $rand;

    $field = array(
        "sender_id" => "FSTSMS",
        "language" => "english",
        "route" => "qt",
        "numbers" => "$mobile",
        "message" => "42310",
        "variables" => "{#BB#}",
        "variables_values" => "$rand"
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($field),
        CURLOPT_HTTPHEADER => array(
            "authorization: se9uymtRE5Ov4MFixqdKgA0lkwfDIaohHp62C8ZWrcLjYVJnBShFZUCYcWtvDk7JzX5jS2AmTHgyerRs",
            "cache-control: no-cache",
            "accept: */*",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo '<script>alert("OTP Succesfully Sent to the Registered Mobile Number by '.$response.'")</script>';
    }
    header('Location: otpverify.php');
}
elseif(isset($_POST['sendotp']) && $_POST['mobile'] = '')
{
    echo '<script>alert("Please provide Mobile No.")</script>';
}

?>