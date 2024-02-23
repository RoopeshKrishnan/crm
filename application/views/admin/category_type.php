<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm"> Category Type</p>
                    <form action="" id="category_type_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> Category </label>
                                    <select class="select-box form-control select2" name="category_id" id="category_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($category as $row) {
                                            echo '<option value="' . $row->category_id . '">' . $row->category . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Sub category </label>
                                    <select class="select-box form-control select2" name="sub_category_id" id="sub_category_id">
                                    <option value="" selected disabled>--Select--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> Category Type name</label>
                                    <input class="form-control" type="text" value="" name="category_type" id="category_type" placeholder="E-commerce">
                                </div>
                                <button class="btn btn-primary col-2 mt-4" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card" id="card_id">
                        <?php if (!$fetch_category_type->num_rows() > 0) {
                            echo '<p class="text-center font-weight-bold mb-0">No Category Type Added</p>';
                        } else { ?>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="table_id">
                                    <thead class="">
                                        <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Category </th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Sub Category </th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Category Type</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $category_type = $fetch_category_type->result();
                                        $i = 0;
                                        foreach ($category_type as $row) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->category ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->sub_category ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->category_type ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">
                                                    <a href="#" id="edit_sub_category" class="mx-3" value="<?= $row->category_type_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_sub_category" class="mx-3" value="<?= $row->category_type_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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