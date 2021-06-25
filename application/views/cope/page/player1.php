<?php 

$xcrud->table('tbl_player1');
$xcrud->table_name('ข้อมูลนักกีฬาประเภทเดี่ยว  ');
$xcrud->unset_view();
$xcrud->unset_remove();


$xcrud->columns('gr_id,	game_id, user_id, IsApprove,	set_hand,	line_name,	resulte_game');
$xcrud->fields('game_id, 	IsApprove,	set_hand,	line_name,	resulte_game');
$xcrud->relation('game_id','tbl_games','game_id','game_name');
$xcrud->relation('user_id','tbl_users','user_id','user_name');

$xcrud->change_type('IsApprove', 'select','',array('1' => 'Y','0' => 'N', ));

$xcrud->label('gr_id', 'ID');
$xcrud->label('game_id', 'ชื่อการแข่งขัน');
// $xcrud->label('gt_id', 'ID');
// $xcrud->label('player', 'ID');
$xcrud->label('user_id', 'ผู้เล่น');
$xcrud->label('IsApprove', 'อนุมัติ');
$xcrud->label('set_hand', 'มือ');
$xcrud->label('line_name', 'สาย');
$xcrud->label('resulte_game', 'ผลการแข่งขัน');
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