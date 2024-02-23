<div class="container-fluid mt-n4 py-4">
    <div class="row mt-n2">
        <div class="col-12 ">
            <form action="">
                <div class="card  p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <div class="row button-row d-flex mt-n1 mb-3">
                        <h5 class="col-2 font-weight-bolder text-center pt-3 mb-0"><?= $this->session->userdata('customer_name') ?></h5>
                        <h5 class="col-2 font-weight-bolder text-center pt-3 mb-0"><?= $this->session->userdata('customer_number') ?></h5>
                        <h5 class="col-4 font-weight-bolder text-center pt-3 mb-0"><?= $this->session->userdata('customer_email_id') ?></h5>
                        <!-- <button class="col-4 btn bg-gradient-success ms-auto mb-0 js-btn-next p-3" type="submit" title="Submit">Submit</button> -->
                        <a href="<?= base_url() ?>customer-order-conformation" class="col-4 btn bg-gradient-success ms-auto mb-0 js-btn-next p-3" type="button" title="Submit">Submit</a>                    </div>

                    <div class="row">

                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="row   mt-3">
                                    <?php foreach($item as $row){ ?>
                                        <div class="col-lg-3 col-md-2 col-3 ms-auto px-1 d-flex justify-content-center">
                                        <input type="checkbox" class="btn-check item_check" id="<?= $row->item_id ?>">
                            <label class="btn  btn-outline-secondary  " for="<?= $row->item_id ?>">
                                            <h5 class="m-0"><?= $row->item_name ?></h5>
                                            </label>
                                        </div>   
                                        <?php } ?>                                                         
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card  ">
                                <div class="card-body p-0">
                                    <div class="row justify-content-center my-3 ms-1 pe-md-3">
                                        <div class="col-12">
                                            <div class=" input-group">
                                            <select class="form-control select2_all_item" name="country">
                              <option value="" selected disabled>--Select--</option>
                                    <?php  
                                       foreach($all_item as $items){
                                         echo '<option value="'.$items->item_id.'">'.$items->item_name.'</option>';
                                       }
                                    ?>       
                              
                            </select>
                                            </div>
                                        </div>
                                        <div class=" mt-4">
                                        <button type="button" class="col-12 btn btn-outline-dark mb-0"" data-bs-toggle="modal" data-bs-target="#productlist">
                              Product List
                            </button>
                                                                </div>
                                                                            <!-- Modal -->
                              <div class="modal fade" id="productlist" tabindex="-1" role="dialog" aria-labelledby="productlist" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="productlistLabel">All Products</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                      <div class="col-lg-12">
                                        <div class="card">
                                          <div class="card-body p-0">
                                            <div class="row   mt-3">
                                              <?php foreach($all_item as $row){ ?>
                                                <div class=" col-lg-3 col-md-2 col-3 px-1 d-flex justify-content-center">
                                                  <input type="checkbox" class="btn-check item_check" id="<?= $row->item_id ?>">
                                                  <label class="btn  btn-outline-secondary  " for="<?= $row->item_id ?>">
                                                    <h5 class="m-0"><?= $row->item_name ?></h5>
                                                  </label>
                                                </div>    
                                              <?php } ?>                                    
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                      
                                  </div>
                                </div>
                              </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php foreach($all_item as $row1){ ?>
                        <div class="row mt-2 all_item_class " id="divis<?= $row1->item_id ?>">
                        <div class="col-12 ">
                            <div class="card mb-1">
                                <div class="card-header pb-0">
                                <h6><?= $row1->item_name ?></h6>
                                </div>
                                <div class="card-body px-0  pt-0 pb-2">
                                    <div class="table-responsive p-0  " style="overflow-y: hidden;">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        product primary details</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        payment options</th>
                                                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        offer</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Required document</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Department approvals</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        status</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-baseline">
                                                        <div class="d-flex px-3 py-1 flex-column justify-content-center">
                                                            <h6 class="mb-0  ">Name </h6>
                                                        </div>
                                                        <div class="d-flex px-3 flex-column justify-content-center">
                                                            <h6 class="mb-2  text-sm">amount </h6>
                                                        </div>
                                                        <div class="d-flex px-3 flex-column justify-content-center">
                                                            <h6 class="mb-2  text-sm">with/without tax </h6>
                                                        </div>
                                                        <div class="d-flex px-3 flex-column justify-content-center">
                                                            <h6 class="mb-2  text-sm">Delivery date </h6>
                                                        </div>
                                                        <div class="d-flex px-3 flex-column justify-content-center">
                                                            <h6 class="mb-2  text-sm">Area </h6>
                                                        </div>
                                                        <div class="d-flex px-3 flex-column justify-content-center">
                                                            <h6 class="mb-2  text-sm">stock </h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-baseline">
                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">one time payment</option>
                                                                <option value="Choice 2">10%</option>
                                                                <option value="Choice 3">25%</option>
                                                                <option value="Choice 4">50%</option>
                                                            </select>

                                                        </div>

                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">installment</option>
                                                                <option value="Choice 2">10%</option>
                                                                <option value="Choice 3">25%</option>
                                                                <option value="Choice 4">50%</option>
                                                            </select>

                                                        </div>

                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">monthly rent</option>
                                                                <option value="Choice 2">10%</option>
                                                                <option value="Choice 3">25%</option>
                                                                <option value="Choice 4">50%</option>
                                                            </select>

                                                        </div>
                                                    </td>


                                                    <td class="align-baseline  text-sm">
                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">Discount</option>
                                                                <option value="Choice 2">10%</option>
                                                                <option value="Choice 3">25%</option>
                                                                <option value="Choice 4">50%</option>
                                                            </select>

                                                        </div>
                                                        <div class="d-flex mb-2 flex-column  justify-content-center">
                                                            <select class="select-box form-control " name="choices-button-sdiscount" id="choices-button-sdiscount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">Special Discount</option>
                                                                <option value="Choice 2">50%</option>
                                                                <option value="Choice 3">75%</option>
                                                                <option value="Choice 4">100%</option>
                                                            </select>

                                                        </div>
                                                        <div class="d-flex mb-2 flex-column  justify-content-center">
                                                            <select class="select-box form-control " name="choices-button-sdiscount" id="choices-button-sdiscount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">coupon</option>
                                                                <option value="Choice 2">50%</option>
                                                                <option value="Choice 3">75%</option>
                                                                <option value="Choice 4">100%</option>
                                                            </select>

                                                        </div>

                                                    </td>

                                                    <td class="align-baseline  text-sm">
                                                        <div class=" ms-4">
                                                            <div class="form-check d-flex justify-content-start mb-2">
                                                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault1">
                                                                <label class="custom-control-label ms-3 my-auto" style="" for="flexCheckDefault1">Adhar</label>
                                                            </div>
                                                            <div class="form-check d-flex justify-content-start mb-2">
                                                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault2">
                                                                <label class="custom-control-label ms-3 my-auto" style="" for="flexCheckDefault2">pan</label>
                                                            </div>
                                                            <div class="form-check d-flex justify-content-start mb-2">
                                                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault3">
                                                                <label class="custom-control-label ms-3 my-auto" style="" for="flexCheckDefault3">amc</label>
                                                            </div>
                                                            <div class="form-check d-flex justify-content-start mb-2">
                                                                <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault4">
                                                                <label class="custom-control-label ms-3 my-auto" style="" for="flexCheckDefault4">driving license</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="align-baseline text-center text-sm">
                                                        <div class="d-flex mb-2 flex-row justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="" placeholder="Departure">
                                                                <option value="" selected="">which user</option>
                                                                <option value="Choice 1">1</option>
                                                                <option value="Choice 2">2</option>
                                                                <option value="Choice 3">3</option>
                                                            </select>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn mb-0  bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="ni ni-email-83"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ...
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-2 flex-row justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="" placeholder="Departure">
                                                                <option value="" selected="">dept name</option>
                                                                <option value="Choice 1">1</option>
                                                                <option value="Choice 2">2</option>
                                                                <option value="Choice 3">3</option>
                                                            </select>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn mb-0  bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="ni ni-email-83"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ...
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-2 flex-row justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="" placeholder="Departure">
                                                                <option value="" selected="">dpt person</option>
                                                                <option value="Choice 1">1</option>
                                                                <option value="Choice 2">2</option>
                                                                <option value="Choice 3">3</option>
                                                            </select>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn mb-0  bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="ni ni-email-83"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ...
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>

                                                    <td class="align-baseline text-center text-sm">

                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">underprocessing</option>
                                                                <option value="Choice 2">1</option>
                                                                <option value="Choice 3">2</option>
                                                                <option value="Choice 4">3</option>
                                                            </select>

                                                        </div>
                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">completed</option>
                                                                <option value="Choice 2">1</option>
                                                                <option value="Choice 3">2</option>
                                                                <option value="Choice 4">3</option>
                                                            </select>

                                                        </div>
                                                        <div class="d-flex mb-2 flex-column justify-content-center">
                                                            <select class="select-box form-control" name="choices-button-discount" id="choices-button-discount" placeholder="Departure">
                                                                <option value="Choice 1" selected="">reversing</option>
                                                                <option value="Choice 2">1</option>
                                                                <option value="Choice 3">2</option>
                                                                <option value="Choice 4">3</option>
                                                            </select>

                                                        </div>

                                                    </td>

                                                    <td class="align-items-center text-center text-sm">
                                                        <div class="d-flex  flex-column justify-content-center">
                                                            <a href="">
                                                                <h6 class="mb-2 w-100 btn btn-primary text-sm">imp requirements </h6>
                                                            </a>
                                                        </div>




                                                        <div class="d-flex  flex-column justify-content-center">
                                                            <a href="">
                                                                <h6 class="mb-2 w-100 btn bg-gradient-warning text-sm">More </h6>
                                                            </a>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <thead>
                                                        <tr>

                                                            <th class=" text-secondary text-xxs font-weight-bolder ">
                                                            </th>
                                                            <th class=" text-secondary text-xxs font-weight-bolder ps-2">
                                                                <input class=" form-control" type="text" placeholder="expected dicount" />
                                                            </th>
                                                            <th class=" text-secondary text-xxs font-weight-bolder ps-2">
                                                                <input class=" form-control" type="text" placeholder="no of enquiry" />
                                                            </th>
                                                            <th class=" text-secondary text-xxs font-weight-bolder ps-2">
                                                                <input class=" form-control" type="text" placeholder="delivery date" />
                                                            </th>
                                                            <th class=" text-secondary text-xxs font-weight-bolder ps-2">
                                                                <input class=" form-control" type="text" placeholder="anymessages" />
                                                            </th>
                                                            <th class="col-2 text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                                <select class="form-control select-box" name="" id="" placeholder="Departure">
                                                                    <option value="Choice 1" selected="">assigned</option>
                                                                    <option value="Choice 2">50%</option>
                                                                    <option value="Choice 3">75%</option>
                                                                    <option value="Choice 4">100%</option>
                                                                </select>
                                                            </th>
                                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder  ps-2">
                                                                <a href="">
                                                                    <h6 class="mb-2 w-100 btn bg-gradient-danger text-sm">Remove </h6>
                                                                </a>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </form>
        </div>
    </div>
</div>