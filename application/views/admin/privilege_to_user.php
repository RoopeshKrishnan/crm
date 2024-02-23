<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Add Privilege To Users</p>
                    <form action="" id="privilege_to_user_form">
                        <div class="row">
                            <div class="col-md-4" id="pu">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">User</label>
                                    <select class="select-box form-control select2" name="p_user" id="p_user">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($users as $row) {
                                            echo '<option value="' . $row->user_id . '">' . $row->user_name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">privillage Group</label>
                                    <select class="select-box form-control select2" name="p_group" id="p_group">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($privilege_group as $row) {
                                            echo '<option value="' . $row->privilege_group_id . '">' . $row->privilege_group . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <button class="btn btn-primary ms-auto">Save</button>
                                </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="table_div">
                                <thead class="">
                                    <tr>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">User Name</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">privilege group</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!count($privilege_user) > 0) {
                                        echo 'Empty';
                                    } else {
                                        $i = 0;
                                        foreach ($privilege_user as $pgt) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $pgt->user_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $pgt->privilege_group ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $pgt->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">
                                                    <a href="#" id="edit_pri" class="mx-3" value="<?= $pgt->privileges_id  ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_pri" class="mx-3" value="<?= $pgt->privileges_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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