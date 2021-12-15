<?php

    $db = new DB();

    if(isset($_POST['send']))
    {

        $name=$_POST['fullname'];
        $email=$_POST['email'];
        $contactno=$_POST['contactno'];
        $message=$_POST['message'];
        $sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
        $query = $db->query($sql);
        $lastInsertId = $db->lastInsertId();
        if($lastInsertId)
        {
            $msg="Query Sent. We will contact you shortly";
        }
        else
        {
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
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Contact Us</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Contact Us</li>
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
      <div class="col-md-6">
        <h3>Get in touch using the form below</h3>
          <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="contact_form gray-bg">
          <form  method="post">

            <div class="form-group">
              <label class="control-label">Full Name <span>*</span></label>
              <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
            </div>

            <div class="form-group">
              <label class="control-label">Email Address <span>*</span></label>
              <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
            </div>

            <div class="form-group">
              <label class="control-label">Phone Number <span>*</span></label>
              <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
            </div>

            <div class="form-group">
              <label class="control-label">Message <span>*</span></label>
              <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
            </div>
              <?php if(isset($_SESSION['logged']) == 1)
              {
                  ?>
                <div class="form-group">
                  <button class="btn" type="submit" name="send">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              <?php } else { ?>
                <div class="form-group">
                    <button class="btn" type="button"> <a href="#loginform" data-toggle="modal" data-dismiss="modal" style="color: white">Send Message</a> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              <?php }?>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <h3>Contact Info</h3>
        <div class="contact_detail">
              <?php

                $sql = "SELECT nome,cognome,email,telefono from member WHERE email = 'contactinfo@gmail.com' ";
                $query = $db -> query($sql);
                $results=$query->fetchAll();
                $cnt=1;
                if(count($results) > 0)
                {
                    foreach($results as $result)
                    {
              ?>
                  <ul>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                      <div class="contact_info_m"><?php echo htmlentities($result["nome"]); ?>  <?php echo htmlentities($result["cognome"]);?></div>
                    </li>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                      <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php   echo htmlentities($result["email"]); ?></a></div>
                    </li>
                    <li>
                      <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                      <div class="contact_info_m"><a href="mailto:contact@exampleurl.com"><?php   echo htmlentities($result["telefono"]); ?></a></div>
                    </li>
                  </ul>
            <?php }
                } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Contact-us-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

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

</body>

</html>
