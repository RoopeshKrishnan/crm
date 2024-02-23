<?php 
class User_model extends CI_Model{

    
    public function fetch_user_personal_details($current_user_id){
        return $this->db->where('deleted', 0)->where('user_id',$current_user_id)->get('user_personal_details')->row();
    }
    public function fetch_user_employment_details($current_user_id){
        return $this->db->where('deleted', 0)->where('user_id',$current_user_id)->get('user_employment_details')->row();
    }



    // end of model

}
