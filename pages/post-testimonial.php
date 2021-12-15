<?php
    $currentpage = $_SERVER['REQUEST_URI'];
    $email = $_SESSION['email'];

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = '$currentpage'</script>";
    } else {
        $db = new DB();
        if(isset($_POST['submit']))
        {
            $voto=$_POST['rating'];
            $descr=$_POST['descr'];
            $date = date("Y/m/d");


            $sql="INSERT INTO  valutazione(member_id,voto,descrizione, `current_date`) VALUES('$email','$voto','$descr','$date')";
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
 <script>
     let star = document.querySelectorAll('input');
     let showValue = document.querySelector('#rating-value');

     for (let i = 0; i < star.length; i++) {
         star[i].addEventListener('click', function() {
             i = this.value;
             showValue.innerHTML = i + " out of 5";
         });
     }
 </script>

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Post Testimonial</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="?page=homepage">Home</a></li>
        <li>Post Testimonial</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 

    $sql = "SELECT * from member where email= '$email'";
    $query = $db -> query($sql);
    $results=$query->fetchAll();
    $cnt=1;

    if(count($results) > 0)
    {
        foreach($results as $result)
        {
    ?>
    <section class="user_profile inner_pages">
      <div class="container">
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
        <?php  }}?>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <?php include('includes/sidebar.php');?>
          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
              <h5 class="uppercase underline">Post a Testimonial</h5>
                <?php if(isset($error)){?>
                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                <?php } else if(isset($msg)){?>
                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <?php }?>
              <form method="post">
                  <div class="form-group">
                      <label class="control-label">Voto</label>
                      <div>
                          <fieldset class="rating">
                              <input type="radio" id="star5" name="rating" value="5" required/><label for="star5" class="full" title="Awesome"></label>
                              <input type="radio" id="star4.5" name="rating" value="4.5" required/><label for="star4.5" class="half"></label>
                              <input type="radio" id="star4" name="rating" value="4" required/><label for="star4" class="full"></label>
                              <input type="radio" id="star3.5" name="rating" value="3.5" required/><label for="star3.5" class="half"></label>
                              <input type="radio" id="star3" name="rating" value="3" required/><label for="star3" class="full"></label>
                              <input type="radio" id="star2.5" name="rating" value="2.5" required/><label for="star2.5" class="half"></label>
                              <input type="radio" id="star2" name="rating" value="2" required/><label for="star2" class="full"></label>
                              <input type="radio" id="star1.5" name="rating" value="1.5" required/><label for="star1.5" class="half"></label>
                              <input type="radio" id="star1" name="rating" value="1" required/><label for="star1" class="full"></label>
                              <input type="radio" id="star0.5" name="rating" value="0.5" required/><label for="star0.5" class="half"></label>
                          </fieldset>
                      </div>
                  </div>

                      <br>
                      <br>
                    <div class="form-group">
                      <label class="control-label">Testimonail</label>
                      <textarea class="form-control white_bg" name="descr" rows="4" required=""></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn">Save <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/Profile-setting-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    </body>
</html>
<?php } ?>