(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  function EuToUsCurrencyFormat(input) {
    return input.replace(/[,.]/g, function(x) {
      return x == "," ? "." : ",";
    });
  }
  
  $(document).ready(function() {
    //Only needed for the filename of export files.
    //Normally set in the title tag of your page.
    document.title = 'DataTable Excel';
    // DataTable initialisation
    $('#example').DataTable({
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": true,
      "autoWidth": true,
      "buttons": [{
        extend: 'excelHtml5',
        text: 'Excel',
        customize: function(xlsx) {
          var sheet = xlsx.xl.worksheets['sheet1.xml'];
          //All cells
          $('row c', sheet).attr('s', '25');
          //Second column
          $('row c:nth-child(2)', sheet).attr('s', '42');
          //First row
          $('row:first c', sheet).attr('s', '36');
          // One cell
          $('row c[r^="D6"]', sheet).attr('s', '32');
          // Loop over the cells in column `E` the amount column
          $('row c[r^="E"]', sheet).each(function() {
            if (parseFloat(EuToUsCurrencyFormat($('is t', this).text())) > 1500) {
              $(this).attr('s', '17');
            }
          });
          //All cells of row 10
          $('row c[r*="10"]', sheet).attr('s', '49');
          //Search all cells for a specific text
          $('row* c[r]', sheet).each(function() {
            if ($('is t', this).text().match(/(?:^|\b)(cover)(?=\b|$)/gmi)) {
              $(this).attr('s', '20');
            }
          });
        }
      }]
    });
  });

  
  

})(jQuery); // End of use script
