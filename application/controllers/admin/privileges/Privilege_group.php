<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege_group extends CI_Controller
{
    // to load privilege group page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'privilege';
            $data['sub_menu'] = 2;
            $data['show_sub_menu'] = 'show';
            $data['page_title'] = 'Privilege Group ';
            $data['fetch_privilege_group'] = $this->crud->fetch_all('privilege_group');
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/privilege_group');
            $this->load->view('common/footer');
        }
    }
    // insert privilege group into database
	public function add_privilege_group()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'privilege_group',
				'Privilege Group',
				'trim|required|is_unique[privilege_group.privilege_group]',
				array('is_unique' => 'This privilege Group is already added')
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				$privilege_group = $this->input->post('privilege_group');
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$table = 'privilege_group';
				$record = [
					"privilege_group" => $privilege_group,
					"created_date" => $date
				];
				$check_insertion =  $this->crud->insert($table, $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Privilege Group added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {

			redirect('login');
		}
	}
    // to load the privilege group data into model for editing
	public function edit_privilege_group()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'privilege_group';
		$where = [
			'privilege_group_id' => $edit_id,
			'deleted' => 0
		];
		$order = 'privilege_group_id';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
	// update privilege Group 
	public function update_privilege_group()
	{
		$this->form_validation->set_rules(
			'edit_data',
			'Privilege Group',
			'trim|required|is_unique[privilege_group.privilege_group]',
			array('is_unique' => 'This privilege group is already added')
		);
		if ($this->form_validation->run() == FALSE) {
			$message = array('response' => 'form_error', 'message' => validation_errors());
		} else {
			$edit_id = $this->input->post('edit_id');
			$edit_data = $this->input->post('edit_data');
			$table = 'privilege_group';
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$date = date('Y-m-d H:i:s');
			$where = [
				'privilege_group_id' => $edit_id
			];
			$record = [
				'privilege_group' => $edit_data,
				'created_date' => $date
			];
			$update_result =  $this->crud->update($table, $record, $where);
			if ($update_result) {
				$message = array('response' => 'success', 'message' => 'Privilege Group Updated');
			} else {
				$message = array('response' => 'error', 'message' => 'Failed ');
			}
		}
		echo json_encode($message);
	}
	// delete privilege Group
	public function delete_privilege_group()
	{
		$del_id = $this->input->post('del_id');
		$table = 'privilege_group';
		$where = [
			'privilege_group_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Privilege Group Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
    // end of class
}
