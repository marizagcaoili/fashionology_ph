<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
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

    		<div class='header-receipt' style='background: #111;height:60px;'>

    			<img src='cId:12345' style='width:160px;position: relative;
    			margin-top:10px;margin-left: 1.4%;' />


    		</div>
    	</div>


    	<div style='height:40px;margin: 0 auto;position: relative;top:10px;padding-left: 16px;'>

        Inquiry

    	</div>


    </main>




</body>
</html>
