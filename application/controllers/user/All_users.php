<?php
defined('BASEPATH') or exit('No direct script access allowed');
class All_users extends CI_Controller
{ 
    // to load all users page
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'all_users';
			$data['page_title'] = 'All Users  ';
			$fetch_all_users = $this->admin_model->fetch_all_users_details();
			$data['all_users'] = $fetch_all_users->result();
			$this->load->view('common/header', $data);
			$this->load->view('user/all_users', $data);
			$this->load->view('common/footer');
		}
	}
    // to deactivate a user 
    public function deactivate_user()
	{
		$user_id = $this->input->post('deactivate_id');
		$table = 'users';
		$where = [
			'user_id' => $user_id
		];
		$record = [
			'deleted' => 1
		];
		$delete_result =  $this->crud->update($table, $record, $where);
		if ($delete_result) {
			$message = array('response' => 'success', 'message' => 'User Deactivated');
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
    // when we select a user this function will call and show that particular users all details
	public function selected_user()
	{
		if ((!$this->session->userdata('user_logged_in'))) {

			redirect('login');
		} else {
			$data['active'] = 'selected_user';
			$data['page_title'] = 'User';
			$where = [
				'deleted' => 0,
				'user_id' => $this->input->post('selected_user_id')
			];
			$fetch_user_personal_details = $this->crud->fetch_single_row('user_personal_details', $where);
			$data['personal_details'] = $fetch_user_personal_details->row();
			$fetch_user_employment_details = $this->crud->fetch_single_row('user_employment_details', $where);
			$data['employment_details'] = $fetch_user_employment_details->row();
			$fetch_user_details = $this->crud->fetch_single_row('users', $where);
			$data['user_details'] = $fetch_user_details->row();
			$this->load->view('common/header', $data);
			$this->load->view('user/profile', $data);
			$this->load->view('common/footer');
		}
	}
    // end of class
}
