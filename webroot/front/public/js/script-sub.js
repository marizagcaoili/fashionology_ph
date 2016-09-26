 $(document).ready(function(){

      $('.sidebar').hide();
    $('.category').show();

      $('.sidebarreveal').click(function(){
       $('.sidebar').slideDown();

     });

      $('.closer').click(function(){
        $('.sidebar').slideUp();
      })

      $('.revealcategory').mouseenter(function(){
        $('.category').toggle();

      })



    });

    $(window).load(function(){


    })
