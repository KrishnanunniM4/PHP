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
        $statement = $pdo->prepare('SELECT * FROM events WHERE event_name LIKE :search ORDER BY event_id ASC');
        $statement->bindValue(":search", "%$search%");
    }
    else
    {
        $statement = $pdo->prepare('SELECT * FROM events ORDER BY event_id DESC');
    }
    $statement->execute();
    $events = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Manage Events</title>
  </head>
  <body>
    <p>
        <a href="index.php" class="btn btn-secondary">Go Back To Dashboard</a>
    </p>
    <h1>Manage Events</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Thumbnail</th>
            <th scope="col">Event ID</th>
            <th scope="col">Event Name</th>
            <th scope="col">Event Location</th>
            <th scope="col">Event Start Date</th>
            <th scope="col">Event End Date</th>
            <th scope="col">Registration Start</th>
            <th scope="col">Registration End</th>
            <th scope="col">Registration Fees</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $i => $event) : ?>
                <tr>
                    <td>
                        <img src="<?php echo $event['thumbnail_img'] ?>" class="thumbnail">
                    </td>
                    <td><?php echo $event['event_id'] ?></td>
                    <td><?php echo $event['event_name'] ?></td>
                    <td><?php echo $event['event_location'] ?></td>
                    <td><?php echo $event['event_start'] ?></td>
                    <td><?php echo $event['event_end'] ?></td>
                    <td><?php echo $event['reg_start'] ?></td>
                    <td><?php echo $event['reg_end'] ?></td>
                    <td><?php echo $event['reg_fees'] ?></td>
                    <td>
                        <!--<a href="index.php?id=<?php echo $event['id'] ?>" class="btn btn-sm btn-outline-warning">Publish</a>-->
                        <a href="update.php?id=<?php echo $event['id'] ?>" class="btn btn-sm btn-outline-success">Update</a>
                        <form style="display: inline-block" method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $event['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        $(document).ready( function () {
        $('.table').DataTable({
            ordering: false,
            lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, 'All']]
        });
        } );
    </script>
  </body>
</html>