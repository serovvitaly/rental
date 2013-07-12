<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
  
  <script src="/vendor/jquery/jquery-1.10.1.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery-ui/themes/base/jquery-ui.css">
  <script src="/vendor/jquery-ui/ui/minified/jquery-ui.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery/toastmessage/resources/css/jquery.toastmessage.css">
  <script src="/vendor/jquery/toastmessage/jquery.toastmessage.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery/iCheck/skins/all.css">
  <script src="/vendor/jquery/iCheck/jquery.icheck.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery/selectBoxIt/src/stylesheets/jquery.selectBoxIt.css">
  <script src="/vendor/jquery/selectBoxIt/src/javascripts/jquery.selectBoxIt.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery/chosen/chosen.css">
  <script src="/vendor/jquery/chosen/chosen.jquery.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/jquery/Buttons/css/buttons.css">
  <!--link rel="stylesheet" type="text/css" href="/vendor/jquery/Buttons/css/font-awesome.min.css"-->
  <!--link rel="stylesheet" type="text/css" href="/vendor/jquery/Buttons/css/font-awesome-ie7.min.css"-->
  <script src="/vendor/jquery/Buttons/js/buttons.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/skins/base/css/styles.css">
  
</head>
<body>

  <div class="container">
  
    @include('base.component.topmenu')
  
    <div style="padding-top: 41px; height: 60px;">
      <?= Auth::check() ? 'Привет ' . Auth::user()->email . '! ... <a href="/profile">профиль</a> | <a href="/auth/logout">выход</a>' : '<a href="/auth">залогиньтесь</a>' ?>
    </div>
  
    
    @section('layout')
      <!-- layouts -->
    @show
    
  </div>
  <div class="md-overlay"></div>
  
  
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="/vendor/jquery/jsrender/jsrender.min.js"></script>
  <script src="/vendor/jquery/form/jquery.form.js"></script>
  
  <script src="/skins/base/js/main.js"></script>
  
</body>
</html>