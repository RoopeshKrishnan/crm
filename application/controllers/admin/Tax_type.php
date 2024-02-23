<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tax_type extends CI_Controller
{
   // load tax type  page
	public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'tax_type_creation';
			$data['page_title'] = ' Tax Type Creation  ';
			$where = [
				'deleted' => 0
			];
			$order = 'tax_type_id ';
			$data['fetch_tax_type'] = $this->crud->fetch_data_asc('tax_type', $where, $order);
			$this->load->view('common/header', $data);
			$this->load->view('common/edit_model');
			$this->load->view('admin/tax_type_creation', $data);
			$this->load->view('common/footer');
		}
	}
	// insert tax type into database
	public function add_tax_type()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'tax_type',
				'Tax Type',
				'trim|required|is_unique[tax_type.tax_type]',
				array('is_unique' => 'This Tax Type is already added')
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$record = [
					"tax_type" => $this->input->post('tax_type', true),
					"created_date" => $date
				];
				$check_insertion =  $this->crud->insert('tax_type', $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Tax Type added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {
			redirect('login');
		}
	}
	// to load the tax type data into model for editing
	public function edit_tax_type()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'tax_type';
		$where = [
			'tax_type_id' => $edit_id,
			'deleted' => 0
		];
		$order = 'tax_type_id';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
	//update tax amount
	public function update_tax_type()
	{
		$this->form_validation->set_rules(
			'edit_data',
			'Tax Type',
			'trim|required|is_unique[tax_type.tax_type]'
		);
		if ($this->form_validation->run() == FALSE) {
			$message = array('response' => 'form_error', 'message' => validation_errors());
		} else {
			$table = 'tax_type';
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$date = date('Y-m-d H:i:s');
			$where = [
				'tax_type_id' => $this->input->post('edit_id', true)
			];
			$record = [
				'tax_type' => $this->input->post('edit_data', true),
				'created_date' => $date
			];
			$update_result =  $this->crud->update($table, $record, $where);
			if ($update_result) {
				$message = array('response' => 'success', 'message' => 'Tax Type Updated');
			} else {
				$message = array('response' => 'error', 'message' => 'Failed ');
			}
		}
		echo json_encode($message);
	}
	// delete  Tax type
	public function delete_tax_type()
	{
		$del_id = $this->input->post('del_id');
		$table = 'tax_type';
		$where = [
			'tax_type_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Tax Type Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
    // end of class
}
