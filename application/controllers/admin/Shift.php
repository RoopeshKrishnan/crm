<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shift extends CI_Controller
{
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'shift_creation';
			$data['page_title'] = 'shift Creation ';
			$where = [
				'deleted' => 0
			];
			$order1 = 'shift_id ';
			$data['fetch_shift'] = $this->crud->fetch_data_asc('shift', $where, $order1);
			$this->load->view('common/header', $data);
			$this->load->view('admin/shift_creation', $data);
			$this->load->view('common/edit_model', $data);
			$this->load->view('common/footer');
		}
	}
    // insert shift data  into database
	public function add_shift()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'shift_name',
				'Shift Name ',
				'trim|required|is_unique[shift.shift_type]',
				array('is_unique' => 'This Shift Type  is already added')
			);
			$this->form_validation->set_rules(
				'shift_start_time',
				'Shift Start Time ',
				'trim|required',
			);
			$this->form_validation->set_rules(
				'shift_end_time',
				'Shift End Time ',
				'trim|required',
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$record = [
					"shift_type" => $this->input->post('shift_name', true),
					"starting_time" => $this->input->post('shift_start_time', true),
					"ending_time" => $this->input->post('shift_end_time', true),
					"created_date" => $date
				];
				$check_insertion =  $this->crud->insert('shift', $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Shift  added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {

			redirect('login');
		}
	}
    // to load the shift data into model for editing
	public function edit_shift()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'shift';
		$where = [
			'shift_id' => $edit_id,
			'deleted' => 0
		];
		$order = 'shift_id';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
	// update shift data in database
	public function update_shift()
	{
		$this->form_validation->set_rules(
			'edit_data',
			'Shift',
			'trim|required'
		);
		$this->form_validation->set_rules(
			'start_time',
			'Shift Starting Time',
			'trim|required'
		);
		$this->form_validation->set_rules(
			'end_time',
			'Shift Ending Time',
			'trim|required'
		);
		if ($this->form_validation->run() == FALSE) {
			$message = array('response' => 'form_error', 'message' => validation_errors());
		} else {
			$edit_id = $this->input->post('edit_id');
			$edit_data = $this->input->post('edit_data');
			$table = 'shift';
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$date = date('Y-m-d H:i:s');
			$where = [
				'shift_id' => $edit_id
			];
			$record = [
				'shift_type' => $edit_data,
				'starting_time' => $this->input->post('start_time'),
				'ending_time' => $this->input->post('end_time'),
				'created_date' => $date
			];
			$update_result =  $this->crud->update($table, $record, $where);
			if ($update_result) {
				$message = array('response' => 'success', 'message' => 'Shift Updated');
			} else {
				$message = array('response' => 'error', 'message' => 'Failed ');
			}
		}
		echo json_encode($message);
	}
	// delete shift
	public function delete_shift()
	{
		$del_id = $this->input->post('del_id');
		$table = 'shift';
		$where = [
			'shift_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Shift Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
    // end of class
}