<?php

    $db = new DB();
    $currentpage = $_SERVER['REQUEST_URI'];
    $email = $_SESSION['email'];

    $licenza = $db->query( "SELECT driving_license FROM member WHERE email = '$email' ");
    $licenza = $licenza->fetchArray();

    if(isset($_SESSION['logged']) == 0 )
    {
        echo "<script> document.location = '$currentpage'</script>";
    }
    if (empty($licenza["driving_license"])) {
        $_SESSION["no_patente"] = 1;
        echo "<script> document.location = '?page=profile' </script>";
    }else{
        $_SESSION["no_patente"] = 0;

    if (isset($_POST["updateprofile"])) {

        /* **************** FILE TO UPLOAD ***************** */

        $target_file = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $folder = "assets/uploads/" . $target_file;

        if (move_uploaded_file($tempname, $folder)) {
            $foto = htmlspecialchars(basename($target_file)) ;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

    /* **************** END OF FILE TO UPLOAD ***************** */
            $targa = $_POST["targa"];
            $marca = $_POST["marca"];
            $modello = $_POST["modello"];
            $anno_imm = $_POST["anno_imm"];
            $cc = $_POST["cc"];
            $costo = $_POST["costo"];
            $car_color = $_POST["car_color"];
            $posti = $_POST["posti"];

            $pass = $_SESSION['password'];

            $query_count = $db->query( "SELECT targa FROM macchina WHERE targa = '$targa' ");
            $results = $query_count->fetchAll();
            if (count($results) == 0){
                if (isset($foto)) {
                    $insert_into_car = "INSERT INTO macchina (targa,marca,modello,anno_immatric,cc,car_color,posti,foto,costo) 
                    VALUES ( '$targa','$marca','$modello','$anno_imm', '$cc', '$car_color', '$posti', '$foto','$costo')";
                }

                $member_car = "INSERT INTO member_car (member_id, car_targa) VALUES ('$email', '$targa') ";

                /*****************************************************************/
                $query_insert = $db->query($insert_into_car);
                $query_member_car = $db->query($member_car);

                $msg="Profile Updated Successfully";
            }else {
                echo "<script>alert('E già presente questa targa'); document.location = '$currentpage'</script>";
                die;
            }
        }
    ?>

    <style>
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
                <div class="upload_user_logo"> <img src="assets/uploads/<?php echo htmlentities($result['foto']) ?>" alt="image">
                </div>

                <div class="dealer_info">
                    <h5><?php echo $result["nome"];
                        echo $result["cognome"]?></h5>
                    <p>
                        <?php echo htmlentities($result["email"]);?><br>
                        <?php echo htmlentities($result["cf"]);?><br>
                        <?php echo htmlentities($result["telefono"]);?> <br>
                        <?php if (!empty($result["driving_license"]))
                        {echo htmlentities($result["driving_license"]);}?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php include('includes/sidebar.php');?>
                    <div class="col-md-6 col-sm-8">
                        <div class="profile_wrap">
                            <h5 class="uppercase underline">Genral Settings</h5>
                            <?php
                            if(isset($msg)){?>
                                <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p class="control-label">Marca e Modello</p>
                                    <div class="row">
                                        <div class="col-md-6"><input class="form-control white_bg" name="marca" placeholder="Marca" type="text" required ></div>
                                        <div class="col-md-6"><input class="form-control white_bg" placeholder="Modello" name="modello"  type="text" required ></div>
                                    </div>
                                </div>
                                <!--                -->
                                <div class="form-group">
                                    <label class="control-label">Targa</label>
                                    <input class="form-control white_bg" name="targa" placeholder="Traga" type="text" required>
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Anno di Immatricolazione</label>
                                    <input class="form-control white_bg" name="anno_imm" type="date" required>
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Cilindrata &nbsp;</label>
                                    <input class="form-control white_bg" name="cc" step="100" type="number" required>
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Colore della Macchina</label>
                                    <input class="form-control white_bg" type="color" name="car_color" required>
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Posti</label>
                                    <input class="form-control white_bg" type="number" name="posti" required min="0" max="9">
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Costo / day</label>
                                    <input class="form-control white_bg" type="number" step="0.01" name="costo" >
                                </div>
                                <!--            -->
                                <div class="form-group">
                                    <label class="control-label">Foto</label>
                                    <input class="form-control white_bg" type="file" name="fileToUpload" >
                                </div>
                                <!--            -->
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
<?php } ?><?php
