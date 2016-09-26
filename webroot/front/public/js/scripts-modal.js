

  jQuery.noConflict();
  
  $(document).ready(function($){


   // $('#searchModal').modal('toggle');


   $('#searchText').keypress(function(e){
    var key=e.which;
    if(key==13)
    {
     $('#searchModal').modal('toggle');

   }
 });


 });