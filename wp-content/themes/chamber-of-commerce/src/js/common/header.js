(function() {
  let menu = document.getElementById("menu");
  const showMenu = (flag) => {
      if (flag) {
          menu.classList.toggle("hidden");
      } else {
          menu.classList.toggle("hidden");
      }
  };
  const mdOptionsToggle = () => {
      document.getElementById("md-searchbar").classList.toggle("hidden");
      document.getElementById("md-searchbar").classList.toggle("flex");
  };
  const openMenu = () => {
      document.getElementById("mobile-menu").classList.remove("hidden");
  };
  const closeMenu = () => {
      document.getElementById("mobile-menu").classList.add("hidden");
  };

  $('.search-btn').on('click',function(e) {
    $('nav').find('.searchbar').toggleClass('hidden')
  })

  $('.searchbar .close').on('click',function(e) {
    $$(this).closest('nav').find('.searchbar').addClass('hidden')
  })

  $('.hamburger').on('click',function(e) {
    $('#mobile-menu').toggleClass('hidden')
    $('body').toggleClass('overflow-hidden')
  })

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > $('header').outerHeight() + 100) {
      $('header').addClass('fixed-header')
    } else {
      $('header').removeClass('fixed-header')
    }
  })

  $('.open-profile').on('click',function(e) {
    e.preventDefault()
    if ($(this).closest('.menu-cta').find('.dashboard').hasClass('hidden')) {
      $(this).closest('.menu-cta').find('.dashboard').removeClass('hidden')
    } else {
      $(this).closest('.menu-cta').find('.dashboard').addClass('hidden')
    }
  })
})()