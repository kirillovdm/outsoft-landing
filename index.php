<?php
$hidden_inputs = '';
$main_text = 'Do You Need Software Development?';

if ( $_GET ) {
    foreach ($_GET as $key => $value) {
        $hidden_inputs .= '<input type="hidden" name="' . $key . '" value="' . $value . '"/>';
    }
    $query = $_GET['lang'] ? $_GET['lang'] : '';

    if ( isset($_GET['keyword']) && !empty($_GET['keyword']) ) {
        $keyword = $_GET['keyword'];
    } elseif ( isset($_GET['utm_keyword']) && !empty($_GET['utm_keyword']) ) {
        $keyword = $_GET['utm_keyword'];
    } else $keyword = '';

    // $query = explode(' ', $query);
    // if ( count($query) > 1 ) {
    //   array_pop($query);
    // }
    // $query = implode(' ', $query);
    
    $main_text = 'Looking for ' . $query . '?';
}

?>

<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <title><? echo $query ? "Can't find " . $query . '?' : "Can't find developers?";?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="Outsoft - qualified <?=$query;?> from Ukraine">
    <!-- <meta name="keywords" content="<?=$query;?> developers, <?=$query;?> development, <?=$query;?> programmers"> -->

    <link rel="shortcut icon" href="http://outsoft.com/wp-content/uploads/2015/02/outsoft-icon.png">

    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
</head>

<body>
        <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NHDGJS"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NHDGJS');</script>
    <!-- End Google Tag Manager -->
<section class="section_1 clearfix">
    <div class="section_1__block-1" id="canvas-wrapper">
        <div id="vr-canvas"></div>
        <div class="section-content">
            <div class="section_1__logo"></div>
            <h1 class="section_1__block-1__caption"><?=$main_text;?></h1>
            <div class="section_1__block-1__line"></div>
            <p class="section_1__block-1__text">Reach your goals through the most simple, yet effective easy&#8209;to&#8209;use application, game or custom solution</p>
        </div>
    </div>

    <div class="section_1__block-2">
        <h2 class="section_1__block-2__caption">Talk To Our Technical Specialist</h2>
        <p class="section_1__block-2__text">and let us estimate your project cost and how quickly we can realise it</p>
        <div class="section_1__block-2__form">
          <form method="POST">
            <div class="section_1__block-2__form__filed-container">
              <input type="text" name="name" class="section_1__block-2__form__input" required="true">
              <label class="section_1__block-2__form__label">Name</label>
            </div>
            <div class="section_1__block-2__form__filed-container">
              <input type="text" name="phone" class="section_1__block-2__form__input" required="true">
              <label class="section_1__block-2__form__label">Phone / Skype</label>
            </div>
            <div class="section_1__block-2__form__filed-container">
              <input type="email" name="email" class="section_1__block-2__form__input" required="true">
              <label class="section_1__block-2__form__label">E-mail</label>
            </div>
            <div class="section_1__block-2__form__filed-container">
              <textarea name="about" class="section_1__block-2__form__input" rows="3"></textarea>
              <label class="section_1__block-2__form__label">Please write a couple of sentences about your project need (strategic goals, target markets, technologies etc.)</label>
            </div>
            <button class="section_1__block-2__form__button button--isi">request now</button>

            <input type="hidden" name="keyword" id="keyword" value="<?=$keyword;?>">
            <input type="hidden" name="zc_gad" value=""/>
            <input type="hidden" name="origin" value="http://lp.outsoft.com"/>
            <input type="hidden" name="the_source" value="<?php
                echo ( array_key_exists('HTTP_REFERER', $_SERVER ) ) ? $_SERVER['HTTP_REFERER'] : '';
            ?>" />
            <input type="hidden" name="the_req" value="<?php 
                echo ( array_key_exists('lang', $_GET ) ) ? $_GET['lang'] : '';
            ?>" />
            <?=$hidden_inputs?>

          </form>
        </div>
    </div>
</section>



<section class="section_2">
    <h2 class="section_2__caption">Platforms we develop for</h2>
    <div class="section_2__line"></div>
    <div class="section_2__icons-container">
      <div class="section_2__icon-block">
        <div class="section_2__icon-block__icon icon-1"></div>
        <p class="section_2__icon-block__text">Mobile</p>
      </div>
      <div class="section_2__icon-block">
        <div class="section_2__icon-block__icon icon-2"></div>
        <p class="section_2__icon-block__text">Desktop</p>
      </div>
      <div class="section_2__icon-block">
        <div class="section_2__icon-block__icon icon-3"></div>
        <p class="section_2__icon-block__text">Virtual<br>reality</p>
      </div>
      <div class="section_2__icon-block">
        <div class="section_2__icon-block__icon icon-4"></div>
        <p class="section_2__icon-block__text">Embedded<br>equipment</p>
      </div>
      <div class="section_2__icon-block">
        <div class="section_2__icon-block__icon icon-5"></div>
        <p class="section_2__icon-block__text">Web</p>
      </div>
    </div>
</section>

<section class="section_3 clearfix">
    <div class="section_3__right-container">
      <h2 class="section_3__caption">TO ENSURE SUCCESS, ONE SHOULD EMBRACE THE MOST UP-TO-DATE TECHNOLOGY</h2>
    </div>
    <div class="section_3__all-icons">
      <div class="icons_box">
        <div class="tech tech1" data-title="Swift" title="Swift">
          <div class="tech sub tech1_1" data-title="MongoDB" title="MongoDB"></div>
          <div class="tech sub tech1_2" data-title="MySQL" title="MySQL"></div>
          <div class="tech sub tech1_3" data-title="Oracle" title="Oracle"></div>
          <div class="tech sub tech1_4" data-title="SQL" title="SQL"></div>
        </div>
        <div class="tech tech2" data-title="JavaScript" title="JavaScript">
          <div class="tech sub tech2_1" data-title="JQuery" title="JQuery"></div>
          <div class="tech sub tech2_2" data-title="Angular.JS" title="Angular.JS"></div>
          <div class="tech sub tech2_3" data-title="React.JS" title="React.js"></div>
          <div class="tech sub tech2_5" data-title="Gulp" title="Gulp"></div>
        </div>
        <div class="tech tech3" data-title="WebGL" title="WebGL">
          <div class="tech sub tech3_1" data-title="ThreeJS" title="ThreeJS"></div>
          <div class="tech sub tech3_2" data-title="Canvas" title="Canvas"></div>
          <div class="tech sub tech3_3" data-title="Unity" title="Unity"></div>
          <div class="tech sub tech3_4" data-title="SVG" title="SVG"></div>
        </div>
        <div class="tech tech4" data-title="PHP" title="PHP">
          <div class="tech sub tech4_2" data-title="RubyOnRails" title="RubyOnRails"></div>
        </div>
        <div class="tech tech5" data-title="Magento" title="Magento"></div>
        <div class="tech tech6" data-title="WordPress" title="WordPress">
          <div class="tech sub tech6_1" data-title="Magento" title="Magento"></div>
        </div>
        <div class="tech tech7" data-title="Java" title="Java">
          <div class="tech sub tech7_2" data-title="C#" title="C#"></div>
          <div class="tech sub tech7_3" data-title="C+" title="C+"></div>
          <div class="tech sub tech7_4" data-title="Xamarin" title="Xamarin"></div>
        </div>
        <div class="tech tech8" data-title="HTML&CSS" title="HTML&CSS">
          <div class="tech sub tech8_1" data-title="Bootstrap" title="Bootstrap"></div>
          <div class="tech sub tech8_2" data-title="CSS3" title="CSS3"></div>
          <!-- <div class="tech sub tech8_3" data-title="SASS" title="SASS"></div>
          <div class="tech sub tech8_4" data-title="Stylus" title="Stylus"></div>
          <div class="tech sub tech8_5" data-title="Pug" title="Pug"></div>
          <div class="tech sub tech8_6" data-title="BEM" title="BEM"></div> -->
        </div>
        <div class="tech tech9" data-title="Python" title="Python">
          <div class="tech sub tech9_1" data-title="SVN" title="SVN"></div>
          <div class="tech sub tech9_2" data-title="CVS" title="CVS"></div>
          <div class="tech sub tech9_3" data-title="Git" title="Git"></div>
        </div>
        <div class="tech tech10" data-title="Node.JS" title="Node.JS"></div>
        <div class="tech tech_main" data-title="OutSoft" title="OutSoft"></div>
        <div class="tech_title_box">
            <div class="tech_title"></div>
        </div>
      </div>
    </div>
    <div class="section_3__center-block clearfix">
      <div class="section_3__center-block__text">
        and more than 250 API's such as
      </div>
      <div class="section_3__center-block__icons">
        <img src="img/api/map.png" alt="google map api">
        <img src="img/api/google_app.png" alt="google app api">
        <img src="img/api/amazon.png" alt="amazon api">
        <img src="img/api/instagram.png" alt="instagram api">
        <img src="img/api/facebook.png" alt="facebook api">
      </div>
      <a class="to_top section_3__button button--isi" href="#modal">GET IN TOUCH</a>
    </div>
</section>

<section class="section_4 clearfix">
  <div class="section_4__block-2">
    <div class="section_4__content">
      <h2 class="section_4__content__caption">OUR GOAL IS TO PRODUCE SOFTWARE PRODUCTS WHICH WILL IMPROVE YOUR BUSINESS</h2>
      <!-- <p class="section_4__content__text">The convergence of mobile, -->
        <!-- analytics, context-rich systems, and the cloud, together with an explosion of information, holds the promise to make companies of all sizes in every industry</p> -->
      <a class="to_top section_4__content__link button--isi" href="#modal">GET IN TOUCH</a>
    </div>
  </div>
  <div class="section_4__block-1">
      <div class="section_4__block-1__icons">
      <div class="section_4__icon-container">
        <div class="section_4__icon-container__icon-1"></div>
        <p class="section_4__icon-container__text">High Level of Expertise</p>
      </div>
      <div class="section_4__icon-container">
        <div class="section_4__icon-container__icon-2"></div>
        <p class="section_4__icon-container__text">Strict NDA</p>
      </div>
      <div class="section_4__icon-container">
        <div class="section_4__icon-container__icon-3"></div>
        <p class="section_4__icon-container__text">Affordable Prices</p>
      </div>
      <div class="section_4__icon-container">
        <div class="section_4__icon-container__icon-4"></div>
        <p class="section_4__icon-container__text">Most Talented Developers In Ukraine</p>
      </div>
    </div>
  </div>
</section>
<section class="section_5 clearfix">
    <div class="section_5__block-2">
        <div class="section_5__block-2__content">
            <p class="section_5__block-2__content__text">AREAS IN WHICH WE HAVE EXPERIENCE</p>
            <a class="to_top section_5__block-2__content__link button--isi" href="#modal">GET IN TOUCH</a>
        </div>
    </div>
  <div class="section_5__block-1">
    <div class="section_5__block-1__icons">
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-1"></div>
          <p class="section_5__icon-container__text">Healthcare</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-2"></div>
          <p class="section_5__icon-container__text">Gaming</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-3"></div>
          <p class="section_5__icon-container__text">Heavy/Light Industry</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-4"></div>
          <p class="section_5__icon-container__text">eCommerce</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-5"></div>
          <p class="section_5__icon-container__text">Education</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-6"></div>
          <p class="section_5__icon-container__text">Entertainment</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-7"></div>
          <p class="section_5__icon-container__text">Real Estate</p>
        </div>
        <div class="section_5__icon-container">
          <div class="section_5__icon-container__icon-8"></div>
          <p class="section_5__icon-container__text">Gambling</p>
        </div>
      </div>
    </div>
</section>

<!-- <section class="section_6">
    <div class="section_6__caption">The choice of our clients</div>
    <div class="section_6__line"></div>
      <div class="col-md-4">
        <div class="section_6__opinion-tooltip left">
          Lorem ipsum dolor sit amet,
          consectetur adipisicing elit, sed
          do eiusmod tempor incididunt
          ut labore et dolore magna aliqua
        </div>
        <div class="section_6__opinion-people"></div>
        <h3 class="section_6__opinion-name">Allen  Caldwell</h3>
        <h4 class="section_6__opinion-post">director</h4>
      </div>
      <div class="col-md-4">
        <div class="section_6__opinion-tooltip">
          Lorem ipsum dolor sit amet,
          consectetur adipisicing elit, sed
          do eiusmod tempor incididunt
          ut labore et dolore magna aliqua
        </div>
        <div class="section_6__opinion-people"></div>
        <h3 class="section_6__opinion-name">Allen  Caldwell</h3>
        <h4 class="section_6__opinion-post">director</h4>
      </div>
      <div class="col-md-4">
        <div class="section_6__opinion-tooltip right">
          Lorem ipsum dolor sit amet,
          consectetur adipisicing elit, sed
          do eiusmod tempor incididunt
          ut labore et dolore magna aliqua
        </div>
        <div class="section_6__opinion-people"></div>
        <h3 class="section_6__opinion-name">Allen  Caldwell</h3>
        <h4 class="section_6__opinion-post">director</h4>
      </div>
</section> -->

<section class="section_7">
  <div class="container section_7__container">
    <div class="bottom_block">
      <h2 class="section_1__block-2__caption">Talk To Our Technical Specialist</h2>
      <p class="section_1__block-2__text">and let us estimate your project cost and how quickly we can realise it</p>
      <div class="section_1__block-2__form">
        <form method="POST">
          <div class="section_1__block-2__form__filed-container">
            <input type="text" name="name" class="section_1__block-2__form__input" required="true">
            <label class="section_1__block-2__form__label">Name</label>
          </div>
          <div class="section_1__block-2__form__filed-container">
            <input type="text" name="phone" class="section_1__block-2__form__input" required="true">
            <label class="section_1__block-2__form__label">Phone / Skype</label>
          </div>
          <div class="section_1__block-2__form__filed-container">
            <input type="email" name="email" class="section_1__block-2__form__input" required="true">
            <label class="section_1__block-2__form__label">E-mail</label>
          </div>
          <div class="section_1__block-2__form__filed-container">
            <!-- <input type="text" name="about" class="section_1__block-2__form__input"> -->
            <textarea name="about" class="section_1__block-2__form__input" rows="3"></textarea>
            <label class="section_1__block-2__form__label">Please write a couple of sentences about your project need (strategic goals, target markets, technologies etc.)</label>
          </div>
          <button class="section_1__block-2__form__button button--isi">request now</button>

          <input type="hidden" name="keyword" id="keyword" value="<?=$keyword;?>">
          <input type="hidden" name="zc_gad" value=""/>
          <input type="hidden" name="origin" value="http://lp.outsoft.com"/>
          <input type="hidden" name="the_source" value="<?php
              echo ( array_key_exists('HTTP_REFERER', $_SERVER ) ) ? $_SERVER['HTTP_REFERER'] : '';
          ?>" />
          <input type="hidden" name="the_req" value="<?php 
              echo ( array_key_exists('lang', $_GET ) ) ? $_GET['lang'] : '';
          ?>" />
          <?=$hidden_inputs?>

        </form>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
    <div class="footer__logo"></div>
    <p class="footer__copyright">© 2016 All rights reserved</p>
</footer>

<div class="modal" id="modal">
  <div class="close"></div>
  <div class="modal_block">
    <div class="close">&times;</div>
    <h2 class="section_1__block-2__caption">Talk To Our Technical Specialist</h2>
    <p class="section_1__block-2__text">and let us estimate your project cost and how quickly we can realise it</p>
    <div class="section_1__block-2__form">
      <form method="POST">
        <div class="section_1__block-2__form__filed-container">
          <input type="text" name="name" class="section_1__block-2__form__input" required="true">
          <label class="section_1__block-2__form__label">Name</label>
        </div>
        <div class="section_1__block-2__form__filed-container">
          <input type="text" name="phone" class="section_1__block-2__form__input" required="true">
          <label class="section_1__block-2__form__label">Phone / Skype</label>
        </div>
        <div class="section_1__block-2__form__filed-container">
          <input type="email" name="email" class="section_1__block-2__form__input" required="true">
          <label class="section_1__block-2__form__label">E-mail</label>
        </div>
        <div class="section_1__block-2__form__filed-container">
          <!-- <input type="text" name="about" class="section_1__block-2__form__input"> -->
          <textarea name="about" class="section_1__block-2__form__input" rows="3"></textarea>
          <label class="section_1__block-2__form__label">Please write a couple of sentences about your project need (strategic goals, target markets, technologies etc.)</label>
        </div>
        <button class="section_1__block-2__form__button button--isi">request now</button>

        <input type="hidden" name="keyword" id="keyword" value="<?=$keyword;?>">
        <input type="hidden" name="zc_gad" value=""/>
        <input type="hidden" name="origin" value="http://lp.outsoft.com"/>
        <input type="hidden" name="the_source" value="<?php
            echo ( array_key_exists('HTTP_REFERER', $_SERVER ) ) ? $_SERVER['HTTP_REFERER'] : '';
        ?>" />
        <input type="hidden" name="the_req" value="<?php 
            echo ( array_key_exists('lang', $_GET ) ) ? $_GET['lang'] : '';
        ?>" />
        <?=$hidden_inputs?>

      </form>
    </div>
  </div>
</div>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39064135 = new Ya.Metrika({ id:39064135, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39064135" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/three.min.js"></script>
<script type="text/javascript" src="js/leanmodal.js"></script>
        <script type="text/javascript" src="js/dat.gui.min.js"></script>

        <script src="js/loaders/DDSLoader.js"></script>
        <script src="js/loaders/MTLLoader.js"></script>
        <script src="js/loaders/OBJLoader.js"></script>
        <script type="text/javascript" src="js/canvas.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</body>
</html>