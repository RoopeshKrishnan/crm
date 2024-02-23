<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Rent </p>
                    <form action="" id="rent_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Rent Type Name </label>
                                    <input class="form-control" type="text" value="" name="rent_name" id="rent_name" placeholder="Monthly rent ">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Unit Type </label>
                                    <select class="form-select" name="unit_type" id="unit_type">
                                        <option value="" selected disabled>--Select--</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="daily">Daily</option>
                                        <option value="hourly">Hourly</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Rent Duration </label>
                                    <input class="form-control" type="number" value="" name="rent_duration" id="rent_duration" placeholder="1 ">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Rent Amount </label>
                                    <input class="form-control" type="text" value="" name="rent_amount" id="rent_amount" placeholder="9999">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Advanced Amount </label>
                                    <input class="form-control" type="text" value="" name="advanced_amount" id="advanced_amount" placeholder="1000">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tax Included </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax_included" id="inlineRadio1" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax_included" id="inlineRadio2" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                          
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
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Rent type Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Unit Type  </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Rent Duration</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Rent Amount</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Advance Amount</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Tax included</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date </th>

                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_rent->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $rent = $fetch_rent->result();
                                        $i = 0;
                                        foreach ($rent as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->rental_type_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->unit_type ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->rent_duration ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->rent_amount ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->advanced_amount ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->tax_included_or_not ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_desi" class="mx-3" value="<?= $row->rental_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_desi" class="mx-3" value="<?= $row->rental_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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