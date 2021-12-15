

    <!-- Banners -->
    <section id="banner" class="banner-section">
        <div class="container">
            <div class="div_zindex">
                <div class="row">
                    <div class="col-md-5 col-md-push-7">
                        <div class="banner_content">
                            <h1>Trova il Tuo tragitto con Car Rental.</h1>
                            <p>Abbiamo più di 100.000 utenti con cui viaggiare. </p><br><br><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Banners -->

<!-- Resent Cat-->
    <section class="section-padding gray-bg">
        <div class="container">
            <div class="section-header text-center">
                <h2>Trova la migliore <span>Per Te</span></h2>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,
                    or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                    you need to be sure there isn't anything embarrassing hidden in the middle of text.
                </p>
            </div>
            <div class="row">

                <!-- Nav tabs -->
                <div class="recent-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Cars</a></li>
                    </ul>
                </div>
                <!-- Recently Listed New Cars -->
                <div class="tab-content" style="margin-top: 20px">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                        <?php
                        $db = new DB();
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];

                        $macchina = "SELECT macchina.*  from macchina , member_car , member
                                    WHERE targa = member_car.car_targa AND email = member_id
                                    AND NOT email = '$email'  LIMIT 6";
                        } else {
                            $macchina = "SELECT macchina.*  from macchina , member_car , member
                                    WHERE targa = member_car.car_targa AND email = member_id LIMIT 6";
                        }


                        $query = $db -> query($macchina);
                        $results = $query -> fetchAll();

                        $cnt=1;

                        if(count($results) > 0)
                        {
                            foreach($results as $result)
                            {
                                ?>

                                <div class="col-list-3">
                                    <div class="recent-car-list">
                                        <div class="car-info-box">
                                            <?php if(isset($_SESSION['logged']) == 1)
                                            {
                                                ?>
                                                <a href="?page=my-booking">
                                                    <img src="assets/uploads/<?php echo htmlentities($result['foto']);?>" style="width: 100%" class="img-responsive" alt="image">
                                                </a>
                                            <?php } else { ?>
                                                <a href="#loginform" data-toggle="modal" data-dismiss="modal">
                                                    <img src="assets/uploads/<?php echo htmlentities($result['foto']);?>" style="width: 100%" class="img-responsive" alt="image">
                                                </a>
                                            <?php }?>
                                            <ul>
                                                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result['marca']);?></li>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Model <?php echo htmlentities($result['modello']);?> </li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['posti']);?> seats</li>
                                            </ul>
                                        </div>
                                        <div class="car-title-m">
                                            <span class="price">$<?php echo htmlentities($result['costo']);?> /Day</span>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }?>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="section-header text-center">
                <h3> Per altri risultati clicca su CAR LISTING</h3>
            </div>
        </div>
    </section>
<!-- /Resent Cat -->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    </body>
</html>