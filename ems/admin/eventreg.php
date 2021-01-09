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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
    <title>Manage Registrations</title>
  </head>
  <body>
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back To Dashboard</a>
    </p>
    <h1>Event Registrations</h1>
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
    <script>
        $(document).ready( function () {
        $('.table').DataTable({
            ordering: false,
            lengthMenu: [[10, 15, 20, -1], [10, 15, 20, 'All']]
        });
        } );
    </script>
  </body>
</html>