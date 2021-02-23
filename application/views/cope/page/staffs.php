<?php
$xcrud->table('tbl_users');
$xcrud->table_name('นักกีฬา ');
$xcrud->unset_view();
$xcrud->unset_remove();
$xcrud->where("level_id = 3 ");
$xcrud->order_by("user_id",'desc'); 
$xcrud->columns('user_id, user_code, user_name, user_fullname ,   IsActive ,user_img');
$xcrud->fields('  user_code, user_name ,user_password, user_fullname , user_nickname , idcard ,
user_email, user_tel, user_sex, user_birth, user_comment,   IsActive , IsDelete ,user_img');



// $xcrud->relation('user_level','userlevels','userlevelid','userlevelname');


$xcrud->change_type('user_password', 'password', '', 32);
$xcrud->change_type('user_img', 'image');
$xcrud->change_type('user_img', 'image', '', array('width' => 800, 'height' => 600));
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));


$xcrud->label('user_id', 'ID');
$xcrud->label('user_fullname', 'ชื่อ-สกุล');
$xcrud->label('user_name', 'User Name');
$xcrud->label('user_password', 'Password');




$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

 

echo $xcrud->render();
?>