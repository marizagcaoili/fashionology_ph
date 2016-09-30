var app = angular.module('admin.controllers', ['jkuri.datepicker', 'ngMaterial', 'ngRoute', 'ngCookies' , 'ngFileUpload', 'checklist-model', 'frapontillo.bootstrap-switch', 'datatables']);

app.config(function($locationProvider) {
        $locationProvider.html5Mode(true);
    }); 

app.controller('BrandController', function($scope, $http, $timeout) {
	// Private
	// JS ONLY
	var Brand = {};
	Brand.init = function() {
		Brand.list();

		$timeout(function () {
	       $scope.canChange = true;
	    }, 1000);
	};
	Brand.list = function() {
		$http.get("/admin/catalog/get_brands")
		    .then(function(response) {
		        $scope.brands = response.data;
		    });
	};
	Brand.add = function(name, prefix) {
		$http({
				url : "/admin/catalog/add_brand",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{brand_name : name, brand_prefix : prefix} // Data to be passed to API
			})
		    .then(function(response) {
		    	$('#modal-close').click();
		    	window.alert('New Brand Added!');
		    	// Clear the boxes
		    	$('#brand_name').val('');
		    	$('#brand_prefix').val(''); 
		        Brand.list();
		    });
	};

	Brand.init(); 

    $scope.onText = 'Visible';
    $scope.offText = 'Hidden';
    $scope.isActive = true;
    $scope.size = 'mini';
    $scope.animate = true;
    $scope.radioOff = true;
    $scope.handleWidth = "auto";
    $scope.labelWidth = "auto";
    $scope.inverse = false;
    $scope.canChange = false;

    $scope.brand_id = '';
	$scope.brand_name = '';
	$scope.brand_prefix = '';

	// Public
	// Will be exposed to view
	$scope.add = function() {
		var name = $('#brand_name').val();
		var prefix = $('#brand_prefix').val(); 
		Brand.add(name, prefix);
	};

	$scope.editBrand = function(brand_id, brand_name, brand_prefix) {
		$scope.brand_id = brand_id;
		$scope.brand_name = brand_name;
		$scope.brand_prefix = brand_prefix;
	};

	$scope.toggle = function(brand_id, status) {
		if($scope.canChange) {
      		$http({
				url : "/admin/catalog/update_brand_status",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{brand_id : brand_id, status : status} // Data to be passed to API
			})
		    .then(function(response) {

		    	
		    });
		}
    };

    $scope.update = function() {
    	$http({
			url : "/admin/catalog/update_brand",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{brand_id : $scope.brand_id, brand_name : $scope.brand_name, brand_prefix : $scope.brand_prefix} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Updated!');
		    Brand.list();
	    });
    };

    $scope.deleteBrand = function(brand_id) {
			if (confirm("Are you sure you want to delete this?"))
			{
			$http({
			url : "/admin/catalog/delete_brand",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{brand_id : brand_id} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Deleted!');
	    	// Clear the boxes
	    	Brand.list();
	    });
	} else {};
	};
});


app.controller('CategoryController', function($scope, $http, $timeout) {
	
	var Category= {};
	
	$scope.categories="";	
	$scope.parent_id=0;
	$scope.top_parent=0;
	$scope.category_id = 0;
    $scope.category_name = "";

	$scope.onText = 'Visible';
    $scope.offText = 'Hidden';
    $scope.isActive = true;
    $scope.size = 'mini';
    $scope.animate = true;
    $scope.radioOff = true;
    $scope.handleWidth = "auto";
    $scope.labelWidth = "auto";
    $scope.inverse = false;
    $scope.canChange = false;

	Category.init = function() {
		Category.list();
		Category.parent();

		$timeout(function () {
	       $scope.canChange = true;
	    }, 1000);
	};
	Category.list = function() {
		$http.get("/admin/catalog/get_categories")
		    .then(function(response) {
		        $scope.categories = response.data;
		        console.log(response.data);
		    });
	};	
	Category.parent= function() {
		$http.get("/admin/catalog/get_parents")
		    .then(function(response) {
		        $scope.parents = response.data;
		    });
	};
	Category.add = function(name, parentId) {
		$http({
				url : "/admin/catalog/add_category",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{category_name : name, parent_id : parentId} // Data to be passed to API
			})
		    .then(function(response) {
		    	$('#modal-close').click();
		    	$('#parent-modal-close').click();
		    	// Clear the boxes
		    	$('#name').val(''); 
		    	Category.list();
		    	Category.parent();
		 		window.alert('New Category Added!');
		    });
	};
	Category.init();


	$scope.addCategory = function() {
		var category_name = $('#name').val();
		if(category_name == "")
		{
			window.alert("Category name cannot be empty!")
		}
		else{
		var parent_id = $scope.parent.category_id;
		
		Category.add(category_name, parent_id);
		}
	};

	$scope.addModal = function (){
		$scope.parent= $scope.parents[0];

	};

	$scope.display = function () {
		$('#group1').val('');
		Category.list();
	};


	$scope.toggle = function(category_id, status) {
		if($scope.canChange) {
      		$http({
				url : "/admin/catalog/update_category_status",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{category_id : category_id, status : status} // Data to be passed to API
			})
		    .then(function(response) {
		    	
		    });
		}
    };

    $scope.addParent = function (){
    	Category.add($scope.parent_name, 0);
    }
    $scope.sortCateg = function (){
    	var parent_id = $scope.selectedParent.category_id;

    		$http.get("/admin/catalog/second_category",
			{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { parent_id : parent_id }
			}).then(function(response) {
				$scope.categories = response.data;
				console.log(response.data);
			})
    }
	
	$scope.editCategory = function(category_id, category_name, parent_id) {
		
		$scope.category_id = category_id;
		$scope.parent_id = parent_id;

		if(parent_id == 0)
		{
			$scope.showParent = false;
		}
		else 
		{
			$scope.showParent = true;

	    	angular.forEach($scope.parents, function(value, key) {
			  if(parent_id == value.category_id) {
			  	$scope.editParent = value;
			  	console.log(parent_id);
			  }

			});
		}

		$scope.category_name = category_name;
	    
	};

	$scope.deleteCategory = function(category_id) {
			if (confirm("Are you sure you want to delete this?"))
			{
			$http({
			url : "/admin/catalog/delete_category",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{category_id : category_id} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Deleted!');
	    	Category.list();
	    	Category.parent();
	    });
	} else {};
	};


	$scope.updateCategory = function() {
		if($scope.category_name == "")
		{
			window.alert("Category Name cannot be empty!");
		}
		else{
		$http({
			url : "/admin/catalog/update_category",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{category_name : $scope.category_name, parent_id : $scope.parent_id, category_id: $scope.category_id} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Updated!');
	    	// Clear the boxes
	    	Category.list();
	    	Category.parent();
	    });
	    }
	};
});

app.controller('AddItemController', ['$scope', 'Upload', '$timeout', '$http', function ($scope, Upload, $timeout, $http) {
	var AddItem = {};
	  $scope.selected = {sizes: []};
	  $scope.genders = 
	  [{ 
          gender_id: '0',
          gender_name: 'Unisex'
	  },
	  { 
          gender_id: '1',
          gender_name: 'Men'
	  },
	  { 
          gender_id: '2',
          gender_name: 'Women'
	  }
	  ];
	
	AddItem.init = function() {

		AddItem.brandList();
		AddItem.categoryList();
		AddItem.sizeList();
		angular.forEach($scope.genders, function(value, key) {
			  if(0 == value.gender_id) {
			  	$scope.selectedGender = value;
			}
		});
	};


	AddItem.sizeList = function() {
		$http.get("/admin/catalog/get_sizes")
		    .then(function(response) {
		        $scope.sizes = response.data;
		    });
	};

	AddItem.brandList = function() {
		$http.get("/admin/catalog/get_brands")
		    .then(function(response) {
		        $scope.brands = response.data;
		    });
	};
	AddItem.categoryList = function() {
		$http.get("/admin/catalog/get_parents")
		    .then(function(response) {
		        $scope.firstCategories = response.data;
		    });
	};	
	AddItem.secondCategory = function (categoryId) {		
			$http.get("/admin/catalog/second_category",
			{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { parent_id : categoryId }
			})
		    .then(function(response) {
		        $scope.secondCategories = response.data;
		    });
	};
	AddItem.prefix = function(brandId) {
		$http.get("/admin/catalog/get_prefix",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { brand_id : brandId }
		}).then(function(response) {
			$scope.prefixes = response.data;
		})
	};


	AddItem.addItem = function (item_code, brand, srp, item_name, desc, categoryid, gender){
			$http({
				url : "/admin/catalog/add_item",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{item_code: item_code, brand : brand, srp : srp, item_name : item_name, desc : desc, categoryid : categoryid, gender:gender} // Data to be passed to API
			})
		    .then(function(response) {
		    	$timeout(function () {
		       		$scope.last_inserted = response.data;
		       		console.log($scope.last_inserted);

		       		$('#uploadButton').click();
			     }); 	
		    });
	};

	AddItem.init();
	$scope.categoryid="";
	


	
	$scope.addItem = function () {
		var item_code = $('#brandPrefix').val() + $('#itemCode').val().toUpperCase();
		var category_id = $scope.categoryid;
		var brand = $('#brand').val();
		var srp = $('#srp').val();
		var item_name = $('#itemName').val();
		var desc = $scope.description;
		var gender = $scope.selectedGender.gender_id;

		if (item_code == "" || category_id == "" || brand== "?" || srp == "" || item_name == "" || desc =="" ||  $('#picFile').val() == undefined || $('#picFile').val() == "" || $('#image_desc').val() == ""){
			alert("You must fill all the required fields!");
		}
		else{
		AddItem.addItem(item_code, brand, srp, item_name, desc, category_id, gender);
		}
	};

	$scope.firstCategory = function () {
		var parent_id = $scope.selectedCategory.category_id;
		$scope.categoryid = parent_id;
		AddItem.secondCategory(parent_id);
		$('category3').val('');
	};
	$scope.secondCategory = function () {
		var parent_id = $scope.selectedCategory2.category_id;
		$scope.categoryid = parent_id;
		AddItem.thirdCategory(parent_id);
	};
 	$scope.getPrefix = function() {
		var brand_id = $scope.selectedBrand.brand_id;
		AddItem.prefix(brand_id);
	};

	$scope.uploadPic = function(file) {
		if (file == undefined || file == "")
		{
			alert("You must select a photo for your item!");
		}
		else{

	    file.upload = Upload.upload({
		     method:"POST",        		
		      url: '/admin/catalog/upload_image',
		      data: {description: $scope.username, file: file, item_id : $scope.last_inserted, thumbnail : 1},
	    });
		}

	    file.upload.then(function (response) {
	      $timeout(function () {
	       file.result = response.data;
	      });
	    }, function (response) {
	      if (response.status > 0)
	        $scope.errorMsg = response.status + ': ' + response.data;
	    }, function (evt) {
	      // Math.min is to fix IE which reports 200% sometimes
	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	      console.log(file.progress);
	      window.alert("Item Added!");
	      window.location.href= "/admin/catalog/items";

    });
    };
}]);


app.controller('ItemListController', function($scope, $http, $timeout) {
	var ItemList = {};
	ItemList.init = function() {
		// Init functions / source
		ItemList.ItemList();
		$timeout(function () {
	       $scope.canChange = true;
	    }, 1000);
	};

	ItemList.ItemList = function() {
		$http.get("/admin/catalog/get_items")
		    .then(function(response) {
		        $scope.items = response.data;
		        console.log($scope.items);
		    });
	};
	ItemList.init();
	// scope Vars to view

	$scope.onText = 'Featured';
    $scope.offText = 'Not Featured';
    $scope.isActive = true;
    $scope.size = 'mini';
    $scope.animate = true;
    $scope.radioOff = true;
    $scope.handleWidth = "auto";
    $scope.labelWidth = "auto";
    $scope.inverse = false;
    $scope.canChange = false;


	$scope.onText1 = 'In Stock';
    $scope.offText1 = 'Out of Stock';
    


	 $scope.deleteItem = function(item_id) {
				if (confirm("Are you sure you want to delete this?"))
				{
				$http({
				url : "/admin/catalog/delete_item",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{item_id : item_id} // Data to be passed to API
			})
		    .then(function(response) {
		    	$('#update-modal-close').click();
		    	window.alert('Successfully Deleted!');
		    	// Clear the boxes
		    	ItemList.ItemList();
		    });
		} else {};
		};

	$scope.toggle = function(item_id, status) {
		if($scope.canChange) {
      		$http({
				url : "/admin/catalog/update_item_status",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{item_id : item_id, status : status} // Data to be passed to API
			})
		    .then(function(response) {
		    });
		}
	};

	$scope.toggle1 = function(item_id, status) {
		if($scope.canChange) {
      		$http({
				url : "/admin/catalog/update_item_status1",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{item_id : item_id, status : status} // Data to be passed to API
			})
		    .then(function(response) {
		    });
		}
	};

	$scope.getSizes = function (item_id, sizes) 
	{
		$scope.item_id = item_id;
		$scope.getStockDetails(item_id);
		var size = (sizes).toString(10).split(",").map(function(t){return parseInt(t)});
		var json = JSON.stringify(size);
		$http({
			url: "/admin/catalog/get_stock_sizes",
			method: "GET",
			params : { sizes : json }
		})
		.then(function(response){
			console.log(response.data);
			$scope.sizes = response.data;
			if($scope.sizes[0] === null){
				$scope.nostock = true;
			}

		});


	};

	$scope.getStockDetails = function (item_id)
	{
		$http({
			url: "/admin/catalog/get_item_stock_details",
			method: "GET",
			params: {item_id :item_id}
		}).then (function(response){
			$scope.item_stock_details = response.data;
		});
	}

	$scope.addStock = function()
	{	
		$scope.size_id = $scope.size.size_id;
		$scope.quantity = $('#quantity').val();

		$http({
			url: "/admin/catalog/get_stock",
			method: "GET",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { item_id : $scope.item_id, size_id : $scope.size_id }
		}).then(function(response){
			console.log(response.data);
			if (response.data){ 
				$http({
				url : "/admin/catalog/new_stock",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				    transformRequest: function(obj) {
				        var str = [];
				        for(var p in obj)
				        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				        return str.join("&");
				    },
					data : 	{item_id : $scope.item_id, size_id : $scope.size_id, quantity : $scope.quantity} // Data to be passed to API
				})
			    .then(function(response) {
			    	window.alert('Stock Successfully Added!');
			    	$scope.getStockDetails($scope.item_id);
					$('#size').val('');
					$('#quantity').val('');
			    });
			}
			else{
				$http({
				url: "/admin/catalog/get_stock_details",
				method: "GET",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { item_id : $scope.item_id, size_id : $scope.size_id }
				})
				.then(function(response){
				$scope.stock_details = response.data;
				var quantity =  parseInt($scope.stock_details[0].quantity) + parseInt($('#quantity').val());
				var stock_id = $scope.stock_details[0].stock_id;
				$http({
					url : "/admin/catalog/update_stock",
					method: "POST",
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				    transformRequest: function(obj) {
				        var str = [];
				        for(var p in obj)
				        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				        return str.join("&");
				    },
					data : 	{stock_id : stock_id, quantity : quantity} // Data to be passed to API
				}).then(function(response)
				{
					window.alert("Stock Successfully Added!");
					$scope.getStockDetails($scope.item_id);
					$('#size').val('');
					$('#quantity').val('');
				});		
				});
			}          

		});


	};

	// scope function to view

});


app.controller('EditItemController', ["$timeout", "Upload", "$location", "$scope", "$http", function($timeout, Upload, $location, $scope, $http) {
    $scope.genders = 
	  [{ 
          gender_id: '0',
          gender_name: 'Unisex'
	  },
	  { 
          gender_id: '1',
          gender_name: 'Men'
	  },
	  { 
          gender_id: '2',
          gender_name: 'Women'
	  }
	  ];
	var EditItem = {};
	EditItem.init = function() {
		// Init functions / source
		EditItem.parameter();
		EditItem.parents();
		EditItem.sizeList();

	};

	EditItem.parameter = function() {
		var item_id = $location.search().item_id;
		$scope.item_id = item_id;
		console.log(item_id);
		EditItem.getDetails(item_id);

	};

	EditItem.getDetails = function(item_id) {
		
		$http.get("/admin/catalog/get_brands",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response) {
			$scope.brands = response.data;
			console.log($scope.brands);

			$http.get("/admin/catalog/get_details",
			{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { item_id : item_id }
			}).then(function(response) {
				$scope.details = response.data[0];
				$scope.gender = response.data[0].gender;
				$scope.brand = response.data[0].brand_id;
				$scope.code_item = response.data[0].item_code;
				$scope.category_id = response.data[0].category_id;
				$scope.parent_id = response.data[0].category.parent_id;
				$scope.temp = response.data[0].image.file_key;
				$scope.picFile = response.data[0].image.file_key;
				$scope.image_desc = response.data[0].image.img_description;

				console.log($scope.details);



				angular.forEach($scope.genders, function(value, key) {
			  	if($scope.gender == value.gender_id) {
			  	$scope.selectedGender = value;
					}
				});


				angular.forEach($scope.brands, function(value, key) {
			  	if($scope.brand == value.brand_id) {
			  	$scope.selectedBrand = value;
			  	$scope.brand_prefix = value.brand_prefix;
					}
				});

				angular.forEach($scope.parents, function(value, key) {
			  	if($scope.parent_id == value.category_id) {
			  	$scope.selectedCategory = value;
					}
				});


				EditItem.category($scope.parent_id);


			  	$scope.item_code = $scope.code_item.replace($scope.brand_prefix,"");
				$scope.description = response.data[0].item_description;
			});
		});
	};

	EditItem.category = function (parent_id)
	{

		$http.get("/admin/catalog/second_category",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { parent_id : parent_id }
		}).then(function(response){
			$scope.categories = response.data;

				angular.forEach($scope.categories, function(value, key) {
			  	if($scope.category_id == value.category_id) {
			  	$scope.selectedCategory2 = value;
					}
				});
		});
	};

	EditItem.prefix = function(brandId) {
		$http.get("/admin/catalog/get_prefix",
		{
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			params : { brand_id : brandId }
		}).then(function(response) {
			$scope.brand_prefix = response.data[0].brand_prefix;
		})

	};
	
	EditItem.sizeList = function() {
		$http.get("/admin/catalog/get_sizes")
		    .then(function(response) {
		        $scope.sizes = response.data;
		    });
	};


	EditItem.updateItem = function (item_code, brand, srp, item_name, desc, categoryid, gender){
			$http({
				url : "/admin/catalog/update_item",
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			    transformRequest: function(obj) {
			        var str = [];
			        for(var p in obj)
			        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
			        return str.join("&");
			    },
				data : 	{item_id : $scope.item_id, item_code: item_code, brand : brand, srp : srp, item_name : item_name, desc : desc, categoryid : categoryid, gender:gender} // Data to be passed to API
			})
		    .then(function(response) {
		    	$timeout(function () {
		    		if ($scope.picFile == $scope.temp)
		    		{
		    		  alert('Item Successfully Updated!');
		    		  window.location.href= "/admin/catalog/items";
		    		}
		    		else{
		       		$('#uploadButton').click();
		       		}
			     }); 	
		    });
	};

	EditItem.parents= function() {
		$http.get("/admin/catalog/get_parents")
		    .then(function(response) {
		        $scope.parents = response.data;
		    });
	};

	// EditItem.secondCategory = function (category_id){
	// 	console.log(angular.element('#categoryid').val());
	// 	$http.get("/admin/catalog/get_categorydetails",
	// 	{
	// 		headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	// 		params : { category_id : category_id }

	// 	}).then(function(response) {
	// 		$scope.categories = response.data;
	// 		console.log($scope.categories);
	// 	});

	// };

	EditItem.init();


	$scope.updateItem = function () {
		var item_code = $scope.brand_prefix + $('#itemCode').val().toUpperCase();
		var category_id = $scope.category_id;
		var brand = $scope.selectedBrand.brand_id;
		var srp = $('#srp').val();
		var item_name = $('#itemName').val();
		var desc = $('#summernote').val();
		var gender = $scope.selectedGender.gender_id;

		if (item_code == "" || category_id == "" || brand== "?" || srp == "" || item_name == "" || desc =="" || $scope.picFile == undefined || $scope.picFile == "" || $scope.image_desc == ""){
			alert("You must fill all the required fields!");
		}
		else{
		EditItem.updateItem(item_code, brand, srp, item_name, desc, category_id, gender);
		}
	};

	 $scope.getPrefix = function() {
		var brand_id = $scope.selectedBrand.brand_id;
		EditItem.prefix(brand_id);

	};

	$scope.secondCategory = function(){
		EditItem.category($scope.selectedCategory.category_id);
		$('#category2').val('');
	};

	$scope.selectedChild = function(){
		$scope.category_id = $scope.selectedCategory2.category_id;
	};

	$scope.uploadPic = function(file) {
		if ($scope.picFile == undefined || $scope.picFile == "")
		{
			alert("You must select a photo for your item!");
		}
		else{

	    file.upload = Upload.upload({
		     method:"POST",        		
		      url: '/admin/catalog/update_image',
		      data: {description: $scope.image_desc, file: file, item_id : $scope.item_id},
	    });
		}

	    file.upload.then(function (response) {
	      $timeout(function () {
	       file.result = response.data;
	      });
	    }, function (response) {
	      if (response.status > 0)
	        $scope.errorMsg = response.status + ': ' + response.data;
	    }, function (evt) {
	      // Math.min is to fix IE which reports 200% sometimes
	      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	      console.log(file.progress);
	      window.alert("Item Successfully Updated!");
	      window.location.href= "/admin/catalog/items";

    });
    };

}]);

app.controller('SizeController', function($scope, $http) {
	var Size = {};
	Size.init = function() {
		Size.sizeList();
	};

	Size.sizeList = function () {
		$http.get("/admin/catalog/get_sizes")
	    .then(function(response) {
	        $scope.sizes = response.data;
	    });
	};

	Size.addSize = function(size_key, description) {
			$http({
			url : "/admin/catalog/add_size",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{size_key : size_key, description: description} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#modal-close').click();
	    	window.alert('New Size Added!');
	    	// Clear the boxes
	    	$('#size_key').val('');
	    	$('#size_description').val(''); 
	    	Size.sizeList();
	    });
	};

	Size.init();
	// scope Vars to view
	// scope function to view
	$scope.addSize = function() {
		var size_key = $('#size_key').val();
		var description = $('#description').val();
		Size.addSize(size_key, description);
	};

	$scope.editSize = function(sizeId, size_key, size_description) {
		$scope.size_key = size_key;
		$scope.size_id = sizeId;
		$scope.size_description = size_description;
	};

	$scope.deleteSize = function(sizeId) {
			if (confirm("Are you sure you want to delete this?"))
			{
			$http({
			url : "/admin/catalog/delete_size",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{size_id : sizeId} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Deleted!');
	    	// Clear the boxes
	    	Size.sizeList();
	    });
	} else {};
	};


	$scope.updateSize = function () {
			$http({
			url : "/admin/catalog/update_size",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{size_id : $scope.size_id, size_key : $scope.size_key, size_description : $scope.size_description} // Data to be passed to API
		})
	    .then(function(response) {
	    	$('#update-modal-close').click();
	    	window.alert('Successfully Updated!');
	    	// Clear the boxes
	    	Size.sizeList();
	    });

	};


});

	app.controller('LoginController', function($scope, $http, $cookies, $cookieStore) {
		var Login = {};
		Login.init = function() {
		 	
		};

		Login.init();


		$scope.login = function () {
			$scope.username = $('#username').val();
			$scope.password = $('#password').val();

			$http({
				url: "/admin/login/get_admin_details",
				method: "GET",
				params : { username : $scope.username , password: $scope.password }

			}).then(function(response)
			{
				if(response.data)
				{			
					console.log($scope.username, $scope.password);
					$http({
					url : "/admin/login/add_session",
					method: "POST",
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				    transformRequest: function(obj) {
				        var str = [];
				        for(var p in obj)
				        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				        return str.join("&");
				    },
					data : 	{username : $scope.username, password: $scope.password} // Data to be passed to API
				}).then(function(response){
					window.location.href = "/admin/dashboard";
				});
				}
				else{
					window.alert("Incorrect username and password!");
				}
			})
		};	
	});

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

	app.controller('InquiryController', function ($scope, $http, $timeout)
	{
		var Inquiry = {};
		Inquiry.init = function(){
			$scope.location = "unread";
			Inquiry.count();
			Inquiry.updateRead();
			Inquiry.getArchives();
		};

		Inquiry.getArchives = function(){
			$http.get("/admin/inquiry/get_archives")
		    .then(function(response) {
		    	$scope.archives = response.data;
		    });

		};
		Inquiry.count = function (){
			$http.get("/admin/inquiry/get_unread_inquiries")
		    .then(function(response) {
		    	$scope.inquiries = response.data;
		        $scope.unreadlength = response.data.length;
		        $scope.unreadinquiries = response.data;
		    });
			$http.get("/admin/inquiry/get_inquiries")
		    .then(function(response) {
		        $scope.inboxlength = response.data.length;
		        $scope.allinquiries = response.data;
		    });

			$http.get("/admin/inquiry/get_replied_inquiries")
		    .then(function(response) {
		        $scope.repliedlength = response.data.length;
		         $scope.repliedinquiries = response.data;
		     });

		};

		Inquiry.recount = function(){
			$http.get("/admin/inquiry/get_unread_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.unreadlength = response.data.length;
		        $scope.unreadinquiries2 = response.data;
		    });
		    });
			$http.get("/admin/inquiry/get_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.inboxlength = response.data.length;
		        $scope.allinquiries2 = response.data;
		        console.log(response.data);
		    });
		    });

			$http.get("/admin/inquiry/get_replied_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.repliedlength = response.data.length;
		         $scope.repliedinquiries2 = response.data;
		    });
		    });
		};

			Inquiry.refresh = function(){
			if($scope.location == "unread"){
			$http.get("/admin/inquiry/get_unread_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.unreadlength = response.data.length;
		        $scope.inquiries = response.data;
		    });
		    });
		    }else if ($scope.location == "inbox"){
			$http.get("/admin/inquiry/get_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.inboxlength = response.data.length;
		        $scope.inquiries = response.data;
		        console.log(response.data);
		    });
		    });
			}else if ($scope.location == "replied")
			{
			$http.get("/admin/inquiry/get_replied_inquiries")
		    .then(function(response) {
		    	$timeout(function () {
		        $scope.repliedlength = response.data.length;
		         $scope.inquiries = response.data;
		    });
		    });
			}
		};

		Inquiry.updateRead = function (){
			$http.get("/admin/inquiry/update_read_status");
		};

		Inquiry.init();

		$scope.getAll = function () {
			$scope.inquiries = [];
			$scope.location = "inbox";
			$scope.inquiries = $scope.allinquiries;
		};

		$scope.getUnread = function(){
			$scope.inquiries = [];
			$scope.location = "unread";
			$scope.inquiries = $scope.unreadinquiries;
		};

		$scope.getReplied = function(){
			$scope.inquiries = [];
			$scope.location = "replied";
			$scope.inquiries = $scope.repliedinquiries;
		};

		$scope.replyModal = function(inquiry_id, subject, inquiry_email, sender){
			$scope.inquiry_id = inquiry_id;
			$scope.inquiry_email = inquiry_email;
			$scope.subject = subject;
			$scope.sender = sender;
		};

		$scope.reply = function (message){
			$http({
			url : "/admin/inquiry/inquiry_reply",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{inquiry_id : $scope.inquiry_id, email_address : $scope.inquiry_email, message : $('#message').val(), subject : $scope.subject} // Data to be passed to API
			}).then(function(response){
				console.log($scope.inquiry_email,  $('#message').val());
				window.alert("Mail Sent!");
				Inquiry.refresh();
			});
		};

		$scope.restore = function(inquiry_id){
		if (confirm("Are you sure you want to restore this?")){
		$http({
		     method:"GET",        		
		     url: '/admin/inquiry/restore_inquiry',
		     params: {inquiry_id : inquiry_id}
	    }).then(function(response){
	    	$timeout(function () {
	    	window.alert("Inquiry Restored!");
	    	Inquiry.getArchives();
	    });
	    });
		}else
		{

		}
		};

		$scope.archiveInquiry = function (inquiry_id){
		if (confirm("Are you sure you want to delete this?")){
		$http({
		     method:"GET",        		
		     url: '/admin/inquiry/inquiry_archive',
		     params: {inquiry_id : inquiry_id}
	    }).then(function(response){
	    	$timeout(function () {
	    	window.alert("Successfully Deleted!");
	    	Inquiry.recount();
	    	Inquiry.refresh();
	    });
	    });
		}else
		{

		}
		};


		$scope.deleteInquiry = function (inquiry_id){
		if (confirm("Are you sure you want to delete this?")){
		$http({
		     method:"GET",        		
		     url: '/admin/inquiry/delete_inquiry',
		     params: {inquiry_id : inquiry_id}
	    }).then(function(response){
	    	$timeout(function () {
	    	window.alert("Successfully Deleted!");
	    	Inquiry.getArchives();
	    });
	    });
		}else
		{

		}
		};
	});

app.controller('ViewOrderController', ["$location", "$scope", "$http", "$timeout", function($location, $scope, $http, $timeout) {
	var ViewOrder = {};
	ViewOrder.init = function() {
		ViewOrder.parameter();
	};

	ViewOrder.parameter = function() {
		order_id = $location.search().order_id;
		ViewOrder.orderDetails(order_id);
		console.log(order_id);
	};


	ViewOrder.orderDetails = function(order_id){
		$http.get("/admin/order/order_details",
		{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { order_id : order_id }
		}).then(function(response) {
		    $timeout(function () {
		       		$scope.orderdetails = response.data;
		       		console.log($scope.orderdetails);

			     }); 	
		    });

		$http.get("/admin/order/ordered_items",
		{
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				params : { order_id : order_id }
		}).then(function(response){
			$scope.ordereditems = response.data;
			$scope.itemCount = $scope.ordereditems.length;
			console.log($scope.ordereditems);
		});
	}

	ViewOrder.init();




}]);

app.controller('OrderController', function($scope, $http, $timeout) {
	var Order = {};
	Order.init = function() {
		Order.orderList();
		Order.datePicker();
		Order.getArchives();
		$http.get("/admin/order/update_seen");

	};

	Order.getArchives = function(){
		$http.get("/admin/order/get_archives")
	    .then(function(response) {
	    	$scope.archives = response.data;
	    	console.log($scope.archives);
	    });

	};
	Order.orderList = function (){
		$http.get("/admin/order/get_orders")
		    .then(function(response) {
		        $scope.orders = response.data;
		       			 angular.forEach($scope.orders, function(value, key) {
						  if("Delivered" == value.order_status) {
						    $scope.orders[key].confirm= "true";
						  	$scope.orders[key].markdelivered = "true";
						  }
						  else if("To Be Delivered" == value.order_status)
						  {
						  	$scope.orders[key].confirm= "true";
						  	$scope.orders[key].markdelivered = "false";
						  	$scope.orders[key].cancel = "true";
						  }

						});
		        console.log($scope.orders);
		    });
	};

	Order.datePicker = function(){
		  $scope.myDate = new Date();
		  $scope.minDate = 0;

		  $scope.maxDate = new Date(
		      $scope.myDate.getFullYear(),
		      $scope.myDate.getMonth() + 2,
		      $scope.myDate.getDate());
	};
	Order.init();

	$scope.archive = function (order_id){
		if (confirm("Are you sure you want to delete this?")){
		$http({
		     method:"GET",        		
		     url: '/admin/order/archive_order',
		     params: {order_id : order_id}
	    }).then(function(response){
	    	$timeout(function () {
	    	window.alert("Successfully Deleted!");
	    	Order.orderList();
	    });
	    });
		}else
		{

		}
	};

	$scope.deleteOrder = function (order_id){
	if (confirm("Are you sure you want to delete this?")){
	$http({
	     method:"GET",        		
	     url: '/admin/order/delete_order',
	     params: {order_id : order_id}
    }).then(function(response){
    	$timeout(function () {
    	window.alert("Successfully Deleted!");
    	Order.getArchives();
    });
    });
	}else
	{

	}
	};

	$scope.restore = function(order_id){
	if (confirm("Are you sure you want to restore this?")){
	$http({
	     method:"GET",        		
	     url: '/admin/order/restore_order',
	     params: {order_id : order_id}
    }).then(function(response){
    	$timeout(function () {
    	window.alert("Order Restored!");
    	Order.getArchives();
    });
    });
	}else
	{

	}
	};


	$scope.updateAsDelivered = function(order_id) {
	    var status = 'Delivered';
	    $http({
			url : "/admin/order/update_order_status",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{order_id : order_id, status: status} // Data to be passed to API
		})
	    .then(function(response) {

	    	window.alert("Order Status has been updated!");
	    	Order.orderList();
	    });		
	};

	$scope.cancel = function(){
		$scope.note = "";
	};

	$scope.confirmModal = function(ref, order_id, email_address){
		$scope.reference_number =ref;
		$scope.order_id = order_id;
		$scope.email_add = email_address;
	};

	$scope.confirmOrder = function(){
		console.log ($scope.datepicker);
		var status = "To Be Delivered";
		var note = $('#note').val();
		$http({
			url : "/admin/order/confirm_order",
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
			data : 	{order_id : $scope.order_id, deliverydate : $scope.datepicker, status : status, email_add : $scope.email_add, note : note} // Data to be passed to API
		})
	    .then(function(response) {
	    	window.alert('Order has been confirmed!');
	    	$('#modal-close').click();
	    	
	    });	

	};

});


app.controller('TestController', function($scope, $http) {
	var Test = {};
	Test.init = function() {
		Test.ItemList();
	};


	Test.ItemList = function() {
		$http.get("/admin/catalog/get_items")
		    .then(function(response) {
		        $scope.items = response.data;
		        console.log($scope.items);
		    });
	};

	Test.init();
	// scope Vars to view

	// scope function to view
	$scope.toTop = function(image){
		$scope.top = image;
	};

	$scope.toBottom = function(image){
		$scope.bottom = image;
	};

	$scope.toFootwear = function(image){
		$scope.footwear = image;
	};

	$scope.toAccessory = function(image){
		$scope.accessory = image;
	};

});


app.controller('DashboardController', function($scope, $http,  $cookies, $cookieStore) {
		var Dashboard = {};
		Dashboard.init = function() {
		Dashboard.count();
		};

		Dashboard.count = function (){
			$http.get("/admin/dashboard/count")
		    .then(function(response) {
		        $scope.count = response.data;
		    });
		};

		Dashboard.init();

		$scope.order = function(){
			window.location.href = "/admin/order";
		};

		$scope.inquiry = function(){
			window.location.href = "/admin/inquiry";
		};

		$scope.account = function(){
			window.location.href = "/admin/account";
		};
		$scope.logout = function () {
			$http({
				url : "/admin/login/destroy_session",
				method: "GET"// Data to be passed to API
			}).then(function(response){
				window.location.href = "/admin/login";
			});
		};

});


app.controller('AccountController', function($scope, $http, $timeout) {
	var Account = {};
	Account.init = function() {
		Account.getAccounts();

		$timeout(function () {
	       $scope.canChange = true;
	    }, 1000);
	};

	Account.getAccounts = function(){
		$http({
				url : "/admin/account/get_accounts",
				method: "GET"// Data to be passed to API
			}).then(function(response){
				$scope.accounts = response.data;
				console.log($scope.acocounts)
			});
	};

	Account.init();
	
	$scope.onText = 'Activated';
    $scope.offText = 'Deactivated';
    $scope.isActive = true;
    $scope.size = 'mini';
    $scope.animate = true;
    $scope.radioOff = true;
    $scope.handleWidth = "auto";
    $scope.labelWidth = "auto";
    $scope.inverse = false;
    $scope.canChange = false;
	// scope Vars to view
});


// app.controller('TestController', function($scope, $http) {
// 	var Test = {};
// 	Test.init = function() {
// 		// Init functions / source
// 	};
// 	Test.init();
// 	// scope Vars to view
// 	$scope.var = "";
// 	// scope function to view
// 	$scope.func = function(){
// 	};
// });