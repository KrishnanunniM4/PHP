<?php

    session_start();
    $connection = mysqli_connect("localhost", 'root', 'root', 'event_manage_sys');
    $id = $_GET['id'] ?? null;

    $events = "SELECT * FROM events WHERE event_id = '$id' ";
    $events_run = mysqli_query($connection,$events);
    $event = mysqli_fetch_assoc($events_run);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <title>Registration</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="user signupBx">
                <div class="formBx">
                    <form action="" method="POST" autocomplete="off">
                        <h2>Event Registration : <b><?php echo $event['event_name']?></b></h2>
                        <label>Name:</label><input type="text" name="username" value="<?php echo $_SESSION['username'] ?>">
                        <label>Mobile No:</label><input type="text" name="mobile" value="<?php echo $_SESSION['mobile'] ?>">
                        <label>Event ID:</label><input type="text" name="event_id" readonly value="<?php echo $event['event_id'] ?>">
                        <label>Event Location:</label><input type="text" name="event_location" readonly  value="<?php echo $event['event_location'] ?>">
                        <label>Event Start Date:</label><input type="date" name="event_start" readonly  value="<?php echo $event['event_start'] ?>">
                        <label>Event End Date:</label><input type="date" name="event_end" readonly  value="<?php echo $event['event_end'] ?>">
                        <label>Registration Start Date:</label><input type="date" name="reg_start" readonly  value="<?php echo $event['reg_start'] ?>">
                        <label>Registration End Date:</label><input type="date" name="reg_end" readonly  value="<?php echo $event['reg_end'] ?>">
                        <label>Registration Fees:</label><input type="text" name="reg_fees" readonly  value="<?php echo $event['reg_fees'] ?>">
                        <input type="submit" name="" value="Register">
                    </form>
                </div>
                <div class="imgBx"><img src="ems/<?php echo $event['thumbnail_img'] ?>"></div>
            </div>
        </div>
    </section>
</body>
</html>