$(document).ready(function () {
  var base_url = $("#base").val();
 // privilege type form submit
  $("#privilege_type_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + "admin/privileges/privilege_type/add_privilege_type",
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
            $("#pt_div").load(location.href + " #pt_div>*", "");
            $("#privilege_type").val("");
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
  /// privilege type edit button click, show model and data
  $(document).on("click", "#edit_pt", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/privileges/privilege_type/edit_privilege_type",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Privilege Type");
            $("#edit_model_label_name").text("Privilege Type");
            $("#which_model").val("privilege_type");
            $("#primary_key_id").val(data.post.privilege_type_id);
            $("#edit_model_input_name").val(data.post.privilege_type);
          } else {
            toastr["error"](data.message);
            toastr.options = {
              closeButton: true,
              progressBar: true,
            };
          }
        },
      });
    }
  });

  // privilege type delete
  $(document).on("click", "#delete_pt", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    if (del_id == "") {
      alert("Delete id required");
    } else {
      bootbox.confirm({
        title: "Alert ",
        message: "Do you want to Delete This ?",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Cancel',
          },
          confirm: {
            label: '<i class="fa fa-check"></i> Confirm',
          },
        },
        callback: function (result) {
          if (result) {
            $.ajax({
              url: base_url + "admin/privileges/privilege_type/delete_privilege_type",
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
                    $("#pt_div").load(location.href + " #pt_div>*", "");
                    $("#privilege_type").val("");
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
          } else {
          }
        },
      });
    }
  });
  // end of document ready
});
