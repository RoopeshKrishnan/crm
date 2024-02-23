<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Installment extends CI_Controller
{
    // to load category page
    public function index()
    {
        if ((!$this->session->userdata('user_logged_in'))) {
            redirect('login');
        } else {
            $data['active'] = 'installment';
            $data['page_title'] = ' installment Creation  ';
            $where = [
                'deleted' => 0
            ];
            $order = 'installment_id ';
            $data['fetch_installment'] = $this->crud->fetch_data_asc('installment', $where, $order);
            $this->load->view('common/header', $data);
            $this->load->view('common/edit_model');
            $this->load->view('admin/installment', $data);
            $this->load->view('common/footer');
        }
    }
    // insert installment into database
    public function add_installment()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules(
                'installment_name',
                'Installment name ',
                'trim|required',
            );
            $this->form_validation->set_rules(
                'installment_amount',
                'Installment Amount ',
                'trim|required',
            );
            $this->form_validation->set_rules(
                'installment_duration',
                'Installment Duration ',
                'trim|required',
            );
            if ($this->form_validation->run() == FALSE) {
                $message = array('response' => 'error', 'message' => validation_errors());
            } else {
                date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
                $date = date('Y-m-d H:i:s');
                $record = [
                    "installment_name" => $this->input->post('installment_name', true),
                    "installment_amount" => $this->input->post('installment_amount', true),
                    "repeated_duration" => $this->input->post('installment_duration', true),
                    "created_date" => $date
                ];
                $check_insertion =  $this->crud->insert('installment', $record);
                if ($check_insertion) {
                    $message = array('response' => 'success', 'message' => 'Installment  added');
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



    public function installment_check(){

        $where = [
            'deleted' => 0
        ];
        $order1 = 'installment_id';
        $fetch_pt = $this->crud->fetch_data_asc('installment', $where, $order1);
        $data['installment'] = $fetch_pt->result();
        $this->load->view('installment_check',$data);

    }

    public function installment_billDate(){
        $total_amount = $this->input->get('total_amount');
      $bill_date = $this->input->get('bill_date');
      $start_date = $this->input->get('bill_date');

      $installment_id = $this->input->get('installment');
      $query=$this->db->where('installment_id',$installment_id)->get('installment')->row();
      $payment_amount = $query->installment_amount;
      $number_of_installments = ceil($total_amount/$payment_amount);
      $installment_minus_1 = $number_of_installments-1;
      $t = 2;

      echo 'Total payable Amount = '. $total_amount;
      echo '<br>';
      echo 'Bill Date(Start Date) = '. $bill_date;
      echo '<br>';
      echo 'Payable Amount = '. $payment_amount;
      echo '<br>';
      echo 'Payable Duration = '. $query->repeated_duration .  '&nbsp;Days';
      echo '<br>';
      echo 'Number of installments  = '. $number_of_installments ;
      echo '<br>';
      echo '<br>';
      echo '<br>';
      echo '<br>';

      for($i =0;$i<$installment_minus_1-1;$i++){
        $timestamp = strtotime($bill_date);
        $newTimestamp = $timestamp + ($query->repeated_duration * 24 * 60 * 60); // 24 hours * 60 minutes * 60 seconds
        $bill_date = date("Y-m-d", $newTimestamp);
        echo 'installment '.$t.' Date = '. $bill_date ;
        echo '<br>';
        $t++;
      }

      echo '<br>';
      echo '<br>';
      echo '<br>';
      echo '<br>';
      echo '<br>';

      $timestamp = strtotime($start_date);
      $newTimestamp = $timestamp + ($installment_minus_1 * 24 * 60 * 60)*$query->repeated_duration; // 24 hours * 60 minutes * 60 seconds
      $newDate = date("Y-m-d", $newTimestamp);
      echo 'End Date = '. $newDate ;

    }
    // end of class
}
