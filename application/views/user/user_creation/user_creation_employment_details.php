<?php if($this->session->userdata('current_added_user_id')){?>
<div class="container-fluid ">
    <div class="row mb-5">
        <div class="col-12">
            <div class="multisteps-form mb-5">

                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto my-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                                        Personal Details
                                    </button>
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="Address">Employment details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form mb-8" id="user_creation_emp_form">
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">Employment details </h5>
                                <p class="mb-0 text-sm">Mandatory informations</p>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Designation</label>
                                            <select class="select-box form-control select2" name="designation_id" id="designation_id">
                                                <option value="" selected disabled>--Select--</option>
                                                <?php
                                                foreach ($designation as $row) {
                                                    echo '<option value="' . $row->designation_id . '">' . $row->designation . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 mb-3">
                                            <label>Department</label>
                                            <select class="select-box form-control select2" name="department" id="department">
                                                <option value="" selected disabled>--Select--</option>
                                                <?php
                                                foreach ($department as $row) {
                                                    echo '<option value="' . $row->department_id . '">' . $row->department . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label>Branch</label>
                                            <input name="branch" class="multisteps-form__input form-control" type="text" placeholder="eg. Branch" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Shift</label>
                                            <select class="select-box form-control select2" name="shift_id" id="shift_id">
                                                <option value="" selected disabled>--Select--</option>
                                                <?php
                                                foreach ($shift as $row) {
                                                    echo '<option value="' . $row->shift_id . '">' . $row->shift_type . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Reporting Department</label>
                                            <select class="select-box form-control select2" multiple="multiple" name="report_department_id[]" id="report_department_id">
                                                <?php
                                                foreach ($department as $row) {
                                                        echo '<option value="' . $row->department_id . '">' . $row->department . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Reporting Designation</label>
                                            <select class="select-box form-control select2" multiple="multiple" name="report_designation_id[]" id="report_designation_id">
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Reporting person</label>
                                            <select class="select-box form-control select2" multiple="multiple" name="report_user_id[]" id="report_user_id">
                                            </select>
                                        </div>
                              
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label>Joining Date</label>
                                            <input name="join_date" class="multisteps-form__input form-control" type="date" placeholder="eg. Branch" />
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                        <a class="btn bg-gradient-light mb-0 js-btn-prev" href="<?= base_url() ?>user-creation">Prev</a>
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }else{
    redirect('login');
} ?>