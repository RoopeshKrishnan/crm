$(document).ready(function () {
    var base_url = $("#base").val();

    $('.select2_agent').select2({
      language: {
        noResults: function() {
          return $('<button type="button" class="col-12 btn btn-block btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addagent">Add Agent</button>');
        }
      },
    });
    $('.select2_customer').select2({
        language: {
          noResults: function() {
            return $('<button type="button" class="col-12 btn btn-block btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addagent">Add cus</button>');
          }
        },
      });
// $('.select2_customer').select2();
$('.select2_all_item').select2({
    tags: true,
    createTag: function(params) {
      return {
        id: params.term,
        text: 'Add New: ' + params.term,
        isNew: true
      };
    },
    templateResult: function(data) {
      if (data.isNew) {
        return $('<span class="select2-tag">').text(data.text);
      }
      return data.text;
    }
  });
  $('#mySelect').on('select2:select', function(e) {
    var data = e.params.data;
    if (data.isNew) {
      // Perform your action for adding a new item here
      console.log('Add new item:', data.text);
    }
  });

    $('#other_src_btn').click(function () {
        // var other_source = $('#other_source').val();
       
        // $("#other_source_div").load(location.href + " #other_source_div>*", "");
        $("#add_model").modal("show");
        $("#add_model_heading").text("Add New Source");
        $("#add_model_label_name").text("New Source ");
        $('#add_model_input_name').attr('placeholder', 'Notice');
        $("#which_model").val("other_source");
    })

    $('#customer_form').submit(function(e) {
        e.preventDefault();
        // var phone_number = $('#telephone').val();
        // alert(phone_number)
        var formData = $(this).serialize();
        $.ajax({
            url : base_url + "user/customer_registration/customer_registration_function",
            type: 'POST',
            data: formData,
            success: function(data) {
                var response = JSON.parse(data);
                if (response.success) {
                    window.location.href =  base_url + "customer-item-order"
                } else {
                  toastr["error"](response.errors);
                  toastr.options = {
                    closeButton: true,
                    progressBar: true,
                  };
                    // alert(response.errors);
                }
            },
            error: function() {
                alert('Error occurred while saving data.');
           }
        });
    });

 

    $('.all_item_class').hide();

    $(document).on('change', '.item_check', function(){  
        var item_display_id = $(this).attr("id");   
        $('#divis'+item_display_id+'').toggle('slow')
    });


    //////////////// remove button click ///////////
    $(document).on('click', '.class_rmv_itm', function () {
        var rmv_id = $(this).attr("id");
        // alert (rmv_id)
        $('#divis' + rmv_id + '').toggle('slow')
        $('#' + rmv_id + '').prop('checked', false);
    });



    $('#agent_form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url : base_url + "user/user_controller/agent_model_registration",
            type: 'POST',
            data: formData,
            dataType: "json",
          success: function (data) {
            console.log(data.response)
            if (data.response =="success") {
              toastr["success"](data.message)
              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
              $('#addagent').modal('hide');
              $("#agent_div").load(location.href + " #agent_div>*", "");
            } else {
              toastr["error"](data.message)
              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
          },
            error: function() {
                alert('Error occurred while saving data.');
           }
        });
    });
  
    // end of document ready
  });
  