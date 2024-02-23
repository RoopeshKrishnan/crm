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
                                    <button id="user_cre_emp_details_btn" class="multisteps-form__progress-btn " type="button">Employment details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form mb-8" id="user_creation_form" enctype="multipart/form-data">
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder mb-0">Personal Details</h5>
                                <p class="mb-0 text-sm">Mandatory information's</p>

                                <div class="multisteps-form__content ">
                                    <div class="upload__box d-flex align-items-center mt-3 ">
                                        <div class="upload__img-wrap ">
                                            <img class="px-3" id="image-preview" src="<?= base_url() ?>assets/img/avatar/user.png" style="max-width: 100px;" alt="" />
                                        </div>
                                        <div class="upload__btn-box">
                                            <label class="upload__btn mx-2 my-2">
                                                <p class="m-0 px-4 btn btn-primary">Upload images</p>
                                                <input name="user_profile_image" type="file" data-max_length="20" class="upload__inputfile" id="image-upload">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label> Name</label>
                                            <input name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Michael" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 mb-3">
                                            <label>Address</label>
                                            <input name="address" class="multisteps-form__input form-control" type="text" placeholder="eg. Thanal (H) perumbavoor (P.O)" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <label>Date of Birth</label>
                                            <input name="dob" class="multisteps-form__input form-control" type="date" placeholder="" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 mb-3">
                                            <label class="mb-3">Gender</label>
                                            <br>
                                            <label for="male">Male</label>
                                            <input type="radio" id="male" name="gender" value="male">

                                            <label for="female">Female</label>
                                            <input type="radio" id="female" name="gender" value="female">

                                            <label for="other">Other</label>
                                            <input type="radio" id="other" name="gender" value="other">
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 mb-3">
                                            <label>Mobile Number</label>
                                            <input name="phone" class="multisteps-form__input form-control" type="number" placeholder="eg.9985145785" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 mb-3">
                                            <label>email </label>
                                            <input name="email" class="multisteps-form__input form-control" type="email" placeholder="eg.micheal@gmail.com" />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Password</label>
                                            <input name="password" class="multisteps-form__input form-control" type="password" placeholder="******" />
                                        </div>
                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <label>Repeat Password</label>
                                            <input name="confirm_password" class="multisteps-form__input form-control" type="password" placeholder="******" />
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" >Next</button>
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
<!-- <script src="<?= base_url() ?>assets/js/plugins/multistep-form.js"></script> -->