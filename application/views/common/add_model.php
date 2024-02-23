<section>
  <!-- Add Modal -->
  <div class="modal fade" id="add_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_model_heading">Heading</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add_model_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="primary_key_id" id="primary_key_id" value="">
            <input type="hidden" id="which_model" value="">
            <div class="mb-3">
              <label for="username" class="form-label" id="add_model_label_name">Label Heading </label>
              <input type="text" class="form-control" id="add_model_input_name" name="add_model_input_name" placeholder="Enter New Privilege Type" value="" autofocus />
            </div>
        </div>
        <div class="modal-footer">
          <button id="add_model_data" type="button" class="btn btn-primary btn-small ml-auto" name="submit">Update </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>