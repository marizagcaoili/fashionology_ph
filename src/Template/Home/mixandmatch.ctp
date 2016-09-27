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
			$('.mixnmb-items').hide();
			$('.loadingFade').fadeIn('slow')

		});


	</script>
	
</head>
<body ng-app="ExampleApp" >





	<main class='container_14' ng-controller='MainCtrl'>


		<div class='mixnmatch-wrap' >

			<div class='mixnmatch-flex'>

				<div class='mixnmatch-a'  id="droppable">


					<div class='mixnm-canvass'  ng-drop="true" ng-drop-success="onDropComplete1($data,$event)">


					<div>
						<button style='top:550px;margin-right:10px;border:1px solid;position: relative;float:right;
						padding:10px 28px;font-family: Moon;font-weight: bold;background: #333;
						color:#fff;' ng-click='ourStore()'>BACK TO STORE</button>

						<img src='/front/public/img/logo-black.png' width='240px;' style='position: relative;top:0px;opacity: 0.3;'>
					</div>

<!-- 
						<div class='mixnm-canvass-flex' >
							<div class='top-canvass' style='border:1px solid;' ng-repeat="obj in droppedObjects1" ng-drag="true"ng-drag-data="obj" ng-drag-success="onDragSuccess1($data,$event)">
								<img width='750px;' src='{{obj.image.file_key}}' />

							</div>

							<div class='top-canvass' style='border:1px solid;' ng-repeat="obj in droppedObjects1" ng-drag="true"ng-drag-data="obj" ng-drag-success="onDragSuccess1($data,$event)">
								<img width='750px;' src='{{obj.image.file_key}}' />

							</div>

						</div>


						<div class='mixnm-canvass-flex' style='position:relative;top:-4px;' >
							<div class='top-canvass' style='border:1px solid;'>
							</div>

							<div class='top-canvass' style='border:1px solid;'>
							</div>

						</div>




					-->

					<div ng-repeat="obj in droppedObjects1" ng-drag="true"ng-drag-data="obj" ng-drag-success="onDragSuccess1($data,$event)">
						<img width='1000px;' src='{{obj.image.file_key}}' />
					</div>


				</div>

			</div>


			<div class='mixnmatch-b'>




				<div class='mixnmb-content' >



					<div class='mixnmb-body'>

						<div class='mixnmb-items'>
							<ul>
								<li >
									<div class="drag-object" ng-repeat="obj in draggableObjects">

										<img src='{{obj.image.file_key}}' width='250px' height='250px'/>

										<div ng-drag="true" ng-drag-data="obj"></div>

									</div>
								</li>

							</ul>

							<div class='btn-gback'>

								<button class='back-to' ng-click='categBack()'><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Category</button>

							</div>
						</div>

						<ul >
							<li ng-click='showCategory()'><div class='each-category'>
								<p>TOPS</p>
								<figure>
									<img src='/front/public/img/top.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>PANTS</p>
								<figure>
									<img src='/front/public/img/pants.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>DRESSES</p>
								<figure>
									<img src='/front/public/img/dresses.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>SKIRTS</p>
								<figure>
									<img src='/front/public/img/skirts.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>JEANS</p>
								<figure>
									<img src='/front/public/img/jeans.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>SHORTS</p>
								<figure>
									<img src='/front/public/img/shorts.jpg'>
								</figure>
							</div></li>

							<li ng-click='showCategory()'><div class='each-category'>
								<p>JUMPSUITS</p>
								<figure>
									<img src='/front/public/img/suit.jpg'>
								</figure>
							</div></li>
							<li ng-click='showCategory()'><div class='each-category'>
								<p>JACKETS</p>
								<figure>
									<img src='/front/public/img/jacket.jpg'>
								</figure>
							</div></li>



						</ul>

					</div>




					<div ng-drag-clone="">
						{{clonedData.item_name}}
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