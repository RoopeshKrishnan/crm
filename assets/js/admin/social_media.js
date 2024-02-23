$(document).ready(function () {
  var base_url = $("#base").val();

  // social media form submission
  $("#social_form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: base_url + "admin/social_media/add_socials",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.response == "success") {
          toastr["success"](data.message);
          toastr.options = {
            closeButton: true,
            progressBar: true,
          };
          $("#table_id").load(location.href + " #table_id>*", "");
          $("#designation").val("");
        } else {
          toastr["error"](data.message);
          toastr.options = {
            closeButton: true,
            progressBar: true,
          };
        }
      },
    });
  });
/// Socials creation edit button click, show model and data
$(document).on("click", "#edit_social", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/social_media/edit_social",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Social Media Name");
            $("#edit_model_label_name").text("Social Media Name");
            $("#which_model").val("social");
            $("#primary_key_id").val(data.post.social_id);
            $("#edit_model_input_name").val(data.post.social_media_name);
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
  // social media delete
  $(document).on("click", "#delete_social", function (e) {
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
              url: base_url + "admin/social_media/delete_social",
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
