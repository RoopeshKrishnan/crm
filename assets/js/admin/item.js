$(document).ready(function () {
    var base_url = $("#base").val();
  
// get corresponding sub category by clicking category
$('#icategory_id').click(function(){
    var category_id = $('#icategory_id').val();
    if(category_id != 0){
        $.ajax({
            type : 'POST',
            url: base_url + "admin/item/fetch_sub_category",
            data : {category_id:category_id},
            success : function(data){
                var wc = document.getElementById("isub_category_id");            
                wc.innerHTML = data;
            }
        })
    }
})

// get corresponding  category type by clicking sub category
$('#isub_category_id').click(function(){
    var sub_category_id = $('#isub_category_id').val();
    if(sub_category_id != 0){
        $.ajax({
            type : 'POST',
            url: base_url + "admin/item/fetch_category_type",
            data : {sub_category_id:sub_category_id},
            success : function(data){
                var wc = document.getElementById("icategory_type_id");            
                wc.innerHTML = data;
            }
        })
    }
})

// item creation
$("#item_form").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: base_url + "admin/item/add_item",
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
            $("#item_name").val("");
            $("#icategory_id").val("");
            $("#isub_category_id").val("");
            $("#icategory_type_id").val("");
            $("#item_unit").val("");
            $("#min_seller_unit").val("");
            $("#contain_unit").val("");
            $('input[type="radio"]').prop("checked", false);
            $("#tax_type_id").val("");
            $("#tax_id").val("");
            $('input[type="checkbox"]').prop('checked', false);

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
  