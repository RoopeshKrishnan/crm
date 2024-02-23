<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_media extends CI_Controller
{
    public function index()
	{
		if ((!$this->session->userdata('user_logged_in'))) {
			redirect('login');
		} else {
			$data['active'] = 'social_creation';
			$data['page_title'] = 'Social Creation ';
			$where = [
				'deleted' => 0
			];
			$order1 = 'social_id ';
			$data['fetch_social'] = $this->crud->fetch_data_asc('socials', $where, $order1);
			$this->load->view('common/header', $data);
			$this->load->view('admin/social_creation', $data);
			$this->load->view('common/edit_model', $data);
			$this->load->view('common/footer');
		}
	}
	// insert social media into database
	public function add_socials()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules(
				'social',
				'Social ',
				'trim|required|is_unique[socials.social_media_name]'
			);
			if ($this->form_validation->run() == FALSE) {
				$message = array('response' => 'error', 'message' => validation_errors());
			} else {
				date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
				$date = date('Y-m-d H:i:s');
				$record = [
					"social_media_name" => $this->input->post('social', true),
					"created_date" => $date
				];
				$config['upload_path'] = './assets/img/GL-img/social/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '10000';
				$this->load->library('upload');
				$this->upload->initialize($config);
				if ($this->upload->do_upload('social_image')) {
					$img = $this->upload->data();
					$record['social_media_image'] =  '' . $img['raw_name'] . $img['file_ext'];
				} else {
					$image_error = array('response' => 'error', 'message' =>  $this->upload->display_errors());
					echo json_encode($image_error);
					die();
				}
				$check_insertion =  $this->crud->insert('socials', $record);
				if ($check_insertion) {
					$message = array('response' => 'success', 'message' => 'Social Media added');
				} else {
					$message = array('response' => 'error', 'message' => 'Failed to add');
				}
			}
			echo json_encode($message);
		} else {
			redirect('login');
		}
	}
 // to load the social media data into model for editing
 public function edit_social()
 {
     $edit_id = $this->input->post('edit_id');
     $table = 'socials';
     $where = [
         'social_id' => $edit_id,
         'deleted' => 0
     ];
     $order = 'social_id';
     $check_data =  $this->crud->fetch_data_asc($table, $where, $order);
     if ($check_data) {
         $message = array('response' => 'success', 'post' => $check_data->row());
     } else {
         $message = array('response' => 'error', 'message' => 'Failed ');
     }
     echo json_encode($message);
 }
 // update social media
 public function update_social()
 {
     $this->form_validation->set_rules(
         'edit_model_input_name',
         'Social Media Name',
         'trim|required'
     );
     if ($this->form_validation->run() == FALSE) {
         $message = array('response' => 'form_error', 'message' => validation_errors());
     } else {
         $table = 'socials';
         date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
         $date = date('Y-m-d H:i:s');
         $where = [
             'social_id' => $this->input->post('primary_key_id')
         ];
         $record = [
             'social_media_name' => $this->input->post('edit_model_input_name'),
             'created_date' => $date
         ];
         $config['upload_path'] = './assets/img/GL-img/social/';
         $config['allowed_types'] = 'gif|jpg|jpeg|png';
         $config['max_size'] = '10000';
         $this->load->library('upload');
         $this->upload->initialize($config);
         if (!empty($_FILES['edit_spic']['name'])) {
             if ($this->upload->do_upload('edit_spic')) {
                 $img = $this->upload->data();
                 $record['social_media_image'] =  '' . $img['raw_name'] . $img['file_ext'];
             } else {
                 $image_error = array('response' => 'error', 'message' =>  $this->upload->display_errors());
                 echo json_encode($image_error);
                 die();
             }
         }
         $update_result =  $this->crud->update($table, $record, $where);
         if ($update_result) {
             $message = array('response' => 'success', 'message' => 'Social Media name Updated');
         } else {
             $message = array('response' => 'error', 'message' => 'Failed ');
         }
     }
     echo json_encode($message);
 }
 // delete social media
 public function delete_social()
 {
     $del_id = $this->input->post('del_id');
     $table = 'socials';
     $where = [
         'social_id' => $del_id
     ];
     $record = [
         'deleted' => 1
     ];
     $delete_result =  $this->crud->update($table, $record, $where);
     if ($delete_result) {
         // if (file_exists(FCPATH . './assets/img/GL-img/social/' . $image)) {
         // 	// File exists, delete it
         // 	unlink(FCPATH . 'path_to_uploads_folder/' . $image);
         // }
         $message = array('response' => 'success', 'message' => 'Social Name Deleted');
     } else {
         $message = array('response' => 'error', 'message' => 'Failed ');
     }
     echo json_encode($message);
 }
    // end of class
}