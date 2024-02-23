<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tax extends CI_Controller
{
    // load tax page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'tax_creation';
            $data['page_title'] = ' Tax Creation  ';
            $where = [
                'deleted' => 0
            ];
            $order = 'tax_id ';
            $data['fetch_tax'] = $this->crud->fetch_data_asc('tax', $where, $order);
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/tax_creation', $data);
            $this->load->view('common/footer');
        }
    }
    // insert tax into database
    public function add_tax()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(
                'tax',
                'Tax ',
                'trim|required|is_unique[tax.tax_in_percentage]|numeric',
                array('is_unique' => 'This Tax percentage is already added')
            );
            if ($this->form_validation->run() == FALSE) {
                $message = array('response' => 'error', 'message' => validation_errors());
            } else {
                date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
                $date = date('Y-m-d H:i:s');
                $record = [
                    "tax_in_percentage" => $this->input->post('tax', true),
                    "created_date" => $date
                ];
                $check_insertion =  $this->crud->insert('tax', $record);
                if ($check_insertion) {
                    $message = array('response' => 'success', 'message' => 'Tax  added');
                } else {
                    $message = array('response' => 'error', 'message' => 'Failed to add');
                }
            }
            echo json_encode($message);
        } else {

            redirect('login');
        }
    }
    // to load the tax data into model for editing
    public function edit_tax()
    {
        $edit_id = $this->input->post('edit_id');
        $table = 'tax';
        $where = [
            'tax_id' => $edit_id,
            'deleted' => 0
        ];
        $order = 'tax_id';
        $check_data =  $this->crud->fetch_data_asc($table, $where, $order);
        if ($check_data) {
            $message = array('response' => 'success', 'post' => $check_data->row());
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    //update tax amount
    public function update_tax()
    {
        $this->form_validation->set_rules(
            'edit_data',
            'Tax',
            'trim|required|numeric|is_unique[tax.tax_in_percentage]'
        );
        if ($this->form_validation->run() == FALSE) {
            $message = array('response' => 'form_error', 'message' => validation_errors());
        } else {
            $table = 'tax';
            date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
            $date = date('Y-m-d H:i:s');
            $where = [
                'tax_id' => $this->input->post('edit_id', true)
            ];
            $record = [
                'tax_in_percentage' => $this->input->post('edit_data', true),
                'created_date' => $date
            ];
            $update_result =  $this->crud->update($table, $record, $where);
            if ($update_result) {
                $message = array('response' => 'success', 'message' => 'Tax Updated');
            } else {
                $message = array('response' => 'error', 'message' => 'Failed ');
            }
        }
        echo json_encode($message);
    }
    // delete  Tax
    public function delete_tax()
    {
        $del_id = $this->input->post('del_id');
        $table = 'tax';
        $where = [
            'tax_id' => $del_id
        ];
        $record = [
            'deleted' => 1
        ];
        $delete_result =  $this->crud->update($table, $record, $where);
        if ($delete_result) {
            $message = array('response' => 'success', 'message' => 'Tax Deleted');
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    // end of class
}
