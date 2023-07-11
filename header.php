<?php include("dataconnection.php");
	  include("loadcustomerinfo.php");
 ?>
<style>
.circular {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  margin-right:15px;
}
.circular img {
  width: 50px;
  height: 50px;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
      <div class="site-wrap">
         <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
               <div class="site-mobile-menu-close mt-3">
                  <span class="icon-close2 js-menu-toggle"></span>
               </div>
            </div>
            <div class="site-mobile-menu-body"></div>
         </div>
 <header class="site-navbar py-1" role="banner">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-10 col-xl-2" data-aos="fade-down">
                  <h1 class="mb-0"><a href="//localhost/Prototype/Homepage/hairsal/index.php"><img src="fypLOGOwhite.png" height="80px"></a></h1>
               </div>
               <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
                  <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                     <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class="active">
                           <a href="//localhost/Prototype/Homepage/hairsal/index.php">Home</a>
                           
                        </li>
                        <li><a href="//localhost/Prototype/Homepage/hairsal/services.php">Services</a></li>
                        <li><a href="//localhost/Prototype/Homepage/hairsal/about.php">About</a></li>
                        <li><a href="//localhost/Prototype/Login/makeappointment.php">Book Online</a></li>
                        <li><a href="//localhost/Prototype/Homepage/hairsal/contact.php">Contact</a></li>
                     </ul>
                  </nav>
               </div>

                  <div class="d-none col-xl-2 d-xl-inline-block">
                     <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0 float-right" data-class="social" style="font-size:15px;letter-spacing:1px">
					 <?php 
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
						{
							$email = $_SESSION['user']['cust_email'];
							$userimage = mysqli_query($conn,"SELECT cust_profpic FROM customer WHERE cust_email='$email'");
							if($userimage)
							{
								while($row = mysqli_fetch_assoc($userimage))
								{
									if(!empty ($row['cust_profpic']) || $row['cust_profpic']!=null)
									{	
										echo '
									<li>
									<div class="circular">
									<a href="//localhost/Prototype/Login/profile.php">
									<img src="data:image/jpeg;base64,'.base64_encode($row['cust_profpic']).'" class="image-icon"></a>
									</div>
									</li>
									';
									}
									else
									{
										$defimg ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==";
										echo '
										<li>
										<div class="circular">
										<a href="//localhost/Prototype/Login/profile.php">
										<img src='.$defimg.'  class="image-icon" alt="avatar">
										</a>
										</div>
										</li>';
									}
								}
							}
						}
							?>
					 <?php 
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
						{
							?>
							<li class="align-middle" style="padding-right:30px;white-space:nowrap;">
							<a href="//localhost/Prototype/Login/profile.php" style="line-height:50px">
							   HI, <?php echo strtoupper($customer_name); ?>
							</a>
							</li>
							<li class="align-middle" style="padding-right:20px">
							  <a href="//localhost/Prototype/logout.php"  style="line-height:50px">
							   Logout
							</a>
							</li> 
					<?php
					}
						else
						{
							?>
							<li style="padding-right:30px">
							<a href="//localhost/Prototype/Register/register.php">
							   REGISTER
							</a>
							</li>
							<li style="padding-right:20px">
							  <a href="//localhost/Prototype/Login/login.php">
							   LOGIN
							</a>
							</li>
						<?php
						}
						?>
                     </ul>
                  </div>
                  <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
               </div>
            </div>
         </div>
      </header>
