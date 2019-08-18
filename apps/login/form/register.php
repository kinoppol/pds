<?php
$theme_URL=site_url("system/template/admin4b/src",true);
?><style>
.page-sign.sign-up {
  background:
    linear-gradient(-160deg, rgba(60, 162, 224, .25) 50%, rgba(241, 244, 245, .9) 50%),
    url("<?php print site_url('images/legal-bg.jpg',true); ?>");
}
    </style>
<body><div class="page-sign sign-up"><div class="container pb-0 mb-0">
</div><div class="container-sign"><div class="card"><div class="card-header">
<img src="<?php
print site_url('images/lgs.png',true);
?>"><h1>ยินดีต้อนรับ</h1><span>การลงทะเบียนเพื่อใช้งานระบบ</span></div>

<form action="<?php print site_url('authen/login/save/register'); ?>" method="post">
<div class="card-body">
<div class="row">
    <div class="col">
<div class="form-group"><label>สถานศึกษา</label> 
        <?php
        $school_id=$hGET['sid'];
            $school_data=sSelectTb($systemDb,'school_data','*','school_id='.sQ($school_id));
            print  $school_data[0]['school_name'];
            print '<input type="hidden" name="school_id" value="'.$school_data[0]['school_id'].'">';
        ?>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
<div class="form-group"><label>ชื่อ</label> <input type="text" name="firstname" required class="form-control"></div></div><div class="col"><div class="form-group"><label>สกุล</label> <input type="text" name="lastname" required class="form-control"></div></div></div><div class="form-group"><label>อีเมล</label> <input type="email" name="email" required class="form-control"></div><div class="form-group"><label>รหัสผ่าน</label> <input type="password" id="password" name="password" minlength="6" class="form-control"></div>
<div class="form-group d-flex"><label class="checkbox"><input type="checkbox" onclick="showPassword()"> <span class="check-mark" ></span> แสดงรหัสผ่าน</label></div>

<div class="form-group d-flex"><label class="checkbox"><input type="checkbox" required name="agree"> <span class="check-mark" ></span> ฉันยอมรับ&nbsp; <a href="#">ข้อตกลงในการใช้งาน</a></label> <button type="submit" class="btn btn-primary ml-auto">ลงทะเบียน</button></div></div>
</form>
<div class="card-footer"><p class="text-muted">หากท่านได้เคยลงทะเบียนแล้ว?</p><a href="<?php
print site_url('authen/login/form/regular');
?>">ลงชื่อเข้าใช้</a></div></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script><script src="<?php print $theme_URL; ?>/dist/admin4b.min.js"></script><script src="<?php print $theme_URL; ?>/docs/assets/js/docs.js"></script></body>
<script>
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>