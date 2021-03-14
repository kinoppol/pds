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
</body>