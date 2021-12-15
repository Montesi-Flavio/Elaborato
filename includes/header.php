
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Car Rental Portal</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <!--Custome Style -->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!--OWL Carousel slider-->
        <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
        <!--slick-slider -->
        <link href="assets/css/slick.css" rel="stylesheet">
        <!--bootstrap-slider -->
        <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
        <!--FontAwesome Font Style -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- SWITCHER -->
        <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    </head>

    <body>
    <header>
        <div class="default-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-2">
                        <div class="logo"> <a href="?page=homepage"><img src="assets/images/logg.png" alt="image"/></a> </div>
                    </div>
                    <div class="col-sm-9 col-md-10">
                        <div class="header_info">
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">For Support Mail us : </p>
                                <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a> </div>
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">Service Helpline Call Us: </p>
                                <a href="tel:3275306723">+39-3275306723</a> </div>
                            <div class="social-follow">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <?php

                            $db = new DB();

                            if(isset($_SESSION['logged']) == 0)
                            {
                                ?>
                                <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
                            <?php }
                            else{

                                echo "Welcome To Car rental portal";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->

        <nav id="navigation_bar" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="header_wrap">
                    <div class="user_login">
                        <ul>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <?php

                                        if (isset($_SESSION['email'])) {
                                            $sql = "SELECT email FROM member WHERE email = '".$_SESSION['email']."' ";
                                            $query = $db->query($sql);
                                            $results = $query->fetchAll();

                                            if(count($results) > 0)
                                            {
                                                foreach($results as $result)
                                                {
                                                    echo $result["email"];
                                                }
                                            }
                                        }
                                    ?>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php  if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1){?>
                                        <li><a href="?page=profile">Profile Settings</a></li>
                                        <li><a href="?page=update-password">Update Password</a></li>
                                        <li><a href="?page=my-booking">My Booking</a></li>
                                        <li><a href="?page=post-testimonial">Post a Testimonial</a></li>
                                        <li><a href="?page=registration_car">Registration Car</a></li>
                                        <li><a href="?page=my-testimonials">My Testimonial</a></li>
                                        <li><a href="?page=logout">Sign Out</a></li>
                                        <?php } else { ?>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Registration Car</a></li>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
                                    <?php  } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header_search">
                        <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
                        <form action="#" method="get" id="header-search-form">
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="?page=homepage">Home</a></li>
<!--                        <li><a href="#aboutus">About Us</a></li>-->
                        <li><a href="?page=track-listing">Track Listing</a>
                            <?php if(isset($_SESSION['logged']))
                            {?>
                                <li><a href="?page=my_car">My Car</a></li>
                            <?php } else { ?>
                                <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Car</a></li>
                            <?php } ?>
                        <li><a href="?page=contact-us">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navigation end -->

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/interface.js"></script>
        <!--Switcher-->
        <script src="assets/switcher/js/switcher.js"></script>
        <!--bootstrap-slider-JS-->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!--Slider-JS-->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/cities.js"> </script>

        <script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>
        <script>
            $(document).ready(function(){
                $('.dropdown-toggle').dropdown()
            });
        </script>

    </header>


