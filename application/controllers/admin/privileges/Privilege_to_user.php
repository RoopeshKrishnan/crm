<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege_to_user extends CI_Controller
{
 // to load the privilege to user page
 public function index()
 {
     if ((!$this->session->userdata('user_logged_in'))) {
         redirect('login');
     } else {
         $data['active'] = 'privilege_to_user';
         $data['sub_menu'] = 4;
         $data['show_sub_menu'] = 'show';
         $data['page_title'] = 'Add Privilege To User  ';
         $fetch_privilege_user = $this->admin_model->fetch_privilege_user();
         $data['privilege_user'] = $fetch_privilege_user->result();
         $where = [
             'deleted' => 0,
             'is_privilege_added' => 0
         ];
         $order1 = 'user_id ';
         $fetch_user = $this->crud->fetch_data_asc('users', $where, $order1);
         $data['users'] = $fetch_user->result();
         $order2 = 'privilege_group_id';
         $where1 = [
             'deleted' => 0
         ];
         $fetch_pg = $this->crud->fetch_data_asc('privilege_group', $where1, $order2);
         $data['privilege_group'] = $fetch_pg->result();
         $this->load->view('common/header', $data);
         $this->load->view('admin/privilege_to_user', $data);
         $this->load->view('common/edit_model', $data);
         $this->load->view('common/footer');
     }
 }
 // giving privilege to user (mapping user to privilege group into database)
 public function add_privilege_to_users()
 {
     if ($this->input->is_ajax_request()) {
         $this->form_validation->set_rules(
             'p_user',
             'User',
             'trim|required'
         );
         $this->form_validation->set_rules(
             'p_group',
             'Privilege Group',
             'trim|required'
         );
         if ($this->form_validation->run() == FALSE) {
             $message = array('response' => 'error', 'message' => validation_errors());
         } else {
             date_default_timezone_set('Asia/Kolkata'); # add your city to set local time 
             $date = date('Y-m-d H:i:s');
             $record = [
                 "user_id" => $this->input->post('p_user'),
                 "privilege_group_id" => $this->input->post('p_group'),
                 "created_date" => $date,
             ];
             $check_insertion =  $this->crud->insert('privileges', $record);
             if ($check_insertion) {
                 $where = [
                     'user_id' => $this->input->post('p_user')
                 ];
                 $u_record = [
                     'is_privilege_added' => 1
                 ];
                 $this->crud->update('users', $u_record, $where);
                 $message = array('response' => 'success', 'message' => 'Privilege added to User');
             } else {
                 $message = array('response' => 'error', 'message' => 'Failed to add');
             }
         }
         echo json_encode($message);
     } else {

         redirect('login');
     }
 }
 // to load the privilege data into model for editing
 public function edit_privilege_to_user()
 {
     $edit_id = $this->input->post('edit_id');
     $check_data =  $this->admin_model->fetch_user_name($edit_id);
     if ($check_data) {
         $message = array('response' => 'success', 'post' => $check_data->row());
     } else {
         $message = array('response' => 'error', 'message' => 'Failed ');
     }
     echo json_encode($message);
 }
 // update user privilege  
 public function update_privilege_to_user()
 {
     $this->form_validation->set_rules(
         'p_to_user',
         'Privilege Group',
         'trim|required'
     );
     if ($this->form_validation->run() == FALSE) {
         $message = array('response' => 'form_error', 'message' => validation_errors());
     } else {
         $user_id = $this->input->post('pto_user_id');
         $privilege_group = $this->input->post('p_to_user');
         $check_privilege_to_user_validation = $this->admin_model->check_privilege_to_user_validation($user_id, $privilege_group);
         if ($check_privilege_to_user_validation->num_rows() > 0) {
             $message = array('response' => 'error', 'message' => 'Already Added');
         } else {
             $table = 'privileges';
             date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
             $date = date('Y-m-d H:i:s');
             $where = [
                 'privileges_id' => $this->input->post('edit_id')
             ];
             $record = [
                 'privilege_group_id' => $privilege_group,
                 'created_date' => $date
             ];
             $update_result =  $this->crud->update($table, $record, $where);
             if ($update_result) {
                 $message = array('response' => 'success', 'message' => 'Privilege Updated');
             } else {
                 $message = array('response' => 'error', 'message' => 'Failed ');
             }
         }
     }
     echo json_encode($message);
 }

 // delete  user privilege
 public function delete_privilege_to()
 {
     $del_id = $this->input->post('del_id');
     $table = 'privileges';
     $where = [
         'privileges_id' => $del_id
     ];
     $record = [
         'deleted' => 1
     ];
     $delete_result =  $this->crud->update($table, $record, $where);
     if ($delete_result) {
         $query =	$this->db->select('user_id')->where('privileges_id', $del_id)->get('privileges')->row();
         $user_id = $query->user_id;
         $where = [
             'user_id' => $user_id
         ];
         $u_record = [
             'is_privilege_added' => 0
         ];
         $this->crud->update('users', $u_record, $where);
         $message = array('response' => 'success', 'message' => 'Privilege Deleted For the user');
     } else {
         $message = array('response' => 'error', 'message' => 'Failed ');
     }
     echo json_encode($message);
 }
    // end of class
}
