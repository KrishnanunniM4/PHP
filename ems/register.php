<?php

    session_start();
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=event_manage_sys', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['id'] ?? null;

    $statement = $pdo->prepare('SELECT * FROM events WHERE event_id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $event = $statement->fetch(PDO::FETCH_ASSOC);

    $event_id = '';
    $username = '';
    $mobile = '';
    $event_name = '';
    $event_location = '';
    $event_start = '';
    $event_end = '';
    $reg_start = '';
    $reg_end = '';
    $reg_fees = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $event_id = $_POST['event_id'];
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $event_name = $_POST['event_name'];
        $event_location = $_POST['event_location'];
        $event_start = $_POST['event_start'];
        $event_end = $_POST['event_end'];
        $reg_start = $_POST['reg_start'];
        $reg_end = $_POST['reg_end'];
        $reg_fees = $_POST['reg_fees'];

        $statement = $pdo->prepare("INSERT INTO registrations (event_id, username, mobile, event_name, event_location, event_start, event_end, reg_start, reg_end, reg_fees)
        VALUES (:event_id, :username, :mobile, :event_name, :event_location, :event_start, :event_end, :reg_start, :reg_end, :reg_fees)");
        $statement->bindValue(':event_id', $event_id);                           
        $statement->bindValue(':username', $username);
        $statement->bindValue(':mobile', $mobile);
        $statement->bindValue(':event_name', $event_name);
        $statement->bindValue(':event_location', $event_location);
        $statement->bindValue(':event_start', $event_start);
        $statement->bindValue(':event_end', $event_end);
        $statement->bindValue(':reg_start', $reg_start);
        $statement->bindValue(':reg_end', $reg_end);
        $statement->bindValue(':reg_fees', $reg_fees);
        $statement->execute();
        header('Location: index.php');
    }
    
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
                    <form action="register.php" method="POST" autocomplete="off">
                        <h2>Event Registration : <?php echo $event['event_name'] ?></h2>
                        <label>Name:</label><input type="text" name="username" value="<?php echo $_SESSION['username'] ?>">
                        <label>Mobile No:</label><input type="text" name="mobile" value="<?php echo $_SESSION['mobile'] ?>">
                        <label>Event Name:</label><input type="text" name="event_name" readonly value="<?php echo $event['event_name'] ?>">
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