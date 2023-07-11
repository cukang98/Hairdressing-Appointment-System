<!DOCTYPE html>
<html>
  <?php include("dataconnection.php"); ?>
  <?php include("is_login-hairdresser.php"); ?>
  <?php include("loadhairdresserinfo.php"); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AerySalon - User Profile
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
  </head>
  <body>
    <?php include("topsidebar-hairdresser.php") ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main ">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home">
              </em>
            </a>
          </li>
			<li class="active"><a href="dashboard.php">Hairdresser Dashboard</a></li>
          <li class="active">Profile
          </li>
        </ol>
      </div>
      <!--/.row-->
      <div class="row p-t-50 p-b-100" style="background-image: linear-gradient(to right bottom, #ffffff, #f7fbff, #e5fbff, #cefbff, #b8fcff);min-height: -webkit-fill-available;">
        <div class="col-lg-3 order-lg-1 text-center">
          <h5>Profile Image
          </h5>
          <hr>
          <form name="uploadimage" method="POST" enctype="multipart/form-data" id="uploadimage">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg=="  class="mx-auto img-thumbnail  d-block" alt="avatar">
			<h6 class="mt-2">Upload a different photo</h6>
            <label class="custom-file">
                <input type="file" id="image1" name="image" class="custom-file-input" style="display:none" onchange="submit()" />
                <span class="btn btn-md btn-primary" id="choose" style="line-height:25px">CHOOSE IMAGE</span>
            </label>
            <hr>
          </form>
        </div>
        <div class="col-lg-9 order-lg-2" >
          <ul class="nav nav-tabs">
            <li class="nav-item active">
              <a href="" data-target="#profile" data-toggle="tab" class="nav-link active" id="profilenav">Profile
              </a>
            </li>
            <li class="nav-item">
              <a href="" data-target="#history" data-toggle="tab" class="nav-link" id="appointmenthistorynav">Appointment History
              </a>
            </li>
            <li class="nav-item">
              <a href="" data-target="#edit" data-toggle="tab" class="nav-link" id="editprofilenav">Update Profile
              </a>
            </li>
          </ul>
          <div class="tab-content py-4">
            <div class="tab-pane active" id="profile">
              <h5 class="mb-3">User Profile
              </h5>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <h6>Full Name
                  </h6>
                  <p>
                    <?php echo $hairdresser_firstname." ".$hairdresser_lastname; ?>
                  </p>
                  <h6>Email
                  </h6>
                  <p>
                    <?php echo $hairdresser_email; ?>
                  </p>
                  <h6>Contact Number
                  </h6>
                  <p>
                    <?php echo $hairdresser_contact; ?>
                  </p>
                </div>
                <div class="col-md-6">
                  <h6>Position
                  </h6>
                  <p>
                    <?php echo $hairdresser_position; ?>
                  </p>
				  <h6>Address
                  </h6>
                  <p>
                    <?php echo $hairdresser_address.', '.$hairdresser_state; ?>
                  </p>
				  <h6>Postcode
                  </h6>
                  <p>
                    <?php echo $hairdresser_postcode; ?>
                  </p>
                </div>
                <div class="col-md-12 m-t-50">
                  <hr>
                  <h	5 class="mt-2">
                    <span class="fa fa-clock-o ion-clock float-right">
                    </span> Recent Appointment History
                  </h5>
                  <table class="table table-sm table-hover table-striped">
                    <tbody>                                    
                      <tr>
                        <td>
                          <strong>Abby
                          </strong> joined ACME Project Team in 
                          <strong>`Collaboration`
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>Gary
                          </strong> deleted My Board1 in 
                          <strong>`Discussions`
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>Kensington
                          </strong> deleted MyBoard3 in 
                          <strong>`Discussions`
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>John
                          </strong> deleted My Board1 in 
                          <strong>`Discussions`
                          </strong>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <strong>Skell
                          </strong> deleted his post Look at Why this is.. in 
                          <strong>`Discussions`
                          </strong>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/row-->
            </div>
            <div class="tab-pane" id="edit">
              <form role="form" name="editprofileform" method="get">
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Full Name
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="name" name="name" value="sdf" onchange="validateName();">
                    <div id="name-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Email
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" name="email" value="sdf" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Contact Number
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control validatecontact" type="text" id="contact" name="contact" value="sdf" onchange="validateContact()" >
                    <div id="contact-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Address
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" id="address" name="address" value="dfgdfg" onchange="validateAddress();">
                    <div id="address-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">State
                  </label>
                  <div class="col-lg-3">
                    <select id="user_time_zone" name="state" class="form-control" size="0">
                      <option disabled="disabled"  value="empty">State
                      </option>
                      <option  value="johor">JOHOR
                      </option>
                      <option  value="malacca">MALACCA
                      </option>
                      <option  value="kedah">KEDAH
                      </option>
                      <option  value="kelantan">KELANTAN
                      </option>
                      <option value="pahang">PAHANG
                      </option>
                      <option  value="negeri sembilan">NEGERI SEMBILAN
                      </option>
                      <option value="perak">PERAK
                      </option>
                      <option  value="perlis">PERLIS
                      </option>
                      <option  value="penang">PENANG
                      </option>
                      <option  value="selangor">SELANGOR
                      </option>
                    </select>
                  </div>
                  <label class="col-lg-3 control-label">Postcode
                  </label>
                  <div class="col-lg-3">
                    <input class="form-control" type="text" id="postcode" name="postcode" value=" " onchange="validatePostcode();">
                    <div id="postcode-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">
                  </label>
                  <div class="col-lg-9">
                    <input type="reset" class="btn" value="Cancel">
                    <input type="submit" name="editprofile" class="btn btn-primary" value="Save Changes">
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="changepassword">
              <form role="form" name="changepasswordform" method="get">
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Old Password
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="password" name="oldpw" id="oldpw" onchange="validateOldpw();">
                    <div id="oldpw-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">New password
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control validate" type="password" name="password1" id="password1" onchange="validateNewpw();">
                    <div id="newpw-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">Confirm new password
                  </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="password" name="password2" id="password2" onchange="validateNewpw2();">
                    <div id="newpw2-validation" class="validation-hint">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label">
                  </label>
                  <div class="col-lg-9">
                    <input type="reset" class="login100-form-btn"  value="Cancel">
                    <input type="submit" class="login100-form-btn" name="changepassword" value="Save Changes">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.main-->
    <script src="js/jquery-1.11.1.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script src="js/chart.min.js">
    </script>
    <script src="js/chart-data.js">
    </script>
    <script src="js/easypiechart.js">
    </script>
    <script src="js/easypiechart-data.js">
    </script>
    <script src="js/bootstrap-datepicker.js">
    </script>
    <script src="js/custom.js">
    </script>
  </body>
</html>
