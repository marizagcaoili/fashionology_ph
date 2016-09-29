<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	
	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

<!-- 	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>

	<style>
	#mapid { height: 180px; }
	</style>
-->

</head>
<body>

<header class="masthead" id='sticker' style='display: none;'>
		<img src="/front/public/img/logo-black.png" class="logo" style='width:210px;'>
		<nav class="nav-a">
			<ul>
				<a style="color:#a8a8a8;" href="/">
					<li>home </li>
				</a>
				<a class='revealcategory' href='/clothing'>
					<li>clothing <i class="fa fa-angle-down category-show" aria-hidden="true"></i></li>
				</a>
				<a href="/load/canvas">
					<li>mix n match</li>
				</a>
				<a href="/locations">
					<li>locations</li>
				</a>
			</ul>
		</nav>
		<nav class="nav-b" >
			<ul>
				<?php include LAYOUT_DIR . 'user_actions_white.ctp'; ?>
				<a class='cart'href="/cart" style='color:#fff;'>
					<li><i class="fa fa-shopping-cart"  aria-hidden="true"></i></li>
				</a>
				<a class="count-cart" style="position:absolute;
				font-size:8px;
				padding: 4px 8px;
				border-radius:50%;
				background: #e74c3c;" ng-if='cart_items_count > 0'>
				<li>{{cart_items_count}}</li>
			</a>
		</ul>
	</nav>
</header>


<main class='container_14' style='border:1px solid;position: relative;margin-top:50px;'>

</main>

</body>
</html>