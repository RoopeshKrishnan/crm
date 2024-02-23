<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Service </p>
                    <form action="" id="service_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Service Name </label>
                                    <input class="form-control" type="text" value="" name="service_name" id="service_name" placeholder="Monthly service ">
                                </div>
                               
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Service Time(in Days)  </label>
                                    <input class="form-control" type="text" value="" name="service_time" id="service_time" placeholder="1 ">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Consumption  </label>
                                    <input class="form-control" type="text" value="" name="consumption" id="consumption" placeholder="anything">
                                </div>
                       
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Payment Type  </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio1" value="free">
                                        <label class="form-check-label" for="inlineRadio1">free</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio2" value="paid">
                                        <label class="form-check-label" for="inlineRadio2">paid</label>
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
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Service Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Service Time(in Days)   </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Consumption </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Payment Type </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_service->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $service = $fetch_service->result();
                                        $i = 0;
                                        foreach ($service as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->service_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->service_time ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->consumption ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->payment_type ?></span>
                                                </td>
                                 
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_desi" class="mx-3" value="<?= $row->service_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_desi" class="mx-3" value="<?= $row->service_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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