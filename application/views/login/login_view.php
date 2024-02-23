
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/GL-img/gl-logo1.webp">
  <title>
    GL CRM
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

</head>
<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="w-50 navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        <img class="w-30" src="assets/img/GL-img/full-logo-inline-for-dark-background-1.webp" alt="" >
      </a>
      
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url() ?>assets/img/GL-img/crm-1336.webp'); background-position: center;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem qui magni molestias ex, </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Sign in to CRM</h5>
            </div>
            
            <div class="card-body ">
               <form role="form" action="<?= base_url() ?>login-check" method="POST">
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email"
                    placeholder="Email" aria-label="Email"
                    value="<?php echo set_value('email') ?>"
                    >
                  </div>
                  <span class="text-danger"><?php echo form_error("email"); ?></span>
                    <?php  if($this->session->flashdata('invalid_username')){ ?>
                        <span class="text-danger"><?php echo $this->session->flashdata('invalid_username') ?></span>
                    <?php } ?>

                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password">
                  </div>
                  <span class="text-danger"><?php echo form_error("password"); ?></span>
                    <?php  if($this->session->flashdata('invalid_password')){ ?>
                        <span class="text-danger"><?php echo $this->session->flashdata('invalid_password') ?></span>
                    <?php } ?>
                
                  <div class="text-center"> 
                    <input class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" type="submit" value="Sign in">
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> <img class="mb-2 w-3" src="assets/img/GL-img/gl-logo1.webp" alt="" > grandlady
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>