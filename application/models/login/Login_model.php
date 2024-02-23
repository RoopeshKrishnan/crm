<?php
class Login_model extends CI_Model
{


  public function fetch_items($searchTerm)
  {
    return $this->db->like('item_name', $searchTerm)->get('item')->result();
  }

  public function login_section($email)
  {
    $this->db->where('user_email', $email)->where('deleted', 0);
    $check_login = $this->db->get('users');
    return $check_login;
  }


  public function fetch_employe_details($user_id)
  {

    // return  $this->db->where('deleted',0)->where('user_id',$user_id)->get('user_employment_details')->row();
    $this->db->select('*');
    $this->db->from('user_employment_details');
    $this->db->join('designation', 'designation.designation_id = user_employment_details.designation_id');
    $this->db->where('user_employment_details.deleted', 0)->where('user_id', $user_id);
    $query = $this->db->get()->row();
    return $query;
  }

  public function fetch_privilege_group($user_id)
  {
    return  $this->db->where('deleted', 0)->where('user_id', $user_id)->get('privileges')->row();
  }

  public function is_user_work_register_present()
  {
    $today = date('Y-m-d');
    $current_user_id = $this->session->userdata('user_id');
    return  $this->db->where('deleted',0)->where('user_id',$current_user_id)->where('date',$today)->get('user_daily_working_register');
  }





  // end of model

}
