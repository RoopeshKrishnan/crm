<?php  
echo 'hhhhhhhhhai';
echo '<br>';
$current_user_id = $this->session->userdata('user_id');
 $query= $this->db->where('deleted',0)->where('user_id',$current_user_id)->get('user_daily_working_register');
var_dump($query->result());

echo '</br>'; echo '</br>';
$privilege_group_id = $this->session->userdata('user_privilege_group');
echo $privilege_group_id;
echo '</br>';

$user_creation_power = $this->admin_model->check_user_creation_privilege()->num_rows();
echo $user_creation_power;
if($user_creation_power>0){
    echo '</br>';
    echo '</br>';
    echo '</br>';

    echo 'Power';

}else{
    echo '</br>';
    echo '</br>';
    echo '</br>';

    echo 'you have no privilege';
}
echo '</br>';
echo '</br>';

http://localhost/crm/admin/Admin_controller/welcome
?>
<section>
<form action="" id="privilage_gt_form">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">privillage group</label>
                  <select class="select-box form-control select2" name="privilege_group" id="prg">
                    <option value="" selected disabled>--Select--</option>
                    <?php
                    foreach ($privilege_group as $row) {
                      echo '<option value="' . $row->privilege_group_id . '">' . $row->privilege_group . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">privillage type</label>
                  <br>
                  <br>
                    <?php
                    foreach ($privilege_type as $row) {
                        echo ' <input type="checkbox" name="privilege_type[]" value="' . $row->privilege_type_id . '">' . $row->privilege_type . '<br>';
                    }
                    ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <button class="btn btn-primary col-2 ms-auto">Save</button>
                </div>
              </div>
            </div>
          </form>
          class Controller_name extends CI_Controller {
    public function insert_values() {
        $checkbox_values = $this->input->post('checkbox_values');
        
        if (!empty($checkbox_values)) {
            foreach ($checkbox_values as $value) {
                $data = array(
                    'checkbox_value' => $value
                );
                
                $this->db->insert('your_table', $data);
            }
        }
        
        // Redirect or display a success message
        redirect('success_page');
    }
}
</section>
<br><br>
<?php
$query = $this->db->where('deleted',0)->get('user_employment_details');
$result1 = $query->result_array();

foreach ($result1 as $row) {
$idField = $row['designation_id'];
echo '</br>';

// echo $idField;
$ids = explode(',', $idField);
echo '</br>';

print_r ($ids);
echo '</br>';

$this->db->select('designation');
$this->db->from('designation');
$this->db->where_in('designation_id', $ids);
$query = $this->db->get();

$result = $query->result();

// Access the corresponding names
foreach ($result as $row) {
    echo $row->designation . '<br>';
}
}
// foreach ($result as $row) {
//   $serializedIds = $row->designation_id;
//   echo $serializedIds;
//   // $ids = unserialize($serializedIds);
//   $ids = explode(',', $serializedIds);
//   $this->db->where_in('designation_id', $serializedIds);
//   $nameQuery = $this->db->get('designation');
//   $names = $nameQuery->result();
//   // Display or use the corresponding names
//   foreach ($names as $designation) {
//     echo $name->name . '<br>';
//   }
//}
echo '</br>';
$query = $this->db->select('user_id')->where_in('designation_id', 1)->get('user_employment_details')->result_array();
print_r($query);

echo '</br>';
echo '</br>';
echo '</br>';

$designation_ids = array(1,2);
$placeholders = implode(',', array_fill(0, count($designation_ids), '?'));

$query = $this->db->query("SELECT user_id
                          FROM user_employment_details
                          WHERE CONCAT(',', designation_id, ',') REGEXP CONCAT(',(', $placeholders, '),')", $designation_ids)
  ->result_array();

var_dump($query);




                  
?>