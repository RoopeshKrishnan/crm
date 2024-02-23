<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege_group_type extends CI_Controller
{
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'privilege';
			$data['sub_menu'] = 3;
			$data['show_sub_menu'] = 'show';
			$data['page_title'] = 'Privilege Group Type ';
			$where = [
				'deleted' => 0
			];
			$order1 = 'privilege_type_id';
			$fetch_pt = $this->crud->fetch_data_asc('privilege_type', $where, $order1);
			$data['privilege_type'] = $fetch_pt->result();
			$order2 = 'privilege_group_id';
			$fetch_pg = $this->crud->fetch_data_asc('privilege_group', $where, $order2);
			$data['privilege_group'] = $fetch_pg->result();
			$order3 = 'privilege_group_type_id';
			$fetch_privilege_group_type = $this->admin_model->fetch_privilege_group_type();
			$data['privilege_group_type'] = $fetch_privilege_group_type->result();

			$this->load->view('common/header', $data);
			$this->load->view('admin/privilege_group_type', $data);
			$this->load->view('common/footer');
		}
	}
  // insert privilege group type into database
	public function add_privilege_group_type()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'privilege_type',
				'Privilege Type',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'privilege_group',
				'Privilege Group',
				'trim|required'
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				$privilege_type = $this->input->post('privilege_type');
				$privilege_group = $this->input->post('privilege_group');
				$check_privilege_group_type_validation = $this->admin_model->check_privilege_group_type_validation($privilege_type, $privilege_group);
				if ($check_privilege_group_type_validation->num_rows() > 0) {
					$message = array('response' => 'error', 'message' => 'Already Added');
				} else {
					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time 
					$date = date('Y-m-d H:i:s');
					$table = 'privilege_group_type';
					$record = [
						"privilege_group_id" => $privilege_group,
						"privilege_type_id" => $privilege_type,
						"created_date" => $date,
					];
					$check_insertion =  $this->crud->insert($table, $record);
					if ($check_insertion) {
						$message = array('response' => 'success', 'message' => 'Privilege Group Type added');
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
	// delete privilege group type
	public function delete_privilege_group_type()
	{
		$del_id = $this->input->post('del_id');
		$table = 'privilege_group_type';
		$where = [
			'privilege_group_type_id' => $del_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'Privilege Group type Deleted');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}

    // end of class
}