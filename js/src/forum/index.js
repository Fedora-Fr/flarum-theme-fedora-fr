import {extend, override} from 'flarum/common/extend';

// We provide our extension code in the form of an "initializer".
// This is a callback that will run after the core has booted.
app.initializers.add('fedora-fr-theme', function(app) {
  var btn = $('#backToTop');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });
});
