$(document).ready(function () {
  var base_url = $("#base").val();

  // shift form submission
  $("#shift_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/shift/add_shift",
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
            $("#table_id").load(location.href + " #table_id>*", "");
            $("#shift_name").val("");
            $("#shift_start_time").val("");
            $("#shift_end_time").val("");
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
   /// shift edit button click, show model and data
   $(document).on("click", "#edit_shift", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/shift/edit_shift",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Shift Details");
            $("#edit_model_label_name").text("Shift ");
            $("#which_model").val("shift");
            $("#primary_key_id").val(data.post.shift_id);
            $("#edit_model_input_name").val(data.post.shift_type);
            $("#edit_shift_start_time").val(
              data.post.starting_time.substring(0, 5)
            );
            $("#edit_shift_end_time").val(
              data.post.ending_time.substring(0, 5)
            );
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
  // shift delete
  $(document).on("click", "#delete_shift", function (e) {
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
              url: base_url + "admin/shift/delete_shift",
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
                    $("#table_id").load(location.href + " #table_id>*", "");
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
