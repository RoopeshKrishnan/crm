<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Shift Name </p>
                    <form action="" id="shift_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Shift type name</label>
                                    <input class="form-control" type="text" value="" name="shift_name" id="shift_name" placeholder="morning">
                                    <label for="example-text-input" class="form-control-label">Shift Starting Time </label>
                                    <input class="form-control" type="time" value="" name="shift_start_time" id="shift_start_time">
                                    <label for="example-text-input" class="form-control-label">Shift Ending Time </label>
                                    <input class="form-control" type="time" value="" name="shift_end_time" id="shift_end_time">
                                    <button class="btn btn-primary col-2 mt-4" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr class="horizontal dark">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="table_id">
                                <thead class="">
                                    <tr>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Shift Name</th>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Starting Time</th>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Ending Time</th>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date&time </th>
                                        <th class="  text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_shift->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $shift = $fetch_shift->result();
                                        $i = 0;
                                        foreach ($shift as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->shift_type ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->starting_time ?></p>
                                                </td>       <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->ending_time ?></p>
                                                </td>
                                                <td class="align-middle  ">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm  ">
                                                    <a href="#" id="edit_shift" class="mx-3" value="<?= $row->shift_id  ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_shift" class="mx-3" value="<?= $row->shift_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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