<?php
    
    $connection = mysqli_connect("localhost", 'root', 'root', 'event_manage_sys');
    $query = "SELECT * FROM users";
    $query_run = mysqli_query($connection,$query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminstyle.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  </head>
  <body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Aquila '20 <span>Admin</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="user1.jpg" class="profile_image" alt="">
        <h4>Admin</h4>
      </center>
      <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="event.php"><i class="fas fa-cogs"></i><span>Manage Events</span></a>
      <a href="create.php"><i class="fas fa-table"></i><span>Add Events</span></a>
      <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->
    <!--Widget Start-->
    <section class="widget">
        <div class="card-body color1">
            <div class="float-left">
                <h3>
                    <span class="currency"></span>
                    <span class="count">60</span>
                </h3>
                <p>Active Events</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-joy"></i>
            </div>
        </div>
        <div class="card-body color2">
            <div class="float-left">
                <h3>
                    <span class="count">345</span>
                </h3>
                <p>Users</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <div class="card-body color3">
            <div class="float-left">
                <h3>
                    <span class="count">4365</span>
                </h3>
                <p>Site Visitors</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-world"></i>
            </div>
        </div>
    </section>
    <div class="table-heading">
        <h3>Registered <span>Users</span></h3>
      </div>
      <table class="content-table">
          <thead>
              <tr>
                  <th scope="col">User ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Usertype</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($query_run) > 0) : ?>
                    <?php while($row = mysqli_fetch_assoc($query_run)) : ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['usertype']; ?></td>
                        </td>
                    <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
  </body>
  <script type="text/javascript">
    $('.count').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration:4000,
            easing:'swing',
            step: function(now){
                $(this).text(Math.ceil(now));
            }
        });
    });
  </script>
</html>