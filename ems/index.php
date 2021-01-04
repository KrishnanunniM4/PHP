<?php
    session_start();
    $connection = mysqli_connect("localhost", 'learners_krishnanunni', 'krishnanunni', 'learners_krishnanunni');
    $query = "SELECT * FROM events";
    $query_run = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquila '20</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="skrollr.js"></script>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <!--Navigation  Bar-->
    <nav class="navbar">
        <div class="inner-width">
            <a href="#" class="logo"></a>
            <div class="navbar-menu">
                <form action="admin/logincheck.php" method="POST">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#events">Events</a>
                    <a href="#sponsors">Sponsors</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#contact">Contact</a>
                    <?php
                        if(isset($_SESSION['username']) && $_SESSION['username'] !='')
                        {
                            echo '<a href="#regevents"> '.$_SESSION['username'].' </a>' .'<button name="home_logout">Logout</button>'; 
                        }
                        elseif(isset($_SESSION['mobile']) && $_SESSION['mobile'] !='')
                        {
                            echo '<a href="#regevents"> '.$_SESSION['mobile'].' </a>' .'<button name="home_logout">Logout</button>'; 
                        }
                        else
                        {
                            echo '<a href="admin/login.php">Sign-In</a>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <!--Banner-->
    <section id="home">
        <div class="inner-width">
            <div class="content" data-0-top="opacity:0;left:100px;" data-200-top="opacity:1;left:0px;">
                <h2>Aquila '20</h2>
                <h1></h1>
                <div class="sm">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin-in"></a>
                    <a href="#" class="fab fa-youtube"></a>
                </div>
                <div class="buttons">
                    <a href="#contactus">Contact</a>
                    <a href="#">Download Brochure</a>
                </div>
            </div>
        </div>
        <video src="webpage/bgvideo.mp4" muted loop autoplay></video>
    </section>
    <!--About-->
    <section class="about" id="about">
        <div class="contentBx">
            <h2 class="heading" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:500px;">About Aquila '20</h2><br>
            <p class="text" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:-500px;">The early years of this century saw some aspiring students garner around in the hope to behold the seeds of ideas that sprouted in their minds take life before them. This resulted in one of south India's biggest scholastic endeavors - Aquila, the techno-management fest of NIT Calicut. Since it's inception in 2000, this annual symposium has known only growth, and has flourished into one of the few promising enterprises the nation has witnessed.<br><br>Pushing the barriers year after year, Aquila aims at providing a plethora of platforms to the intrigued technical heads that arrive at this fiesta with an array of events and workshops, to sharpen their skills and widen their knowledge quotient. With the engine up and roaring, Aquila '20 is all set to embark on a new expedition, proffering opportunities and paving trails to greater comprehension. From being in awe of the top-notch robotic & automobile display and the adrenaline rush while racing against time and competing with some of the tech-wired geniuses out there, to the ecstatic ambience of the pronites, Aquila has it all covered for it's audience. With Adizya displaying an impressive arena for the art lovers and designing heads, we call out to all the right and left brains alike. Come, embark on this journey with us, and let's drift away from normalcy and let the magic seep into our souls.</p>
        </div>
        <div class="imgBx" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:200px;">
        </div>
    </section>
    <!--Events-->
    <section class="events" id="events">
        <h2 class="heading" style="text-align: center;" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:500px;">Events</h2>
        <p class="text" style="text-align: center;" data-center-center="opacity:1;right:0;" data-0-bottom="opacity:0;right:500px;">Engage in mind boggling competitions designed to test your capabilities and knowledge and advance the fields of Technology and Science like never before!</p>
        <div class="container">
            <?php
                $no = 1;
                if(mysqli_num_rows($query_run) > 0) {
                    while($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <div class="card">
                            <div class="cardBx">
                                <img src="ems/<?php echo $row['thumbnail_img']; ?>">
                            </div>
                            <div class="cardContent">
                                <div>
                                    <h3><?php echo $row['event_name']; ?></h3>
                                    <p><?php echo $row['description']; ?></p>
                                    <?php
                                        if(isset($_SESSION['username']) && $_SESSION['username'] !='')
                                        {
                                            echo '<a href="register.php?id='.$row['event_id'].'">Details</a>';
                                        }
                                        elseif(isset($_SESSION['mobile']) && $_SESSION['mobile'] !='')
                                        {
                                            echo '<a href="register.php?id='.$row['event_id'].'">Details</a>';
                                        }
                                        else
                                        {
                                            echo '<a href="admin/login.php">Details</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $no++;
                    }
                }
            ?>
        </div>
    </section>
    <section class="regevents" id="regevents">
        <?php
            if(isset($_SESSION['username']) && $_SESSION['username'] !='')
            {
                echo '<h2 class="heading">Your Registered Events</h2>';
            }
            elseif(isset($_SESSION['mobile']) && $_SESSION['mobile'] !='')
            {
                echo '<h2 class="heading">Your Registered Events</h2>';
            }
        ?>
        <div class="container">
            <?php

                if(isset($_SESSION['mobile']) && $_SESSION['mobile'] !='')
                {
                    $lmobile = '';
                    $lmobile = $_SESSION['mobile'] ;
                    $regs = "SELECT * FROM registrations WHERE mobile = '$lmobile'";
                    $regs_run = mysqli_query($connection,$regs);
                    $no = 1;
                    if(mysqli_num_rows($regs_run) > 0) {
                        while($reg = mysqli_fetch_assoc($regs_run)) {
                            ?>
                            <div class="card">
                                <div class="cardBx">
                                    <img src="webpage/regevent.jpg">
                                </div>
                                <div class="cardContent">
                                    <div>
                                        <h3><?php echo $reg['event_name']; ?></h3>
                                        <p>Registration ID : <?php echo $reg['reg_id']; ?></p>
                                        <p>Event ID : <?php echo $reg['event_id']; ?></p>
                                        <p>Event Location : <?php echo $reg['event_location']; ?></p>
                                        <p>Event Start Date : <?php echo $reg['event_start']; ?></p>
                                        <p>Event End Date : <?php echo $reg['event_end']; ?></p>
                                        <p>Registration Fees : <?php echo $reg['reg_fees']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $no++;
                        }
                    }
                }

                elseif(isset($_SESSION['username']) && $_SESSION['username'] !='')
                {
                    $lmobile = '';
                    $lusername = '';
                    $lmobile = $_SESSION['mobile'] ;
                    $lusername = $_SESSION['username'] ;
                    $regs = "SELECT * FROM registrations WHERE mobile = '$lmobile' AND username = '$lusername'";
                    $regs_run = mysqli_query($connection,$regs);
                    $no = 1;
                    if(mysqli_num_rows($regs_run) > 0) {
                        while($reg = mysqli_fetch_assoc($regs_run)) {
                            ?>
                            <div class="card">
                                <div class="cardBx">
                                    <img src="webpage/regevent.jpg">
                                </div>
                                <div class="cardContent">
                                    <div>
                                        <h3><?php echo $reg['event_name']; ?></h3>
                                        <p>Registration ID : <?php echo $reg['reg_id']; ?></p>
                                        <p>Event ID : <?php echo $reg['event_id']; ?></p>
                                        <p>Event Location : <?php echo $reg['event_location']; ?></p>
                                        <p>Event Start Date : <?php echo $reg['event_start']; ?></p>
                                        <p>Event End Date : <?php echo $reg['event_end']; ?></p>
                                        <p>Registration Fees : <?php echo $reg['reg_fees']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $no++;
                        }
                    }
                }
            ?>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--Counter Banner-->
    <section>
        <div class="middle">
            <div class="counting-sec">
                <div class="inner-width">
                    <div class="col">
                        <i class="fas fa-university"></i>
                        <div class="num">1,246</div>
                        Collages
                    </div>
                    <div class="col">
                        <i class="fas fa-puzzle-piece"></i>
                        <div class="num">60</div>
                        Events
                    </div>
                    <div class="col">
                        <i class="fas fa-coins"></i>
                        <div class="num">8,4999</div>
                        Cash Prize
                    </div>
                    <div class="col">
                        <i class="fas fa-users"></i>
                        <div class="num">32,000</div>
                        Participants
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--Sponsors-->
    <section class="sponsors" id="sponsors">
        <h2 class="heading" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:500px;">Our Sponsors</h2>
        <p class="text" data-center-center="opacity:1;right:0;" data-0-bottom="opacity:0;right:500px;">Aquila, the three day fiesta, attracts tech-wits and creative minds from over 900 colleges across the nation, flowing in to test their capabilities and have an enthralling and fruitful time. Countless heads turn this way during Aquila, hoping to become a part of an endeavor that is nerve-racking and filled with euphoria, all at once.Being a part of Aquila gives you a chance to associate yourselves with The National Institute of Technology, Calicut ranked 28th national wide, and thereby build an everlasting relationship with the institution, an unavoidable part of Kerala history.</p>
        <div class="imgBx">
            <img src="webpage/brand1.png">
            <img src="webpage/brand2.png">
            <img src="webpage/brand3.png">
            <img src="webpage/brand4.png">
            <img src="webpage/brand5.png">
            <img src="webpage/brand6.png">
            <img src="webpage/brand7.png">
            <img src="webpage/brand8.png">
        </div>
    </section>
    <!--Gallery-->
    <section class="gallery" id="gallery">
        <h2 class="heading" style="text-align: center;" data-center-center="opacity:1;right:0;" data-0-bottom="opacity:0;right:500px;">Gallery</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="webpage/img1.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img2.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img3.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img4.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img5.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img6.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img7.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img8.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img9.jpg"></div>
                <div class="swiper-slide"><img src="webpage/img10.jpg"></div>
            </div>
        </div>
    </section>
    <!--Team-->
    <div class="teamBody" id="contact">
        <section class="contact">
            <h2 class="heading" style="text-align: center;" data-center-center="opacity:1;left:0;" data-0-bottom="opacity:0;left:500px;">Aquila Cordinators</h2>
            <div class="teamContainer">
                <div class="teamCard">
                    <div class="teamContent">
                        <div class="teamImgBx"><img src="webpage/user1.jpg"></div>
                        <div class="teamContentBx">
                            <h3>Krishnanunni M<br><span>Program Cordinator</span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li style="--i:1">
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:2">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></i></a>
                        </li>
                        <li style="--i:3">
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></i></a>
                        </li>
                    </ul>
                </div>
                <div class="teamCard">
                    <div class="teamContent">
                        <div class="teamImgBx"><img src="webpage/user2.jpg"></div>
                        <div class="teamContentBx">
                            <h3>Don C John<br><span>Marketing </span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li style="--i:1">
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:2">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:3">
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="teamCard">
                    <div class="teamContent">
                        <div class="teamImgBx"><img src="webpage/user3.jpg"></div>
                        <div class="teamContentBx">
                            <h3>Haritha Ashok<br><span>Creative Designer</span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li style="--i:1">
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:2">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:3">
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="teamCard">
                    <div class="teamContent">
                        <div class="teamImgBx"><img src="webpage/user4.jpg"></div>
                        <div class="teamContentBx">
                            <h3>Jibin P S<br><span>Technical Head</span></h3>
                        </div>
                    </div>
                    <ul class="sci">
                        <li style="--i:1">
                            <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:2">
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li style="--i:3">
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <!--Contact Us-->
    <section class="contactPage" id="contactus">
        <div class="contact-page">
            <h4 data-center-center="opacity:1;right:0;" data-0-bottom="opacity:0;right:500px;">Get in touch</h4>
            <div class="contact-info">
                <div class="item">
                    <i class="icon fas fa-home"></i>
                    Web and Crafts
                </div>
                <div class="item">
                    <i class="icon fas fa-phone"></i>
                    +91 7994 6750 48
                </div>
                <div class="item">
                    <i class="icon fas fa-envelope"></i>
                    webandcrafts@gmail.com
                </div>
                <div class="item">
                    <i class="icon fas fa-clock"></i>
                    Mon - Fri 8:00 AM to 6:00 PM
                </div>
            </div>
            <form action="" class="contact-form">
                <input type="text" class="textb" placeholder="Your Name">
                <input type="email" class="textb" placeholder="Your Email">
                <textarea placeholder="Your Message"></textarea>
                <input type="submit" class="btn" value='Send'>
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if(this.scrollY > 20) 
                    $(".navbar").addClass("sticky");
                else
                    $(".navbar").removeClass("sticky");
            });
            $('.menu-toggler').click(function(){
                $(this).toggleClass("active");
                $(".navbar-menu").toggleClass("active");
            });
        });
        var s = skrollr.init();
        $(".num").counterUp({delay:10,time:1000});
        var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 750,
                disableOnInteraction: false,
            },
        });
    </script>
</body>
</html>
