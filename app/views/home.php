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
  <div id="header">
    <div id="header_content">
      <div id="logo">
        <a href="#/"><img src="/front/app/images/logo_silveiracamilo.jpg" alt="silveiracamilo.com.br" title="silveiracamilo.com.br"/></a>
      </div>
      <div id="menu">
        <ul>
          <li><a href="#/">Home</a></li>
          <li class="separator_menu">*</li>
          <li><a href="#/trabalhos">Trabalhos</a></li>
          <li class="separator_menu">*</li>
          <li><a href="#/sobre">Sobre</a></li>
          <li class="separator_menu">*</li>
          <li><a href="#/servicos">Serviços</a></li>
          <li class="separator_menu">*</li>
          <li><a href="#/contato">Contato</a></li>
        </ul>
      </div>          
    </div>
  </div>  

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

  <div ng-controller="FractalClockController">
    <canvas id="sketch" processing="sketch"></canvas>
  </div>
</div>

<script src="/front/app/js/app.js"></script>
</body>
</html>