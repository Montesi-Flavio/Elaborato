<?php

    $db = new DB();
    $currentpage = $_SERVER['REQUEST_URI'];
    $email = $_SESSION['email'];
    $targa = $_POST['targa'];


    if(isset($_SESSION["no_patente"]) === 1){
        $_SESSION["no_patente"] = 0;
        echo "<script> alert('Non hai una patente di guida') </script>";
    } else {
        $_SESSION["no_patente"] = 0;
    }

    if(isset($_SESSION['logged']) == 0)
    {
        echo "<script> document.location = '$currentpage'</script>";
    } else {

        if(isset($_POST['updatecar']))
        {

            $name = $_POST["marca"];
            $sur = $_POST["modello"];
            $anno_imm = $_POST["anno_imm"];
            $cc = $_POST["cc"];
            $car_color = $_POST["color"];
            $posti = $_POST["posti"];
            $costo = $_POST["costo"];

            $sql= "update macchina 
                SET targa = '$targa', marca='$name',modello='$sur',anno_immatric='$anno_imm',cc = '$cc', car_color = '$car_color', posti='$posti', costo = '$costo' 
                WHERE targa = '$targa' ";
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
                        <h1>Modify-Car</h1>
                    </div>
                    <ul class="coustom-breadcrumb">
                        <li><a href="?page=homepage">Home</a></li>
                        <li><a href="?page=my_car">My Car</a></li>
                        <li>Modify-Car</li>
                    </ul>
                </div>
            </div>
            <!-- Dark Overlay-->
            <div class="dark-overlay"></div>
        </section>


        <?php
        $sql = "SELECT * from member where email = '$email' ";
        $query = $db -> query($sql);
        $results = $query->fetchAll();
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
            <?php }
        }?>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                    <?php include('includes/sidebar.php');?>
                        <div class="col-md-6 col-sm-8">
                            <div class="profile_wrap">
                            <h5 class="uppercase underline">Modifica la tua macchina</h5>
                            <?php if(isset($error)){?>
                            <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                        <?php } else if(isset($msg)){?>
                            <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                        <?php }?>

                        <?php
                            $car = "SELECT macchina.* from macchina WHERE targa = '$targa' ";
                            $car_query = $db -> query($car);
                            $ress = $car_query->fetchAll();

                            if(count($ress) > 0)
                            {
                                foreach($ress as $res)
                                {
                        ?>
                            <form method="post">
                                <div class="form-group">
                                    <p class="control-label">Marca Modello</p>
                                    <div class="row">
                                        <div class="col-md-6"><input class="form-control white_bg" name="marca" value="<?php echo $res["marca"]?>" type="text" required></div>
                                        <div class="col-md-6"><input class="form-control white_bg" name="modello" value="<?php echo $res["modello"]?>" type="text" required ></div>
                                    </div>
                                </div>
                                <!--                -->
                                <div class="form-group">
                                    <label class="control-label">Anno Immatricolazione</label>
                                    <input class="form-control white_bg" value="<?php echo $res["anno_immatric"];?>" name="anno_imm" type="date" required >
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Cilindrata</label>
                                    <input class="form-control white_bg" name="cc" value="<?php echo $res["cc"];?>" step="100"  type="text" required>
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Colore</label>
                                    <input class="form-control white_bg" name="color" placeholder="Color" type="color" value="<?php echo htmlentities($res["car_color"]); ?>">
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Posti</label>
                                    <input class="form-control white_bg" type="number" max="9" name="posti" value="<?php echo $res["posti"];?>">
                                </div>
                                <!--              -->
                                <div class="form-group">
                                    <label class="control-label">Costo</label>
                                    <input class="form-control white_bg" type="number" id="costo" name="costo" value="<?php echo $res["costo"];?>">
                                </div>
                                <!--              -->
                                    <input type="text" name="targa" value="<?php echo $res['targa']?>" hidden>
                                    <?php }
                                } ?>
                                <div class="form-group">
                                    <button type="submit" name="updatecar" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
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
