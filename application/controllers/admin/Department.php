<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{
    // to load department page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'department_creation';
            $data['page_title'] = ' Department Creation  ';
            $where = [
                'deleted' => 0
            ];
            $order = 'department_id ';
            $data['fetch_department'] = $this->crud->fetch_data_asc('department', $where, $order);
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/department_creation', $data);
            $this->load->view('common/footer');
        }
    }
    // insert category into database
    public function add_department()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(
                'department',
                'Department ',
                'trim|required|is_unique[department.department]',
                array('is_unique' => 'This department is already added')
            );
            if ($this->form_validation->run() == FALSE) {
                $message = array('response' => 'error', 'message' => validation_errors());
            } else {
                date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
                $date = date('Y-m-d H:i:s');
                $record = [
                    "department" => $this->input->post('department', true),
                    "created_date" => $date
                ];
                $check_insertion =  $this->crud->insert('department', $record);
                if ($check_insertion) {
                    $message = array('response' => 'success', 'message' => 'Department  added');
                } else {
                    $message = array('response' => 'error', 'message' => 'Failed to add');
                }
            }
            echo json_encode($message);
        } else {

            redirect('login');
        }
    }
    // to load the department data into model for editing
    public function edit_department()
    {
        $edit_id = $this->input->post('edit_id');
        $table = 'department';
        $where = [
            'department_id' => $edit_id,
            'deleted' => 0
        ];
        $order = 'department_id';
        $check_data =  $this->crud->fetch_data_asc($table, $where, $order);
        if ($check_data) {
            $message = array('response' => 'success', 'post' => $check_data->row());
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    // update department 
    public function update_department()
    {
        $this->form_validation->set_rules(
            'edit_data',
            'Department',
            'trim|required'
        );
        if ($this->form_validation->run() == FALSE) {
            $message = array('response' => 'form_error', 'message' => validation_errors());
        } else {
            $table = 'department';
            date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
            $date = date('Y-m-d H:i:s');
            $where = [
                'department_id' => $this->input->post('edit_id', true)
            ];
            $record = [
                'department' => $this->input->post('edit_data', true),
                'created_date' => $date
            ];
            $update_result =  $this->crud->update($table, $record, $where);
            if ($update_result) {
                $message = array('response' => 'success', 'message' => 'Department Updated');
            } else {
                $message = array('response' => 'error', 'message' => 'Failed ');
            }
        }
        echo json_encode($message);
    }
    // delete  department 
    public function delete_department()
    {
        $del_id = $this->input->post('del_id');
        $table = 'department';
        $where = [
            'department_id' => $del_id
        ];
        $record = [
            'deleted' => 1
        ];
        $delete_result =  $this->crud->update($table, $record, $where);
        if ($delete_result) {
            $message = array('response' => 'success', 'message' => 'Department Deleted');
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }

    // end of class
}
