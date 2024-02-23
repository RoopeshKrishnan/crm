<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/GL-img/gl-logo1.webp">
  <title>
    GL CRM | <?= $page_title ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link id="pagestyle" href="<?= base_url() ?>assets/css/pro.css" rel="stylesheet" />
  <link id="pagestyle" href="<?= base_url() ?>assets/css/glstyle.css" rel="stylesheet" />

  <!-- select 2 -->
  <link href="<?php echo base_url(); ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Country Code -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

  <!-- toaster css -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-250 bg-gradient-light position-absolute w-100"></div>

  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="  " target="_blank">
        <img src="<?= base_url() ?>assets/img/GL-img/gl-logo1.webp" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">grandlady</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <?php
    $show = 'class="nav-link active"';
    $hide = 'class="nav-link "';
    $show_sub_menu = 'class="nav-item active"';
    $hide_sub_menu = 'class="nav-item "';
    $show_sub_menu_dropdown = 'class="collapse show "';
    $hide_sub_menu_dropdown = 'class="collapse hide"';
    ?>
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?= base_url() ?>dashboard" <?php if ($active == 'dashboard') {
                                                  echo $show;
                                                } else {
                                                  echo $hide;
                                                } ?>>
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>user-profile" <?php if ($active == 'user_profile') {
                                                    echo $show;
                                                  } else {
                                                    echo $hide;
                                                  } ?>>
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User profile</span>
          </a>
        </li>

        <li class="nav-item ">
          <a data-bs-toggle="collapse" href="#privilege" <?php if ($active == 'privilege') {
                                                            echo $show;
                                                          } else {
                                                            echo $hide;
                                                          } ?> aria-controls="privilege" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">privilege</span>
          </a>
          <div <?php if ($active == 'privilege') {
                  echo $show_sub_menu_dropdown;
                } else {
                  echo $hide_sub_menu_dropdown;
                } ?> id="privilege">
            <ul class="nav ms-4">
              <li <?php if ($active == 'privilege' && $sub_menu == 1) {
                    echo $show_sub_menu;
                  } else {
                    echo $hide_sub_menu;
                  } ?>>
                <a class="nav-link " href="<?= base_url() ?>privilege-type">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal"> Type </span>
                </a>
              </li>
              <li <?php if ($active == 'privilege' && $sub_menu == 2) {
                    echo $show_sub_menu;
                  } else {
                    echo $hide_sub_menu;
                  } ?>>
                <a class="nav-link " href="<?= base_url() ?>privilege-group">
                  <span class="sidenav-mini-icon"> G </span>
                  <span class="sidenav-normal"> Group </span>
                </a>
              </li>
              <li <?php if ($active == 'privilege' && $sub_menu == 3) {
                    echo $show_sub_menu;
                  } else {
                    echo $hide_sub_menu;
                  } ?>>
                <a class="nav-link " href="<?= base_url() ?>privilege-group-type">
                  <span class="sidenav-mini-icon"> GT </span>
                  <span class="sidenav-normal"> Group-Type Mapping</span>
                </a>
              </li>
              <li <?php if ($active == 'privilege_to_user' && $sub_menu == 4) {
                    echo $show_sub_menu;
                  } else {
                    echo $hide_sub_menu;
                  } ?>>
                <a class="nav-link " href="<?= base_url() ?>privilege-to-user">
                  <span class="sidenav-mini-icon"> GT </span>
                  <span class="sidenav-normal"> Privilege To User</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>customer-registration" <?php if ($active == 'customer_registration') {
                                                              echo $show;
                                                            } else {
                                                              echo $hide;
                                                            } ?>>
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Customer Registration </span>
          </a>
        </li>
        <?php
        $user_creation_power = $this->admin_model->check_user_creation_privilege()->num_rows();
        if ($user_creation_power > 0) { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>user-creation" <?php if ($active == 'user_creation') {
                                                        echo $show;
                                                      } else {
                                                        echo $hide;
                                                      } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">User Creation</span>
            </a>
          </li>
          <li class="nav-item">
          <?php } ?>
          <a href="<?= base_url() ?>create-shift" <?php if ($active == 'shift_creation') {
                                                    echo $show;
                                                  } else {
                                                    echo $hide;
                                                  } ?>>
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Shift Creation</span>
          </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-department" <?php if ($active == 'department_creation') {
                                                            echo $show;
                                                          } else {
                                                            echo $hide;
                                                          } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Department Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-designation" <?php if ($active == 'designation_creation') {
                                                            echo $show;
                                                          } else {
                                                            echo $hide;
                                                          } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Designation Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-social-media" <?php if ($active == 'social_creation') {
                                                        echo $show;
                                                      } else {
                                                        echo $hide;
                                                      } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Socials Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-website" <?php if ($active == 'website_creation') {
                                                        echo $show;
                                                      } else {
                                                        echo $hide;
                                                      } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Website Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-other-source" <?php if ($active == 'other_creation') {
                                                              echo $show;
                                                            } else {
                                                              echo $hide;
                                                            } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Other Source Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>all-users" <?php if ($active == 'all_users') {
                                                    echo $show;
                                                  } else {
                                                    echo $hide;
                                                  } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">All Users </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-category" <?php if ($active == 'category_creation') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Category Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-sub-category" <?php if ($active == 'sub_category_creation') {
                                                              echo $show;
                                                            } else {
                                                              echo $hide;
                                                            } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Sub Category Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>category-type" <?php if ($active == 'category_type') {
                                                              echo $show;
                                                            } else {
                                                              echo $hide;
                                                            } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Category type</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-tax" <?php if ($active == 'tax_creation') {
                                                    echo $show;
                                                  } else {
                                                    echo $hide;
                                                  } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Tax Creation</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>create-tax-type" <?php if ($active == 'tax_type_creation') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Tax Type Creation</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url() ?>installment" <?php if ($active == 'installment') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Installment</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url() ?>required-documents" <?php if ($active == 'required_document') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Required Documents</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>rent" <?php if ($active == 'rent') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Rent </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>service" <?php if ($active == 'service') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Service </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>item" <?php if ($active == 'item') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Item </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>discount_type" <?php if ($active == 'discount_type') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Discount Type</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>discount" <?php if ($active == 'discount') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Discount </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>commission" <?php if ($active == 'commission') {
                                                          echo $show;
                                                        } else {
                                                          echo $hide;
                                                        } ?>>
              <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Commission </span>
            </a>
          </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navb arBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="text-dark" href="javascript:;">
                <i class="ni ni-box-2"></i>
              </a>
            </li>
            <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $page_title ?></li>
          </ol>
          <h6 class="font-weight-bolder mb-0 text-dark"><?= $page_title ?></h6>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-dark"></i>
              <i class="sidenav-toggler-line bg-dark"></i>
              <i class="sidenav-toggler-line bg-dark"></i>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <!-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div> -->
          </div>
          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-dark p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                  <i class="sidenav-toggler-line bg-dark"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-dark p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-dark p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url() ?>assets/img/team-2.jpg" class="avatar avatar-sm  me-3 " alt="user image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url() ?>assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 " alt="logo spotify">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewbox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                  </path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-dark p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user ms-2 me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= $this->session->userdata('user_name') ?></span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <div class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <?php
                        $pro_pic =  $this->db->where('deleted', 0)->where('user_id', $this->session->userdata('user_id'))->get('user_personal_details')->row();
                        if ($pro_pic->user_image) {
                          echo '<img src=" ' . base_url() . 'assets/img/user_profile_photos/' . $pro_pic->user_image . '" class="avatar avatar-sm  me-3" alt="user image">';
                        } else {
                          echo '<img src=" ' . base_url() . 'assets/img/avatar/user.png" class="avatar avatar-sm  me-3 " alt="user image">';
                        }
                        ?>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold"><?= $this->session->userdata('user_designation') ?></span>
                        </h6>
                        <h6 class="text-sm font-weight-normal mb-1">
                          Login time : <?= date("d M Y, h:i a ", strtotime($this->session->userdata('login_time'))) ?>
                        </h6>
                        <p class="text-xs text-secondary mb-0">


                          <a href="<?= base_url() ?>user-profile"><button type="button" class="btn btn-secondary btn-sm mb-n1"><i class="fa fa-edit me-2"></i>Edit</button></a>
                        </p>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="<?= base_url() ?>logout">
                    <div class="d-flex justify-content-center py-1">
                      <div class="d-flex flex-column  ">
                        <h6 class="text-sm font-weight-normal mb-0">
                          <span class="font-weight-bold">Logout</span> <i class="ni ni-button-power font-weight-bold mx-1"></i>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->