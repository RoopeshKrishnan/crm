$(document).ready(function () {
    var base_url = $("#base").val();
 
    // adding privilege to users
  $("#privilege_to_user_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/privileges/privilege_to_user/add_privilege_to_users",
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
            $("#table_div").load(location.href + " #table_div>*", "");
            $("#pu").load(location.href + " #pu>*", "");
            $("#p_group").val("");
            $("#p_user").val("");
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
  /// privilege to user edit button click, show model and data
  $(document).on("click", "#edit_pri", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/privileges/privilege_to_user/edit_privilege_to_user",
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
  // privilege to user  delete
  $(document).on("click", "#delete_pri", function (e) {
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
              url: base_url + "admin/privileges/privilege_to_user/delete_privilege_to",
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
                    $("#table_div").load(location.href + " #table_div>*", "");
                    $("#pu").load(location.href + " #pu>*", "");
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
  