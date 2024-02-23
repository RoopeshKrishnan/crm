<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Commission </p>
                    <form action="" id="commission_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Commission Name </label>
                                    <input class="form-control" type="text" value="" name="commission_name" id="commission_name" placeholder="Anything ">
                                </div>
                               
                            
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Commission Type </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="commission_type" id="inlineRadio1" value="amount">
                                        <label class="form-check-label" for="inlineRadio1">Amount</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="commission_type" id="inlineRadio2" value="percentage">
                                        <label class="form-check-label" for="inlineRadio2">Percentage</label>
                                    </div>
                          
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Cash/Percentage</label>
                                    <input class="form-control" type="text" value="" name="cash_or_percentage" id="cash_or_percentage" placeholder="5000">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">User Type </label>
                                    <select class="form-select" name="user_type" id="user_type">
                                        <option value="" selected disabled>--Select--</option>
                                        <option value="agent">Agent</option>
                                        <option value="staff">Staff</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Renewal  </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="renewal" id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="renewal" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                          
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Renewal period</label>
                                    <input class="form-control" type="text" value="" name="renewal_period" id="renewal_period" placeholder="9999">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Renewal commission </label>
                                    <input class="form-control" type="text" value="" name="renewal_commission" id="renewal_commission" placeholder="5">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Warranty Name </label>
                                    <input class="form-control" type="text" value="" name="warranty_name" id="warranty_name" placeholder="5">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Warranty Starting  </label>
                                    <input class="form-control" type="text" value="" name="warranty_starting" id="warranty_starting" placeholder="5">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Warranty time </label>
                                    <input class="form-control" type="text" value="" name="warranty_time" id="warranty_time" placeholder="5">
                                </div>
                               
                   
                                <button class="btn btn-primary col-2 mt-4" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="table_id">
                                <thead class="">
                                    <tr>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Commission Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Commission Type </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Cash/Percentage </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">User Type</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Renewal</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Renewal Period</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Renewal Commission</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Warranty Name</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Warranty Starting</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Warranty Time</th>

                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_commission->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $commission = $fetch_commission->result();
                                        $i = 0;
                                        foreach ($commission as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->commission_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->commission_type ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->cash_or_percentage ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->user_type ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->renewal ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->renewal_period ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->renewal_commission ?></span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->warranty_name ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->warranty_starting ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->warranty_time ?></span>
                                                </td>


                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_desi" class="mx-3" value="<?= $row->commission_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_desi" class="mx-3" value="<?= $row->commission_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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