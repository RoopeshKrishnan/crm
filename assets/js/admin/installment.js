$(document).ready(function () {
    var base_url = $("#base").val();
  
     // designation form submission
  $("#installment_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/installment/add_installment",
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (data) {
        console.log(data)
        if (data != "") {
          if (data.response == "success") {
            toastr["success"](data.message);
            toastr.options = {
              closeButton: true,
              progressBar: true,
            };
            $("#pt_div").load(location.href + " #pt_div>*", "");
            $("#installment_name").val("");
            $("#installment_amount").val("");
            $("#installment_duration").val("");

          } else {
            toastr["error"](data.message);
            toastr.options = {
              closeButton: true,
              progressBar: true,
            };
          }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("AJAX Error: " + textStatus);
        console.log(errorThrown);
      }
    });
  });
    /// designation edit button click, show model and data
  $(document).on("click", "#edit_desi", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/designation/edit_designation",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Designation");
            $("#edit_model_label_name").text("Designation ");
            $("#which_model").val("designation");
            $("#primary_key_id").val(data.post.designation_id);
            $("#edit_model_input_name").val(data.post.designation);
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

  // designation delete
  $(document).on("click", "#delete_desi", function (e) {
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
              url: base_url + "admin/designation/delete_designation",
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
  