<footer class="footer p-3  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          © <script>
            document.write(new Date().getFullYear())
          </script>,

          <a href="https://grandlady.in" class="font-weight-bold" target="_blank">grandlady</a>
          <img class="mb-2 w-3" src="<?= base_url() ?>assets/img/GL-img/gl-logo1.webp" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="https://grandlady.in" class="nav-link text-muted text-uppercase" target="_blank">grandlady</a>
          </li>
          <li class="nav-item">
            <a href="https://grandlady.in/about.html" class="nav-link text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="https://grandlady.in/product.html" class="nav-link text-muted" target="_blank">Product</a>
          </li>
          <li class="nav-item">
            <a href="https://grandlady.in/contact.html" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>


</main>
<!--  jquery   -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>

<input type="hidden" id="base" value="<?php echo base_url(); ?>">
<script src="<?php echo base_url() ?>assets/js/admin/privilege_type.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/privilege_group.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/privilege_group_type.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/privilege_to_user.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/shift.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/designation.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/department.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/social_media.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/website.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/other_source.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/category.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/sub_category.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/tax.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/tax_type.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/installment.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/required_documents.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/rent.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/service.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/item.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/category_type.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/discount.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/commission.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/discount_type.js"></script>



<script src="<?php echo base_url() ?>assets/js/user/user_creation.js"></script>
<script src="<?php echo base_url() ?>assets/js/user/all_users.js"></script>
<script src="<?php echo base_url() ?>assets/js/user/customer_registration.js"></script>


<script src="<?php echo base_url() ?>assets/js/admin/update_edit_model_data.js"></script>
<script src="<?php echo base_url() ?>assets/js/common/add_model.js"></script>

<!-- toaster js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- bootbox js -->
<script src="<?= base_url() ?>assets/js/bootbox/bootbox.min.js"></script>
<!-- select2 -->
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>

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
<!-- <script src="<?= base_url() ?>assets/js/argon-dashboard.min.js?v=2.0.4"></script> -->
<script src="<?= base_url() ?>assets/js/pro.js"></script>


</body>

</html>