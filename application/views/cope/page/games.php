<?php

$xcrud->table('tbl_games');
$xcrud->table_name('การแข่งขัน ');
$xcrud->unset_remove(); 
//$xcrud->unset_view();
$xcrud->columns('game_code ,game_name, game_location, game_owner,IsActive,IsComplete,IsDelete');
$xcrud->fields('game_code,	game_name,	game_owner,	game_location,	map_location,	province_id,	
game_description,		pay1player,	pay2player,	pay_end,	apply_start,	apply_end,	
game_start,	game_end,	game_money,	game_remark,	game_img,	pay_status,	game_status,	
allDay,	color,	IsActive,	IsComplete,	IsDelete');
$xcrud->order_by("game_id",'desc'); 
 @$xcrud->button($_SESSION['url'] . BASE_URL. 'games/detail/{game_id}/2', 'UserView', 'fa fa-info', 'btn-success' );
//@$xcrud->button($_SESSION['url'] . BASE_URL. 'wd/eject/{game_id}', 'อนุมัติ', 'fa fa-trash', 'btn-info' );
$xcrud->relation('province_id','th_provinces','PROVINCE_ID','PROVINCE_NAME');
$xcrud->change_type('IsActive', 'select','',array('1' => 'Y','0' => 'N', ));
$xcrud->change_type('IsComplete', 'select','',array('0' => 'N','1' => 'Y', ));
$xcrud->change_type('IsDelete', 'select','',array('0' => 'N','1' => 'Y', ));
 
$xcrud->highlight('IsActive', '=', 1, '#42f55a');
$xcrud->highlight('IsActive', '=', 0, '#fad784');

$xcrud->change_type('game_img', 'image'); 

$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');


$xcrud->label('game_code', 'รหัสการแข่ง');
$xcrud->label('game_name', 'ชื่อการแข่ง');
$xcrud->label('game_location', 'สถานที่');
$xcrud->label('map_location', 'Google Map');
$xcrud->label('game_owner', 'ผู้จัด');
$xcrud->label('province_id', 'จังหวัด');
$xcrud->label('game_description', 'รายละเอียดอื่น ๆ');


// $xcrud->label('game_pay', 'ค่าคูปอง');
$xcrud->label('pay1player', 'ค่าสมัครเดี่ยว');
$xcrud->label('pay2player', 'ค่าสมัครทีม');
$xcrud->label('pay_end', 'ชำระค่าสมัครได้ถึงวันที่');
$xcrud->label('apply_start', 'เริ่มสมัคร');
$xcrud->label('apply_end', 'สิ้นสุดการสมัคร');
$xcrud->label('game_start', 'เริ่มแข่ง');
$xcrud->label('game_end', 'สิ้นสุดการแข่ง');
$xcrud->label('game_money', 'ค่าคูปอง');
$xcrud->label('game_remark', 'หมายเหตุ');
$xcrud->label('game_img', 'โปรสเตอร์');
$xcrud->label('pay_status', 'สถานะการจ่ายเงิน');
$xcrud->label('game_status', 'สถานะการแข่ง');
 $xcrud->label('allDay', 'allDay');
$xcrud->label('color', 'สี');
$xcrud->label('IsActive', 'Active');
$xcrud->label('IsComplete', 'Complete');
$xcrud->label('IsDelete', 'Delete');
$xcrud->label('create_user_id', 'ผู้สร้าง');
$xcrud->label('create_date', 'วันที่สร้าง');
$xcrud->label('update_user_id', 'ผู้แก้ไข');
$xcrud->label('update_date', 'วันที่แก้ไข');




$xcrud->label('IsActive', 'Active');
$xcrud->label('IsComplete', 'Complete');
$xcrud->label('IsDelete', 'Delete');

// ******************************************** nested_table *******************************

  $nested = $xcrud->nested_table('nested','game_id','tbl_games_type','game_id'); // nested table
// $nested->unset_view();
  $nested->table_name('ประเภทการแข่งขัน ');
//gt_id,gt_type,	gt_hand_name,	gt_pay,	gt_total_apply,	gt_description,	rank1,	rank2,	rank3,	rank4,	rank5,

$nested->columns('gt_hand_name,	gt_pay,	gt_total_apply, 	rank1,	rank2,	rank3,	rank4 ');



// $nested->relation('owner_id','tbl_users','user_name','user_name' );

// $nested->change_type('IsDelete', 'select','',array('Y' => 'ไม่ลบ','N' => 'ลบ', ));
// $nested->change_type('IsActive', 'select','',array('N' => 'ระงับ','Y' => 'ใช้งาน', ));
 


// $nested->label('gt_id', 'ID');
// $nested->label('game_id', 'ID');
// $nested->label('gt_type', 'ID');
$nested->label('gt_hand_name', 'ระดับการแข่งขัน');
$nested->label('gt_pay', 'ค่าสมัคร');
$nested->label('gt_total_apply', 'จำนวนที่รับ');
$nested->label('gt_description', 'หมายเหตุ');
$nested->label('rank1', 'ชนะเลิศ');
$nested->label('rank2', 'รองชนะเลิศอันดับ 1');
$nested->label('rank3', 'รองชนะเลิศอันดับ 2');
$nested->label('rank4', 'รองชนะเลิศอันดับ 2');
$nested->label('rank5', 'รองชนะเลิศอันดับ 3');
$nested->label('rank_description', 'หมายเหตุ');
$nested->label('IsActive', 'Active');
$nested->label('IsDelete', 'Delete');
$nested->label('create_user_id', 'ผู้สร้าง');
$nested->label('create_date', 'วันที่สร้าง');
$nested->label('update_user_id', 'ผู้แก้ไข');
$nested->label('update_date', 'วันที่แก้ไข');

 
$nested->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$nested->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$nested->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$nested->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');





echo $xcrud->render();
?>