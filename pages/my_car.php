<?php

    $db = new DB();
    $email = $_SESSION["email"];

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = 'index.php?=homepage'</script>";
    } else {
?>

    <!--Page Header-->
    <section class="page-header contactus_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>My Car</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="?page=homepage">Home</a></li>
                    <li>My Car</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Contact-us-->
    <section class="contact_us section-padding">
        <div class="container">
            <div  class="row">
                <h3>Le Tue Macchine</h3>
                <div class="col">
                  <?php
                    $sql = "SELECT m.* from macchina as m,member_car WHERE member_car.member_id = '$email' AND member_car.car_targa = m.targa ";
                    $query = $db -> query($sql);
                    $results=$query->fetchAll();
                    $cnt=1;

                    if(count($results)> 0)
                    {
                        foreach($results as $result)
                        {  ?>

                        <div class="contact_form gray-bg">
                            <div class="product-listing-m gray-bg">
                                <form action="?page=modify_car" method="post">
                                    <div class="product-listing-img">
                                        <img src="assets/uploads/<?php echo htmlentities($result['foto']);?>" width="100%" class="img-responsive" alt="Image" />
                                    </div>
                                    <div class="product-listing-content">
                                        <h5><a><?php echo htmlentities($result["marca"]);?> , <?php echo htmlentities($result["modello"]);?></a></h5>
                                        <p class="list-price">$<?php echo htmlentities($result["costo"]);?> Al Giorno</p>
                                        <p> Colore <i class="fa fa-square-o" aria-hidden="true" style="background-color: <?php echo htmlentities($result["car_color"]);?>"></i></p>
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result["posti"]);?> seats</li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result["modello"]);?> model</li>
                                            <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result["marca"]);?></li>
                                        </ul>

                                        <button class="btn" value="<?php echo $result['targa']?>" name="targa"> Modifica
                                            <span class="angle_arrow">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>

                                <form action="?page=add_aTrack" method="post">
                                    <div class="product-listing-content">
                                        <button class="btn" value="<?php echo $result['targa']?>" name="add_track"> Aggiungi un Viaggio
                                            <span class="angle_arrow">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                            <br>
                        <?php }}else{?>
                        <div class="product-listing-content"> <h2> Non hai nessuna macchina registrata !! </h2> </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
<!-- /Contact-us-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    </body>
</html>
<?php }?>