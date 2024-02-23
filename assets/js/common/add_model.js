$(document).ready(function () {
  var base_url = $("#base").val();
  $(document).on("click", "#add_model_data", function (e) {
    e.preventDefault();
    var data = $("#add_model_input_name").val();
    var which_model = $("#which_model").val();
    if (which_model == "other_source") {
      $.ajax({
        url: base_url + "admin/other_source/add_other_source",
        method: "POST",
        data: { other_source: data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#add_model").modal("hide");
              toastr["success"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
              $("#other_source_div").load(
                location.href + " #other_source_div>*",
                ""
              );
              $('#add_model_input_name').val('');

              // $("#privilege_type").val("");
            } else {
              toastr["error"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
            }
          }
        },
      });
    }
  });

  // end of document ready
});
