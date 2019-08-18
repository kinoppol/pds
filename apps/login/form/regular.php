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
</head><body><div class="page-sign sign-in"><div class="container-sign"><div class="card"><div class="card-header"><img src="<?php
print site_url('images/lgs.png',true);
?>">
<h1>ยินดีต้อนรับ</h1>
<span>กรุณาลงชื่อเข้าใช้</span></div>
<form action="<?php print site_url('authen/login/check/login'); ?>" method="post">
<div class="card-body"><div class="form-group"><label>E-mail/Username</label> 
<input type="text" name="username" class="form-control"></div><div class="form-group"><label class="d-flex">
<div>Password</div><a href="#" class="ml-auto">ลืมรหัสผ่าน?</a></label>
<input type="password" name="password" class="form-control"></div>
<div class="form-group d-flex"><label class="checkbox"><input type="checkbox" name="remember" value="yes"> <span class="check-mark"></span> จดจำฉันไว้</label> 
<button type="submit" class="btn btn-primary ml-auto">ลงชื่อเข้าใช้</button></div></div>
</form>
<div class="card-footer"><p class="text-muted">ยังไม่ลงทะเบียน?</p><a href="<?php 
print site_url('authen/login/form/school'); ?>">ลงทะเบียนเพื่อใช้งานระบบ</a></div></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script><script src="/dist/admin4b.min.js"></script><script src="/docs/assets/js/docs.js"></script>
</body>