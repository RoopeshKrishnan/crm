<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_registration extends CI_Controller
{
    // to load customer registration page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'customer_registration';
            $data['page_title'] = 'Customer Registration ';
            $agent_query = $this->crud->fetch_all('agent');
            $data['agent'] = $agent_query->result();
            $cust_query = $this->crud->fetch_all('customer_registration');
            $data['customer'] = $cust_query->result();
            $social_query = $this->crud->fetch_all('socials');
            $data['socials'] = $social_query->result();
            $website_query = $this->crud->fetch_all('knew_by_website');
            $data['website'] = $website_query->result();
            $other_query = $this->crud->fetch_all('knew_by_other');
            $data['other'] = $other_query->result();
            $this->load->view('common/header', $data);
            $this->load->view('common/add_model');
            $this->load->view('user/customer_registration/customer_registration', $data);
            $this->load->view('common/footer');
        }
    }

    public function customer_registration_function()
	{
		$this->form_validation->set_rules('customer_name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Mobile number', 'required');
		if ($this->form_validation->run() == FALSE) {
			$response['success'] = false;
			$response['errors'] = validation_errors();
			echo json_encode($response);
			return;
		} else {

			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d H:i:s');
			$is_empty_query = $this->db->query('select exists(select 1 from customer_registration) AS Output')->row();
			$is_empty = $is_empty_query->Output;
			if ($is_empty == 0) {
				$customer_id = 'CUS0000001';
			} else {
				$last_id_query = $this->db->query('SELECT customer_id FROM customer_registration ORDER BY cust_id DESC LIMIT 1;')->row();
				$last_id = $last_id_query->customer_id;
				$customer_id = ++$last_id;
			}
			if ($this->input->post('social')) {
				$social = substr(implode(', ', $this->input->post('social')), 0);
			} else {
				$social = NULL;
			}
			if ($this->input->post('website')) {
				$website = substr(implode(', ', $this->input->post('website')), 0);
			} else {
				$website = NULL;
			}
			if ($this->input->post('other')) {
				$other = substr(implode(', ', $this->input->post('other')), 0);
			} else {
				$other = NULL;
			}

			$customer_record = [
				"customer_id" => $customer_id,
				"name" => $this->input->post(('customer_name')),
				"number" => $this->input->post(('phone')),
				"email_id" => $this->input->post(('email')),
				"socials_id" => $social,
				"knew_by_website_id" => $website,
				"knew_by_other_id" => $other,
				"agent_id" => $this->input->post(('agent')),
				"refer_cust" => $this->input->post(('refer_customers')),
				"date" => $date,
			];

			$is_insert =  $this->crud->insert('customer_registration', $customer_record);
			if ($is_insert) {
				$current_customer = [
					"customer_id" => $customer_id,
					"customer_name" => $this->input->post(('customer_name')),
					"customer_number" => $this->input->post(('phone')),
					"customer_email_id" => $this->input->post(('email')),
				];
				$this->session->set_userdata($current_customer);
				$response['success'] = true;

			}else{
				$response['success'] = false;
				$response['errors'] = 'Failed to register,Please try again';

			}
			echo json_encode($response);
			return;
		}
	}


	public function customer_item(){
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'customer_registration';
			$data['page_title'] = 'Customer Registration ';
			$item_query = $this->crud->fetch_all_with_limit('item',4);
			$data['item'] = $item_query->result();
			$all_item_query = $this->crud->fetch_all('item');
			$data['all_item'] = $all_item_query->result();
			$this->load->view('common/header', $data);
			$this->load->view('user/customer_registration/customer_item', $data);
			$this->load->view('common/footer');
		}
	}

    // end of class
}
