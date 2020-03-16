require('jquery')

$(function(){
  // SPメニュー
  $('.js-toggle-sp-menu').on('click', function () {
    $(this).toggleClass('active');
    $('.js-toggle-sp-menu-target').toggleClass('active');
  });

  // フラッシュメッセージのfadeout
  $(function(){
    $('.js-flash-message').fadeOut(5000);
  });
})