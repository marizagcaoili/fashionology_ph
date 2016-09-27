var app = angular.module('SampleApp.controllers', ['ngRoute', 'ngCookies'])


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
        if (input != undefined) {
        	return input.slice(start);	
        }
    }
});

// Initialize rootScope
angular.module('SampleApp').run(function($rootScope, $cookies, $cookieStore, $http) {
	var RootManager = {};

	RootManager.Init = function() {
		RootManager.SetCartInfo();
		RootManager.SetUserInfo();
		RootManager.SetAuthCookies();
	};

	RootManager.SetCartInfo = function() {
		// Check cart items
		if ($cookies.get('cart_items') !== undefined && $cookies.get('cart_items_quantity') !== undefined) {
			// Cookies already defined
			$rootScope.cart_items = JSON.parse($cookies.get('cart_items'));
			$rootScope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));
			$rootScope.cart_items_count = $rootScope.cart_items.length;
		} else {
			// Cookies were not yet defined
			$rootScope.cart_items_count = 0;
		}
	};

	RootManager.SetUserInfo = function() {
		$rootScope.f_account_id = $cookies.get('f_account_id');

		if ($rootScope.f_account_id > 0) {
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
				data : 	{f_account_id : $rootScope.f_account_id} // Data to be passed to API
			}).then(function(response){
				$rootScope.userInfos = response.data[0];
				$rootScope.user = response.data[0].account_fname;
			});
		}
	};

	RootManager.SetAuthCookies = function() {
		if ($cookies.get('f_token') != undefined && $cookies.get('f_account_id') != undefined) {
			$rootScope.authCookies = {f_token : $cookies.get('f_token'), f_account_id : $cookies.get('f_account_id')}
		}
	}

	// rootScope functions
	$rootScope.logout = function() {
		$cookies.remove('f_token');
		$cookies.remove('f_account_id');
		$cookies.remove('cart_items');
		$cookies.remove('cart_items_quantity');
		location.reload();
	}

	$rootScope.addAuthCookies = function(params) {
		if ($rootScope.authCookies != undefined) {
			params.f_token = $rootScope.authCookies.f_token;
			params.f_account_id = $rootScope.authCookies.f_account_id;	
		}

		return params;
	}

	RootManager.Init();
});

// -- START : HomeController -- //
app.controller('HomeController',function($scope, $http, $cookies, $cookieStore, $rootScope) {

	var HomeManager = {};

	HomeManager.Init = function() {
		HomeManager.GetFeaturedItems();
		HomeManager.GetNewItems();

		console.log($rootScope.cart_items_count);
	};

	HomeManager.GetFeaturedItems = function() {
		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { mode : "featured" }
		}).then(function(response) {
			$scope.featured_items = response.data;
		});
	};

	HomeManager.GetNewItems = function() {
		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { mode : "new" }
		}).then(function(response) {
			$scope.new_items = response.data;
		});
	};


	$scope.emailInquiry = function() {
		var email = $('#email').val();

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
		});
	}

	$scope.sendEmail = function() {
		var email = $('#email').val();

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
		});
	}

	$scope.inquiry = function() {
		$('.contact-content').fadeIn();
		$('.contact-forms').fadeOut();

		var name = $('#name').val(),
		contact  = $('#contact').val(),
		email    = $('#email').val(),
		subject  = $('#subject').val(),
		message  = $('#message').val();

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
			data : {name:name,contact:contact,email:email,subject:subject,message:message} // Data to be passed to API
		});
	}



	HomeManager.Init();
});
// -- END : HomeController -- //

// -- START : CartHomeController -- //
app.controller('CartController',function($scope, $http, $cookies, $cookieStore, $rootScope) {
	var CartManager = {};

	CartManager.Init = function() {
		$scope.total = 0;
		CartManager.LoadOrderedItems();
	}

	CartManager.LoadOrderedItems = function () {
		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.items = items;
		});
	}

	// Function scopes
	$scope.add_quantity = function(item_id, item_quantity, item_price) {
		if (item_quantity <= 99) {
			angular.forEach($rootScope.cart_items, function(value, key) {
				if (item_id === value) {
					$rootScope.cart_items_quantity[key] = (item_quantity * 1) + 1;
					$cookies.put('cart_items_quantity', JSON.stringify($rootScope.cart_items_quantity));
					$scope.total += item_price; 
				}
			});
		}
	}

	$scope.subtract_quantity = function(item_id, item_quantity, item_price){
		if (item_quantity > 1) {
			angular.forEach($rootScope.cart_items, function(value, key) {
				if (item_id === value) {
					$rootScope.cart_items_quantity[key] = (item_quantity * 1) - 1;
					$cookies.put('cart_items_quantity', JSON.stringify($rootScope.cart_items_quantity));
					$scope.total -= item_price;				
				}
			});
		}
	}

	$scope.removeCart = function(item_id, cart_items_quantity, item_price) {
		var cartQuantity = JSON.parse($cookies.get('cart_items_quantity')),
		cartItems = JSON.parse($cookies.get('cart_items'));

		var index = cartItems.indexOf(item_id);

		if (index >- 1) {
			cartQuantity.splice(index, 1);
			cartItems.splice(index, 1);

			$cookies.put('cart_items_quantity', JSON.stringify(cartQuantity));		
			$cookies.put('cart_items', JSON.stringify(cartItems));

			if (cartItems.length > 0) {
				$http.get("/api/viewToCart")
				.then(function(response) {
					var items = [];
					angular.forEach($rootScope.cart_items, function(item){
						angular.forEach(response.data, function(data){
							if(item == data.item_id) {
								items.push(data);
							}
						});
					});

					$scope.items = items;
					$scope.total -= cart_items_quantity * item_price;
				});
			} else {
				$scope.items = [];
				$scope.total = 0;
				$('.btn-secure').remove();
			}
			
			// Update root scopes
			$rootScope.cart_items_quantity = cartQuantity;
			$rootScope.cart_items = cartItems;
			$rootScope.cart_items_count = $rootScope.cart_items.length;	
		}
	}

	CartManager.Init();
});
// -- END : CartHomeController -- //

// -- START : CartHomeController -- //
app.controller('CheckoutController',function($scope, $http, $cookies, $cookieStore, $rootScope) {
	var CheckoutManager = {};

	CheckoutManager.Init = function() {
		CheckoutManager.LoadOrderedItems();
		CheckoutManager.PickupTime();
	}

	CheckoutManager.LoadOrderedItems = function () {
		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.items = items;
		});
	}

	CheckoutManager.PickupTime=function(){
		$scope.pickUpTime=$cookies.get('time_of_pickup');

		if($scope.pickUpTime==null){
			$scope.pickUpTime='Please select a time of pick up first';
		}
	}

	$rootScope.cart_items_count = $rootScope.cart_items.length;	

	$scope.removeCart = function(item_id, cart_items_quantity, item_price) {
		$rootScope.cart_items_count = $rootScope.cart_items.length;	

		var cartQuantity = JSON.parse($cookies.get('cart_items_quantity')),
		cartItems = JSON.parse($cookies.get('cart_items'));

		var index = cartItems.indexOf(item_id);

		if (index >- 1) {
			cartQuantity.splice(index, 1);
			cartItems.splice(index, 1);

			$cookies.put('cart_items_quantity', JSON.stringify(cartQuantity));		
			$cookies.put('cart_items', JSON.stringify(cartItems));

			if (cartItems.length > 0) {
				$http.get("/api/viewToCart")
				.then(function(response) {
					var items = [];
					angular.forEach($rootScope.cart_items, function(item){
						angular.forEach(response.data, function(data){
							if(item == data.item_id) {
								items.push(data);
							}
						});
					});

					$scope.items = items;
					$scope.total -= cart_items_quantity * item_price;
				});
			} else {
				$scope.items = [];
				$scope.total = 0;
				$('.btn-secure').remove();
			}
			
			// Update root scopes
			$rootScope.cart_items_quantity = cartQuantity;
			$rootScope.cart_items = cartItems;
			$rootScope.cart_items_count = $rootScope.cart_items.length;	
		}
	}

	$scope.updateData=function(shipping_id){
		var fname=$('#fname').val(),
		lname=$('#lname').val(),
		contact=$('#contact').val(),
		landmark=$('#landmark').val(),
		city=$('#city').val(),
		postal=$('#postal').val(),
		address=$('#address').val();


		$http({
			url:'/order/update/bill',
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{shipping_id:shipping_id,fname:fname,lname:lname,contact:contact,landmark:landmark,city:city,postal:postal,address:address}
		}).then(function(response){
			$scope.userInfos=$rootScope.userInfos;
		})




	}

	// Function scopes
	$scope.secD = function() {
		$scope.method = $cookies.get('method_payment');

		if ($scope.method == null) {
			alert('Please select payment method first!');
		} else if ($rootScope.cart_items == null) {
			alert('no item placed!');
		} else {
			$('.sec-c').collapse('hide');
		}
	}

	$scope.setSchedule = function() {
		var hours = $('#hours').val(),
		minutes = $('#minutes').val(),
		format = $('#format').val();

		$scope.timeValue = hours + minutes + format;

		$cookies.put('time_of_pickup', JSON.stringify($scope.timeValue));
		$cookies.put('method_payment', 'Pick Up');

		var payment=$cookies.get('method_payment');

		if(payment=='Pick Up'){
			$('#pickup').addClass('shadow');
			$('#cash').removeClass('shadow');

		}

		$scope.pickUpTime=$cookies.get('time_of_pickup');



	}

	$scope.setDelivery = function() {
		var timetocall = $('#timetoCall').val();

		$cookies.put('delivery_time',timetocall);
		$cookies.put('method_payment', 'Delivery');

		var payment=$cookies.get('method_payment');


		if(payment=='Delivery'){

			$('#cash').addClass('shadow');
			$('#pickup').removeClass('shadow');

		}
	}

	$scope.delivery = function(account_fname) {
		$('.sec-b').collapse('hide');
		$('.sec-c').collapse('show');
	};

	$scope.nextStep = function(){
		window.location='/checkout/process';
	}

	$scope.backToStore = function(){
		window.location='/';
	}

	CheckoutManager.Init();
});

// -- START : ClothingController  -- //
app.controller('ClothingController', function($timeout, $location, $scope,$http, $cookies, $cookieStore, $rootScope) {
	var ClothingController = {};

	ClothingController.init = function(){
		ClothingController.getId();
		ClothingController.getRecentItems();
		ClothingController.getGender();
		ClothingController.account();
	}

	ClothingController.account=function(){
		var account=$scope.itemId=$location.search().account_id;




		$http({
			url:'/user/account/confirmed',
			method:'POST',
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data:{account_id:account}
		}).then(function(response){
			console.log(response.data);
		})


		$scope.f_account_id=$cookies.get('f_account_id');





		if(account>0){

			$('.lognowin li').trigger('click');

		}

	}

	ClothingController.getGender=function(){

		var gender=$location.search().mode;

		if(gender=='men'){
			$('.women').hide();
		}else if(gender=='women'){
			$('.men').hide();
		}else{
			$('.women').hide();
		}


	}


	ClothingController.confirmation=function(){

		$scope.accountLink=$location.search().user_id;

	}


	ClothingController.getId = function(){
		$scope.category_id = $location.search().category_id;
		$scope.brand_id = $location.search().brand_id;
		$scope.gender = $location.search().mode;

		if (($scope.category_id == undefined) && ($scope.brand_id == undefined) && ($scope.gender == undefined)) {
			ClothingController.items();
		} else if ($scope.category_id !=undefined) {
			ClothingController.getChildCategories($scope.category_id);
		} else if ($scope.gender != undefined && ($scope.gender == 'men' || $scope.gender == 'women')) {
			ClothingController.getItemsByGender($scope.gender);
		} else {
			ClothingController.getItemsByBrand($scope.brand_id);
		}
	}

	ClothingController.getRecentItems = function() {
		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { mode : 'recent'}
		}).then(function(response) {
			$scope.recent_items = response.data;
		});	
	}

	ClothingController.getItemsByGender = function(gender) {
		var params = $rootScope.addAuthCookies({ mode : 'gender', gender : gender });

		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : params
		}).then(function(response) {
			$timeout(function () {
				$scope.currentPage = 0;
				$scope.items = response.data;
				$scope.pageSize = 12;
				$scope.pagedItems = [];

				$scope.numberOfPages = function(){
					return Math.ceil($scope.items.length / $scope.pageSize);                
				}

				$scope.pages = $scope.items.length;
			});
		});	
	};

	ClothingController.getItemsByBrand = function(brand_id){
		var params = $rootScope.addAuthCookies({ mode: 'brand', brand_id : brand_id });

		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : params
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

				var params = $rootScope.addAuthCookies({ category : json, mode : 'category' });

				$http.get("/admin/catalog/get_items",
				{
					params : params
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
		var params = $rootScope.addAuthCookies({});
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

		$http.get("/admin/catalog/get_items",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : params
		})
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




	$scope.addtowish = function($event,item_id) {
		var user_id = $scope.userId = $cookies.get('f_account_id');

		if (user_id>1) {
			if ($($event.target).attr('class') == 'fa fa-heart-o') {
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
		 		}).then(function(response){})
		 	} else {
		 		// API CALL to remove from wish list
		 		if($($event.target).attr('class', 'fa fa-heart-o')){



		 			var wishlist_id=item_id;

		 			// alert(wishlist_id);

		 			$http({
		 				url : "/action/wishlist/remove",
		 				method: "POST",
		 				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		 				transformRequest: function(obj) {
		 					var str = [];
		 					for(var p in obj)
		 						str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		 					return str.join("&");
		 				},
				data : 	{wishlist_id:wishlist_id} // Data to be passed to API
			})

		 		}	





		 	}
		 } else {
		 	$('.lognowin li').trigger('click');
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

		$rootScope.cart_items = JSON.parse($cookies.get('cart_items'));
		$rootScope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));

		// Update cart
		$rootScope.cart_items_count = cart.length;

		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.item = items;
		});
	};

	// Clothing init
	ClothingController.init();
});
// -- END : ClothingController -- //

// -- START : accountController -- //
app.controller('accountController',function($scope, $http, $rootScope){
	var user={};

	user.init=function(){};

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


			$('.register-wrap').fadeOut();
			$('.confirmation-link').fadeIn();


			$scope.account_id = response.data;


			$http({
				url:'/email/confirmation',
				method:'POST',
				headers:{'Content-Type':'application/x-www-form-urlencoded'},
				transformRequest: function(obj) {
					var str = [];
					for(var p in obj)
						str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
					return str.join("&");
				},
				data:{account_id:$scope.account_id,account_email:email}
			})



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
// -- END : accountController -- //

// -- START : LoginController -- //
app.controller('LoginController',function($scope,$http,$cookies,$cookieStore,$rootScope){
	$scope.f_account_id = $cookies.get('f_account_id');


	$scope.register = function(){
		window.location='/register';
	}

	$scope.login = function() {
		$scope.username = $('#username').val();
		$scope.password = $('#password').val();

		$http({
			url: "/user/login/details",
			method: "GET",
			params : { username : $scope.username , password: $scope.password }
		}).then(function(response) {
			
			if (response.data.status) {
				$cookies.put('f_token', response.data.f_token);
				$cookies.put('f_account_id', response.data.f_account_id);

				// Set global values
				$rootScope.f_account_id = $cookies.get('f_account_id');
				$rootScope.userInfos = response.data.user_info;
				$rootScope.user = response.data.user_info.account_fname;

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
					});

					location.reload();
				});
			} else {
				window.alert("Incorrect username and password!");
			}

		});
	}

	$scope.seca=function() {
		$('.sec-a').collapse('hide');
		$('.sec-b').collapse('show');
		$('.notespan').slideUp('slow');
	}
});
// -- END : LoginController -- //

// -- START : testController -- //
app.controller('testController', function($scope, $http, $cookies, $cookieStore, $rootScope) {
	
	

	$scope.ItemsReveal = function() {
		$('.mixnmb-items').show();
	}

	

	$scope.account_id = $cookies.get('f_account_id');

	$scope.dashboard = function() {
		location.href = '/user/dashboard';
	}

	if ($scope.account_id > 1) {
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
		}).then(function(response){
			$scope.userInfos=response.data[0];
		});

		$('.account-control').hide();
		$('.logmein').show();
	}

	if ($scope.account_id>1) {
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
			data : {f_account_id : $cookies.get('f_account_id')} // Data to be passed to API
		}).then(function(response) {
			$scope.welcomeUser = response.data;
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
		data : {f_token:$cookies.get('f_token'),f_account_id:$cookies.get('f_account_id')} // Data to be passed to API
	}).then(function(response){
		console.log(response.data);						
	});

	$scope.branch = $cookies.get('branch_id');

	

	

	var Summary = {};
	var item_ids = [];

	Summary.init = function() {
		Summary.info();
	}

	Summary.info = function() {
		$scope.reference = Math.floor((Math.random() * 10000000) + 10000000);

		$scope.userId = $cookies.get('f_account_id');
		$scope.PaymentMethod = $cookies.get('method_payment');

		if ($scope.PaymentMethod == 'Delivery') {
			$('#pickup').hide();
		}

		if ($scope.PaymentMethod == 'Pick Up') {
			$('#delivery').hide();
		}

		$scope.dateDeliver = $cookies.get('delivery_status');
		$scope.timePick = $cookies.get('time_of_pickup');

		if ($scope.userId > 1) {
			$scope.reference = Math.floor((Math.random() * 10000000) + 10000000);
		}
	}	

	Summary.init();


	$scope.deliverySave = function(account_fname,account_lname,account_contact,account_landmark,account_city,account_postal,account_address){
		$('.sec-b').collapse('hide')
		$('.sec-c').collapse('show')

		$scope.fname    = account_fname;
		$scope.lname    = account_lname;
		$scope.contact  = account_contact;
		$scope.landmark = account_landmark;
		$scope.city     = account_city;
		$scope.postal   = account_postal;
		$scope.address  = account_address;

		$cookies.put('account_fname', JSON.stringify($scope.fname));
		$cookies.put('account_lname', JSON.stringify($scope.lname));
		$cookies.put('account_contact', JSON.stringify($scope.contact));
		$cookies.put('account_landmark', JSON.stringify($scope.landmark));
		$cookies.put('account_city', JSON.stringify($scope.city));
		$cookies.put('account_postal', JSON.stringify($scope.postal));
		$cookies.put('account_address', JSON.stringify($scope.address));
	}

	$scope.branchSelect = function(branch_id) {
		$scope.branch_id = branch_id;
		console.log(branch_id);
		$cookies.put('branch_id', JSON.stringify($scope.branch_id));
		$cookies.put('payment_method', 'Pick Up');
	}

	$scope.clothing=function(){
		window.location='/clothing';
	}

	//controllers for ngclick

	$scope.checkout = function(){
		location.href = "/checkout";
	}

	$scope.viewcart = function(){
		location.href = "/cart";
	}

	/**wishlist controller**/

	 //controllers for placing an order
	 $scope.placeOrder = function() {
	 	$http({
	 		url:'/api/placeorder',
	 		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	 		transformRequest: function(obj) {
	 			var str = [];
	 			for(var p in obj)
	 				str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	 			return str.join("&");
	 		}
	 	});

	 	alert('Order Placed!');
	 }
	});
// -- END : testController -- //

// -- START : ItemDetailsController -- //
app.controller('ItemDetailsController',['$location','$scope','$http','$timeout', '$cookies','$rootScope',  function($location,$scope,$http,$timeout,$cookies,$rootScope) {

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
		var params = $rootScope.addAuthCookies({item_id:item_id});

		$http.get('/clothing/fetchDetails',{
			headers:{'Content-Type':'application/x-www-form-urlencoded'},
			params: params
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



	
	$scope.addtowish = function($event,item_id) {
		var user_id = $scope.userId = $cookies.get('f_account_id');

		if (user_id>1) {
			if ($($event.target).attr('class') == 'fa fa-heart-o') {
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
		 		}).then(function(response){})
		 	} else {
		 		// API CALL to remove from wish list
		 		$($event.target).attr('class', 'fa fa-heart-o');	
		 	}
		 } else {
		 	$('#loginModal').modal('toggle');
		 }
		}


	//review
	$scope.qtyminus=function(item_id){
		console.log(item_id);
		var txtVal=$('#quantity').val();
		if(txtVal == '0')
			{$('#minus').prop("disabled",true)}
		else{
			var txtminus=(txtVal*1)-1;

			$('.quantity').val((txtVal*1)-1);


			angular.forEach($rootScope.cart_items, function(value, key) {
				if(item_id===value){
					console.log(key);
					$rootScope.cart_items_quantity[key]=txtminus;
					$cookies.put('cart_items_quantity', JSON.stringify($rootScope.cart_items_quantity));

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


			angular.forEach($rootScope.cart_items, function(value, key) {
				if(item_id===value){
					$rootScope.cart_items_quantity[key]=txtplus;
					$cookies.put('cart_items_quantity', JSON.stringify($rootScope.cart_items_quantity));					}
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

		$rootScope.cart_items = JSON.parse($cookies.get('cart_items'));
		$rootScope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));

		// Update cart
		$rootScope.cart_items_count = cart.length;

		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
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

			});

		});
	// /product/review/view
}

ItemDetail.init();
	// scope Vars to view
	$scope.var = "";

	// scope function to view
	$scope.func = function(){};
}]);
// -- END : ItemDetailsController -- //

// -- START : CategoryBrandController -- //
app.controller('CategoryBrandController',function($scope,$http,$rootScope){
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
// -- END : CategoryBrandController -- //

// -- START : CategoryController -- //
app.controller('CategoryPrintController', function ($scope, $http){
	var CategoryPrint = {};
	$scope.parents = [];
	$scope.parents.categories = [];
	CategoryPrint.init = function(){
		$http.get("/admin/catalog/get_parents")
		.then(function(response) {
			$scope.parents = response.data;
			CategoryPrint.forLoop();
		});

	};

	CategoryPrint.forLoop = function(){
		console.log($scope.parents.length);
		var ind = $scope.parents.length - 1;
		for (var i = $scope.parents.length - 1; i >= 0; i--) {    		
			var parent_id = $scope.parents[i].category_id;

			$http.get("/admin/catalog/second_category",
			{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { parent_id : parent_id }
			}).then(function(response){
				$scope.parents[ind].categories = response.data;
				console.log($scope.parents[ind]	);
				ind --;
			});
		}
	};
	CategoryPrint.init();

});
// -- END : CategoryController //

// -- START : OrderSummaryController -- //
app.controller('OrderSummaryController', function ($scope, $http,$rootScope,$cookies){
	var OrderSummary = {};

	OrderSummary.init = function(){
		OrderSummary.loadAudit();
		OrderSummary.LoadOrderedItems();
		OrderSummary.loadMethod();
	};

	OrderSummary.loadAudit=function(){
		$rootScope.f_account_id = $cookies.get('f_account_id');

		if ($rootScope.f_account_id > 0) {
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
				data : 	{f_account_id : $rootScope.f_account_id} // Data to be passed to API
			}).then(function(response){
				$rootScope.userInfos = response.data[0];
				$rootScope.user = response.data[0].account_fname;
			});
		}
	}

	OrderSummary.loadMethod = function() {
		$scope.reference = Math.floor((Math.random() * 10000000) + 10000000);

		$scope.userId = $cookies.get('f_account_id');
		$scope.PaymentMethod = $cookies.get('method_payment');

		if ($scope.PaymentMethod == 'Delivery') {
			$('#pickup').hide();
		}

		if ($scope.PaymentMethod == 'Pick Up') {
			$('#delivery').hide();
		}

		$scope.dateDeliver = $cookies.get('delivery_status');
		$scope.timePick = $cookies.get('time_of_pickup');

		if ($scope.userId > 1) {
			$scope.reference = Math.floor((Math.random() * 10000000) + 10000000);
		}
	}	



	OrderSummary.LoadOrderedItems = function () {
		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.item = items;
		});
	}


	$scope.orderNow=function(total,shipping_id,email){

		$scope.email=email;

		$('.loadingBar').fadeIn();
		$('.receipt-wrap').fadeOut();

		setTimeout(function(){

			$('.thankyou').fadeIn();
			$('.loadingBar').fadeOut();


		},5000)



		var item_ids=0;

		for (var i = $scope.item.length - 1; i >= 0; i--) {
			item_ids[i] = $scope.item[i].item_id;

		}



		$scope.userId = $cookies.get('f_account_id');

		$scope.shipping_id = shipping_id;
		$scope.item_id = item_ids;

		$scope.PaymentMethod = $cookies.get('method_payment');


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
			data :	{grandtotal:$scope.total,shipping_id:$scope.shipping_id,item_id:$scope.item_id,order_payment_method:$scope.PaymentMethod,account_id:$scope.userId,order_reference_number: $scope.reference} // Data to be passed to API
		}).then(function(response) {
			$scope.order_id = response.data;
			$scope.userId=$cookies.get('f_account_id');

			$scope.PaymentMethod=$cookies.get('method_payment');

			$scope.statusDeliver=$cookies.get('delivery_status');
			$scope.timePick=$cookies.get('time_of_pickup');



			/**pick up method**/

			if ($scope.PaymentMethod == 'Pick Up') {
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
				});
			}else if($scope.PaymentMethod=='Delivery'){


				var timeToCall=$cookies.get('delivery_time');
				var email=email;


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
					data : 	{order_id:$scope.order_id,call_time:timeToCall,email_address:$scope.email} // Data to be passed to API
				}).then(function(response){
					console.log(response.data);
				});


			}

			$scope.order_id = response.data;

			for (var i = $scope.item.length - 1; i >= 0; i--) {
				var item_id = $scope.item[i].item_id;
				var item_quantity = $rootScope.cart_items_quantity[i];
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




		$http({
			url : "/order/email",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
			data : 	{email_address:email} // Data to be passed to API
		}).then(function(response){
			console.log(response.data);
		});





		$scope.sendEmail = function(email) {


			$http({
				url : "/order/email",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				transformRequest: function(obj) {
					var str = [];
					for(var p in obj)
						str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
					return str.join("&");
				},
			data : 	{email_address:email} // Data to be passed to API
		}).then(function(response){
			console.log(response.data);
		});
	}



	$scope.goHome=function(){

		$cookies.remove('cart_items');
		$cookies.remove('cart_items_quantity');
		location.href='/';

	}




}


OrderSummary.init();

});
// -- END : OrderSummaryController //

// -- START : CategoryBrandController -- //
app.controller('CategoryBrandController',function($scope,$http,$rootScope){
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
// -- END : CategoryBrandController -- //

// -- START : CategoryController -- //
app.controller('UserDashboardController', ['$scope','$http','$timeout', '$cookies','$rootScope',  function($scope,$http,$timeout,$cookies,$rootScope){

	var Dashboard = {};

	Dashboard.init = function(){
		Dashboard.Wishlist();
		Dashboard.trackOrder();
	};


	Dashboard.Wishlist=function(){

		$scope.userId = $cookies.get('f_account_id');
		if ($scope.userId > 1) {
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

				$scope.wishlistItem = response.data;
			});
		}
	}


	Dashboard.trackOrder=function(){

		$rootScope.f_account_id = $cookies.get('f_account_id');


		$http({
			url : "/data/trackorder",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
				data : 	{f_account_id : $rootScope.f_account_id} // Data to be passed to API
			}).then(function(response){

				$scope.order_details = response.data;
			})

		}


		$scope.addItem = function(item_id) {

			alert(item_id);

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

		$rootScope.cart_items = JSON.parse($cookies.get('cart_items'));
		$rootScope.cart_items_quantity = JSON.parse($cookies.get('cart_items_quantity'));

		// Update cart
		$rootScope.cart_items_count = cart.length;

		$http.get("/api/viewToCart")
		.then(function(response) {
			var items = [];
			angular.forEach($rootScope.cart_items, function(item){
				angular.forEach(response.data, function(data){
					if(item == data.item_id) {
						items.push(data);
					}
				});
			});

			$scope.item = items;

			console.log($scope.item);
		});
	};




	$scope.removeWishlist=function(wishlist_id){

		$http({
			url : "/action/wishlist/remove",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj)
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				return str.join("&");
			},
				data : 	{wishlist_id:wishlist_id} // Data to be passed to API
			}).then(function(response){


				$scope.userId = $cookies.get('f_account_id');
				if ($scope.userId > 1) {
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

						$scope.wishlistItem = response.data;
					});
				}







			})




		}	

		



		Dashboard.init();

	}]);
// -- END : CategoryController //
