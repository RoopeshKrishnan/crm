<?php
class Admin_model extends CI_Model
{
  public function fetch_privilege_group_type()
  {
    $query = $this->db->query('SELECT pgt.privilege_group_type_id,pg.privilege_group,pt.privilege_type,pgt.created_date
        FROM privilege_group_type pgt 
        JOIN privilege_group pg
        USING(privilege_group_id)
        JOIN privilege_type pt
        USING(privilege_type_id)

        WHERE pgt.deleted = 0 ORDER BY privilege_group_type_id DESC
        ');
    return $query;
  }
  public function check_privilege_group_type_validation($privilege_type, $privilege_group)
  {
    return  $this->db->where('deleted', 0)->where('privilege_group_id', $privilege_group)->where('privilege_type_id', $privilege_type)->get('privilege_group_type');
  }
  public function check_privilege_to_user_validation($user_id, $privilege_group)
  {
    return  $this->db->where('deleted', 0)->where('privilege_group_id', $privilege_group)->where('user_id', $user_id)->get('privileges');
  }
  public function check_subcategory_validation($sub_category, $category_id)
  {
    return  $this->db->where('deleted', 0)->where('sub_category', $sub_category)->where('category_id', $category_id)->get('sub_category');
  }

  public function check_categoryType_validation($sub_category_id, $category_id, $category_type)
  {
    return  $this->db->where('deleted', 0)->where('sub_category_id', $sub_category_id)->where('category_id', $category_id)->where('category_type', $category_type)->get('category_type');
  }
  public function fetch_privilege_user()
  {
    $query = $this->db->query('SELECT p.privileges_id,u.user_name,pg.privilege_group,p.created_date FROM privileges p
    JOIN privilege_group pg USING(privilege_group_id)
    JOIN users u USING(user_id)
    WHERE p.deleted = 0 
    ');
    return $query;
  }

  public function fetch_user_name($edit_id)
  {
    $query = $this->db->query('SELECT u.user_name,p.user_id,p.privilege_group_id,p.privileges_id,pg.privilege_group FROM privileges p
    JOIN users u USING(user_id)
    JOIN privilege_group pg USING(privilege_group_id)
    WHERE p.privileges_id = ' . $edit_id . '');
    return $query;
  }
  public function fetch_all_users_details()
  {
    $query = $this->db->query('SELECT u.user_id,u.user_name,u.user_email,u.user_phone,d.designation FROM users u
    JOIN user_employment_details ued USING(user_id)
    JOIN designation d ON ued.designation_id = d.designation_id
    WHERE u.deleted = 0 ORDER BY user_id desc
    ');
    return $query;
  }
  public function fetch_sub_category()
  {
    $query = $this->db->query('SELECT sc.sub_category_id,sc.sub_category,sc.created_date,c.category FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.deleted = 0 ORDER BY sub_category_id desc
    ');
    return $query;
  }
  public function fetch_designation()
  {
    $query = $this->db->query('SELECT d.designation_id,d.designation,d.created_date,de.department FROM designation d
    JOIN department de USING(department_id)
    WHERE d.deleted = 0 ORDER BY designation_id desc
    ');
    return $query;
  }
  public function check_user_creation_privilege()
  {
    $privilege_group_id = $this->session->userdata('user_privilege_group');
    return $this->db->where('privilege_group_id', $privilege_group_id)->where('deleted', 0)->where('privilege_type_id', 22)->get('privilege_group_type');
  }
  public function check_designation_validation($designation, $department_id)
  {
    return  $this->db->where('deleted', 0)->where('designation', $designation)->where('department_id', $department_id)->get('designation');
  }


  public function fetch_category_type()
  {
    $query = $this->db->query('SELECT ct.category_type_id,ct.category_type,ct.created_date,c.category,sc.sub_category FROM category_type ct
    JOIN category c USING(category_id)
    JOIN sub_category sc USING(sub_category_id)
    WHERE ct.deleted = 0 ORDER BY category_type_id desc
    ');
    return $query;
  }

  public function fetch_discount()
  {
    $query = $this->db->query('SELECT d.discount_id,d.discount_name,dt.discount_type,d.amount_type,d.amount_or_percentage,d.no_product,d.created_date FROM discount d
    LEFT JOIN discount_type dt ON dt.discount_type_id = d.discount_type
    WHERE d.deleted=0 ORDER BY discount_id desc ');
    return $query;
  }

  public function fetch_items()
  {
    $query = $this->db->query('SELECT i.item_id,i.item_name,i.item_unit,i.min_seller_unit,i.contain_unit,i.tax_included,i.created_date,
    c.category,sc.sub_category,ct.category_type,ty.tax_type,i.mandatory_documents,i.optional_documents,i.installments,i.discounts,i.services,i.commissions,i.rents,t.tax_in_percentage FROM items i
    JOIN category c USING(category_id)
    JOIN sub_category sc USING(sub_category_id)
    LEFT JOIN category_type ct USING(category_type_id)
    LEFT JOIN tax_type ty ON i.tax_type_id = ty.tax_type_id
    LEFT JOIN tax t ON i.tax_percentage = t.tax_id
    WHERE i.deleted = 0 ORDER BY item_id desc
    ');
    return $query;
  }

  public function getDocumentById($documentId)
  {
    $query = $this->db->where('rd_id', $documentId)->get('required_document');
    return $query->row();
  }

  public function getInstallmentById($ins)
  {
    $query = $this->db->where('installment_id', $ins)->get('installment');
    return $query->row();
  }

  public function getDiscountById($dis)
  {
    $query = $this->db->where('discount_id', $dis)->get('discount');
    return $query->row();
  }


  public function getServiceById($ser)
  {
    $query = $this->db->where('service_id ', $ser)->get('service');
    return $query->row();
  }

  public function getCommissionById($com)
  {
    $query = $this->db->where('commission_id', $com)->get('commission');
    return $query->row();
  }

  public function getRentById($re)
  {
    $query = $this->db->where('rental_id', $re)->get('rental');
    return $query->row();
  }
  // end of model
}
