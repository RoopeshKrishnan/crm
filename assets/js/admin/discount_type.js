$(document).ready(function () {
    var base_url = $("#base").val();
  
    // tax creation
    $("#discount_type_form").submit(function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: base_url + "admin/discount_type/add_discount_type",
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
              $("#discount_type_name").val("");
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
    /// tax edit button click, show model and data
    $(document).on("click", "#edit_tax", function (e) {
      e.preventDefault();
      var edit_id = $(this).attr("value");
      if (edit_id == "") {
      } else {
        $.ajax({
          url: base_url + "admin/tax/edit_tax",
          type: "post",
          dataType: "json",
          data: {
            edit_id: edit_id,
          },
          success: function (data) {
            if (data.response == "success") {
              $("#edit_model").modal("show");
              $("#edit_model_heading").text("Edit Tax");
              $("#edit_model_label_name").text("Tax in Percentage");
              $("#which_model").val("tax");
              $("#primary_key_id").val(data.post.tax_id);
              $("#edit_model_input_name").val(data.post.tax_in_percentage);
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
    // delete Tax
    $(document).on("click", "#delete_tax", function (e) {
      e.preventDefault();
      var del_id = $(this).attr("value");
      if (del_id == "") {
        alert("Something Wrong");
      } else {
        bootbox.confirm({
          title: "Alert ",
          message: "Do you want to Delete This Tax?",
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
                url: base_url + "admin/tax/delete_tax",
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
  