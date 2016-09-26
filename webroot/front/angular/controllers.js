


var app=angular.module('SampleApp.controllers', ['ngRoute', 'ngCookies']);





app.config(function($locationProvider){
	$locationProvider.html5Mode(true);
});


app.directive('ngElevateZoom', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			element.attr('data-zoom-image',attrs.zoomImage);
			$(element).elevateZoom();
		}
	};
});

app.filter('startFrom', function() {
	return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});

app.controller('ClothingController', function($timeout, $location, $scope,$http, $cookies, $cookieStore){


	$scope.f_account_id=$cookies.get('f_account_id');

	if($scope.f_account_id!=null){
		$('.signmeup').hide();
		$('.logmein').hide();

		$('.userHi').show();
		$('.getLog').show();
	}

	if($scope.f_account_id==null){

		$('.signmeup').show();
		$('.logmein').show();

		$('.userHi').hide();
		$('.getLog').hide();
	}



	var ClothingController ={};

	ClothingController.init = function(){
		ClothingController.getId();
	}

	ClothingController.getId= function(){
		$scope.category_id=$location.search().category_id;
		$scope.brand_id = $location.search().brand_id;
		if(($scope.category_id==undefined) && ($scope.brand_id==undefined))
		{
			ClothingController.items();
		}
		else if ($scope.category_id !=undefined)
		{
			ClothingController.getChildCategories($scope.category_id);
		}
		else
		{
			console.log($scope.brand_id);
			ClothingController.getItemsByBrand($scope.brand_id);
		}

	}

	ClothingController.getItemsByBrand = function(brand_id){
		$http.get("/admin/catalog/items_by_brand",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { brand_id : brand_id }
		}).then(function(response) {
			$timeout(function () {
				$scope.currentPage = 0;
				$scope.items=response.data;
				$scope.pageSize = 12;
				$scope.pagedItems = [];


				$scope.numberOfPages=function(){
					return Math.ceil($scope.items.length/$scope.pageSize);                
				}

				$scope.pages=$scope.items.length;
			});
		});	 
	};

	ClothingController.getChildCategories = function(category_id){
		$scope.childs = [];
		$http.get("/admin/catalog/second_category",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { parent_id : category_id }
		}).then(function(response) {
			$timeout(function () {
				$scope.categories = response.data;
				for (var i = $scope.categories.length - 1; i >= 0; i--) {

					$scope.childs[i]=$scope.categories[i].category_id;
				}
				var json = JSON.stringify($scope.childs);
				console.log($scope.childs);
				$http.get("/admin/catalog/items_by_category",
				{
					params : { categories : json}
				})
				.then(function(response) {
					console.log(response.data);
					$scope.currentPage = 0;
					$scope.items=response.data;
					$scope.pageSize = 12;
					$scope.pagedItems = [];


					$scope.numberOfPages=function(){
						return Math.ceil($scope.items.length/$scope.pageSize);                

					}

					$scope.pages=$scope.items.length;
				});

			});
		});
	}


	ClothingController.items = function(){
		$scope.f_account_id=$cookies.get('f_account_id');

		if($scope.f_account_id>1){
			$('#userDetails').show();
			$('.logmein').hide();
			$('.myaccount').hide();
		}

		if($scope.f_account_id<1){
			$('#userDetails').hide();
			$('.logmein').show();
		}

		$http.get("/admin/catalog/get_items")
		.then(function(response) {
			$scope.currentPage = 0;
			$scope.items=response.data;
			$scope.pageSize = 12;
			$scope.pagedItems = [];


			$scope.numberOfPages=function(){
				return Math.ceil($scope.items.length/$scope.pageSize);                

			}

			$scope.pages=$scope.items.length;


		});
	}

	ClothingController.init();


	$scope.addtowish=function($event,item_id){


		var user_id=$scope.userId=$cookies.get('f_account_id');

		if(user_id>1)
		{

			if($($event.target).attr('class') == 'fa fa-heart-o') {
	 		// API CALL to save wish list
	 		$($event.target).attr('class', 'fa fa-heart');	

	 		$scope.userId=$cookies.get('f_account_id');


	 		$http({
	 			url:'/add/Wishlist',
	 			method:'POST',
	 			headers:{'Content-Type':'application/x-www-form-urlencoded'},
	 			transformRequest: function(obj) {
	 				var str = [];
	 				for(var p in obj)
	 					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	 				return str.join("&");
	 			},
	 			data:{account_id:$scope.userId,item_id:item_id}
	 		}).then(function(response){
	 			console.log(response.data);
	 		})

	 	} else {
	 		// API CALL to remove from wish list
	 		$($event.target).attr('class', 'fa fa-heart-o');	
	 	}


	 }else{
	 	
	 	alert('Login First!');
	 }

	}

	$scope.addItem = function(item_id) {

		// Check if Cart Cookie exists
		if ($cookies.get('cart_items') !== undefined && $cookies.get('cart_items_quantity') !== undefined ) {
			// Get and Convert Cookie to Object
			cart = JSON.parse($cookies.get('cart_items'));
			cart_qty = JSON.parse($cookies.get('cart_items_quantity'));


			// Check if item_id not exists
			if(cart.indexOf(item_id) == -1) {
				cart.push(item_id);
				cart_qty.push(1);
			}

			// Save to Cookie
			$cookies.put('cart_items', JSON.stringify(cart));
			$cookies.put('cart_items_quantity', JSON.stringify(cart_qty));
		} else {
			// Cookie Template
			var cart = [item_id];
			var cart_qty = [1];

			// Save and covert cookie to string
			$cookies.put('cart_items', JSON.stringify(cart));
			$cookies.put('cart_items_quantity', JSON.stringify(cart_qty));
		}

		$scope.cart_items = JSON.parse($cookies.get('cart_items'));
		$scope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));

		// Update cart
		$scope.cart_items_count = cart.length;

		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($scope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.item = items;
		});


		console.log(JSON.parse($cookies.get('cart_items')));


	};




});




app.controller('accountController',function($scope,$http){


	var user={};

	user.init=function(){

	};

	user.add=function(username,email,password,birthday,gender,fname,lname,address,city,state,postal){
		$http({
			url:'/api/register',
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{account_username:username,account_email:email,account_password:password,account_birthday:birthday,account_gender:gender,
				account_fname:fname,account_lname:lname}
			})
		.then(function(response){

			$scope.account_id = response.data;

			$http({
				url:'/api/address',
				method:'POST',
				headers:{'Content-Type':'application/x-www-form-urlencoded'},
				transformRequest: function(obj) {
					var str = [];
					for(var p in obj)
						str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
					return str.join("&");
				},
				data:{account_id:$scope.account_id,account_fname:fname,account_lname:lname,account_address:address,account_city:city,account_zipcode:postal}
			}).then(function(response){
				console.log(response.data);
			})



		});
	};


	$scope.add=function(){
		var username=$('#username').val(),
		email=$('#email').val(),
		password=$('#password').val(),
		birthday=$('#birthday').val(),
		gender=$('#gender').val(),
		fname=$('#fname').val(),
		lname=$('#lname').val(),
		address=$('#address').val(),
		city=$('#city').val(),
		state=$('#state').val(),
		postal=$('#postal').val()
		
		user.add(username,email,password,birthday,gender,
			fname,lname,address,city,state,postal);
	};

});

app.controller('LoginController',function($scope,$http,$cookies,$cookieStore){

	

	
	$scope.f_account_id=$cookies.get('f_account_id');

	// if($scope.f_account_id!=null){
	// 	$('.signmeup').hide();
	// 	$('.logmein').hide();

	// 	$('.userHi').show();
	// 	$('.getLog').show();
		
	// 	$('.welcome-user').show();
	// }

	// if($scope.f_account_id==null){

	// 	$('.signmeup').show();
	// 	$('.logmein').show();

	// 	$('.userHi').hide();
	// 	$('.getLog').hide();

	// 	alert('sdfsd');

	// }


	// if($scope.f_account_id<1){
	// 	// $('#userDetails').hide();
	// 	// // $('.logmein').show();


	// }



	$scope.updateData=function(){
		var fname=$('#fname').val(),
		lname=$('#lname').val(),
		contact=$('#contact').val(),
		landmark=$('#landmark').val(),
		city=$('#city').val(),
		postal=$('#postal').val(),
		address=$('#address').val();

	}

	$scope.register=function(){
		window.location='/register';
	}

	$scope.login=function(){



				location.reload();
		$scope.username=$('#username').val();
		$scope.password=$('#password').val();

		$http({
			url: "/user/login/details",
			method: "GET",
			params : { username : $scope.username , password: $scope.password }

		}).then(function(response)
		{


			if(response.data.status)
			{


				$cookies.put('f_token',response.data.f_token);
				$cookies.put('f_account_id',response.data.f_account_id);

				$http.get("authentication/")
				.then(function(response) {

					var f_token=$cookies.get('f_token'),
					f_account_id=$cookies.get('f_account_id');

					$http({
						url : "authentication/",
						method: "POST",
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						transformRequest: function(obj) {
							var str = [];
							for(var p in obj)
								str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
							return str.join("&");
						},
						data : 	{f_token:f_token,f_account_id:f_account_id} // Data to be passed to API
					}
					)


				});


			}
			else{
				window.alert("Incorrect username and password!");
			}
		});

	}





	// $scope.f_account_id=$cookies.get('f_account_id');

	// if($scope.f_account_id>1){
	// 	$('#userDetails').show();
	// 	$('.signin').hide();

	// 	$('.signup').hide();
	// 	$('.myaccount').show();

	// }else{
	// 	$('.signin').show();
	// 	$('#userDetails').hide();
	
	// 	$('.signup').show();
	// 	$('.myaccount').hide();


	// }

	$scope.seca=function(){
		$('.sec-a').collapse('hide');
		$('.notespan').slideUp('slow');
	}

	

});

app.controller('testController', function($scope, $http, $cookies, $cookieStore) {

				$scope.removeCart=function(item_id,cart_items_quantity){


					var cartQuantity = JSON.parse($cookies.get('cart_items_quantity')),
					cartItems=JSON.parse($cookies.get('cart_items'));

					var index=cartItems.indexOf(item_id);


					if(index>-1 ){

						cartQuantity.splice(index,1);
						cartItems.splice(index,1);

						$cookies.put('cart_items_quantity', JSON.stringify(cartQuantity));		
						$cookies.put('cart_items', JSON.stringify(cartItems));		


						$http.get("/api/viewToCart")
						.then(function(response) {
							var items = [];
							angular.forEach($scope.cart_items, function(item){
								angular.forEach(response.data, function(data){
									if(item == data.item_id) {
										items.push(data);
									}
								});
							});

							$scope.item = items;
						});


					}

				}

	$scope.f_account_id=$cookies.get('f_account_id');

	if($scope.f_account_id!=null){
		$('.signmeup').hide();
		$('.logmein').hide();

		$('.userHi').show();
		$('.getLog').show();

		$('.welcome-user').show();

	}

	if($scope.f_account_id==null){

		// $('userDetails').show();

		$('.signmeup').show();
		$('.logmein').show();

		$('.userHi').hide();
		$('.getLog').hide();

	}

	// // if($scope.f_account_id>1){
	// // 	// $('#userDetails').show();
	// // 	// $('.logmein').hide();
	// // 	// $('.myaccount').hide();
	// // 	alert('as')
	// // }

	// if($scope.f_account_id<1){
	// 	$('.signmeup').hide()
	// }

	// alert('asdsad');





	$scope.inquiry=function(){

		$('.status-sent').fadeIn();
		$('.contact-forms').fadeOut();

		var name=$('#name').val(),
		contact=$('#contact').val(),
		email=$('#email').val(),
		subject=$('#subject').val(),
		message=$('#message').val();


		$http({
			url : "/index/inquiry",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
						data : 	{name:name,contact:contact,email:email,subject:subject,message:message} // Data to be passed to API
					})


	}

	$scope.emailInquiry=function(){

		var email=$('#email').val();

		$http({
			url : "/email/inquiry",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
						data : 	{email_address:email} // Data to be passed to API
					})

		

	}



	$scope.sendEmail=function(){
		var email=$('#email').val();

		$http({

			url : "/order/email/send",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
						data : 	{email_address:email} // Data to be passed to API
					})

	}



	$scope.setSchedule=function(){
		var hours=$('#hours').val(),
		minutes=$('#minutes').val(),
		format=$('#format').val();



		$scope.timeValue=hours+minutes+format;

		$cookies.put('time_of_pickup', JSON.stringify($scope.timeValue));
		$cookies.put('method_payment', 'Pick Up');


	}
	$scope.setDelivery=function(){
		var date=$('#setDate').val();

		$cookies.put('delivery_status','pending');
		$cookies.put('method_payment', 'Delivery');
		
	}



	$scope.ItemsReveal=function(){
		$('.mixnmb-items').show();
	}

	$scope.delivery=function(account_fname){
		$('.sec-b').collapse('hide');
		$('.sec-c').collapse('show');
	};


	$scope.account_id=$cookies.get('f_account_id');

	$scope.dashboard=function(){
		location.href='/user/dashboard';
	}

	if($scope.account_id>1){
		$('.logmein').hide();
		$('.account-control').show();
		$('.sign-up').hide();
		$('.wishlist').show();
		

		$http({

			url : "/user/information/",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
						data : 	{f_account_id:$cookies.get('f_account_id')} // Data to be passed to API
					}
					).then(function(response){
						$scope.userInfos=response.data[0];
					})

					$('.account-control').hide();
					$('.logmein').show();
				}else{


				}



				if($scope.account_id>1){

					$http({

						url : "/user/information/",
						method: "POST",
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						transformRequest: function(obj) {
							var str = [];
							for(var p in obj)
								str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
							return str.join("&");
						},
						data : 	{f_account_id:$cookies.get('f_account_id')} // Data to be passed to API
					}
					).then(function(response){
						$scope.welcomeUser=(response.data);
					});


				}


				$http({

					url : "/authentication",
					method: "POST",
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					transformRequest: function(obj) {
						var str = [];
						for(var p in obj)
							str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
						return str.join("&");
					},
						data : 	{f_token:$cookies.get('f_token'),f_account_id:$cookies.get('f_account_id')} // Data to be passed to API
					}
					).then(function(response){

						console.log(response.data);						

					})

					$scope.branch=$cookies.get('branch_id');


					$scope.nextStep=function(){
						window.location='/checkout/process';

					}


					$scope.backToStore=function(){
						window.location='/';

					}



					var Summary={};
					var item_ids = [];

					Summary.init=function(){

						Summary.info();




					}



					Summary.info=function(){

						$scope.reference=Math.floor((Math.random() * 10000000) + 10000000);

						$scope.userId=$cookies.get('f_account_id');
						$scope.PaymentMethod=$cookies.get('method_payment');

						if($scope.PaymentMethod=='Delivery'){

							$('#pickup').hide();
						}

						if($scope.PaymentMethod=='Pick Up'){
							$('#delivery').hide();

						}

						$scope.dateDeliver=$cookies.get('delivery_status');
						$scope.timePick=$cookies.get('time_of_pickup');


						if($scope.userId>1)

						{

							$scope.reference=Math.floor((Math.random() * 10000000) + 10000000);


						}


					}	

					Summary.init();

					$http.get('/api/branch')
					.then(function(response) {
						$scope.branches=response.data;
					});


					$scope.orderNow=function(total,shipping_id){


						for (var i = $scope.item.length - 1; i >= 0; i--) {
							item_ids[i] = $scope.item[i].item_id;
						}

						$scope.userId=$cookies.get('f_account_id');

						$scope.shipping_id=shipping_id;
						$scope.item_id=item_ids;

						$scope.PaymentMethod=$cookies.get('method_payment');

						console.log($scope.cart_items_quantity);

						$http({
							url : "/api/placeorder",
							method: "POST",
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							transformRequest: function(obj) {
								var str = [];
								for(var p in obj)
									str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
								return str.join("&");
							},
							data : 	{
					  grandtotal:$scope.total,shipping_id:$scope.shipping_id,item_id:$scope.item_id,order_payment_method:$scope.PaymentMethod,account_id:$scope.userId,order_reference_number: $scope.reference} // Data to be passed to API
					}
					).then(function(response){


						$scope.order_id = response.data;
						$scope.userId=$cookies.get('f_account_id');

						$scope.PaymentMethod=$cookies.get('method_payment');

						$scope.statusDeliver=$cookies.get('delivery_status');
						$scope.timePick=$cookies.get('time_of_pickup');

						/*delivery method***/


						if($scope.PaymentMethod=='Delivery'){


							$http({
								url : "/order/process/delivery",
								method: "POST",
								headers: {'Content-Type': 'application/x-www-form-urlencoded'},
								transformRequest: function(obj) {
									var str = [];
									for(var p in obj)
										str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
									return str.join("&");
								},
				data : 	{account_id:$scope.userId,order_id:$scope.order_id,delivery_status:$scope.statusDeliver} // Data to be passed to API
			})




						}

						/**pick up method**/

						if($scope.PaymentMethod=='Pick Up'){


							$http({
								url : "/order/process/pickup",
								method: "POST",
								headers: {'Content-Type': 'application/x-www-form-urlencoded'},
								transformRequest: function(obj) {
									var str = [];
									for(var p in obj)
										str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
									return str.join("&");
								},
				data : 	{account_id:$scope.userId,order_id:$scope.order_id,pickup_time:$scope.timePick} // Data to be passed to API
			}).then(function(response){
				console.log(response.data);
			})








		}

		$scope.order_id = response.data;
		for (var i = $scope.item.length - 1; i >= 0; i--) {
			var item_id = $scope.item[i].item_id;
			var item_quantity = $scope.cart_items_quantity[i];
			$http({
				url : "/order/add_ordered_item",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				transformRequest: function(obj) {
					var str = [];
					for(var p in obj)
						str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
					return str.join("&");
				},
				data : 	{item_id : item_id, quantity : item_quantity , order_id : $scope.order_id,order_reference_number: $scope.reference} // Data to be passed to API
			});

		}
	});



				}

				$scope.deliverySave=function(account_fname,account_lname,account_contact,account_landmark,account_city,account_postal,account_address){

					$('.sec-b').collapse('hide')
					$('.sec-c').collapse('show')


					$scope.fname=account_fname;
					$scope.lname=account_lname;
					$scope.contact=account_contact;
					$scope.landmark=account_landmark;
					$scope.city=account_city;
					$scope.postal=account_postal;
					$scope.address=account_address;


					$cookies.put('account_fname', JSON.stringify($scope.fname));
					$cookies.put('account_lname', JSON.stringify($scope.lname));
					$cookies.put('account_contact', JSON.stringify($scope.contact));
					$cookies.put('account_landmark', JSON.stringify($scope.landmark));
					$cookies.put('account_city', JSON.stringify($scope.city));
					$cookies.put('account_postal', JSON.stringify($scope.postal));
					$cookies.put('account_address', JSON.stringify($scope.address));


				}

				$scope.branchSelect=function(branch_id){


					$scope.branch_id=branch_id;
					console.log(branch_id);

					$cookies.put('branch_id', JSON.stringify($scope.branch_id));
					$cookies.put('payment_method', 'Pick Up');


					// $('#branchSelect').modal('toggle');


				}






				$scope.qtyminus=function(item_id){


					console.log(item_id);
					var txtVal=$('.quantity').val();
				//set
				var txtminus=(txtVal*1)-1;

				$('.quantity').val((txtVal*1)-1);


				angular.forEach($scope.cart_items, function(value, key) {
					if(item_id===value){
						console.log(key);
						$scope.cart_items_quantity[key]=txtminus;
						$cookies.put('cart_items_quantity', JSON.stringify($scope.cart_items_quantity));

					}
				});


			}


			$scope.qtyplus=function(item_id){

				console.log(item_id);
				var txtVal=$('.quantity').val();
				//set
				var txtplus=(txtVal*1)+1;

				$('.quantity').val((txtVal*1)+1);


				angular.forEach($scope.cart_items, function(value, key) {
					if(item_id===value){
						$scope.cart_items_quantity[key]=txtplus;
						$cookies.put('cart_items_quantity', JSON.stringify($scope.cart_items_quantity));					}
					});


			}



	//vars

	$scope.clothing=function(){
		window.location='/clothing';
	}


	if ($cookies.get('cart_items') !== undefined && $cookies.get('cart_items_quantity') !== undefined) {
		$scope.cart_items = JSON.parse($cookies.get('cart_items'));
		$scope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));
		$scope.cart_items_count = $scope.cart_items.length;
	} else {
		$scope.cart_items_count = 0;
	}

// 	angular.forEach($scope.cart_items, function(value, key){
//      console.log(key + ': ' + value);
// });




	//product listings

	
	$http.get("/api/viewToCart")
	.then(function(response) {
		var items = [];
		angular.forEach($scope.cart_items, function(item){
			angular.forEach(response.data, function(data){
				if(item == data.item_id) {
					items.push(data);
				}
			});
		});

		$scope.item = items;

	});


	

	


	 //controllers for ngclick

	 $scope.checkout=function(){
	 	location.href="/checkout";
	 }

	 $scope.viewcart=function(){
	 	location.href="/cart";
	 }


	 /**wishlist controller**/
	 $scope.userId=$cookies.get('f_account_id');


	 if($scope.userId>1){

	 	$http({
	 		url:'/display/Wishlist',
	 		method:'POST',
	 		headers:{'Content-Type':'application/x-www-form-urlencoded'},
	 		transformRequest: function(obj) {
	 			var str = [];
	 			for(var p in obj)
	 				str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	 			return str.join("&");
	 		},
	 		data:{account_id:$scope.userId}
	 	}).then(function(response){

	 		console.log(response.data);

	 		$scope.wishlistItem=response.data;
	 	})

	 }








	 //controllers for placing an order
	 $scope.placeOrder=function(){
	 	$http({
	 		url:'/api/placeorder',
	 		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	 		transformRequest: function(obj) {
	 			var str = [];
	 			for(var p in obj)
	 				str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	 			return str.join("&");
	 		}

	 	})

	 	alert('Order Placed!');
	 }






	});


app.controller('ItemDetailsController',['$location','$scope','$http','$timeout', '$cookies',  function($location,$scope,$http,$timeout,$cookies) {


	var ItemDetail = {};


	ItemDetail.init = function() {
		// Init functions / source
		ItemDetail.parameter();
		ItemDetail.getReview();
	};

	ItemDetail.getReview=function(){


		$scope.itemId=$location.search().item_id;



		$http({
			url: "/product/review/view",
			method: "POST",
			data : { item_id :$scope.itemId }

		}).then(function(response){
			$scope.reviews=response.data;
		})
	}

	ItemDetail.parameter=function(){
		var item_id=$location.search().item_id;
		ItemDetail.getDetails(item_id);
	}

	ItemDetail.getDetails=function(item_id){
		$http.get('/clothing/fetchDetails',{
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			params: {item_id:item_id}
		}).then(function(response){
			$scope.details=response.data;
			$timeout(function () {
				$http({
					url: "/admin/catalog/get_item_stock_details",
					method: "GET",
					params: {item_id : item_id}
				}).then (function(response){
					$scope.item_stock_details = response.data;
					console.log(response.data);
				});
			});
		});
	};


//review
$scope.qtyminus=function(item_id){
	console.log(item_id);
	var txtVal=$('#quantity').val();
	if(txtVal == '0')
		{$('#minus').prop("disabled",true)}
	else{
		var txtminus=(txtVal*1)-1;

		$('.quantity').val((txtVal*1)-1);


		angular.forEach($scope.cart_items, function(value, key) {
			if(item_id===value){
				console.log(key);
				$scope.cart_items_quantity[key]=txtminus;
				$cookies.put('cart_items_quantity', JSON.stringify($scope.cart_items_quantity));

			}
		});
	}
}

$scope.getSizeId = function (quantity){
	console.log(quantity);
	$scope.stockQuantity = quantity;
	{$('#plus').prop("disabled",false)}
	$('.quantity').val('0');
}

$scope.qtyplus=function(item_id){
	var txtVal=$('.quantity').val();
	console.log(parseInt(txtVal));
	console.log($scope.stockQuantity);
	if (parseInt(txtVal) == $scope.stockQuantity)
	{
		{$('#plus').prop("disabled",true)}	
	}
	else{
		//set
		var txtplus=(txtVal*1)+1;

		$('.quantity').val((txtVal*1)+1);


		angular.forEach($scope.cart_items, function(value, key) {
			if(item_id===value){
				$scope.cart_items_quantity[key]=txtplus;
				$cookies.put('cart_items_quantity', JSON.stringify($scope.cart_items_quantity));					}
			});
	}
}


$scope.addItem = function(item_id) {

		// Check if Cart Cookie exists
		if ($cookies.get('cart_items') !== undefined && $cookies.get('cart_items_quantity') !== undefined ) {
			// Get and Convert Cookie to Object
			cart = JSON.parse($cookies.get('cart_items'));
			cart_qty = JSON.parse($cookies.get('cart_items_quantity'));


			// Check if item_id not exists
			if(cart.indexOf(item_id) == -1) {
				cart.push(item_id);
				cart_qty.push(1);
			}

			// Save to Cookie
			$cookies.put('cart_items', JSON.stringify(cart));
			$cookies.put('cart_items_quantity', JSON.stringify(cart_qty));
		} else {
			// Cookie Template
			var cart = [item_id];
			var cart_qty = [1];

			// Save and covert cookie to string
			$cookies.put('cart_items', JSON.stringify(cart));
			$cookies.put('cart_items_quantity', JSON.stringify(cart_qty));
		}

		$scope.cart_items = JSON.parse($cookies.get('cart_items'));
		$scope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));

		// Update cart
		$scope.cart_items_count = cart.length;

		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($scope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.item = items;
		});


		console.log(JSON.parse($cookies.get('cart_items')));


	}


	$scope.submitReview=function(){


		var title=$('#title').val(),
		message=$('#message').val(),
		item_id=$location.search().item_id;



		$http({
			url:'/product/review/insert',
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{title:title,message:message,item_id:item_id}
		}).then(function(response){
			$scope.itemId=$location.search().item_id;




			$http({
				url: "/product/review/view",
				method: "POST",
				data : { item_id :$scope.itemId }

			}).then(function(response){
				$scope.reviews=response.data;

			})


		});

// /product/review/view

}

ItemDetail.init();
	// scope Vars to view
	$scope.var = "";

	// scope function to view
	$scope.func = function(){

	};

}]);

app.controller('CategoryBrandController',function($scope,$http){

	var CategoryBrand = {};


	CategoryBrand.init = function() {
		CategoryBrand.parents();
		CategoryBrand.brands();
	};

	CategoryBrand.parents = function(){
		$http.get("/admin/catalog/get_parents")
		.then(function(response) {
			$scope.parents = response.data;
		});
	}

	CategoryBrand.brands = function(){
		$http.get("/admin/catalog/get_brands")
		.then(function(response) {
			$scope.brands = response.data;
		});
	}

	CategoryBrand.init();

});


