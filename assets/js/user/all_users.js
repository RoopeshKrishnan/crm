$(document).ready(function () {
  var base_url = $("#base").val();

  // deactivate user, when pressing the deactivate button in all users page
  $(document).on("click", "#deactivate_user", function (e) {
    e.preventDefault();
    var deactivate_id = $(this).attr("value");
    if (deactivate_id == "") {
      alert("Something Wrong");
    } else {
      bootbox.confirm({
        title: "Alert ",
        message: "Do you want to Deactivate This User?",
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
              url: base_url + "user/all_users/deactivate_user",
              type: "post",
              dataType: "json",
              data: {
                deactivate_id: deactivate_id,
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
  // to view a particular users all data, in all users page if we select a user this function will work
  $(document).on("click", "#select_user", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "user/all_users/selected_user",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Privilege for Users");
            $("#edit_model_label_name").text("User");
            $("#edit_model_input_name").hide();
            $("#which_model").val("privilege_to_user");
            $("#primary_key_id").val(data.post.privileges_id);
            $("#pto_user_id").val(data.post.user_id);
            $("#display_username").text(data.post.user_name);
            $("#p_to_user").val(data.post.privilege_group_id).trigger("change");
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
  // end of document ready
});
