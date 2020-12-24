<?php

    $con = mysqli_connect('localhost', 'root', 'root', 'event_manage_sys');

    $lusername = '';
    $lpassword = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $lusername = $_POST['lusername'];
        $lpassword = $_POST['lpassword'];

        $query = "SELECT * FROM users WHERE username = '$lusername' AND password = '$lpassword' ";
        $query_run = mysqli_query($con,$query);
        $usertypes = mysqli_fetch_array($query_run);

        if($usertypes['usertype'] == 'admin')
        {
            $_SESSION['username'] = $lusername;
            header('Location: admin/index.php');
        }
        else if($usertypes['usertype'] == 'user')
        {
            $_SESSION['username'] = $lusername;
            header('Location: index.php');
        }
        else
        {
            echo 'invalid credentials';
        }
    }

?>