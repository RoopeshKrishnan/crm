<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discount_type extends CI_Controller
{
    // to load category page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'discount_type';
            $data['page_title'] = 'Discount type  ';
            $where = [
                'deleted' => 0
            ];
            $order = 'discount_type_id';
            $data['fetch_discount_type'] = $this->crud->fetch_data_asc('discount_type', $where, $order);
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/discount_type', $data);
            $this->load->view('common/footer');
        }
    }
    // insert category into database
    public function add_discount_type()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(
                'discount_type_name',
                'Discount type ',
                'trim|required'

            );
            if ($this->form_validation->run() == FALSE) {
                $message = array('response' => 'error', 'message' => validation_errors());
            } else {
                date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
                $date = date('Y-m-d H:i:s');
                $record = [
                    "discount_type" => $this->input->post('discount_type_name', true),
                    "created_date" => $date
                ];
                $check_insertion =  $this->crud->insert('discount_type', $record);
                if ($check_insertion) {
                    $message = array('response' => 'success', 'message' => 'Discount type added');
                } else {
                    $message = array('response' => 'error', 'message' => 'Failed to add');
                }
            }
            echo json_encode($message);
  

        } else {

            redirect('login');
        }
    }
    // to load the category data into model for editing
    public function edit_category()
    {
        $edit_id = $this->input->post('edit_id');
        $table = 'category';
        $where = [
            'category_id' => $edit_id,
            'deleted' => 0
        ];
        $order = 'category_id';
        $check_data =  $this->crud->fetch_data_asc($table, $where, $order);
        if ($check_data) {
            $message = array('response' => 'success', 'post' => $check_data->row());
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }
    // update category 
    public function update_category()
    {
        $this->form_validation->set_rules(
            'edit_data',
            'Category',
            'trim|required'
        );
        if ($this->form_validation->run() == FALSE) {
            $message = array('response' => 'form_error', 'message' => validation_errors());
        } else {
            $table = 'category';
            date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
            $date = date('Y-m-d H:i:s');
            $where = [
                'category_id' => $this->input->post('edit_id', true)
            ];
            $record = [
                'category' => $this->input->post('edit_data', true),
                'created_date' => $date
            ];
            $update_result =  $this->crud->update($table, $record, $where);
            if ($update_result) {
                $message = array('response' => 'success', 'message' => 'Category Updated');
            } else {
                $message = array('response' => 'error', 'message' => 'Failed ');
            }
        }
        echo json_encode($message);
    }
    // delete  category 
    public function delete_category()
    {
        $del_id = $this->input->post('del_id');
        $table = 'category';
        $where = [
            'category_id' => $del_id
        ];
        $record = [
            'deleted' => 1
        ];
        $delete_result =  $this->crud->update($table, $record, $where);
        if ($delete_result) {
            $message = array('response' => 'success', 'message' => 'Category Deleted');
        } else {
            $message = array('response' => 'error', 'message' => 'Failed ');
        }
        echo json_encode($message);
    }

    // end of class
}
