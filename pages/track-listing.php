
        <!--Page Header-->
        <section class="page-header listing_page">
          <div class="container">
            <div class="page-header_wrap">
              <div class="page-heading">
                <h1>Car Listing</h1>
              </div>
              <ul class="coustom-breadcrumb">
                <li><a href="?page=homepage">Home</a></li>
                <li>Car Listing</li>
              </ul>
            </div>
          </div>
          <!-- Dark Overlay-->
          <div class="dark-overlay"></div>
        </section>
        <!-- /Page Header-->

        <!--Listing-->
        <section class="listing-page">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-md-push-3">
                <div class="result-sorting-wrapper">
                  <div class="sorting-count">
                      <?php
                        $db = new DB();
                        //Query for Listing count
                        $sql = "SELECT targa from macchina";
                        $query = $db -> query($sql);
                        $results = $query->fetchAll();
                        $cnt= count($results);

                      ?>
                      <p><span><?php echo htmlentities($cnt);?> Listings</span></p>
                  </div>
            </div>

            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $sql = "SELECT m.* ,member.nome ,cognome, c.*
                    FROM macchina AS m, member, member_car , corsa AS c
                    WHERE member_car.member_id = member.email AND NOT email = '$email'
                    AND member_car.car_targa = m.targa 
                    AND NOT member_car_id = '$email'
                    AND member_car_targa = m.targa";
            } else {
                $sql = "SELECT m.* ,member.nome ,cognome, c.*
                        FROM macchina AS m, member,member_car , corsa AS c
                        WHERE member_car.member_id = member.email
                        AND member_car.car_targa = m.targa 
                        AND member_car_targa = m.targa";
            }

            $query = $db -> query($sql);
            $results=$query->fetchAll();
            $cnt=1;

            if(count($results)> 0)
            {
                foreach($results as $result)
                {  ?>
                        <div class="product-listing-m gray-bg">
                            <div class="product-listing-img">
                                <img src="assets/uploads/<?php echo htmlentities($result['foto']);?>" alt="Image" width="100%"/>
                            </div>
                            <div class="product-listing-content">
                                <h5><a href="?page=my-booking"><?php echo htmlentities($result["nome"]);?> <?php echo htmlentities($result["cognome"]);?> , <?php echo htmlentities($result["marca"]);?></a></h5>
                                <p class="list-price">$<?php echo htmlentities($result["costo"]);?> Al Giorno</p>
                                <p> Città di partenza: <?php echo htmlentities($result["source_city_id"]);?></p>
                                <p> Città di arrivo: <?php echo htmlentities($result["destination_city_id"]);?></p>
                                <p> Colore <i class="fa fa-square-o" aria-hidden="true" style="background-color: <?php echo htmlentities($result["car_color"]);?>"></i></p>
                                <ul>
        <!--                            <li><i></i></li>-->
                                    <li><i class="fa fa-user" aria-hidden="true"> posti </i><?php echo htmlentities($result["posti"]);?></li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"> partenza</i><br><?php echo htmlentities($result["data_partenza"]);?> </li>
                                    <li><i class="fa fa-car" aria-hidden="true"> marca/modello</i><br><?php echo htmlentities($result["marca"]);?> <?php echo htmlentities($result["modello"]);?></li>
                                </ul>
                                <?php if(isset($_SESSION['logged']) == 1)
                                {
                                    ?>

                                    <form method="post" action="?page=Booking">
                                        <button name="id" value="<?php echo $result['id']?>" class="btn"> Book
                                            <span class="angle_arrow">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="btn"> Book
                                        <span class="angle_arrow">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                <?php }
            } else {?>

                <h3> Non ci sono corse disponibili </h3>

            <?php }?>
              </div>
            </div>
          </div>
        </section>
        <!-- /Listing-->

        <!--Back to top-->
        <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
        <!--/Back to top-->

    </body>
</html>