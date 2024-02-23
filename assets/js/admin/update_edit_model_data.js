$(document).ready(function () {
  var base_url = $("#base").val();
  // update privilege type and privilege group
  $(document).on("click", "#update_edit_model_data", function (e) {
    e.preventDefault();
    var edit_id = $("#primary_key_id").val();
    var edit_data = $("#edit_model_input_name").val();
    var which_model = $("#which_model").val();
    if (which_model == "privilege_type") {
      $.ajax({
        url: base_url + "admin/privileges/privilege_type/update_privilege_type",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "privilege_group") {
      $.ajax({
        url: base_url + "admin/privileges/privilege_group/update_privilege_group",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "shift") {
      var start_time = $("#edit_shift_start_time").val();
      var end_time = $("#edit_shift_end_time").val();
      $.ajax({
        url: base_url + "admin/shift/update_shift",
        method: "POST",
        data: {
          edit_id: edit_id,
          edit_data: edit_data,
          start_time: start_time,
          end_time: end_time,
        },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
              toastr["success"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
              $("#table_id").load(location.href + " #table_id>*", "");
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
    } else if (which_model == "designation") {
      $.ajax({
        url: base_url + "admin/designation/update_designation",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
              toastr["success"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
              $("#table_id").load(location.href + " #table_id>*", "");
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
    } else if (which_model == "website") {
      $.ajax({
        url: base_url + "admin/website/update_website",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "other") {
      $.ajax({
        url: base_url + "admin/other_source/update_other",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "social") {
      var formData = new FormData(document.getElementById("edit_model_form"));
      $.ajax({
        url: base_url + "admin/social_media/update_social",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          console.log(data);
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "privilege_to_user") {
      var pto_user_id = $("#pto_user_id").val();
      var p_to_user = $("#p_to_user").val();
      $.ajax({
        url: base_url + "admin/privileges/privilege_to_user/update_privilege_to_user",
        method: "POST",
        data: {
          edit_id: edit_id,
          pto_user_id: pto_user_id,
          p_to_user: p_to_user,
        },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
              toastr["success"](data.message);
              toastr.options = {
                closeButton: true,
                progressBar: true,
              };
              $("#table_div").load(location.href + " #table_div>*", "");
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
    } else if (which_model == "category") {
      $.ajax({
        url: base_url + "admin/category/update_category",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "sub_category") {
      var cat_id = $("#cat_id").val();
      $.ajax({
        url: base_url + "admin/sub_category/update_sub_category",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data, cat_id: cat_id },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "tax") {
      $.ajax({
        url: base_url + "admin/tax/update_tax",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    } else if (which_model == "tax_type") {
      $.ajax({
        url: base_url + "admin/tax_type/update_tax_type",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    }else if (which_model == "department") {
      $.ajax({
        url: base_url + "admin/department/update_department",
        method: "POST",
        data: { edit_id: edit_id, edit_data: edit_data },
        dataType: "json",
        success: function (data) {
          if (data != "") {
            if (data.response == "success") {
              $("#edit_model").modal("hide");
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
    }
  });

  // end of document ready
});
