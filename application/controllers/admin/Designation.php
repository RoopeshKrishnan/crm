<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Designation extends CI_Controller
{
	// to load designation page
	public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'designation_creation';
			$data['page_title'] = 'Designation Creation ';
			$where = [
				'deleted' => 0
			];
			$order = 'department_id ';
			$data['department'] =  $this->crud->fetch_data_asc('department', $where, $order)->result();
			$data['fetch_designation'] = $this->admin_model->fetch_designation();

			$this->load->view('common/header', $data);
			$this->load->view('admin/designation_creation', $data);
			$this->load->view('common/edit_model');
			$this->load->view('common/footer');
		}
	}
	// insert designation into database
	public function add_designation()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'designation',
				'Designation ',
				'trim|required|is_unique[designation.designation]',
				array('is_unique' => 'This Designation is already added')
			);
			$this->form_validation->set_rules(
				'department_id',
				'Department',
				'trim|required'
			);

			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				$designation = $this->input->post('designation', true);
				$department_id = $this->input->post('department_id', true);
				$check_designation_validation = $this->admin_model->check_designation_validation($designation, $department_id);
				if ($check_designation_validation->num_rows() > 0) {
					$message = array('response' => 'error', 'message' => 'Already Added');
				} else {
					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					$date = date('Y-m-d H:i:s');
					$record = [
						"designation" =>$designation,
						"department_id" => $department_id,
						"created_date" => $date
					];
					$check_insertion =  $this->crud->insert('designation', $record);
					if ($check_insertion) {
						$message = array('response' => 'success', 'message' => 'Designation  added');
					} else {
						$message = array('response' => 'error', 'message' => 'Failed to add');
					}
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
