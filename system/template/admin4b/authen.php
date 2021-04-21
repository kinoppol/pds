<?php
$theme_URL = site_url("system/template/admin4b", true);
?>
<!doctype html><html lang="en"><head><meta charset="utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<meta name="theme-color" content="#2e8cc2">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<meta name="author" content="Marx JMoura"><meta name="copyright" content="LogiQ System">
<meta name="description" content="Sign in page allow users to access the application by providing their credentials.">
<title>ITA:กลุ่มงานวินัย</title><link rel="icon" href="/docs/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="./favicon.ico">
<link href="<?php
print $theme_URL;
?>/src/dist/admin4b.min.css" rel="stylesheet">
<?php
print $content;
?>
<?php
print $systemFoot;
?>
<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your ปลั๊กอินแชท code -->
      <div class="fb-customerchat"
        attribution="page_inbox"
        page_id="117869869613884">
      </div>
</html>
