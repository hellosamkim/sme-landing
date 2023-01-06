(function () {
  $('.accordion .open-close').on('click',function() {
      openAnsSection($(this))
  })
  function openAnsSection(val) {
      $('.accordion .open-close').not($(val)).removeClass('active')
      $(val).toggleClass('active')
  }    
})();
