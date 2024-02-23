$(document).ready(function () {
    var base_url = $("#base").val();
  
// get corresponding sub category by clicking category
$('#category_id').click(function(){
    var category_id = $('#category_id').val();
    console.log(category_id)
    if(category_id != 0){
        $.ajax({
            type : 'POST',
            url: base_url + "admin/category_type/fetch_sub_category",
            data : {category_id:category_id},
            success : function(data){
                var wc = document.getElementById("sub_category_id");            
                wc.innerHTML = data;
            }
        })
    }
})

// Sub Category creation
$("#category_type_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/category_type/add_category_type",
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
            $("#category_id").val("");
            $("#sub_category_id").val("");
            $("#category_type").val("");
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
  /// sub category edit button click, show model and data
  $(document).on("click", "#edit_sub_category", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    if (edit_id == "") {
    } else {
      $.ajax({
        url: base_url + "admin/sub_category/edit_sub_category",
        type: "post",
        dataType: "json",
        data: {
          edit_id: edit_id,
        },
        success: function (data) {
          if (data.response == "success") {
            $("#edit_model").modal("show");
            $("#edit_model_heading").text("Edit Sub Category");
            $("#edit_model_label_name").text("Sub Category Name");
            $("#which_model").val("sub_category");
            $("#primary_key_id").val(data.post.sub_category_id);
            $("#edit_model_input_name").val(data.post.sub_category);
            $("#cat_id").val(data.post.category_id).trigger("change");
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
  // delete sub category
  $(document).on("click", "#delete_sub_category", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    if (del_id == "") {
      alert("Something Wrong");
    } else {
      bootbox.confirm({
        title: "Alert ",
        message: "Do you want to Delete This Sub Category?",
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
              url: base_url + "admin/sub_category/delete_sub_category",
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
  