<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    // to load website page
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'website_creation';
			$data['page_title'] = 'Website Creation ';
			$where = [
				'deleted' => 0
			];
			$order1 = 'knew_by_website_id ';
			$data['fetch_website'] = $this->crud->fetch_data_asc('knew_by_website', $where, $order1);
			$this->load->view('common/header', $data);
			$this->load->view('admin/website_creation', $data);
			$this->load->view('common/edit_model');
			$this->load->view('common/footer');
		}
	}
	// insert website into database
	public function add_website()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'website',
				'Website ',
				'trim|required|is_unique[knew_by_website.website_name]'
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$record = [
					"website_name" => $this->input->post('website', true),
					"created_date" => $date
				];
				$check_insertion =  $this->crud->insert('knew_by_website', $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Website added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {
			redirect('login');
		}
	}
    // to load the website data into model for editing
	public function edit_web()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'knew_by_website';
		$where = [
			'knew_by_website_id ' => $edit_id,
			'deleted' => 0
		];
		$order = 'knew_by_website_id ';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
	// update website name and data in database
	public function update_website()
	{
		$this->form_validation->set_rules(
			'edit_data',
			'Designation',
			'trim|required|is_unique[knew_by_website.website_name]'
		);
		if ($this->form_validation->run() == FALSE) {
			$message = array('response' => 'form_error', 'message' => validation_errors());
		} else {
			$edit_id = $this->input->post('edit_id');
			$edit_data = $this->input->post('edit_data');
			$table = 'knew_by_website';
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$date = date('Y-m-d H:i:s');
			$where = [
				'knew_by_website_id' => $edit_id
			];
			$record = [
				'website_name' => $edit_data,
				'created_date' => $date
			];
			$update_result =  $this->crud->update($table, $record, $where);
			if ($update_result) {
				$message = array('response' => 'success', 'message' => 'Website name Updated');
			} else {
				$message = array('response' => 'error', 'message' => 'Failed ');
			}
		}
		echo json_encode($message);
	}
	// delete website
	public function delete_website()
	{
		$del_id = $this->input->post('del_id');
		$table = 'knew_by_website';
		$where = [
			'knew_by_website_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Website Name Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
    // end of class
}