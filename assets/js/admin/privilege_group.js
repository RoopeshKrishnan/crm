$(document).ready(function () {
  var base_url = $("#base").val();

  // privilege group form submit
  $("#privilege_group_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/privileges/privilege_group/add_privilege_group",
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
            $("#pg_div").load(location.href + " #pg_div>*", "");
            $("#privilege_group").val("");
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
  /// privilege group edit button click, show model and data
  $(document).on("click", "#edit_pg", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/privileges/privilege_group/edit_privilege_group",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Privilege Group");
            $("#edit_model_label_name").text("Privilege Group");
            $("#which_model").val("privilege_group");
            $("#primary_key_id").val(data.post.privilege_group_id);
            $("#edit_model_input_name").val(data.post.privilege_group);
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
   // privilege Group delete
   $(document).on("click", "#delete_pg", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    if (del_id == "") {
      alert("Delete id required");
    } else {
      $.ajax({
        url: base_url + "admin/privileges/privilege_group/delete_privilege_group",
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
              $("#pg_div").load(location.href + " #pg_div>*", "");
              $("#privilege_group").val("");
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
