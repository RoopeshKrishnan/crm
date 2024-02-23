<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_profile extends CI_Controller
{ 
    // to load  user profile page
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'user_profile';
			$data['page_title'] = 'User profile';
			$where = [
				'deleted' => 0,
				'user_id' => $this->session->userdata('user_id')
			];
			$fetch_user_personal_details = $this->crud->fetch_single_row('user_personal_details',$where);
			$data['personal_details'] = $fetch_user_personal_details->row();
			$fetch_user_employment_details = $this->crud->fetch_single_row('user_employment_details',$where);
			$data['employment_details'] = $fetch_user_employment_details->row();
			$fetch_user_details = $this->crud->fetch_single_row('users',$where);
			$data['user_details'] = $fetch_user_details->row();
			$this->load->view('common/header', $data);
			$this->load->view('user/profile', $data);
			$this->load->view('common/footer');
		}
	}
    // end of class
}
