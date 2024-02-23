<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	 // fetch subcategory according to category
	 public function fetch_sub_category(){
        $category_id = $this->input->post('category_id');
        $where = [
            'deleted' => 0,
            'category_id' => $category_id
        ];
        $order = 'sub_category_id ';
        $sub_category =  $this->crud->fetch_data_asc('sub_category', $where, $order)->result();
            echo '<option disabled selected >--select--</option>';
        foreach($sub_category as $row){
            echo '<option value="'.$row->sub_category_id.'">'.$row->sub_category.'</option>';
        }
    }

	// fetch subcategory according to category
	public function fetch_category_type(){
        $sub_category_id = $this->input->post('sub_category_id');
        $where = [
            'deleted' => 0,
            'sub_category_id' => $sub_category_id
        ];
        $order = 'category_type_id ';
        $category_type =  $this->crud->fetch_data_asc('category_type', $where, $order)->result();
            echo '<option disabled selected >--select--</option>';
        foreach($category_type as $row){
            echo '<option value="'.$row->category_type_id.'">'.$row->category_type.'</option>';
        }
    }
	// to load item page
	public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'item';
			$data['page_title'] = 'Item   ';
			$where = [
				'deleted' => 0
			];
			$order = 'item_id ';
			$data['fetch_item'] =  $this->crud->fetch_data_asc('item', $where, $order);

            $order1 = 'category_id ';
            $data['category'] =  $this->crud->fetch_data_asc('category', $where, $order1)->result();

			$order2 = 'tax_id ';
            $data['tax'] =  $this->crud->fetch_data_asc('tax', $where, $order2)->result();

			$order3 = 'tax_type_id ';
            $data['tax_type'] =  $this->crud->fetch_data_asc('tax_type', $where, $order3)->result();

			$order4 = 'rd_id ';
            $data['required_document'] =  $this->crud->fetch_data_asc('required_document', $where, $order4)->result();

			$order5 = '	installment_id  ';
            $data['installments'] =  $this->crud->fetch_data_asc('installment', $where, $order5)->result();

			$order6 = 'discount_id  ';
            $data['discounts'] =  $this->crud->fetch_data_asc('discount', $where, $order6)->result();

			$order7 = 'service_id  ';
            $data['services'] =  $this->crud->fetch_data_asc('service', $where, $order7)->result();

			$order8 = 'commission_id ';
            $data['commissions'] =  $this->crud->fetch_data_asc('commission', $where, $order8)->result();

			$order9 = 'rental_id ';
            $data['rents'] =  $this->crud->fetch_data_asc('rental', $where, $order9)->result();

			$data['fetch_items'] = $this->admin_model->fetch_items();
			$data['admin_model'] = $this->admin_model;
			$this->load->view('common/header', $data);
			$this->load->view('admin/item', $data);
			$this->load->view('common/edit_model');
			$this->load->view('common/footer');
		}
	}
	// insert designation into database
	public function add_item()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'item_name',
				'Item Name ',
				'trim|required',
			);
			$this->form_validation->set_rules(
				'icategory_id',
				'Category  ',
				'trim|required'
			);
            $this->form_validation->set_rules(
				'isub_category_id',
				'Sub category  ',
				'trim|required'
			);
            // $this->form_validation->set_rules(
			// 	'icategory_type_id',
			// 	'Category Type  ',
			// 	'trim|required'
			// );
			$this->form_validation->set_rules(
				'item_unit',
				'Item unit   ',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'min_seller_unit',
				'Min seller unit   ',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'contain_unit',
				'Contain unit   ',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'tax_included',
				'Tax Included ',
				'trim|required'
			);
       
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {

				if($this->input->post('mandatory_documents')){
                    $md = substr(implode(', ', $this->input->post('mandatory_documents')), 0);	
                }else{
                    $md = '';
                }
				if($this->input->post('optional_documents')){
                    $od = substr(implode(', ', $this->input->post('optional_documents')), 0);	
                }else{
                    $od = '';
                }
				if($this->input->post('installments')){
                    $installments = substr(implode(', ', $this->input->post('installments')), 0);	
                }else{
                    $installments = '';
                }
				if($this->input->post('discounts')){
                    $discounts = substr(implode(', ', $this->input->post('discounts')), 0);	
                }else{
                    $discounts = '';
                }
				if($this->input->post('services')){
                    $services = substr(implode(', ', $this->input->post('services')), 0);	
                }else{
                    $services = '';
                }
				if($this->input->post('commissions')){
                    $commissions = substr(implode(', ', $this->input->post('commissions')), 0);	
                }else{
                    $commissions = '';
                }
				if($this->input->post('rents')){
                    $rents = substr(implode(', ', $this->input->post('rents')), 0);	
                }else{
                    $rents = '';
                }
					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					$date = date('Y-m-d H:i:s');
					$record = [
						"item_name" =>$this->input->post('item_name', true),
                        "category_id" =>$this->input->post('icategory_id', true),
						"sub_category_id" =>$this->input->post('isub_category_id', true),
						"category_type_id" =>$this->input->post('icategory_type_id', true),
						"item_unit" =>$this->input->post('item_unit', true),
						"min_seller_unit" =>$this->input->post('min_seller_unit', true),
						"contain_unit" =>$this->input->post('contain_unit', true),
						"tax_included" =>$this->input->post('tax_included', true),
						"tax_type_id" =>$this->input->post('tax_type_id', true),
						"tax_percentage" =>$this->input->post('tax_id', true),
						"mandatory_documents" =>$md,
						"optional_documents" =>$od,
						"installments" =>$installments,
						"discounts" =>$discounts,
						"services" =>$services,
						"commissions" => $commissions,
						"rents"=> $rents,
						"created_date" => $date
					];
					$check_insertion =  $this->crud->insert('items', $record);
					if ($check_insertion) {
						$message = array('response' => 'success', 'message' => 'Item  added');
					} else {
						$message = array('response' => 'error', 'message' => 'Failed to add');
					}
				
			}
			echo json_encode($message);
		} else {

			redirect('login');
		}
	}
	// to load the designation data into model for editing
	public function edit_designation()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'designation';
		$where = [
			'designation_id' => $edit_id,
			'deleted' => 0
		];
		$order = 'designation_id';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}

	// update designation in database
	public function update_designation()
	{
		$this->form_validation->set_rules(
			'edit_data',
			'Designation',
			'trim|required|is_unique[designation.designation]'
		);

		if ($this->form_validation->run() == FALSE) {
			$message = array('response' => 'form_error', 'message' => validation_errors());
		} else {
			$edit_id = $this->input->post('edit_id');
			$edit_data = $this->input->post('edit_data');
			$table = 'designation';
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$date = date('Y-m-d H:i:s');
			$where = [
				'designation_id' => $edit_id
			];
			$record = [
				'designation' => $edit_data,
				'created_date' => $date
			];
			$update_result =  $this->crud->update($table, $record, $where);
			if ($update_result) {
				$message = array('response' => 'success', 'message' => 'Designation Updated');
			} else {
				$message = array('response' => 'error', 'message' => 'Failed ');
			}
		}
		echo json_encode($message);
	}
	// delete designation
	public function delete_designation()
	{
		$del_id = $this->input->post('del_id');
		$table = 'designation';
		$where = [
			'designation_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Designation Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
	// end of class
}
