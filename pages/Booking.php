<?php

    $db = new DB();
    $email = $_SESSION['email'];
    $currentpage = $_SERVER['REQUEST_URI'];
    $id = $_POST['id'];

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = 'index.php?=homepage'</script>";
    } else {

        if(isset($_POST['submit']))
        {
            $posti = $_POST['posti'];
            $status  = 0;

            $sql = "INSERT INTO richiesta (requester_id, ride_id, posti_occupati, stato_richiesta) 
                    VALUES('$email','$id','$posti','$status')";
            $query = $db->query($sql);

            if($query)
            {
                $msg="Testimonail submitted successfully";
            } else {
                $error="Something went wrong. Please try again";
            }

        }

?>

    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }

        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>

    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Booking </h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="?page=homepage">Home</a></li>
                    <li>Booking</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>

    <div class="container" style="margin-top: 144px ">

        <?php

            $sql = "SELECT modello,marca,targa,posti FROM macchina,richiesta,member,corsa 
                    WHERE requester_id = email AND ride_id = corsa.id";
            $query = $db -> query($sql);
            $results=$query->fetchAll();
            $cnt=1;

            if(count($results) > 0)
            {
                foreach($results as $result)
                {
        ?>
    <!--Listing-detail-->
        <div class="listing_detail_head row">
          <div class="col-md-3">
            <h2><?php echo htmlentities($result["marca"]);?> , <?php echo htmlentities($result["modello"]);?></h2>
          </div>
          <div class="col-md-3">
            <div class="price_info">
              <p>$<?php echo htmlentities($result["costo"]);?> </p>Per Day
            </div>
          </div>
        </div>
      
      <!--Side-Bar-->

<!--        <div class="share_vehicle">-->
<!--            <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>-->
<!--        </div>-->
        <div class="container">
            <div class="widget_heading">
                <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now </h5>
                <?php if(isset($error)){?>
                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                <?php } else if(isset($msg)){?>
                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <?php }?>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="fromdate"> Posti da prenotare </label>
                    <input type="number" min="0" max="<?php echo $result["posti"] ?>" class="form-control" id="fromdate" name="fromdate" required>
                </div><?php }
                } ?>
                <div class="form-group">
                    <label for="todate"> Arrivo</label>
                    <input type="date" class="form-control" id="todate" name="todate" required>
                </div>
              <?php if(isset($_SESSION['logged']))
                  {
                      ?>
                  <div class="form-group">
                    <input type="submit" class="btn"  name="submit" value="Book Now">
                  </div>
                  <?php } else { ?>
                    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>
                  <?php } ?>
            </form>
        </div>
    </div>
      <!--/Side-Bar-->

    
    <div class="space-20"></div>
    <div class="divider"></div>
<!--/Listing-detail-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    </body>
</html>
<?php }?>