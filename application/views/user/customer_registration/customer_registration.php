<div class="container-fluid mt-n4 py-4">
    <div class="row">
        <div class="col-12 ">
            <form action="" id="customer_form">
                <div class="card  p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">

                    <div>
                        <h5 class="font-weight-bolder mb-0">New Enquiry </h5>
                        <p id="jj" class="mb-0 text-sm">Mandatory informations</p>

                        <div class="button-row d-flex mt-n5 mb-4">
                            <button type="submit" class="col-4 btn bg-gradient-dark ms-auto mb-0 js-btn-next p-3 ">Next</button>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                        <label>Name</label>
                                        <input class=" form-control" type="text" name="customer_name" placeholder="customer name" />
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <label>Enter Mobile Number</label>
                                        <input type="tel" id="telephone" class=" form-control" name="phone" placeholder="Enter Mobile Number" value="">
                                        <div class="row px-xl-5 px-sm-4 px-0  mt-1">
                                            <div class="col-3 ms-auto px-1">
                                                <a class="btn btn-outline-light mb-0 w-100" id="btn-india" href="javascript:;">
                                                    <img width="32px" height="22px" src="<?= base_url() ?>assets/img/GL-img/flag/ind.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="col-3 px-1">
                                                <a class="btn btn-outline-light mb-0 w-100" id="btn-uk" href="javascript:;">
                                                    <img width="32px" height="22px" src="<?= base_url() ?>assets/img/GL-img/flag/uk.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="col-3 px-1">
                                                <a class="btn btn-outline-light mb-0 w-100" id="btn-usa" href="javascript:;">
                                                    <img width="32px" height="22px" src="<?= base_url() ?>assets/img/GL-img/flag/usa.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="col-3 me-auto px-1">
                                                <a class="btn btn-outline-light mb-0 w-100" id="btn-canada" href="javascript:;">
                                                    <img width="32px" height="22px" src="<?= base_url() ?>assets/img/GL-img/flag/canada.jpg" alt="" value="+1">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                        <label>Email Address</label>
                                        <input class=" form-control" type="email" name="email" placeholder="Email Address" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-lg-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row   mt-3">
                                        <h6 class="font-weight-bolder text-center">Socials</h6>
                                        <?php $i = 0;
                                        foreach ($socials as $row) {
                                            $i++ ?>
                                            <div class="col-lg-4 col-md-2 col-3 px-1 form-check">
                                                <label class="btn  btn-outline-secondary  " for="btn<?= $i ?>">
                                                    <img width="32px" height="32px" src="<?= base_url() ?>assets/img/GL-img/social/<?= $row->social_media_image ?>" alt="">
                                                    <input class="form-check-input social-btn" type="checkbox" name="social[]" value="<?= $row->social_id  ?>" id="btn<?= $i ?>">
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($website as $row) { ?>
                                        <div class="row  mt-3">
                                            <div class="col">
                                                <div class="form-check ">
                                                    <input class="form-check-input " type="checkbox" name="website[]" value="<?= $row->knew_by_website_id ?>" id="flexCheckDefault1">
                                                    <label class="custom-control-label " style="" for="flexCheckDefault1"><?= $row->website_name ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-3" id="other_source_div">
                                        <?php foreach ($other as $row) { ?>
                                            <div class="col-6 col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="other[]" value="<?= $row->knew_by_other_id  ?>" id="flexCheckDefault3">
                                                    <label class="custom-control-label" for="flexCheckDefault3"><?= $row->knew_by_other_name ?> </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6">
                                            <button class="btn btn-primary btn-xs mt-1" id="other_src_btn" type="button">Add New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2" id="agent_div">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12 col-sm-12 mt-3" >
                                            <label class="form-label">Agent</label>
                                            <select class="select-box form-control select2_agent" name="agent" id="choices-button-agent">
                                                <option value="" selected disabled>--Select--</option>
                                                <?php
                                                foreach ($agent as $row) {
                                                    echo '<option value="' . $row->agent_id . '">' . $row->agent_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 mt-3">
                                            <label class="form-label">Customers</label>
                                            <select class="select-box form-control select2_customer select_cust" name="refer_customers" id="choices-button-customers">
                                                <option value="" selected disabled>--Select--</option>
                                                <?php
                                                foreach ($customer as $row) {
                                                    echo '<option value="' . $row->customer_id . '">' . $row->name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Add Agent</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row mt-3 p-3">
                                    <form action="" method="post" id="agent_form">
                                        <div class="form-group mb-2">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone number</label>
                                            <input type="number" class="form-control" name="agent_no" id="agent_no" placeholder="Enter Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email </label>
                                            <input type="text" class="form-control" name="agent_email" id="agent_email" placeholder="Enter Number">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="agent_model_btn" type="submit" class="btn btn-primary btn-small ml-auto" name="submit">Update </button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Country Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.js"></script>
<script src="<?= base_url() ?>assets/js/gl/country_code.js"></script>
<!-- //Country Code -->