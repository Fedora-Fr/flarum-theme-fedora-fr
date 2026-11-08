import { extend, override } from "flarum/common/extend";

// We provide our extension code in the form of an "initializer".
// This is a callback that will run after the core has booted.
app.initializers.add("fedora-fr-theme", function (app) {
  // Back to the top button.
  var scrollTopBtn = $("#scrollTopBtn");
  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      scrollTopBtn.addClass("visible");
    } else {
      scrollTopBtn.removeClass("visible");
    }
  });
  scrollTopBtn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
  });

  // Prevent full refresh
  var ffrHomeLink = $(".ffr-home-link");
  for (var i = 0; i < ffrHomeLink.length; i++) {
    ffrHomeLink[i].addEventListener("click", (e) => {
      if (e.ctrlKey || e.metaKey || e.button === 1) return;
      e.preventDefault();
      app.history.home();

      // Reload the current user so that their unread notification count is refreshed.
      const userId = app.session.user?.id();
      if (userId) {
        app.store.find("users", userId);
        m.redraw();
      }
    });
  }
});
