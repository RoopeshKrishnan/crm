<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Other_source extends CI_Controller
{
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'other_creation';
            $data['page_title'] = 'Other Source Creation ';
            $where = [
                'deleted' => 0
            ];
            $order1 = 'knew_by_other_id ';
            $data['fetch_other'] = $this->crud->fetch_data_asc('knew_by_other', $where, $order1);
            $this->load->view('common/header', $data);
            $this->load->view('admin/other_source', $data);
            $this->load->view('common/edit_model');
            $this->load->view('common/footer');
        }
    }
    // insert other source into database
    public function add_other_source()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(
                'other_source',
                'Other Source ',
                'trim|required|is_unique[knew_by_other.knew_by_other_name]'
            );
            if ($this->form_validation->run() == FALSE) {
                $message = array('response' => 'error', 'message' => validation_errors());
            } else {
                date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
                $date = date('Y-m-d H:i:s');
                $record = [
                    "knew_by_other_name" => $this->input->post('other_source', true),
                    "created_date" => $date
                ];
                $check_insertion =  $this->crud->insert('knew_by_other', $record);
                if ($check_insertion) {
                    $message = array('response' => 'success', 'message' => 'Other Source added');
                } else {
                    $message = array('response' => 'error', 'message' => 'Failed to add');
                }
            }
            echo json_encode($message);
        } else {
            redirect('login');
        }
    }
    // to load the other source data into model for editing
    public function edit_other()
    {
        $edit_id = $this->input->post('edit_id');
        $table = 'knew_by_other';
        $where = [
            'knew_by_other_id' => $edit_id,
            'deleted' => 0
        ];
        $order = 'knew_by_other_id';
        $check_data =  $this->crud->fetch_data_asc($table, $where, $order);
        if ($check_data) {
            $message = array('response' => 'success', 'post' => $check_data->row());
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    // update other source
    public function update_other()
    {
        $this->form_validation->set_rules(
            'edit_data',
            'Source',
            'trim|required|is_unique[knew_by_other.knew_by_other_name]'
        );
        if ($this->form_validation->run() == FALSE) {
            $message = array('response' => 'form_error', 'message' => validation_errors());
        } else {
            $edit_id = $this->input->post('edit_id');
            $edit_data = $this->input->post('edit_data');
            $table = 'knew_by_other';
            date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
            $date = date('Y-m-d H:i:s');
            $where = [
                'knew_by_other_id' => $edit_id
            ];
            $record = [
                'knew_by_other_name' => $edit_data,
                'created_date' => $date
            ];
            $update_result =  $this->crud->update($table, $record, $where);
            if ($update_result) {
                $message = array('response' => 'success', 'message' => 'Other Source name Updated');
            } else {
                $message = array('response' => 'error', 'message' => 'Failed ');
            }
        }
        echo json_encode($message);
    }
    // delete other source
    public function delete_other()
    {
        $del_id = $this->input->post('del_id');
        $table = 'knew_by_other';
        $where = [
            'knew_by_other_id' => $del_id
        ];
        $record = [
            'deleted' => 1
        ];
        $delete_result =  $this->crud->update($table, $record, $where);
        if ($delete_result) {
            $message = array('response' => 'success', 'message' => 'Other Source Name Deleted');
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    // end of class
}
