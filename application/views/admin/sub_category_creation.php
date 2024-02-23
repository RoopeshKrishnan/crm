<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Sub Category</p>
                    <form action="" id="sub_category_form">
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
                                    <label for="example-text-input" class="form-control-label">Sub Category name</label>
                                    <input class="form-control" type="text" value="" name="sub_category" id="sub_category" placeholder="E-commerce">
                                </div>
                                <button class="btn btn-primary col-2 mt-4" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card" id="card_id">
                        <?php if (!$fetch_sub_category->num_rows() > 0) {
                            echo '<p class="text-center font-weight-bold mb-0">No Sub Categories Added</p>';
                        } else { ?>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="table_id">
                                    <thead class="">
                                        <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Category </th>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Sub Category </th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sub_category = $fetch_sub_category->result();
                                        $i = 0;
                                        foreach ($sub_category as $row) {
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
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">
                                                    <a href="#" id="edit_sub_category" class="mx-3" value="<?= $row->sub_category_id  ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_sub_category" class="mx-3" value="<?= $row->sub_category_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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