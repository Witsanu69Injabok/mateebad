<?php
 
$xcrud->table('tbl_users');
$xcrud->table_name('สมาชิก ');
$xcrud->unset_view();
$xcrud->unset_remove();
// $xcrud->where("level_id = 2 ");
$xcrud->order_by("user_id",'desc'); 
$xcrud->columns('user_id,user_img, user_code, user_name, user_fullname ,level_id,   IsActive ');
$xcrud->fields('  user_code, user_name ,user_password, user_fullname , user_nickname , idcard ,
user_email, user_tel, user_sex, user_birth, user_comment,   IsActive , IsDelete ,user_img');



  $xcrud->relation('level_id','userlevels','userlevelid','userlevelname');


$xcrud->change_type('user_password', 'password', '', 32);
$xcrud->change_type('user_img', 'image');
$xcrud->change_type('user_img', 'image', '', array('width' => 800, 'height' => 600));
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));


$xcrud->label('user_id', 'ID');
$xcrud->label('user_fullname', 'ชื่อ-สกุล');
$xcrud->label('user_name', 'User Name');
$xcrud->label('user_password', 'Password'); 
$xcrud->label('user_code', 'รหัสสมาชิก'); 
$xcrud->label('level_id', 'ระดับสิทธิ์'); 
$xcrud->label('user_nickname', 'ชื่อเล่น');
$xcrud->label('idcard', 'บัตรประชาชน');
$xcrud->label('user_email', 'อีเมล์');
$xcrud->label('user_tel', 'เบอร์โทร');
$xcrud->label('user_sex', 'เพศ');
$xcrud->label('user_birth', 'วันเดือนปีเกิด');
$xcrud->label('user_facebook', 'Facebook');
$xcrud->label('user_line', 'Line');
$xcrud->label('user_img', 'รูปถ่าย');
$xcrud->label('user_comment', 'หมายเหตุ');
$xcrud->label('IsActive', 'Active');
$xcrud->label('IsDelete', 'Delete');
$xcrud->label('create_user_id', 'ผู้สร้าง');
$xcrud->label('create_date', 'วันที่สร้าง');
$xcrud->label('update_user_id', 'ผู้แก้ไข');
$xcrud->label('update_date', 'วันที่แก้ไข');




$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

 

echo $xcrud->render();
?>