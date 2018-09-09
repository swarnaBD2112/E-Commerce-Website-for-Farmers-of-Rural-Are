<?php
    include 'lib/Session.php';
    Session::init();
    include 'lib/Database.php';
	include 'helpers/Format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db  = new Database();
	$fm  = new Format();
	$cat = new Catagory();
	$pd  = new Product();
	$ct  = new Cart();
	$cmr = new Customer();
	$fmr = new Farmer();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>AgriCenter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>

<link href="css/layout.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo-10.png" alt="" /></a>
			</div>
			<!-- head er logo er left er baki item er -->
			  <div class="header_top_right">
			    <!--<div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>-->
			    <div class="shopping_cart" style="margin-left: 500px">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"> 
									<?php
										$getData = $ct->checkCartList();
										if ($getData) {	
											$sum = Session::get("sum");
											$qty = Session::get("qty");
										    echo "Tk. ".$sum." | Qty: ".$qty;
										} else {
											echo "(Empty)";
										}
										
									 ?>
								</span>
							</a>
						</div>
			      </div>
<?php 
	if (isset($_GET['cid'])) {
		$delData = $ct->delCustomerCart();
		Session::destroy();
	}
 ?>
<?php 
	if (isset($_GET['fid'])) {
		Session::f_destroy();
	}
 ?>
		 <!--<div class="login"> 
				<?php 
					/*
					$login = Session::get("cuslogin");
					if ($login == false) { ?>
						<a href="login.php">Login</a>
				<?php } else { ?>
						<a href="?cid=<?php Session::get('cmrId')?>">Logout</a>
				<?php }	*/?>
		  		 
		   </div>-->
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	 


<!-- Jodi Customer login na thake tobe Customer Login tab ta show korbe -->
<?php 
	$f_login = Session::get("fmrlogin"); 
	if ($f_login == false) { ?> 
	<?php 		
		$login = Session::get("cuslogin");
		if ($login == false) { ?>
			<li><a href="login.php">Customer Login</a></li>
	    <?php } else { ?>
			<li><a href="?cid=<?php Session::get('cmrId')?>">Logout</a></li>
    <?php }	?>
<?php  } ?>
<!-- Jodi Customer login thake and cart e kisu add thake tobe cart tab ta show korbe -->
 <?php 
	  $login = Session::get("cuslogin");
	  if ($login == true) { ?>
	  <?php 
  		$chekcart = $ct->checkCartList();
  		if ($chekcart) { ?>
               <li><a href="cart.php">Cart</a></li>
	  <?php } ?>
 <?php } ?>
<!-- *************Jodi Customer login na thake tobe Farmer Login tab ta show korbe -->
<?php 
	$login = Session::get("cuslogin");
	if ($login == false) { ?>
	<?php 		
		$f_login = Session::get("fmrlogin");
		if ($f_login == false) { ?>
			<li><a href="farmerlogin.php">Farmer Login</a></li>
	    <?php } else { ?>
			<li><a href="?fid=<?php Session::get('fmrId')?>">Logout</a></li>
	<?php }	?>
<?php  } ?>

<!-- *************Jodi Customer login na thake tobe customer er Profile tab ta show korbe -->
	  <?php 
	  		$login = Session::get("cuslogin");
	  		if ($login == true) { ?>
	            <li><a href="profile.php">Profile</a> </li>
	  <?php } ?>
<!-- *************Jodi farmer login na thake tobe farmer er Profile tab ta show korbe -->
	   <?php 
	  		$f_login = Session::get("fmrlogin");
	  		if ($f_login == true) { ?>
	            <li><a href="farmerprofile.php">Profile</a> </li>
	  <?php } ?>

	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>