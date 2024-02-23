<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{

	// to load login page
	public function index()
	{
		$this->load->view('login/login_view');
	}

	// to perform login functionality
	public function login()
	{
		if ($this->input->post('submit')) { // to check whether the login functionality perform by clicking the sign up button or not
			// if not , go back to the login page

			// form validation
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == false) {

				$this->index();
			} else {

				$email = $this->input->post('email');
				$password = $this->input->post('password');
				// checking whether the username is in the database or     not
				$check_login = $this->login_model->login_section($email);
				// if count is > 0 that means username is correct otherwise username is wrong
				if ($check_login->num_rows() > 0) {
					$result = $check_login->result();
					foreach ($result as $rows) {
						// fetch corresponding password
						$check_password = $rows->user_password;
						// checking the password is equal to user entered password
						// if match, that means the user entered credentials are true, otherwise false
						if ($check_password == $password) {
							date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
							$login_date_time = date('Y-m-d H:i:s');
							$login_info = [
								"user_id" => $rows->user_id,
								"agent" => $this->get_user_agent_info(),
								"ip_address" => $this->input->ip_address(), // to get the current ip address
								"login_time" => $login_date_time,
								"created_date" => $login_date_time,
							];
							// inserting users login information's to db table
							$login_activity_id = $this->crud->insert('user_login_activity', $login_info);
							if ($login_activity_id) {
								// to save login activity table  id -for saving logout time corresponding to login time 
								$this->session->set_userdata('login_activity_id', $login_activity_id);
							}			
							$fetch_employe_details = $this->login_model->fetch_employe_details($rows->user_id);
							$fetch_privilege_group = $this->login_model->fetch_privilege_group($rows->user_id);
							$where = [
								'user_id' => $rows->user_id
							];
							$fetch_user_privilege_group = $this->crud->fetch_data_without_order('privileges',$where)->row();
							
							$user_data = [
								"user_id" => $rows->user_id,
								"user_name" => $rows->user_name,
								"user_email" => $rows->user_email,
								"user_phone" => $rows->user_phone,
								"user_privilege_group" => $fetch_user_privilege_group->	privilege_group_id,
								"user_designation" => $fetch_employe_details->designation,
								"user_privilege_group" => $fetch_privilege_group->privilege_group_id,
								"user_logged_in" => true,
								"login_time" => $login_date_time,
							];
							$this->session->set_userdata($user_data);
							$is_user_work_register_present = $this->login_model->is_user_work_register_present();						
							if($is_user_work_register_present->num_rows()<1){
								$user_work_time_record = [
									"user_id" => $rows->user_id,
									"year" => date('Y'),
									"month" => date('n'),
									"day" => date('d'),
									"date" => date('Y-m-d'),
									"first_login_time" => $login_date_time,
									"created_date" => $login_date_time,
								];
								$user_work_register = $this->crud->insert('user_daily_working_register', $user_work_time_record);
							}
							redirect('dashboard');
						} else {
							$this->session->set_flashdata('invalid_password', 'Invalid Password...!!!');
							$this->index();
						}
					}
				} else {

					$this->session->set_flashdata('invalid_username', 'Invalid Username...!!!');
					$this->index();
				}
			}
		} else {
			redirect('login');
		}
	}

	// to find the user browser and version
	public function get_user_agent_info()
	{
		$this->load->library('user_agent');
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Unidentified User Agent';
		}
		return $agent;
	}
	// to load dashboard page
	public function dashboard()
	{
		if ((!$this->session->userdata('user_logged_in'))) {

			redirect('login');
		} else {
		$data['active'] = 'dashboard';
		$data['page_title'] = 'Dashboard';
		$this->load->view('common/header',$data);
		$this->load->view('common/dashboard',$data);
		$this->load->view('common/footer');
		}
	}

	public function logout()
	{
		if ($this->session->userdata('login_activity_id')) {
			$login_activity_id = $this->session->userdata('login_activity_id');
			date_default_timezone_set('Asia/Kolkata');
			$logout_time = date('Y-m-d H:i:s');
			$data = ['logout_time' => $logout_time];
			$where = ['ula_id' => $login_activity_id];
			$this->crud->update('user_login_activity', $data, $where);

			$where1 = [
				'user_id' => $this->session->userdata('user_id'),
				'date'=>date('Y-m-d')
			];
			$record = [
				'last_logout_time' => $logout_time,
			];
			$this->crud->update('user_daily_working_register', $record, $where1);
		}
		$this->session->sess_destroy();
		redirect('login');
	}


	// end of login controller class
}
