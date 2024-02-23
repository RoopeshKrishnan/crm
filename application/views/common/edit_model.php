<section>
  <!-- update Modal -->
  <div class="modal fade" id="edit_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_model_heading">Heading</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit_model_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="primary_key_id" id="primary_key_id" value="">
            <input type="hidden" id="which_model" value="">
            <div class="mb-3">
              <label for="username" class="form-label" id="edit_model_label_name">Label Heading </label>
              <input type="text" class="form-control" id="edit_model_input_name" name="edit_model_input_name" placeholder="Enter New Privilege Type" value="" autofocus />
              <?php
              if (($active == 'shift_creation')) {
                echo '<label for="username" class="form-label" id="">Shift Starting Time</label>';
                echo '<input class="form-control" type="time" value="" name="edit_shift_start_time" id="edit_shift_start_time">';
                echo '<label for="username" class="form-label" id="">Shift Ending Time</label>';
                echo '<input class="form-control" type="time" value="" name="edit_shift_end_time" id="edit_shift_end_time">';
              }
              if ($active == 'social_creation') {
                echo '<br>';
                echo '<input class="form-control" type="file" value="" name="edit_spic" id="edit_spic">';
              }
              if ($active == 'privilege_to_user') {
                echo '<br>
                <input type="hidden" name="pto_user_id" id="pto_user_id" value="">
                <label for="" class="btn btn-lg" id="display_username">Label Heading </label><br>
                <label for="username" class="form-label" id="edit_model_label_name">Privilege Group</label>
                <select class="select-box form-control select2" name="p_to_user" id="p_to_user">
                <option value="" selected disabled>--Select--</option>';
                foreach ($privilege_group as $row) {
                  echo '<option value="' . $row->privilege_group_id . '">' . $row->privilege_group . '</option>';
                }
                echo '</select>';
              }
              if ($active == 'sub_category_creation') {
                echo '
                <label for="username" class="form-label" id="">Category</label>
                <select class="select-box form-control select2" name="cat_id" id="cat_id">
                <option value="" selected disabled>--Select--</option>';
                foreach ($category as $row) {
                  echo '<option value="' . $row->category_id . '">' . $row->category . '</option>';
                }
                echo '</select>';
                echo '';
              }
              ?>
            </div>
        </div>
        <div class="modal-footer">
          <button id="update_edit_model_data" type="button" class="btn btn-primary btn-small ml-auto" name="submit">Update </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>