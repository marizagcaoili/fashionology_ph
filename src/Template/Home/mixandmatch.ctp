<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fashionology PH</title>


	
	<?php include LAYOUT_DIR . 'front-css.ctp'; ?>


	<?php include LAYOUT_DIR . 'front-script.ctp'; ?>


	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootswatch/2.3.1/spruce/bootstrap.min.css">
	<style>



	</style>

	<link rel="stylesheet" href="/front/public/css/mixandmatch.css" />
	<script>
		$(document).ready(function(){
			$('.loadingFade').fadeIn('slow')

		});


	</script>
	
</head>
<body ng-app="SampleApp" ng-controller='MixnMatchController' >





	<main class='container_14' >


		<div class='mixnmatch-wrap' >

			<div class='mixnmatch-flex'>

				<div class='mixnmatch-a'  id="droppable">


					<div class='mixnm-canvass' >


						<div class='top'>
							<img src='{{top}}' width='100%' height="100%">
						</div>

						<div class='bottom'>
							<img src='{{bottom}}' width='100%' height="100%">
					
						</div>
						<div class='footwear'>
							<img src='{{footwear}}' width='100%' height="100%">
					
						</div>


						<div class='accessories'>
							<img src='{{accessory}}' width='100%' height="100%">
					

						</div>



						<div>
							<button style='top:550px;margin-right:10px;border:1px solid;position: relative;float:right;
							padding:10px 28px;font-family: Moon;font-weight: bold;background: #333;
							color:#fff;' ng-click='ourStore()'>BACK TO STORE</button>

							<img src='/front/public/img/logo-black.png' width='240px;' style='position: relative;top:0px;opacity: 0.3;'>


							<div style='height:144px;width:40%;position: relative;top:400px;left:14px;opacity: 0.9;'>
								<p style='font-family: Moon;font-size: 30px;font-weight: bold;'>LEGEND:</p>
								<p style='position:relative;left:4px;font-family: Moon;font-size:18px;'><b>T</b> - TOP</p>
								<p style='position:relative;left:4px;font-family: Moon;font-size:18px;'><b>B</b> - BOTTOM</p>
								<p style='position:relative;left:4px;font-family: Moon;font-size:18px;'><b>A</b> - Accessories</p>
								<p style='position:relative;left:4px;font-family: Moon;font-size:18px;'><b>F</b> - FOOTWEAR</p>
							</div>
						</div>



					</div>

				</div>


				<div class='mixnmatch-b'>




					<div class='mixnmb-content' >



						<div class='mixnmb-body'>

							<div class='mixnmb-items'>
								<div class='btn-gback'>
									<select style='margin:0 auto;width:100%;font-family: Moon;font-size: 18px;border-radius: 0px;'>
										<option>CATEGORIZED BY (Parent)</option>

									</select>
									<select style='margin:0 auto;margin-top:6px;width:100%;font-family: Moon;font-size: 18px;border-radius: 0px;'>
										<option>CATEGORIZED BY (Child)</option>

									</select>

								</div>
								<ul style='paddin:0;margin:0;width: 100%;'>
									<li ng-repeat='item in items' style='margin:0;'>
										<div class="drag-object">

											<img src='{{item.image.file_key}}' height='310px'/>

											<div class='action_drag'>
												<ul>
													<li><button ng-click = "toTop(item.image.file_key)" class='choice-a'>T</button></li>
													<li><button  ng-click = "toBottom(item.image.file_key)" class='choice-a'>B</button></li>
													<li><button ng-click = "toAccessory(item.image.file_key)" class='choice-a'>A</button></li>
													<li><button ng-click = "toFootwear(item.image.file_key)" class='choice-a'>F</button></li>
												</ul>
											</div>

										</div>
									</li>

								</ul>


							</div>

							<ul >

							</ul>

						</div>

					</div>

				</div>

			</div>
<!-- 
			<div class=''>
				<button class='btn-save'>SAVE</button>
			</div> -->


		</div>

	</main>




	<!-- <div class="container" ng-controller="MainCtrl">

		<div class="row">
			<h1>ngDraggable Clone Example</h1>
		</div>


		<div class="drag-object" ng-repeat="obj in draggableObjects" ng-if="obj.allowClone !== false">
			{{obj.name}}
			<div ng-drag="true" ng-drag-data="obj"></div>
		</div>

		<div class="drag-object"  style="background-color: transparent; overflow: visible">
			<div ng-drag="true" class="drag-object" ng-drag-data="draggableObjects[3]">{{draggableObjects[3].name}}</div>
		</div>
		<hr/>
		<div ng-drop="true" ng-drop-success="onDropComplete1($data,$event)">
			<span class="title">Drop area #1</span>

			<div ng-repeat="obj in droppedObjects1" ng-drag="true" ng-drag-data="obj" ng-drag-success="onDragSuccess1($data,$event)">
				{{obj.name}}
			</div>

		</div>
		<hr>
	</div>
-->

	<!-- <div ng-drag-clone="">
		{{clonedData.name}}
	</div>

	<footer style="margin-top:2000px;">footer</footer>
-->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script>
<script src="/front/angular/ngDraggable.js"></script>
<script src='/front/angular/dragdrop.js'></script>

</body>




</html>