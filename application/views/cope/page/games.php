<?php

$xcrud->table('tbl_games');
$xcrud->table_name('การแข่งขัน ');
$xcrud->unset_remove(); $xcrud->unset_view();
$xcrud->columns('game_code ,game_name, game_location, game_owner,IsActive,IsComplete');
 $xcrud->fields('game_code,game_name, game_location, game_owner,IsActive,IsComplete ,IsDelete ');
$xcrud->order_by("game_id",'desc'); 
 @$xcrud->button($_SESSION['url'] . BASE_URL. 'games/detail/{game_id}/2', 'รายละเอียด', 'fa fa-trash', 'btn-success' );
//@$xcrud->button($_SESSION['url'] . BASE_URL. 'wd/eject/{game_id}', 'อนุมัติ', 'fa fa-trash', 'btn-info' );

$xcrud->change_type('IsActive', 'select','',array('1' => 'ใช้งาน','0' => 'รอ', ));
$xcrud->change_type('IsComplete', 'select','',array('0' => 'ไม่ใช่','1' => 'ใช่', ));
$xcrud->change_type('IsDelete', 'select','',array('0' => 'ไม่ลบ','1' => 'ลบ', ));
 
$xcrud->highlight('IsActive', '=', 1, '#42f55a');
$xcrud->highlight('IsActive', '=', 0, '#fad784');


$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');




// ******************************************** nested_table *******************************

// $nested = $xcrud->nested_table('nested','game_id','tbl_games_user','game_id'); // nested table
// $nested->unset_view();
// $nested->table_name('เข้าของเกมส์ ');

// $nested->relation('owner_id','tbl_users','user_name','user_name' );

// $nested->change_type('IsDelete', 'select','',array('Y' => 'ไม่ลบ','N' => 'ลบ', ));
// $nested->change_type('IsActive', 'select','',array('N' => 'ระงับ','Y' => 'ใช้งาน', ));
 


// $nested->label('product_name', 'สินค้า');
// $nested->label('sale_qty', 'จำนวน');
// $nested->label('unit_price', 'ราคาต่อหน่วย');
// $nested->label('SumPrice', 'รวมเป็นเงิน');
// $nested->label('IsDelete', 'ลบรายการ');
// $nested->label('IsActive', 'ปิดการขาย');
 



// $nested->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
// $nested->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
// $nested->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
// $nested->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');





echo $xcrud->render();
?>