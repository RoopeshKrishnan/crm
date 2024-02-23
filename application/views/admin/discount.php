<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Discount </p>
                    <form action="" id="discount_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Discount Name </label>
                                    <input class="form-control" type="text" value="" name="discount_name" id="discount_name" placeholder="Anything ">
                                </div>
                               
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Discount Type  </label>
                                    <select class="select-box form-control select2" name="discount_type_id" id="discount_type_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($discount_type as $row) {
                                            echo '<option value="' . $row->discount_type_id . '">' . $row->discount_type . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Amount/Percentage </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="amount_type" id="inlineRadio1" value="amount">
                                        <label class="form-check-label" for="inlineRadio1">Amount</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="amount_type" id="inlineRadio2" value="percentage">
                                        <label class="form-check-label" for="inlineRadio2">Percentage</label>
                                    </div>
                          
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Amount/Percentage</label>
                                    <input class="form-control" type="text" value="" name="amount_or_percentage" id="amount_or_percentage" placeholder="9999">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Number of Product </label>
                                    <input class="form-control" type="text" value="" name="no_product" id="no_product" placeholder="5">
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
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Discount Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Discount Type </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Amount Type</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Amount/Percentage</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Number Of Product</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_discount->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $discount = $fetch_discount->result();
                                        $i = 0;
                                        foreach ($discount as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->discount_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->discount_type ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->amount_type ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->amount_or_percentage ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->no_product ?></span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_desi" class="mx-3" value="<?= $row->discount_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_desi" class="mx-3" value="<?= $row->discount_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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