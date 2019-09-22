jQuery(document).ready(function($) {
  $("._themename_repeat_add").on("click", function(e) {
    let addMoreBtn = $(e.currentTarget);
    let lastRow = addMoreBtn
      .parent()
      .prev()
      .find("tr:last");
    let row = addMoreBtn
      .parent()
      .prev()
      .find("tr.hidden")
      .clone(true);
    row.removeClass("hidden");
    row.insertBefore(lastRow);
    row.find("._themename_repeat_input").focus();
  });

  $("._themename_repeat_remove").on("click", function() {
    $(this)
      .parents("tr")
      .remove();
    return false;
  });

  $("._themename_repeat_input").on("keypress", function(e) {
    if (e.keyCode === 13) {
      e.preventDefault();
      e.stopPropagation();
      $(this)
        .closest("table")
        .next()
        .find("._themename_repeat_add")
        .trigger("click");
    }
  });
});
