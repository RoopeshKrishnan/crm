<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Tax</p>
                    <form action="" id="tax_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tax in percentage</label>
                                    <input class="form-control" type="number" value="" name="tax" id="tax" placeholder="10">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <button class="btn btn-primary col-2 mt-4" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card" id="card_id">
                        <?php if (!$fetch_tax->num_rows() > 0) {
                            echo '<p class="text-center font-weight-bold mb-0">No Tax Added</p>';
                        } else { ?>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="table_id">
                                    <thead class="">
                                        <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Tax in Percentage </th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tax = $fetch_tax->result();
                                        $i = 0;
                                        foreach ($tax as $row) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->tax_in_percentage ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">
                                                    <a href="#" id="edit_tax" class="mx-3" value="<?= $row->tax_id  ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_tax" class="mx-3" value="<?= $row->tax_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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