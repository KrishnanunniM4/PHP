<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', 'root', 'event_manage_sys');

    $lusername = '';
    $lpassword = '';
    $lmobile = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $lusername = $_POST['lusername'];
        $lpassword = $_POST['lpassword'];
        $lmobile = $_POST['lmobile'];

        $query = "SELECT * FROM users WHERE username = '$lusername' AND password = '$lpassword' ";
        $query_run = mysqli_query($con,$query);
        $usertypes = mysqli_fetch_array($query_run);

        if($usertypes['usertype'] == 'admin')
        {
            if(isset($_SESSION['mob']) && $_SESSION['mob'] !='')
            {
                $_SESSION['mobile'] = $_SESSION['mob'];
            }
            else
            {
                $_SESSION['mobile'] = $lmobile;
            }
            $_SESSION['username'] = $lusername;
            header('Location: index.php');
        }
        else if($usertypes['usertype'] == 'user')
        {
            if(isset($_SESSION['mob']) && $_SESSION['mob'] !='')
            {
                $_SESSION['mobile'] = $_SESSION['mob'];
            }
            else
            {
                $_SESSION['mobile'] = $lmobile;
            }
            $_SESSION['username'] = $lusername;
            header('Location: ../index.php');
        }
        else
        {
            echo 'invalid credentials';
        }
    }

    if(isset($_POST['logout_btn']))
    {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['mobile']);
        header('Location: login.php');
    }

    if(isset($_POST['home_logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['mobile']);
        header('Location: ../index.php.');
    }
?>