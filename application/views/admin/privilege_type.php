<div class="container-fluid py-4">
  <div class="row">

    <div class="col-md-12">
      <div class="card">

        <div class="card-body">
          <p class="text-uppercase text-sm"><?= $page_title ?></p>
          <form action="" id="privilege_type_form">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">privilege type name</label>
                  <input class="form-control" name="privilege_type" id="privilege_type" type="text" value="" placeholder="ADD">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <button id="type_id" class="btn btn-primary col-2 mt-4">Save</button>
                </div>
              </div>
            </div>
          </form>
          <hr class="horizontal dark">

          <div class="card">
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="pt_div">
                <thead class="">
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">privillage type</th>
                    <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!$fetch_privilege_type->num_rows() > 0) {
                    echo 'Empty';
                  } else {
                    $privilege_type = $fetch_privilege_type->result();
                    $i = 0;
                    foreach ($privilege_type as $pt) {
                      $i++;
                  ?>
                      <tr>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                        </td>

                        <td class="">
                          <p class="text-xs font-weight-bold mb-0"><?= $pt->privilege_type ?></p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= $pt->created_date ?></span>
                        </td>
                        <td class="text-sm text-center">

                          <a href="#" id="edit_pt" class="mx-3" value="<?= $pt->privilege_type_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                            <i class="fas fa-user-edit text-dark"></i>
                          </a>
                          <a href="#" id="delete_pt" value="<?= $pt->privilege_type_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                            <i class="fas fa-trash text-danger"></i>
                          </a>
                        </td>
                      </tr>

                  <?php }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



