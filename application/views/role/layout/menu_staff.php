
<nav class="navbar navbar-expand-lg navbar-light bg-light"  style="background-color: #e3f2fd;">
  <a class="navbar-brand"  href="#"><?php  echo $_SESSION["game_code"]; ?> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link   border-right " href="<?php echo BASE_URL; ?>games/detail/<?php echo $_SESSION["game_id"]; ?>/2"> รายละเอียดการแข่งขัน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  border-right " id='pop6060'  href="<?php echo BASE_URL; ?>games/ImgFrm/<?php echo $_SESSION["game_id"]; ?>"> โปรสเตอร์การแข่งขัน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  border-right " href="<?php echo BASE_URL; ?>games/gameTypeFrm/<?php echo $_SESSION["game_id"]; ?>">ประเภทการแข่งขัน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  border-right  " href="<?php echo BASE_URL; ?>games/gameApplyList/<?php echo $_SESSION["game_id"]; ?>">ข้อมูลผู้สมัคร</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  border-right  " href="<?php echo BASE_URL; ?>games/gameStaffFrm/<?php echo $_SESSION["game_id"]; ?>">ข้อมูลผู้ดูแลการแข่งขัน</a>
      </li>
    </ul>
  </div>
</nav>
