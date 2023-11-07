jQuery(document).ready(function ($) {
  // Function to show the popup
  function showPopup() {
    var popupContent = popup_params.htmlContent;
    $("body").append(
      '<div class="custom-popup-overlay"></div>' +
        '<div class="custom-popup-content">' +
        '<span class="custom-popup-close">&times;</span>' +
        popupContent +
        "</div>"
    );
    $(".custom-popup-overlay, .custom-popup-content").fadeIn();
  }

  // Close popup function
  function closePopup() {
    $(".custom-popup-overlay, .custom-popup-content").fadeOut(function () {
      $(this).remove();
    });
  }

  // Click event for the button
  $("body").on("click", "#custom-popup-plugin-button", function (e) {
    e.preventDefault();
    showPopup();
  });

  // Close event for the close button
  $("body").on("click", ".custom-popup-close", closePopup);

  // Close event for the overlay
  $("body").on("click", ".custom-popup-overlay", closePopup);

  // Set the popup to show after delay, if delay is not -1
  var delay = parseInt(popup_params.delay, 10);
  if (delay >= 0) {
    setTimeout(showPopup, delay * 60000); // delay in minutes
  }
});
