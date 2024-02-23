<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <p class="text-uppercase text-sm">privillage grouptype</p>
          <form action="" id="privilage_gt_form">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">privillage group</label>
                  <select class="select-box form-control select2" name="privilege_group" id="prg">
                    <option value="" selected disabled>--Select--</option>
                    <?php
                    foreach ($privilege_group as $row) {
                      echo '<option value="' . $row->privilege_group_id . '">' . $row->privilege_group . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">privillage type</label>
                  <select class="select-box form-control select2" name="privilege_type" id="choices-button-agent">
                    <option value="" selected disabled>--Select--</option>
                    <?php
                    foreach ($privilege_type as $row) {
                      echo '<option value="' . $row->privilege_type_id . '">' . $row->privilege_type . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <button class="btn btn-primary col-2 ms-auto">Save</button>
                </div>
              </div>
            </div>
          </form>
          <hr class="horizontal dark">

          <div class="card">
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="pgt_div">
                <thead class="">
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">privilege group</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">privilege type</th>
                    <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!count($privilege_group_type) > 0) {
                    echo 'Empty';
                  } else {
                    $i = 0;
                    foreach ($privilege_group_type as $pgt) {
                      $i++;
                  ?>
                      <tr>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                        </td>
                        <td class="">
                          <p class="text-xs font-weight-bold mb-0"><?= $pgt->privilege_group ?></p>
                        </td>
                        <td class="">
                          <p class="text-xs font-weight-bold mb-0"><?= $pgt->privilege_type ?></p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?= $pgt->created_date ?></span>
                        </td>
                        <td class="text-sm text-center">

                          <!-- <a href="#" id="edit_pt" class="mx-3" value="<?=  $pgt->privilege_group_type_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                            <i class="fas fa-user-edit text-dark"></i>
                          </a> -->
                          <a href="#" id="delete_pgt" value="<?= $pgt->privilege_group_type_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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