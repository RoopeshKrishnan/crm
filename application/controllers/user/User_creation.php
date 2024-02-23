<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_creation extends CI_Controller
{ 
    // to load user creation personal details page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'user_creation';
            $data['page_title'] = 'User Creation ';
            $this->load->view('common/header', $data);
            $this->load->view('user/user_creation/user_creation_personal_details');
            $this->load->view('common/footer');
        }
    }
    // to load employment details page of user creation
    public function user_creation_employment()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'user_creation';
			$data['page_title'] = 'User Creation ';
			$where = [
				'deleted' => 0
			];
			$order = 'designation_id ';
			$fetch_designation = $this->crud->fetch_data_asc('designation', $where, $order);
			$data['designation'] = $fetch_designation->result();
			$order1 = 'shift_id ';
			$fetch_shift = $this->crud->fetch_data_asc('shift', $where, $order1);
			$data['shift'] = $fetch_shift->result();
			$order4 = 'department_id  ';
			$fetch_department = $this->crud->fetch_data_asc('department', $where, $order4);
			$data['department'] = $fetch_department->result();
			$this->load->view('common/header', $data);
			$this->load->view('user/user_creation/user_creation_employment_details', $data);
			$this->load->view('common/footer');
		}
	}
    ////////// user personal details insert  
	public function add_user_personal_details()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'name',
				'Name',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'address',
				'Address',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'dob',
				'Date of birth',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'gender',
				'Gender',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'phone',
				'Mobile phone ',
				'trim|required|is_unique[users.user_phone]',
				array('is_unique' => 'This Mobile number is already added')
			);
			$this->form_validation->set_rules(
				'email',
				'Email  ',
				'trim|required|valid_email|is_unique[users.user_email]',
				array('is_unique' => 'This Email is already added')
			);
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$table = 'users';
				$user_record = [
					"user_name" => $this->input->post('name', true),
					"user_email" => $this->input->post('email', true),
					"user_phone" => $this->input->post('phone', true),
					"user_password" => $this->input->post('password', true),
					"user_register_date" => $date,
				];
				$is_user_inserted =  $this->crud->insert($table, $user_record);
				if ($is_user_inserted) {
					$this->session->set_userdata('current_added_user_id', $is_user_inserted);
					$user_personal_record = [
						"user_id" => $is_user_inserted,
						"user_address" => $this->input->post('address', true),
						"user_dob" => $this->input->post('dob', true),
						"gender" => $this->input->post('gender', true),
						"created_date" => $date,
					];

					$config['upload_path'] = './assets/img/user_profile_photos/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = '10000';
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!empty($_FILES['user_profile_image']['name'])) {
						if ($this->upload->do_upload('user_profile_image')) {
							$img = $this->upload->data();
							$user_personal_record['user_image'] =  '' . $img['raw_name'] . $img['file_ext'];
						} else {
							$image_error = array('response' => 'error', 'message' =>  $this->upload->display_errors());
							echo json_encode($image_error);
							die();
						}
					}
					$is_user_personal_inserted =  $this->crud->insert('user_personal_details', $user_personal_record);
					if ($is_user_personal_inserted) {
						$message = array('response' => 'success');
					} else {
						$message = array('response' => 'error', 'message' => 'Failed to add');
					}
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {
			redirect('login');
		}
	}
	////////// user employment details insert  
	public function add_user_employment_details()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'designation_id',
				'Designation',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'department',
				'Department',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'branch',
				'Branch',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'shift_id',
				'Shift',
				'trim|required'
			);
			$this->form_validation->set_rules(
				'join_date',
				'Join Date ',
				'trim|required',
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$table = 'user_employment_details';
				$user_emp_record = [
					"user_id" => $this->session->userdata('current_added_user_id'),
					"designation_id" => $this->input->post('designation_id', true),
					"join_date" => $this->input->post('join_date', true),
					"department" => $this->input->post('department', true),
					"reporting_persons" => $this->input->post('report_user_id', true),
					"reporting_department" => $this->input->post('report_department_id', true),
					"branch" => $this->input->post('branch', true),
					"shift_id" => $this->input->post('shift_id', true),
					"created_date" => $date,
				];
				$is_user_emp_inserted =  $this->crud->insert($table, $user_emp_record);
				if ($is_user_emp_inserted) {
					$this->session->unset_userdata('current_added_user_id');
					$message = array('response' => 'success', 'message' => 'User Created');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {
			redirect('login');
		}
	}
    // end of class
}
