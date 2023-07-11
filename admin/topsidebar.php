<?php include("loadprofileinfo.php"); ?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>AerySalon </span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar pl-4 pr-4">
			<div class="profile-userpic">
				<a href="profile.php"><?php
				$userimage = mysqli_query($conn,"SELECT hairdresser_profpic FROM hairdresser WHERE hairdresser_id='".$id."'");
				while($row = mysqli_fetch_assoc($userimage))
				{
					$defimg ="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29vOzs7w8PDe3t7n5+f5+fnt7e2uCwolAAAFHUlEQVR4nO2dC5qqMAyFMTwUFNz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO2l78+BU39p66b4HplE3eU6VIcnqmNfl1+gksr6+iIucr50WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCouG/QFzk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3LtYKPkDdmwRmpUToUaSaq++AvRgZMWbOubQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEZQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39Wgc66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIZdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFftncI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9r+138jGzYzgAAAABJRU5ErkJggg==";
					if(!empty ($row['hairdresser_profpic']) || $row['hairdresser_profpic']!=null)
						echo '<img src="data:image/jpeg;base64,'.base64_encode($row['hairdresser_profpic']).'" class="mx-auto img-responsive  d-block">';
					else
						echo '<img src='.$defimg.'  class="mx-auto img-responsive  d-block" alt="avatar">';
				}
			?></a>
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo strtoupper($hairdresser_firstname." ".$hairdresser_lastname); ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="" id="dashboardtab"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent" id="hairdressertab"><a data-toggle="collapse" href="#hairdresser">
				<em class="fa fa-navicon mr-3"></em>Hairdresser<span data-toggle="collapse" href="#hairdresser" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="hairdresser">
					<li id="stafflist"><a class="" id="hairdresserlist" href="hairdresserlist.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Hairdressers List
					</a></li>
					<li id="addnewposition"><a class="" href="addnewposition.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Hairdresser Position
					</a></li>
					<li id="addnewhairdresser"><a class="" href="addnewhairdresser.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add New Hairdresser
					</a></li>
					
				</ul>
			</li>
			<li class="parent" id="servicetab"><a data-toggle="collapse" href="#service">
				<em class="fa fa-navicon mr-3"></em>Service<span data-toggle="collapse" href="#service" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="service">
					<li id=""><a class="" href="servicelist.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Services List
					</a></li>
					<li id=""><a class="" href="servicetype.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Service Type
					</a></li>
					<li id=""><a class="" href="addnewservice.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add New Service
					</a></li>
					
				</ul>
			</li>
			<li id="customerlist"><a href="customerlist.php"><em class="fa fa-toggle-off mr-3"></em>Customer List</a></li>
			
			<li ><a href="logout.php"><em class="fa fa-power-off mr-3"></em>Logout</a></li>
		</ul>
	</div><!--/.sidebar-->