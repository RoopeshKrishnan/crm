<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rent extends CI_Controller
{
	// to load designation page
	public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'rent';
			$data['page_title'] = 'Rent   ';
			$where = [
				'deleted' => 0
			];
			$order = 'rental_id ';
			$data['fetch_rent'] =  $this->crud->fetch_data_asc('rental', $where, $order);

			$this->load->view('common/header', $data);
			$this->load->view('admin/rent', $data);
			$this->load->view('common/edit_model');
			$this->load->view('common/footer');
		}
	}
	// insert designation into database
	public function add_rent()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'rent_name',
				'Rent Name ',
				'trim|required',
			);
			$this->form_validation->set_rules(
				'unit_type',
				'Unit Type',
				'trim|required'
			);
            $this->form_validation->set_rules(
				'rent_duration',
				'Rent Duration ',
				'trim|required'
			);
            $this->form_validation->set_rules(
				'rent_amount',
				'Rent Amount ',
				'trim|required'
			);
       
            $this->form_validation->set_rules(
				'tax_included',
				'Tax included  ',
				'trim|required'
			);

			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
		
					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					$date = date('Y-m-d H:i:s');
					$record = [
						"rental_type_name" =>$this->input->post('rent_name', true),
                        "unit_type" =>$this->input->post('unit_type', true),
						"rent_duration" =>$this->input->post('rent_duration', true),
						"rent_amount" =>$this->input->post('rent_amount', true),
						"advanced_amount" =>$this->input->post('advanced_amount', true),
						"tax_included_or_not" =>$this->input->post('tax_included', true),
						"created_date" => $date
					];
					$check_insertion =  $this->crud->insert('rental', $record);
					if ($check_insertion) {
						$message = array('response' => 'success', 'message' => 'Rent  added');
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
