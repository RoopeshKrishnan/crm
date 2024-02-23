<div class="container-fluid py-4">
    <div class="row">

        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <p class="text-uppercase text-sm">Other Source</p>
                    <form action="" id="other_source_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Other Source name</label>
                                    <input class="form-control" type="text" value="" name="other_source" id="other_source" placeholder="Magazine">
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
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="table_id">
                                <thead class="">
                                    <tr>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">SL.NO</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">designation </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_other->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $other_source = $fetch_other->result();
                                        $i = 0;
                                        foreach ($other_source as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->knew_by_other_name ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_other" class="mx-3" value="<?= $row->knew_by_other_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_other" class="mx-3" value="<?= $row->knew_by_other_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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