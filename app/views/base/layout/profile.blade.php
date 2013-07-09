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
        <h3 class="profile-name">Елена Иванова</h3>
        <div class="profile-user-rating">
          <img src="/skins/base/img/stars.png" alt="">
        </div>
        <div class="profile-user-dates">
          <span><i class="icon-check" title="Дата регистрации"></i> 12 марта 2012</span>
          <span><i class="icon-eye-open" title="Последнее посещение"></i> 28 июня 2013</span>
        </div>
        <div class="profile-user-contacts">
          <span class="email"><a href="#">elena.foo@mail.ru</a></span>
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
      <button class="btn btn-primary" style="width: 100%;" onclick="showEditHousing()">Добавить жилье</button>
    </div>
    <div class="span9" id="profile-content-wrapper">
      {{$content}}
    </div>
  </div>

  <div class="row-fluid profile-footer">
    
  </div>
  
  <script>
  function showEditHousing(){
  
      var data = {
          name: 'Спасибо товарищу Сталину за наше счастливое детство'
      }
        
      showTemplate('form-housing-edit', data, function(){
          $('#form-housing-edit .type-chosen button').on('click', function(){
              var dataType = $(this).attr('data-type');
              $('#form-housing-edit .type-tabs .tab-item:visible').fadeOut(100, function(){
                  $('#form-housing-edit .type-tabs .tab-item[data-type="'+dataType+'"]').fadeIn();
              });
          });
      });     
  }
  
  function showTemplate(name, data, complete){
      $('#profile-content-wrapper .component').fadeOut(100, function(){
          $('#profile-content-wrapper').html(
              $('#tpl-' + name).render(data)
          );
          $('#profile-content-wrapper .component').fadeIn(100);
          if (complete) {
              complete();
          }
      });
  }
  </script>


  @include('base.templates.profile')

</div>
@stop