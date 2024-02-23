<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege_type extends CI_Controller
{
    // to load privilege type page 
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'privilege';
            $data['sub_menu'] = 1;
            $data['show_sub_menu'] = 'show';
            $data['page_title'] = 'Privilege Type ';
            $data['fetch_privilege_type'] = $this->crud->fetch_all('privilege_type');
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/privilege_type', $data);
            $this->load->view('common/footer');
        }
    }
    // to add new privilege type into database
    public function add_privilege_type()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'privilege_type',
				'Privilege Type',
				'trim|required|is_unique[privilege_type.privilege_type]',
				array('is_unique' => 'This privilege type is already added')
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				$privilege_type = $this->input->post('privilege_type');
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$table = 'privilege_type';
				$record = [
					"privilege_type" => $privilege_type,
					"created_date" => $date
				];
				$check_insertion =  $this->crud->insert($table, $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Privilege Type added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {

			redirect('login');
		}
	}
    // to load the privilege type data into model for editing
	public function edit_privilege_type()
	{
		$edit_id = $this->input->post('edit_id');
		$table = 'privilege_type';
		$where = [
			'privilege_type_id' => $edit_id,
			'deleted' => 0
		];
		$order = 'privilege_type_id';
		$check_data =  $this->crud->fetch_data_asc($table, $where, $order);
		if ($check_data) {
			$message = array('response' => 'success', 'post' => $check_data->row());
		} else {
			$message = array('response' => 'error', 'message' => 'Failed ');
		}
		echo json_encode($message);
	}
// update privilege type in database with new data
public function update_privilege_type()
{
    $this->form_validation->set_rules(
        'edit_data',
        'Privilege Type',
        'trim|required|is_unique[privilege_type.privilege_type]',
        array('is_unique' => 'This privilege type is already added')
    );
    if ($this->form_validation->run() == FALSE) {
        $message = array('response' => 'form_error', 'message' => validation_errors());
    } else {
        $edit_id = $this->input->post('edit_id');
        $edit_data = $this->input->post('edit_data');
        $table = 'privilege_type';
        date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
        $date = date('Y-m-d H:i:s');
        $where = [
            'privilege_type_id' => $edit_id
        ];
        $record = [
            'privilege_type' => $edit_data,
            'created_date' => $date
        ];
        $update_result =  $this->crud->update($table, $record, $where);
        if ($update_result) {
            $message = array('response' => 'success', 'message' => 'Privilege Type Updated');
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
    }
    echo json_encode($message);
}
// delete privilege type
public function delete_privilege_type()
{
    $del_id = $this->input->post('del_id');
    $table = 'privilege_type';
    $where = [
        'privilege_type_id' => $del_id
    ];
    $record = [
        'deleted' => 1
    ];
    $delete_result =  $this->crud->update($table, $record, $where);
    if ($delete_result) {
        $message = array('response' => 'success', 'message' => 'Privilege Type Deleted');
    } else {
        $message = array('response' => 'error', 'message' => 'Failed ');
    }
    echo json_encode($message);
}
    // end of class
}
