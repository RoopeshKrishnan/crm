
<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-md-4 ">
      <div class="card card-profile">
        <img src="<?= base_url() ?>assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-4 col-lg-4 order-lg-2">
            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
              <a href="javascript:;">
                <?php
                // to calculate age from given date of birth
                // Create a DateTime object for the date of birth
                $birthDate = new DateTime($personal_details->user_dob);
                // Get the current date
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthDate)->y;
                if($personal_details->user_image){
                  echo '<img src=" '.base_url().'assets/img/user_profile_photos/'.$personal_details->user_image.'" class="rounded-circle img-fluid border border-2 border-white">';
                }else{
                  echo '<img src=" '.base_url().'assets/img/avatar/user.png" class="rounded-circle img-fluid border border-2 border-white">';
                }
                 ?>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="text-center mt-4">
            <h5>
            <?= $this->session->userdata('user_name') ?><span class="font-weight-light">, <?= $age ?></span>
            </h5>
            <div class="h6 font-weight-300">
              <i class="ni location_pin mr-2"></i><?= $personal_details->user_address ?>
            </div>
            <div class="h6 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i><?= $this->session->userdata('user_designation')?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="col-lg-12 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 p-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link active mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">Personal Details</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">Employment Details</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">Login Activity</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">tab 3</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">tab 3</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card tab-content">
        <div class="card-body tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">
          <p class="text-uppercase text-sm">User Information</p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Username</label>
                <input class="form-control" type="text" value="lucky.jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email address</label>
                <input class="form-control" type="email" value="jesse@example.com">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">First name</label>
                <input class="form-control" type="text" value="Jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Last name</label>
                <input class="form-control" type="text" value="Lucky">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">Contact Information</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Address</label>
                <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">City</label>
                <input class="form-control" type="text" value="New York">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Country</label>
                <input class="form-control" type="text" value="United States">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Postal code</label>
                <input class="form-control" type="text" value="437300">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">About me</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">About me</label>
                <input class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>
        <div class="card-body tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="tab-2">
          <p class="text-uppercase text-sm">tab-2</p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Username</label>
                <input class="form-control" type="text" value="lucky.jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email address</label>
                <input class="form-control" type="email" value="jesse@example.com">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">First name</label>
                <input class="form-control" type="text" value="Jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Last name</label>
                <input class="form-control" type="text" value="Lucky">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">Contact Information</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Address</label>
                <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">City</label>
                <input class="form-control" type="text" value="New York">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Country</label>
                <input class="form-control" type="text" value="United States">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Postal code</label>
                <input class="form-control" type="text" value="437300">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">About me</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">About me</label>
                <input class="form-control" type="text" value="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>