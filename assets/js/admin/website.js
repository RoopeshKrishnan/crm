$(document).ready(function () {
    var base_url = $("#base").val();
  
   // website form submission
  $("#website_form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: base_url + "admin/website/add_website",
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
          $("#website").val("");
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
   /// website edit button click, show model and data
   $(document).on("click", "#edit_web", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/website/edit_web",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Website Name");
            $("#edit_model_label_name").text("Website Name");
            $("#which_model").val("website");
            $("#primary_key_id").val(data.post.knew_by_website_id);
            $("#edit_model_input_name").val(data.post.website_name);
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
  // website delete
  $(document).on("click", "#delete_web", function (e) {
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
              url: base_url + "admin/website/delete_website",
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
  