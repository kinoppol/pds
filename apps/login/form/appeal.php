<style>
        .app-sidebar .sidebar-header {
  background-image: url("<?php print $theme_URL?>/src/docs/assets/img/sidebar-header.svg");
  background-repeat: no-repeat;
  background-size: 100% 100%;
}

.page-sign {
  background-attachment: fixed;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.page-sign.sign-in {
  background:
    linear-gradient(160deg, rgba(60, 162, 224, .25) 50%, rgba(241, 244, 245, .9) 50%),
    url("<?php print site_url('images/legal-bg.jpg',true); ?>");
    background-size: cover;
}

.page-sign.sign-up {
  background:
    linear-gradient(-160deg, rgba(60, 162, 224, .25) 50%, rgba(241, 244, 245, .9) 50%),
    url("<?php print site_url('images/legal-bg.jpg',true); ?>");
}
    </style>
</head><body><div class="page-sign sign-in"><div class="container-sign"><div class="card"><div class="card-header">
<h1>ร้องเรียน</h1>
<span>กรุณาป้อนข้อมูล</span></div>
<form action="<?php print site_url('authen/login/check/savePetition'); ?>" method="post">
<input type="hidden" name="petition_type" value="appeal">
<div class="card-body"><div class="form-group"><label>E-mail</label> 
<input type="email" name="email" class="form-control" required autocomplete="off" placeholder="โปรดระบุอีเมล"></div>
<div class="form-group"><label class="d-flex">
<div>หมายเลขโทรศัพท์</div></label>
<input type="text" name="phone" class="form-control" required placeholder="โปรดระบุหมายเลขโทรศัพท์ของท่าน"></div>
<div class="form-group"><label class="d-flex">
<div>ชื่อ-สกุล</div></label>
<input type="text" name="name" class="form-control" required placeholder="โปรดระบุชื่อของท่าน"></div>
<div class="form-group"><label>เรื่องร้องเรียน</label> 
<input type="text" name="subject" class="form-control" required autocomplete="off" placeholder="โปรดระบุชื่อเรื่องที่ร้องเรียน"></div>

<div class="form-group"><label>ข้อเท็จจริง</label> </div>
<textarea name="detail" class="form-control" placeholder="โปรดระบุรายละเอียดข้อเท็จจริง"></textarea>
<br>
<div class="form-group d-flex"><label class="checkbox"><input type="checkbox" name="confirmDetail" value="yes" required> <span class="check-mark"></span> ฉันได้ตรวจสอบข้อมูลแล้ว</label> 

<button type="submit" class="btn btn-primary ml-auto">ส่งเรื่องร้องเรียน</button></div></div>
</form>
<div class="card-footer"><a href="<?php 
print site_url('authen/login/form/regular'); ?>">เจ้าหน้าที่เข้าสู่ระบบ</a></div></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script><script src="/dist/admin4b.min.js"></script><script src="/docs/assets/js/docs.js"></script>
</body>