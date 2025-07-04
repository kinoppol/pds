<?php
$data=array(
  'email'=>sQ($_POST['email']),
  'name'=>sQ($_POST['name']),
  'phone'=>sQ($_POST['phone']),
  'subject'=>sQ($_POST['subject']),
  'detail'=>sQ($_POST['detail']),
  'petition_type'=>sQ($_POST['petition_type']),
  'petition_time'=>sQ(date('Y-m-d H:i:s'))
);
  $result=sInsertTb($systemDb,'petition',$data);
?>
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
<h1>ร้องเรียน/ร้องทุกข์</h1>
<span>ระบบได้บันทึกร้องร้องเรียน/ร้องทุกข์เรียบร้อยแล้ว</span>
<img src="images/right.png"></div>
<div class="card-footer"><a href="<?php 
print site_url('authen/login/form/regular'); ?>">เจ้าหน้าที่เข้าสู่ระบบ</a></div></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script><script src="/dist/admin4b.min.js"></script><script src="/docs/assets/js/docs.js"></script>
</body>
</body>