<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?= $this->fetch('title') ?></title>


	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>



	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">


	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


	<style>


	</style>

</head>
<body>
<!--     <?= $this->fetch('content') ?>

    <p style='font-family:Moon;'>I am so working girl!</p>

    <img src="cid:12345"> -->



    <main class='container_14' style='max-width:800px;'>

    	<div class='receipt-wrap' ng-init='total=0;'>

    		<div class='header-receipt' style='background: #111;height:40px;'>

    			<img src='/front/public/img/logo-white.png' style='width:160px;position: relative;
    			top:4px;margin-left: 3%;' />


    		</div>
    	</div>


    	<div style='height:740px;margin: 0 auto;position: relative;top:10px;'>

    		<div style='height:200px;overflow: hidden;background:#333;'>

    			<img src='/front/public/img/wires.jpg' style='width:100%;height:500px;position: relative;top:-110px;opacity: 1;'>
    		</div>

    		<div style='height:420px;position: relative;top:80px;'>
    			<div>
    				<p style='font-family: Moon;font-size: 18px;font-weight: bold;'>TO OUR VALUED CUSTOMER,</p>
    				<p style='position:relative;top:10px;font-family: Coves;font-size:14px;width:70%;'>Thank you for placing your order to Fashionology PH! You order now was being processed by the system administrator. You may want to see if your order was send or not under "Track My Order" section. If you have any questions regarding our service. Please feel free to send us a message.</p>

    			</div>

    			<div style='position: relative;top:40px;'>
    				<p style='font-family: Coves;font-size:16px;color:#333;'><b>To confirm your orders:</b></p>
    				<a href='fashionologyph.com'><p>http://fashionologyph.com/confirm?orders=12</p></a>

    				<p style='font-family: Coves;font-size:16px;position: relative;top:20px;color:#333;'><b>To cancel your orders:</b></p>
    				<a href='fashionologyph.com' style='position: relative;top:18px;'><p>http://fashionologyph.com/confirm?orders=12</p></a>
    			</div>

    			<div style='position: relative;top:104px;height:120px;'>
    				<a style='font-family:Coves;font-size:16px;color:#111;border:2px solid;
    				padding: 10px 20px;font-weight:bold;'>Visit the Store</a>
    			</div>


    			<div style='position: relative;top:80px;'>
    				<p style='font-family:Coves;font-size:18px;font-weight: bold;'>Other sites we have:</p>

    				<p style='word-spacing: 14px;'><a href='facebook.com'>Facebook</a> <a href='instagram.com'>Instagram</a> <a href='twitter.comm'>Twitter</a> <a href='gmail.com'>Gmail</a></p>

    			</div>
    		</div>

    	</div>


    </main>




</body>
</html>
