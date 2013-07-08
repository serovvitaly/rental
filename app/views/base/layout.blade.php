<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/skins/base/css/styles.css">
  <title></title>
  
  <script src="/vendor/jquery/jquery-1.10.1.min.js"></script>
  
</head>
<body>

  <div class="container">
  
    @include('base.component.topmenu')
  
    <div style="padding-top: 41px; height: 60px;">
      <?= Auth::user()->email ?>
    </div>
  
    <div class="container content-conteiner">
    @section('layout')
      <!-- layouts -->
    @show
    </div>
  </div>

  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="/vendor/jquery/jsrender/jsrender.min.js"></script>
  <script src="/vendor/jquery/form/jquery.form.js"></script>
  
  <script src="/skins/base/js/main.js"></script>
</body>
</html>