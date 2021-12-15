
    <?php

        $db = new DB();
        $email = $_SESSION['email'];

        if(isset($_SESSION['logged']) == 0)
        {
            header('location: ../index.php');
        }

        if(isset($_POST['update'])) {
            $password = ($_POST['password']);
            $newpassword = ($_POST['newpassword']);
            $sql = "SELECT password FROM member WHERE email = '$email'";
            $query = $db->query($sql);
            $results = $query->fetchAll();

            if (count($results) > 0) {
                $con = "update member set password='$newpassword' where email='$email'";
                $chngpwd1 = $db->query($con);
                $msg = "Your Password succesfully changed";
            } else {
                $error = "Your current password is wrong";
            }
        }

    ?>

    <script>
        function valid()
        {
            if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
            {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
        return true;
        }
    </script>

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
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Update Password</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Update Password</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <?php

        $sql = "SELECT * from member where email = '$email' ";
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
            <h5><?php
                echo $result["nome"];
                echo $result["cognome"]?>
            </h5>
            <p>
                <?php echo htmlentities($result['email']);?><br>
                <?php echo htmlentities($result["telefono"]);?><br>
                <?php if (!empty($result["driving_license"])){ echo htmlentities($result["driving_license"]);}?>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <?php include('includes/sidebar.php');?>
          <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
            <form name="chngpwd" method="post" onSubmit="return valid();">

                <div class="gray-bg field-title">
                  <h6>Update password</h6>
                </div>
                 <?php if(isset($error)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                 else if(isset($msg)){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                <div class="form-group">
                  <label class="control-label">Current Password</label>
                  <input class="form-control white_bg" id="password" name="password"  type="password" required>
                </div>
                <div cl
                <div class="form-group">
                  <label class="control-label">Password</label>
                  <input class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                  <input class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword"  required>
                </div>

                <div class="form-group">
                   <input type="submit" value="Update" name="update" id="submit" class="btn btn-block">
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
<?php }}?>