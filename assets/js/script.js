$('.header__burger').on('click', function () {
  $('.header__list').toggleClass('burger_active');
  $(this).toggleClass('fa-xmark');
  $('body').toggleClass('lock');
});