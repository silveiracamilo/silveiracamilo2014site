<!DOCTYPE html>
<html>
<head>
  <title>SILVEIRACAMILO - Desenvolvedor (Programador) Web e Mobile</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="/images/favicon.ico" />

  <meta http-equiv="content-language" content="pt-br" />
  <meta name="description" content="Camilo da Silveira - Desenvolvedor web interativo e CMS" />
  <meta name="keywords" content="silveiracamilo, site, flash, actionscript, php, objective-c, android, javascript, mysql, sqlite" />
  <meta name="geo.country" content="br" />
  <meta name="url" content="silveiracamilo.com.br" />
  <meta name="author" content="Camilo da Silveira" />  

  <link href="/front/app/css/site.css" rel="stylesheet" type="text/css">
  <link href="/front/app/css/animate.css" rel="stylesheet" type="text/css">
  <link href="/front/app/css/animations.css" rel="stylesheet" type="text/css">
  <link href="/front/app/css/fractal-clock.css" rel="stylesheet" type="text/css">

  <script src="/front/app/js/libs/initLoader.js"></script>
</head>
<body ng-app="silveiracamilo">
<span class="ajax-loading {{loadingStatus}}"></span>
<div id="loader">
  <span id="bar"></span>
</div>
<div id="root">
  <div id="title">
    <h1>SILVEIRACAMILO</h1>
    <h2>@</h2>
    <h3>gmail.com</h3>
  </div>
  <div id="header" class="animated fadeInDown delay07">
    <div id="header_content">
      <div id="menu">
        <ul>
          <li><a href="#/trabalhos" class="animated fadeInDown delay18">Jobs</a></li>
          <li class="separator_menu animated fadeInDown delay19">°</li>
          <li><a href="#/sobre" class="animated fadeInDown delay20">Sobre</a></li>
          <li class="separator_menu animated fadeInDown delay21">°</li>
          <li><a href="/blog" class="animated fadeInDown delay22">Blog</a></li>
        </ul>
      </div>
    </div>
  </div> 

  <!--<div id="header" class="animated fadeInDown delay07">
    <div id="header_content">
      <div id="logo" class="animated zoomIn delay1">
        <a href="#/"><img src="/front/app/images/logo_silveiracamilo.jpg" alt="silveiracamilo.com.br" title="silveiracamilo.com.br"/></a>
      </div>
      <div id="menu">
        <ul>
          <li><a href="#/" class="animated fadeInDown delay16">Home</a></li>
          <li class="separator_menu animated fadeInDown delay17">*</li>
          <li><a href="#/trabalhos" class="animated fadeInDown delay18">Trabalhos</a></li>
          <li class="separator_menu animated fadeInDown delay19">*</li>
          <li><a href="#/sobre" class="animated fadeInDown delay20">Sobre</a></li>
          <li class="separator_menu animated fadeInDown delay21">*</li>
          <li><a href="#/contato" class="animated fadeInDown delay24">Contato</a></li>          
          <li class="separator_menu animated fadeInDown delay23">*</li>
          <li><a href="/blog" class="animated fadeInDown delay22">Blog</a></li>
        </ul>
      </div>         
    </div>
  </div>-->   

  <div class="view-animate-container">
    <div ng-view class="view-animate"></div>
  </div>

  <!--<div ng-view></div>-->
       
  <div id="footer">
    <div id="footer_content">
      <div id="location">
        <h4>localização</h4>
        <p>São Paulo - Brasil</p>
        <p>email: silveiracamilo@gmail.com</p>
        <p>gtalk: silveiracamilo@gmail.com</p>
      </div>
      <div id="na_rede">
        <h4>na rede</h4>
        <p>
          <a href="http://www.linkedin.com/pub/camilo-silveira/26/412/40a" target="_blank" class="link_comum">
          <img src="/front/app/images/icon_linkedin_na_rede.jpg"/>linkedIn</a>
        </p>
        <p>
          <a href="http://www.twitter.com/silveiracamilo" target="_blank" class="link_comum">
          <img src="/front/app/images/icon_twitter_na_rede.jpg"/>twitter</a>
        </p>
      </div>
    </div>  
    <div id="direitos">Copyright <?php echo date("Y"); ?> silveiracamilo.com.br</div>
  </div>

  <!--<div ng-controller="FractalClockController">
    <canvas id="sketch" processing="sketch"></canvas>
  </div>-->
</div>

<script src="/front/app/js/app.js"></script>
</body>
</html>