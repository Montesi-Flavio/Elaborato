<?php

    $db = new DB();
    $currentpage = $_SERVER['REQUEST_URI'];
    $email = $_SESSION['email'];

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

        if(isset($_POST['add']))
        {
            $targa = $_POST['targa'];
            $data_partenza = $_POST["data_start"];
            $citta_partenza = $_POST["city_start"];
            $citta_arrivo = $_POST["city_end"];

            $ex_targa = "SELECT member_car_targa FROM corsa WHERE member_car_targa = '$targa'";
            $query_targa = $db->query($ex_targa);
            $query_targa = $query_targa->fetchAll();

            if (count($query_targa) == 0) {

                $sql = "INSERT INTO corsa (member_car_id, data_partenza, source_city_id, destination_city_id, member_car_targa, status) 
                    VALUES ('$email','$data_partenza','$citta_partenza','$citta_arrivo','$targa','0') ";
                $query = $db->query($sql);

                $msg="Testimonail submitted successfully";

            }else {
                $error="Errore hai già un viaggio con questa macchina";
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
                    <li>Add a Track</li>
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
                                <h5 class="uppercase underline">Aggiungi una Corsa</h5>
                                <?php if(isset($error)){?>
                                    <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                                <?php } else if(isset($msg)){?>
                                    <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                                <?php }?>

                                <form method="post">
                                    <div class="form-group">
                                        <p class="control-label">Data Partenza</p>
                                        <input class="form-control white_bg" name="data_start" type="date" required >
                                    </div>

                                    <!--                -->
                                    <div class="form-group">
                                        <label class="control-label" for="input">Città di Partenza</label>
                                        <select class="form-control white_bg" id="input"  onchange="random_function()">
                                            <option>--Seleziona la Regione--</option>
                                            <option>Abruzzo</option>
                                            <option>Basilicata</option>
                                            <option>Calabria</option>
                                            <option>Campania</option>
                                            <option>Emilia-Romagna</option>
                                            <option>Friuli-Venezia Giulia</option>
                                            <option>Lazio</option>
                                            <option>Liguria</option>
                                            <option>Lombardia</option>
                                            <option>Marche</option>
                                            <option>Molise</option>
                                            <option>Piemonte</option>
                                            <option>Puglia</option>
                                            <option>Sardegna</option>
                                            <option>Sicilia</option>
                                            <option>Toscana</option>
                                        </select>
                                        <br>
                                        <select class="form-control white_bg" id="output" name="city_start" onchange="random_function1()" required></select>

                                    </div>
                                    <!--              -->
                                    <div class="form-group">
                                        <label class="control-label" for="input1">Città di Arrivo</label>
                                        <select class="form-control white_bg" id="input1" onchange="random_function2()">
                                            <option>--Seleziona la Regione--</option>
                                            <option>Abruzzo</option>
                                            <option>Basilicata</option>
                                            <option>Calabria</option>
                                            <option>Campania</option>
                                            <option>Emilia-Romagna</option>
                                            <option>Friuli-Venezia Giulia</option>
                                            <option>Lazio</option>
                                            <option>Liguria</option>
                                            <option>Lombardia</option>
                                            <option>Marche</option>
                                            <option>Molise</option>
                                            <option>Piemonte</option>
                                            <option>Puglia</option>
                                            <option>Sardegna</option>
                                            <option>Sicilia</option>
                                            <option>Toscana</option>
                                        </select>
                                        <br>
                                        <select class="form-control white_bg" id="output1" name="city_end" onchange="random_function1()" required></select>

                                    </div>
                                    <input type="text" name="targa" value="<?php echo $targa?>" hidden>

                                    <div class="form-group">
                                        <button type="submit" name="add" class="btn"> Save Changes
                                            <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
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
