@extends('base.layout')

@section('layout')

  <div id="auth-container" class="row-fluid" style="background: #3185C7; border-radius: 3px; margin: 2px; width: auto; color: #FFF; padding: 20px 30px;">
    <div class="span6">
      <h4>Авторизация</h4>
      <div style="height: 30px;"></div> 
      <form class="bs-docs-example form-horizontal" method="POST" action="/auth/authorisation">
        <div class="control-group">
          <label class="control-label" style="width: 50px;">Email</label>
          <div class="controls" style="margin-left: 70px;">
            <input type="text" name="email" placeholder="email">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" style="width: 50px;">Пароль</label>
          <div class="controls" style="margin-left: 70px;">
            <input type="password" name="password" placeholder="пароль">
          </div>
        </div>
        <div class="control-group">
          <div class="controls" style="margin-left: 70px;">
            <label class="checkbox">
              <input type="checkbox"> - запомнить меня
            </label>
            <button type="submit" class="btn">Авторизация</button>
          </div>
        </div>
      </form>
      
    </div>
    <div class="span6">
      <h4>Регистрания</h4>
      <div style="height: 30px;"></div>
      <form class="bs-docs-example form-horizontal" method="POST" action="/auth/registration">
        <div class="control-group">
          <label class="control-label" style="width: 50px;">Email</label>
          <div class="controls" style="margin-left: 70px;">
            <input type="text" name="email" placeholder="email">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" style="width: 50px;">Пароль</label>
          <div class="controls" style="margin-left: 70px;">
            <input type="password" name="password" placeholder="пароль">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" style="width: 50px;">Повторить пароль</label>
          <div class="controls" style="margin-left: 70px;">
            <input type="password" name="password_confirmation" placeholder="пароль">
          </div>
        </div>
        <div class="control-group">
          <div class="controls" style="margin-left: 70px;">
            <label class="checkbox">
              <input type="checkbox"> - запомнить меня
            </label>
            <button type="submit" class="btn">Авторизация</button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
  
  <script>
  $(document).ready(function(){
      $('#auth-container form').ajaxForm({
          //
      });
  });    
  </script>
  
@stop