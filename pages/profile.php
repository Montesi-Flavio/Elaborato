<?php

    $db = new DB();
    $currentpage = $_SERVER['REQUEST_URI'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];

    if(isset($_SESSION["no_patente"]) === 1){
        $_SESSION["no_patente"] = 0;
        echo "<script> alert('Non hai una patente di guida') </script>";
    } else {
        $_SESSION["no_patente"] = 0;
    }

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = '$currentpage'</script>";
    } else{

        if(isset($_POST['updateprofile']))
        {
            $name = $_POST["name"];
            $sur = $_POST["cognome"];
            $cf = $_POST["cf"];

            $cell = $_POST["telefono"];
            $licenza = $_POST["licenza"];
            $data_licenza = $_POST["data_licenza"];

            $sql= "update member set nome='$name',cognome='$sur',email = '$email',telefono='$cell',driving_license = '$licenza', driving_date = '$data_licenza',
            cf='$cf', password = '$pass' where email = '$email'";
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
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="?page=homepage">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>


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
            <div class="upload_user_logo">
                <img src="assets/uploads/<?php echo htmlentities($result['foto']) ?>" alt="image">
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

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php');?>
                <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                      <h5 class="uppercase underline">Genral Settings</h5>
                        <?php if(isset($error)){?>
                            <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                        <?php } else if(isset($msg)){?>
                            <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                        <?php }?>
                      <form method="post">
                        <div class="form-group">
                            <p class="control-label">Nome Cognome</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control white_bg" name="name" value="<?php echo $result["nome"]?>" type="text" required></div>
                                <div class="col-md-6"><input class="form-control white_bg" name="cognome" value="<?php echo $result["cognome"]?>" type="text" required ></div>
                            </div>
                        </div>
            <!--                -->
                        <div class="form-group">
                          <label class="control-label">Codice Fiscale</label>
                          <input class="form-control white_bg" value="<?php echo $result["cf"];?>" name="cf" type="text" required >
                        </div>
            <!--              -->
                          <div class="form-group">
                              <label class="control-label">Telefono</label>
                              <input class="form-control white_bg" name="telefono" value="<?php echo $result["telefono"];?>"  type="tel" required>
                          </div>
            <!--              -->
                        <div class="form-group">
                          <label class="control-label">Patente</label>
                          <input class="form-control white_bg" name="licenza" placeholder="Patente" type="text" value="<?php
                          if (!empty($result["driving_license"])) { echo htmlentities($result["driving_license"]); }?>" >
                        </div>
            <!--              -->
                        <div class="form-group">
                          <label class="control-label">Scadenza Patente</label>
                          <input class="form-control white_bg" type="date" name="data_licenza" value="<?php echo $result["driving_date"];?>">
                        </div>
            <!--              -->
                <?php }
                } ?>
                    <div class="form-group">
                      <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
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