<?php include 'inc/header.php';?>
<?php 
	/*
	$login = Session::get("cuslogin");
	if ($login == true) {
		header("Location:order.php");
	}*/
?>
<?php

     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['f_login'])) {

        $farmerlogin = $fmr->farmerLogin($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
    	<?php 
    		if (isset($farmerlogin)) {
    			echo $farmerlogin;
    		}
    	?>
        	<h3>Existing Farmers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" >
            	<input name="phone" placeholder="Phone" type="text" >
                <input name="password" placeholder="password" type="password" >
                <div class="buttons"><div><button class="grey" name="f_login" >Sign In</button></div></div>
       		
        </div>
           </form>
            
		<?php
		
		     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['f_register'])) {
		         $farmerReg = $fmr->farmerRegistration($_POST);
		    }
		?>

    	<div class="register_account">
	    	<?php 
	    	
	    		if (isset($farmerReg)) {
	    			echo $farmerReg;
	    		}
	    	?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
			    <table>
				   	<tbody>
						<tr class="ftable">
							<td>
								<div>
								    <input type="text" name="name" placeholder="Name" />
								</div>
								<div>
									<input type="text" name="address" placeholder="Address" />
								</div>		        					
					            <div>
					                <input type="text" name="phone" placeholder="Phone" />
					            </div>  
								<div>
									<input type="text" name="password" placeholder="Password" />
								</div>
					    	</td>
					    </tr> 
				    </tbody>
			    </table> 
					   <div class="search"><div><button class="grey" name="f_register">Create Account</button></div>
					   </div>
					   
					    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'inc/footer.php';?>