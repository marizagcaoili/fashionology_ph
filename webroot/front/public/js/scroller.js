
  jQuery(function($) {
    function fixDiv() {
      var $cache = $('#getFixed');
      if ($(window).scrollTop() > 594)
        $cache.css({
          'position': 'fixed',
          'top': '0px',
          'background':'#fff',
          'z-index':'1',
          'height':'54px'
        });
      else
        $cache.css({
          'position': 'relative',
          'top': 'auto',
          'border-bottom':'none'
        });
    }
    $(window).scroll(fixDiv);
    fixDiv();
  });
