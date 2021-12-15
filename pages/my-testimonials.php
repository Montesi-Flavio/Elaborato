
<?php
    $currentpage = $_SERVER['REQUEST_URI'];
    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = '$currentpage'</script>";
    } else {
    $email = $_SESSION['email'];

?>
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Testimonials</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Testimonials</li>
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
        $db = new DB();
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
                <h5><?php echo $result["nome"];
                    echo $result["cognome"]?></h5>
                <p>
                    <?php echo htmlentities($result["email"]);?><br>
                    <?php echo htmlentities($result["cf"]);?><br>
                    <?php echo htmlentities($result["telefono"]);?><br>
                    <?php if (!empty($result["driving_license"]))
                    { echo htmlentities($result["driving_license"]);}?>
                </p>
            </div>
        </div>
      <?php }}?>
      <div class="row">
          <div class="col-md-3 col-sm-3">
            <?php include('includes/sidebar.php');?>
          <div class="col-md-8 col-sm-8">
            <div class="profile_wrap">
              <h5 class="uppercase underline">My Testimonials </h5>
              <div class="my_vehicles_list">
                <ul class="vehicle_listing">
                <?php
                    $sql = "SELECT * from valutazione where member_id ='$email'";
                    $query = $db -> query($sql);
                    $results=$query->fetchAll();

                    if(($cnt = count($results)) > 0)
                    {
                        foreach($results as $res)
                        {
                    ?>
                          <li>
                            <div>
                                <p><?php echo htmlentities($res['member_id']);?> </p>
                                <p><b>Posting Date:</b> <?php echo htmlentities($res["current_date"]);?> </p>
                                <p><b>Descrizione</b> <br> <?php echo htmlentities($res["descrizione"])?></p>
                            </div>
                             <div class="vehicle_status"> <a class="btn outline btn-xs active-btn">Verificato</a>
                                 <div class="clearfix"></div>
                             </div>
                          </li>
                          <?php }
                    } else { ?>
                        <li>
                            <p> Non hai scritto Recensioni </p>
                        </li>
                        <?php }?>
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/my-vehicles-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>

    </body>
</html>
<?php } ?>