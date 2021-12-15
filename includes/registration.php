<?php

$db = new DB();
$currentpage = $_SERVER['REQUEST_URI'];

    if(isset($_POST['signup']))
    {
        $file_path = $_FILES['fileToUpload']['name'];
        $tempname = $_FILES['fileToUpload']['tmp_name'];
        $folder = "assets/uploads/" . $file_path;

        if (move_uploaded_file($tempname, $folder)) {
            $foto = htmlspecialchars(basename($file_path)) ;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $email = $_POST["email_reg"];
        $name = $_POST["name_reg"];
        $pass = $_POST["password_reg"];
        $sur = $_POST["surname_reg"];
        $cf = $_POST["cf_reg"];
        $cell = $_POST["telefono_reg"];
        $licenza = $_POST["licenza_reg"];
        $data_licenza = $_POST["data_licenza_reg"];
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $pass;

        $query_count = $db->query( "SELECT email,driving_license FROM member WHERE email = '$email' ");
        $query_count = $query_count->fetchAll();

        if (count($query_count) == 0) {
            $query_registrazione = $db->query( "INSERT INTO member (email, nome, cognome, driving_license, driving_date, cf, foto,telefono, password) 
                                                            VALUES  ('$email', '$name',' $sur', '$licenza' , '$data_licenza' ,'$cf', '$foto', '$cell', '$pass')");
        } else {
            echo "<script>alert('Email or Driving Licence Already Exist'); document.location = '$currentpage'</script>";
            die;
        }

        if ($query_registrazione != false) {
            $_SESSION["logged"] = 1;
            echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
        }else {
            echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
        }
}

?>

    <script>
        function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#emailid").val(),
        type: "POST",
        success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
        }
        </script>
    <script type="text/javascript">
        function valid()
        {
        if(document.signup.password.value!== document.signup.confirmpassword.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.signup.confirmpassword.focus();
        return false;
        }
        return true;
        }
    </script>

    <div class="modal fade" id="signupform">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Sign Up</h3>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="signup_wrap">
                <div class="col-md-12 col-sm-6">
                  <form  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name_reg" placeholder="Nome" required="">
                    </div>

                      <div class="form-group">
                          <input type="text" class="form-control" name="surname_reg" placeholder="Cognome" required="">
                      </div>

                      <div class="form-group">
                          <input type="email" class="form-control" name="email_reg" placeholder="email@" required="">
                      </div>

                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-6"> <input type="text" class="form-control" name="licenza_reg" placeholder="licenza di guida" maxlength="10" ></div>
                              <div class="col-md-6"> <input type="date" class="form-control" name="data_licenza_reg" >
                              <span id="user-availability-status" style="font-size:12px;"></span></div>
                          </div>
                    </div>

                      <div class="form-group">
                          <input type="tel" class="form-control" name="telefono_reg" placeholder="Mobile Number" required="required">
                          <span id="user-availability-status" style="font-size:12px;"></span>
                      </div>

                      <div class="form-group">
                          <input type="text" class="form-control" name="cf_reg" placeholder="Cod Fiscale" required="required">
                          <span id="user-availability-status" style="font-size:12px;"></span>
                      </div>

                      <div class="form-group">
                          <label class="control-label">Foto</label>
                          <input class="form-control white_bg"  type="file" name="fileToUpload" required>
                      </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="password_reg" placeholder="Password" required="required">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                    </div>

                    <div class="form-group checkbox">
                      <input type="checkbox" id="terms_agree" required="required" checked="">
                      <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                    </div>

                    <div class="form-group">
                      <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer text-center">
            <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
          </div>
        </div>
      </div>
    </div>