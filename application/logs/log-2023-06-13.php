<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-06-13 08:57:21 --> Severity: Warning --> Undefined variable $fetch_designation /opt/lampp/htdocs/crm/application/views/admin/category_creation.php 38
ERROR - 2023-06-13 08:57:21 --> Severity: error --> Exception: Call to a member function num_rows() on null /opt/lampp/htdocs/crm/application/views/admin/category_creation.php 38
ERROR - 2023-06-13 10:49:22 --> Severity: Warning --> Undefined variable $privilege_group /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 19
ERROR - 2023-06-13 10:49:22 --> Severity: Warning --> foreach() argument must be of type array|object, null given /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 19
ERROR - 2023-06-13 10:49:22 --> Severity: Warning --> Undefined variable $fetch_category /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 31
ERROR - 2023-06-13 10:49:22 --> Severity: error --> Exception: Call to a member function num_rows() on null /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 31
ERROR - 2023-06-13 11:14:11 --> Severity: error --> Exception: Call to undefined method Admin_model::fetch_sub_category() /opt/lampp/htdocs/crm/application/controllers/admin/Admin_controller.php 1552
ERROR - 2023-06-13 11:18:19 --> Severity: Warning --> Undefined variable $privilege_group /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 19
ERROR - 2023-06-13 11:18:19 --> Severity: Warning --> foreach() argument must be of type array|object, null given /opt/lampp/htdocs/crm/application/views/admin/sub_category_creation.php 19
ERROR - 2023-06-13 12:02:47 --> Severity: Warning --> Undefined variable $privilege_group /opt/lampp/htdocs/crm/application/views/common/edit_model.php 45
ERROR - 2023-06-13 12:02:47 --> Severity: Warning --> foreach() argument must be of type array|object, null given /opt/lampp/htdocs/crm/application/views/common/edit_model.php 45
ERROR - 2023-06-13 12:10:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.dele...' at line 1 - Invalid query: SELECT sc.sub_category_id,sc.sub_category,sc.created_date,c.category, FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.deleted = 0 
    
ERROR - 2023-06-13 12:11:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.dele...' at line 1 - Invalid query: SELECT sc.sub_category_id,sc.sub_category,sc.created_date,c.category, FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.deleted = 0 
    
ERROR - 2023-06-13 12:11:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.dele...' at line 1 - Invalid query: SELECT sc.sub_category_id,sc.sub_category,sc.created_date,c.category, FROM sub_category sc
    JOIN category c USING(category_id)
    WHERE sc.deleted = 0 
    
ERROR - 2023-06-13 12:12:01 --> Severity: Warning --> Undefined variable $privilege_group /opt/lampp/htdocs/crm/application/views/common/edit_model.php 45
ERROR - 2023-06-13 12:12:01 --> Severity: Warning --> foreach() argument must be of type array|object, null given /opt/lampp/htdocs/crm/application/views/common/edit_model.php 45
ERROR - 2023-06-13 12:26:31 --> Query error: Unknown column 'sub_category_id' in 'order clause' - Invalid query: SELECT *
FROM `category`
WHERE `deleted` = 0
ORDER BY `sub_category_id` ASC
