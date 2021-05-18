<?php
  include_once("config.php");
  if(!$_SESSION['email']){
    header("Location: login.php");
    exit();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>æˆ‘çš„åº”ç”¨</title>
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="stylesheet" href="./stylesheets/index.css">
    <link rel="stylesheet" href="./stylesheets/flaticon.css" />
    <link rel='stylesheet' href='./stylesheets/style.css' />
  </head>
  <body>

    <nav id="menu">
      <div>
        <div class="img-div">
          <div class="user-img"><img src="./uploads/a.jpeg"></div>
          <span class="user-name">
            <?php
              dbconnection();
              $sql = "select username from users where email='".mysql_real_escape_string($_SESSION['email'])."'";
              $res = mysql_query($sql);
              echo mysql_fetch_array($res)[0];
            ?>
          </span>
        </div>
      </div>
    </nav>

    <main id="panel">
      <header>
        <header class="pass-header">
          <span class="pass-header-title">CTF</span>
          <div id="back-menu">
            <div class="glyph-icon flaticon-back">
            </div>
          </div>
          <div id="userinfo-wraps">
            <div class="glyph-icon flaticon-settings-1">
            </div>
          </div>
      </header>
      <img style="max-width:100%;max-height::100%;overflow:hidden;" src="images/674407.jpg" alt="">
      </header>
    </main>
    <script src="./javascripts/slideout/slideout.min.js"></script>
    <script>
      var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
      });

      document.querySelector('#back-menu').addEventListener('click', function() {
        slideout.toggle();
      });
    </script>

  </body>
</html>