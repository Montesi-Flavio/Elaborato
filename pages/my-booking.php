<?php

    $db = new DB();
    $email = $_SESSION["email"];

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = 'index.php?=homepage'</script>";
    } else {
?>

    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>My Booking</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>My Booking</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->
    <section class="user_profile inner_pages">
        <div class="container">
        <?php

            $sql = "SELECT * from member where email = '$email'";
            $query = $db -> query($sql);
            $results=$query->fetchAll();
            $cnt=1;

            if(count($results) > 0)
            {
                foreach($results as $result)
                {
            ?>
            <div class="user_profile_info gray-bg padding_4x4_40">
              <div class="upload_user_logo"> <img src="assets/uploads/<?php echo htmlentities($result['foto']) ?>" alt="image">
              </div>
                <div class="dealer_info">
                    <h5><?php echo htmlentities($result['nome']);?></h5>
                    <p> <?php echo htmlentities($result['email']);?><br>
                        <?php echo htmlentities($result["cf"]);?><br>
                        <?php echo htmlentities($result['telefono']);?> <br>
                        <?php if (!empty($result["driving_license"])){ echo htmlentities($result['driving_license']);} ?>
                    </p>
                </div>
            </div>
        <?php }
    }?>
        <div class="row">
          <div class="col-md-3 col-sm-3">
           <?php include('includes/sidebar.php');?>

          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
              <h5 class="uppercase underline">My Bookings </h5>
              <div class="my_vehicles_list">
                <ul class="vehicle_listing">
        <?php

            $sql = "SELECT DISTINCT macchina.* ,richiesta.posti_occupati,richiesta.stato_richiesta, corsa.data_partenza, corsa.destination_city_id
                    FROM richiesta, macchina, corsa 
                    WHERE  ";

            $query = $db -> query($sql);
            $results=$query->fetchAll();
            $cnt=1;

            if(count($results) > 0)
            {
                foreach($results as $res)
                {
        ?>
                    <li>
                        <div class="vehicle_img"> <a href="?page=my-booking"><img src="assets/updates/<?php echo htmlentities($res['foto']);?>" alt="image"></a> </div>
                        <div class="vehicle_title">
                          <h6>
                              <a href="<?php echo htmlentities($res['posti_occupati']);?>">
                                  <?php echo htmlentities($res['marca']);?> ,
                                  <?php echo htmlentities($res['modello']);?>
                              </a>
                          </h6>
                          <p><b>From Date:</b> <?php echo htmlentities($res->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($res->ToDate);?></p>
                        </div>
                        <?php if($res['status'] == 1)
                        { ?>
                        <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                            <div class="clearfix"></div>
                        </div>
                      <?php } else if($res['status'] == 2) { ?>
                        <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
                            <div class="clearfix"></div>
                        </div>
                      <?php } else { ?>
                        <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
                            <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                        <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($res->message);?> </p></div>
                  </li>
                  <?php }
            } else { ?>
                <li> <div class="vehicle_title"> <h4> Non hai prenotato nessuna macchina </h4> </div></li>
                <?php }?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    </body>
</html>
<?php } ?>
