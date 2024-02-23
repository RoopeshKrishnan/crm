$(document).ready(function () {
  var base_url = $("#base").val();

  $("#privilage_gt_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/privileges/privilege_group_type/add_privilege_group_type",
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        if (data != "") {
          if (data.response == "success") {
            toastr["success"](data.message);
            toastr.options = {
              closeButton: true,
              progressBar: true,
            };
            $("#pgt_div").load(location.href + " #pgt_div>*", "");
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
  });
  // privilege group type delete
  $(document).on("click", "#delete_pgt", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    if (del_id == "") {
      alert("Delete id required");
    } else {
      $.ajax({
        url: base_url + "admin/privileges/privilege_group_type/delete_privilege_group_type",
        type: "post",
        dataType: "json",
        data: {
          del_id: del_id,
        },
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              toastr["success"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
              $("#pgt_div").load(location.href + " #pgt_div>*", "");
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
