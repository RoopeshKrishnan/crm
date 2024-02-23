<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Item </p>
                    <form action="" id="item_form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Item Name </label>
                                    <input class="form-control" type="text" value="" name="item_name" id="item_name" placeholder="Pos ">
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Category </label>
                                    <select class="select-box form-control select2" name="icategory_id" id="icategory_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($category as $row) {
                                            echo '<option value="' . $row->category_id . '">' . $row->category . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Sub category </label>
                                    <select class="select-box form-control select2" name="isub_category_id" id="isub_category_id">
                                        <option value="" selected disabled>--Select--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label"> Category Type</label>
                                    <select class="select-box form-control select2" name="icategory_type_id" id="icategory_type_id">
                                        <option value="" selected disabled>--Select--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Item unit </label>
                                    <input class="form-control" type="text" value="" name="item_unit" id="item_unit" placeholder="anything">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Min seller unit </label>
                                    <input class="form-control" type="text" value="" name="min_seller_unit" id="min_seller_unit" placeholder="anything">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Contain unit </label>
                                    <input class="form-control" type="text" value="" name="contain_unit" id="contain_unit" placeholder="anything">
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tax Included </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax_included" id="inlineRadio1" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tax_included" id="inlineRadio2" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tax Type </label>
                                    <select class="select-box form-control select2" name="tax_type_id" id="tax_type_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($tax_type as $row) {
                                            echo '<option value="' . $row->tax_type_id . '">' . $row->tax_type . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tax percentage </label>
                                    <select class="select-box form-control select2" name="tax_id" id="tax_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <?php
                                        foreach ($tax as $row) {
                                            echo '<option value="' . $row->tax_id . '">' . $row->tax_in_percentage . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Select Mandatory Documents</label><br>
                                        <?php
                                        foreach ($required_document as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="mandatory_documents[]" value="'.$row->rd_id.'"> 
                                            <label class="form-check-label" for="">'.$row->document_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Select Optional Documents</label><br>
                                        <?php
                                        foreach ($required_document as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="optional_documents[]" value="'.$row->rd_id.'"> 
                                            <label class="form-check-label" for="">'.$row->document_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Installment</label><br>
                                        <?php
                                        foreach ($installments as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="installments[]" value="'.$row->installment_id .'"> 
                                            <label class="form-check-label" for="">'.$row->installment_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Discount</label><br>
                                        <?php
                                        foreach ($discounts as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="discounts[]" value="'.$row->discount_id  .'"> 
                                            <label class="form-check-label" for="">'.$row->	discount_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Service</label><br>
                                        <?php
                                        foreach ($services as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="services[]" value="'.$row->service_id  .'"> 
                                            <label class="form-check-label" for="">'.$row->	service_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Commissions</label><br>
                                        <?php
                                        foreach ($commissions as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="commissions[]" value="'.$row->commission_id   .'"> 
                                            <label class="form-check-label" for="">'.$row->commission_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Rent</label><br>
                                        <?php
                                        foreach ($rents as $row) {
                                            echo '
                                            <input class="ml-2" type="checkbox" name="rents[]" value="'.$row->rental_id    .'"> 
                                            <label class="form-check-label" for="">'.$row->rental_type_name.'</label>
                                            <br>                                    
                                        ';
                                        }
                                        ?>
                                </div>
                                <button class="btn btn-primary col-4 mt-4" type="submit">Save</button>
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
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Item Name </th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Category </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Sub Category </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Category Type </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Item Unit </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Min seller Unit </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Contain Unit </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Tax included </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Tax Type </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Tax Percentage </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Mandatory Documents  </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Optional Documents  </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Installments   </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Discounts   </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Services   </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Commissions   </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Rents   </th>

                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Created Date </th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$fetch_items->num_rows() > 0) {
                                        echo 'Empty';
                                    } else {
                                        $items = $fetch_items->result();
                                        $i = 0;
                                        foreach ($items as $row) {
                                            $i++;
                                            // mandatory document related
                                            $mandatory_documents = $row->mandatory_documents;
                                            if(!$mandatory_documents == null){
                                              $documentIds = explode(',', $row->mandatory_documents);
                                            }
                                            $documentNames = [];

                                            // optional document related
                                            $optional_documents = $row->optional_documents;
                                            if(!$optional_documents == null){
                                                $optionaldocumentIds = explode(',', $row->optional_documents);
                                              }
                                            $OptionaldocumentNames = [];

                                            // installments related
                                            if(!$row->installments == null){
                                                $installments_store = explode(',', $row->installments);
                                              }
                                            $installment_names = [];

                                            // discount related
                                            if(!$row->discounts == null){
                                                $discounts_store = explode(',', $row->discounts);
                                              }
                                            $discount_names = [];

                                             // services related
                                             if(!$row->services == null){
                                                $services_store = explode(',', $row->services);
                                              }
                                            $services_names = [];

                                            // commission related
                                            if(!$row->commissions == null){
                                                $commission_store = explode(',', $row->commissions);
                                              }
                                            $commission_names = [];

                                             // rent related
                                             if(!$row->rents == null){
                                                $rent_store = explode(',', $row->rents);
                                              }
                                            $rent_names = [];
                                    ?>
                                    
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $i ?></p>
                                                </td>

                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->item_name ?></p>
                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $row->category ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->sub_category ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->category_type ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->item_unit ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->min_seller_unit ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->contain_unit ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->tax_included ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->tax_type ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->tax_in_percentage ?></span>
                                                </td>
                                                <?php 
                                                // for mandatory documents-> to display thmen
                                                if(!$mandatory_documents == null){

                                                     foreach ($documentIds as $documentId) {
                                                        $document = $admin_model->getDocumentById($documentId);
                                                        if ($document) {
                                                            $documentNames[] = $document->document_name;
                                                        }
                                                    }
                                                    $names = implode(', ', $documentNames);
                                                    echo '
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">'.$names.'</span>
                                                    </td>
                                                    ';
                                                }else{
                                                    echo '
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">Null</span>
                                                    </td>
                                                    ';
                                                }

                                                // for Optional documents-> to display them
                                                if(!$optional_documents == null){

                                                    foreach ($optionaldocumentIds as $optionaldocumentId) {
                                                       $document = $admin_model->getDocumentById($optionaldocumentId);
                                                       if ($document) {
                                                           $OptionaldocumentNames[] = $document->document_name;
                                                       }
                                                   }
                                                   $onames = implode(', ', $OptionaldocumentNames);
                                                   echo '
                                                   <td class="align-middle text-center">
                                                       <span class="text-secondary text-xs font-weight-bold">'.$onames.'</span>
                                                   </td>
                                                   ';
                                               }else{
                                                   echo '
                                                   <td class="align-middle text-center">
                                                       <span class="text-secondary text-xs font-weight-bold">Null</span>
                                                   </td>
                                                   ';
                                               }

                                               // for installment ->to display
                                               if(!$row->installments == null){

                                                foreach ($installments_store as $ins) {
                                                   $installment = $admin_model->getInstallmentById($ins);
                                                   if ($installment) {
                                                       $installment_names[] = $installment->installment_name;
                                                   }
                                               }
                                               $installment_display = implode(', ', $installment_names);
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">'.$installment_display.'</span>
                                               </td>
                                               ';
                                           }else{
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">Null</span>
                                               </td>
                                               ';
                                           }

                                             // for discounts ->to display
                                             if(!$row->discounts == null){

                                                foreach ($discounts_store as $dis) {
                                                   $discount = $admin_model->getDiscountById($dis);
                                                   if ($discount) {
                                                       $discount_names[] = $discount->discount_name;
                                                   }
                                               }
                                               $discount_display = implode(', ', $discount_names);
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">'.$discount_display.'</span>
                                               </td>
                                               ';
                                           }else{
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">Null</span>
                                               </td>
                                               ';
                                           }

                                            // for services ->to display
                                            if(!$row->services == null){

                                                foreach ($services_store as $ser) {
                                                   $service = $admin_model->getServiceById($ser);
                                                   if ($service) {
                                                       $services_names[] = $service->service_name;
                                                   }
                                               }
                                               $service_display = implode(', ', $services_names);
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">'.$service_display.'</span>
                                               </td>
                                               ';
                                           }else{
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">Null</span>
                                               </td>
                                               ';
                                           }

                                            // for commission ->to display
                                            if(!$row->commissions == null){

                                                foreach ($commission_store as $com) {
                                                   $commission = $admin_model->getCommissionById($com);
                                                   if ($commission) {
                                                       $commission_names[] = $commission->commission_name;
                                                   }
                                               }
                                               $commission_display = implode(', ', $commission_names);
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">'.$commission_display.'</span>
                                               </td>
                                               ';
                                           }else{
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">Null</span>
                                               </td>
                                               ';
                                           }
                                           
                                            // for rent ->to display
                                            if(!$row->rents == null){

                                                foreach ($rent_store as $re) {
                                                   $rent = $admin_model->getRentById($re);
                                                   if ($rent) {
                                                       $rent_names[] = $rent->rental_type_name;
                                                   }
                                               }
                                               $rent_display = implode(', ', $rent_names);
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">'.$rent_display.'</span>
                                               </td>
                                               ';
                                           }else{
                                               echo '
                                               <td class="align-middle text-center">
                                                   <span class="text-secondary text-xs font-weight-bold">Null</span>
                                               </td>
                                               ';
                                           }
                                                ?>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $row->created_date ?></span>
                                                </td>
                                                <td class="text-sm text-center">

                                                    <a href="#" id="edit_desi" class="mx-3" value="<?= $row->item_id   ?>" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                        <i class="fas fa-user-edit text-dark"></i>
                                                    </a>
                                                    <a href="#" id="delete_desi" class="mx-3" value="<?= $row->item_id   ?>" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>