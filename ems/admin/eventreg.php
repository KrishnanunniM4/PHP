<?php
    session_start();
    if(!$_SESSION['username'])
    {
        header('Location: login.php');
    }
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=event_manage_sys', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $search = $_GET['search'] ?? '';
    if ($search)
    {
        $statement = $pdo->prepare('SELECT * FROM registrations WHERE event_id LIKE :search ORDER BY event_id ASC');
        $statement->bindValue(":search", "%$search%");
    }
    else
    {
        $statement = $pdo->prepare('SELECT * FROM registrations ORDER BY reg_id DESC');
    }
    $statement->execute();
    $regs = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Manage Registrations</title>
  </head>
  <body>
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back To Dashboard</a>
    </p>
    <h1>Event Registrations</h1>
    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search for Event ID" value="<?php echo $search ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Registration ID</th>
            <th scope="col">Event ID</th>
            <th scope="col">Username</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Registered On</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($regs as $i => $reg) : ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $reg['reg_id'] ?></td>
                    <td><?php echo $reg['event_id'] ?></td>
                    <td><?php echo $reg['username'] ?></td>
                    <td><?php echo $reg['mobile'] ?></td>
                    <td><?php echo $reg['registered_on'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </body>
</html>