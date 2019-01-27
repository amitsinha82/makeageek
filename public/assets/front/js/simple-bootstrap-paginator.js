$(function() {
  $('div.with-pager').each(function() {
      var $table = $(this); 
      var $nextPage = $('.pager .next');
      var $previousPage = $('.pager .previous');
  
      var currentPage = 0;
      var numPerPage  = 15;
  
      var numRows  = 0;
      var numPages = 0;
  
      $table.bind('repaginate', function() {
          numRows  = $table.find('#ggg .qgroup').length; 
          numPages = Math.ceil(numRows / numPerPage);
  
          $table.find('#ggg .qgroup').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
  
          if (currentPage == 0) {
              $previousPage.addClass('disabled');
          } else {
              $previousPage.removeClass('disabled');
          }
  
          if (currentPage == numPages-1) {
              $nextPage.addClass('disabled');
              $(".submitcls").css("display","block");
          } else {
              $nextPage.removeClass('disabled');
          }
      });
  
      $table.trigger('repaginate');
  
      $previousPage.bind('click', function(event) {
          if (currentPage != 0) {
              currentPage--;
              $table.trigger('repaginate');
              $(".submitcls").css("display","none");
          }
      });
  
      $nextPage.bind('click', function(event) {
          if (currentPage != numPages-1) {
              currentPage++;
              $table.trigger('repaginate');
          }
      });
  });
});
