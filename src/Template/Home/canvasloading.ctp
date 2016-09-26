<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">

	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>

	

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>


	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>

	<script>

	$(document).ready(function(){
		$('.divload').hide();
	})

	var nextTick=setTimeout(function(){

			$('.divload').show();

		},100);

	if(nextTick){

		setTimeout(function(){
			location.href='/mixmatch';
		},4000);

	}
	</script>

</head>

<body>

	<div style='max-width: 900px;height:100%;margin:0 auto;' class='divload'>

		<div style='position: relative;margin-top:320px;'>


			<div class="progress">
				<div class="indeterminate"></div>
			</div>

		</div>

		<div class='status-message'>
			<p  style='font-family: Moon;font-size: 20px;text-align: center;font-weight: bold;'>Generating Canvas...</p>
		</div>

	</div>
	
</body>
</html>