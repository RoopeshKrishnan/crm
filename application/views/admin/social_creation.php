<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Social Media</p>
                    <form action="" id="social_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="mb-3" type="file" name="social_image" id="social_image">
                                    <label for="example-text-input" class="form-control-label">Social Media name</label>
                                    <input class="form-control " type="text" value="" name="social" id="social" placeholder="Facebook">
                                    <button class="btn btn-primary  mt-4" type="submit">Save</button>
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
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Social Media Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Social Media Image </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Date</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_social->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $socials = $fetch_social->result();
                                        $i = 0;
                                        foreach ($socials as $row) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->social_media_name ?></p>
                                                </td>
                                                <td class="">
                                                <?php if($row->social_media_image){?><img width="80px" height="50px" style="object-fit: ;" src="<?php echo base_url() ?>assets/img/GL-img/social/<?php echo $row->social_media_image ?>"><?php } ?>                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">
                                                    <a href="#" id="edit_social" class="mx-3" value="<?= $row->social_id  ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_social" class="mx-3" value="<?= $row->social_id  ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
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