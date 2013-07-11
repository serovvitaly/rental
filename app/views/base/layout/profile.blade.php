@extends('base.layout')

@section('layout')
<div class="container content-conteiner">

  <div class="row-fluid profile-title">
    <div class="span10 pft-title"><h4>{{$profile_title}}</h4></div>
    <div class="span2 pft-actions"></div>
  </div>
  
  <div class="row-fluid profile-header">
    <div class="span8 pfh-panel">
      <div class="pull-left">
        <img src="/skins/base/img/ava/440490666.jpg" class="img-polaroid" alt="">
      </div>
      
      <div class="profile-user-data">
        <h3 class="profile-name"><?= Auth::user()->full_name() ?></h3>
        <div class="profile-user-rating">
          <img src="/skins/base/img/stars.png" alt="">
        </div>
        <div class="profile-user-dates">
          <span><i class="icon-check" title="Дата регистрации"></i> 12 марта 2012</span>
          <span><i class="icon-eye-open" title="Последнее посещение"></i> 28 июня 2013</span>
        </div>
        <div class="profile-user-contacts">
          <span class="email"><a href="#"><?= Auth::user()->email ?></a></span>
          <span class="phone">+7 926 159 6632</span>
        </div>
        
      </div>
    </div>
    <div class="span4 pfh-panel">
      <div class="profile-company-address">
        <span class="">г. Москва</span>
        <span class="">ул. Гагарина - 25, оф. 148</span>
      </div>
      
      <a href="#">редактировать профиль</a>
    </div>
  </div>

  <div class="row-fluid profile-content">
    <div class="span3">
      <button class="btn btn-primary" style="width: 100%;" onclick="showEditHousing()">Добавить объект</button>
      <div class="side-menu">
        <ul>
          <li class="sm-title"><i class="icon-home"></i> Объявления</li>
          <li><a href="#">Список объектов</a> <span class="sm-notify">1</span></li>
          <li><a href="#">Просмотры</a> <span class="badge sm-notify">2</span></li>
          <li><a href="#">Заявки</a> <span class="badge badge-important sm-notify">1</span></li>
          <li><a href="#">Черновики</a> <span class="sm-notify">1</span></li>
        </ul>
      </div>
      <div class="side-menu">
        <ul>
          <li class="sm-title"><i class="icon-envelope"></i> Сообщения</li>
          <li><a href="/profile/msinbox" data-title="Входящие сообщения" data-tpl="profile-msinbox">Входящие</a> <span class="badge badge-info sm-notify">8</span></li>
          <li><a href="/profile/msoutbox" data-title="Исходящие сообщения" data-tpl="profile-msoutbox">Исходящие</a></li>
          <li><a href="/profile/msfavorit" data-title="Избранные сообщения" data-tpl="profile-msfavorit">Избранные</a></li>
          <li><a href="/profile/mscontacts" data-title="Контакты" data-tpl="profile-mscontacts" style="font-weight: bold;">Контакты</a></li>
        </ul>
      </div>
    </div>
    <div class="span9">
      <h4 id="profile-loader-title" class="hide"></h4>
      <span id="profile-loader-info"></span>
      <div id="profile-content-wrapper">
        {{$content}}
      </div>
    </div>
  </div>

  <div class="row-fluid profile-footer">
    
  </div>
  
  <script>
  function showEditHousing(){
  
      var data = {
          name: 'Спасибо товарищу Сталину за наше счастливое детство'
      }
      
      displayPage(
          'Добавление объекта', 
          'form-housing-edit',
          data, 
          null,
          function(){
              $('#form-housing-edit .slider3').slider({
                  min: 0,
                  max: 2,
                  values: [1]
              });
              $('#form-housing-edit .slider6').slider({
                  min: 1,
                  max: 6,
                  values: [1]
              });
              $('#form-housing-edit .type-chosen button').on('click', function(){
                  var dataType = $(this).attr('data-type');
                  $('#form-housing-edit .type-tabs .tab-item:visible').fadeOut(100, function(){
                      $('#form-housing-edit .type-tabs .tab-item[data-type="'+dataType+'"]').fadeIn();
                  });
              });
          }
      );    
  }
  
  function showTemplate(name, data, complete){
      $('#profile-content-wrapper .component').fadeOut(100, function(){
          $('#profile-content-wrapper').html($('#tpl-' + name).render(data));
          initCustom('#profile-content-wrapper');
          $('#profile-content-wrapper .component').fadeIn(100);
          if (complete) {
              complete();
          }
      });
  }
  
  
  function displayPage(title, tpl, data, url, complite){
      $('#profile-loader-info').empty();
      $('#profile-loader-title').removeClass('hide').addClass('load');      
      if (!data) data = {};
      
      if (!url) {
          showTemplate(tpl, data, complite);
          $('#profile-loader-title').html(title).removeClass('load');
          return;
      }
      
      $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
          success: function(data){
              if (data.success === true) {
                  if (!data.result || data.result.length < 1) data.result = [];
                  showTemplate(tpl, data.result, complite);
              }
              $('#profile-loader-title').html(title).removeClass('load');
          },
          error: function(jqXHR, textStatus, errorThrown ){
              $('#profile-loader-title').removeClass('load');
              $('#profile-loader-info').html('Не удалось загрузить данные, обратитесь к администратору.');
          }
      });
  }
  
  
  function newMessage(){      
      displayPage(
          'Новое сообщение', 
          'form-message-edit',
          null,
          '/profile/mscontacts',
          function(){
              $('#form-message-edit .chosen').chosen({
                  //width: 
              });
              $('#form-message-edit form').ajaxForm({
                  dataType:  'json', 
                  beforeSubmit: function(formData, jqForm, options){
                      //
                  },
                  success: function(responseText, statusText, xhr, $form){
                      if (responseText.success === true) {
                          displayPage(
                              'Исходящие сообщения',
                              'profile-msoutbox',
                              null,
                              '/profile/msoutbox'
                          );
                          return;
                      }
                      
                      alert('Не удалось отправить сообщение');
                  }
              });
          }
      );
  }
  
  
  $('.side-menu a').click(function(e){
      
      e.stopPropagation();
      
      displayPage(
          $(this).attr('data-title'), 
          $(this).attr('data-tpl'),
          null, 
          $(this).attr('href')
      );
      
      return false;
  });
  
  </script>


  @include('base.templates.profile')

</div>
@stop