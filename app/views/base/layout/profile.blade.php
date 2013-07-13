@extends('base.layout')

@section('layout')
<div class="container content-conteiner">

  <div class="row-fluid profile-title">
    <div class="span10 pft-title"><h4>Личный кабинет</h4></div>
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
      <!--button class="btn btn-primary" style="width: 100%;" onclick="showEditHousing()">Добавить объект</button-->
      <button class="button button-rounded button-flat-primary" style="width: 100%;" onclick="showEditAnnouncement()">Добавить объявление</button>
      
      <!--button href="#myModal" role="button" data-toggle="modal" class="button button-rounded button-flat-primary">Fade in &amp; Scale</button-->
      
      <div class="side-menu" id="pf-cmenu-1">
        <div class="sm-title"><i class="icon-home"></i> Объявления<i class="collapse"></i></div>
        <ul>
          <li><a href="/profile/announcement/list" data-title="Мои объявления" data-tpl="profile-announcements">Мои объявления</a> <span class="sm-notify">1</span></li>
          <li><a href="/profile/estate/list" data-title="Моя недвижимость" data-tpl="profile-estates">Моя недвижимость</a> <span class="sm-notify">1</span></li>
          <li><a href="#">Статистика просмотров</a> <span class="badge sm-notify">2</span></li>
          <li><a href="#">Заявки</a> <span class="badge badge-important sm-notify">1</span></li>
          <li><a href="/profile/estate/roughs" data-title="Черновики" data-tpl="profile-estates">Черновики</a> <span class="sm-notify" id="notify-rough"><?= Auth::user()->roughs() ?></span></li>
        </ul>
      </div>
      <div class="side-menu" id="pf-cmenu-2">
        <div class="sm-title"><i class="icon-envelope"></i> Сообщения<i class="collapse"></i></div>
        <ul>
          <li><a href="/profile/message/inbox" data-title="Входящие сообщения" data-tpl="profile-messages">Входящие</a> <span class="badge badge-info sm-notify">8</span></li>
          <li><a href="/profile/message/outbox" data-title="Исходящие сообщения" data-tpl="profile-messages">Исходящие</a></li>
          <li><a href="/profile/message/favorit" data-title="Избранные сообщения" data-tpl="profile-messages">Избранные</a></li>
          <li><a href="/profile/message/favorit" data-title="Корзина" data-tpl="profile-messages">Корзина</a></li>
          <li><a href="/profile/message/basket" data-title="Контакты" data-tpl="profile-mscontacts" style="font-weight: bold;">Контакты</a></li>
        </ul>
      </div>
      <div class="side-menu" id="pf-cmenu-3">
        <div class="sm-title"><i class="icon-user"></i> Профиль<i class="collapse"></i></div>
        <ul>
          <li><a href="/profile/message/inbox" data-title="Входящие сообщения" data-tpl="profile-messages">Редактировать</a></li>
          <li><a href="/profile/message/outbox" data-title="Исходящие сообщения" data-tpl="profile-messages">Подтвердить</a></li>
          <li><a href="/auth/logout" style="font-weight: bold;" onclick="window.location='/auth/logout'">Выход</a></li>
        </ul>
      </div>
      <div class="side-menu" id="pf-cmenu-4">
        <div class="sm-title"><i class="icon-leaf"></i> Поддержка<i class="collapse"></i></div>
        <ul>
          <li><a href="/profile/support/help" data-title="Справочник" data-tpl="profile-help">Справочник</a></li>
          <li><a href="/profile/support/feedback" data-title="Обратная связь" data-tpl="profile-feedback">Обратная связь</a></li>
        </ul>
      </div>
    </div>
    <div class="span9">
      <h4 id="profile-loader-title">Стартовая</h4>
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
      
      displayPage(
          'Новый объект', 
          'form-housing-edit', //'form-housing-edit',
          null, 
          null,
          function(){
              var _time = new Date().getTime();
              var _uid  = '<?= Auth::check() ? Auth::user()->id : 0 ?>' * 1;
              var _token = (_uid > 0) ? _uid + '' + _time : 0;
              $('#form-housing-edit input[name="_token"]').val(_token);
              
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
              
              $('#form-housing-edit form').ajaxForm({
                  dataType:  'json', 
                  beforeSubmit: function(formData, jqForm, options){
                      //
                  },
                  success: function(responseText, statusText, xhr, $form){
                      if (responseText.success === true) {
                          //
                          
                      }
                  }
              });
              
              this.onchange = function(field, value){
                  
                  $('#profile-loader-info').html('Сохранение');
                  
                  if (typeof field != 'string' || field.trim() == '') return; // TODO: Разобраться с проблемой наложения событий
                  
                  var data = {
                      _id:    $('#form-housing-edit input[name="_id"]').val(),
                      _token: $('#form-housing-edit input[name="_token"]').val(),
                  };
                  
                  data[field] = value;
                  
                  $.ajax({
                      url: '/profile/estate/save',
                      type: 'POST',
                      dataType: 'json',
                      data: data,
                      success: function(data){
                          $('#profile-loader-info').html('Изменения сохраненены');
                          setTimeout($('#profile-loader-info').html(''), 3000);
                      }
                  });
              }
              
              var self = this;
              
              $('#form-housing-edit :input').on('change', function(e){
                  setTimeout(self.onchange($(this).attr('name'), $(this).val()), 2000);
              }).on('keyup', function(e){
                  setTimeout(self.onchange($(this).attr('name'), $(this).val()), 2000);
              });
          }
      );    
  }
  
  
  function showEditAnnouncement(){ 
       
      displayPage(
          'Новое объявление', 
          'form-announcement-edit',
          null,
          null,
          function(){
              $('#form-announcement-edit .chosen').chosen({
                  //width: 
              });
              $('#form-announcement-edit form').ajaxForm({
                  dataType:  'json', 
                  beforeSubmit: function(formData, jqForm, options){
                      //
                  },
                  success: function(responseText, statusText, xhr, $form){
                      
                      return;
                      
                      if (responseText.success === true) {
                          displayPage(
                              'Исходящие сообщения',
                              'profile-msoutbox',
                              null,
                              '/profile/message/outbox'
                          );
                          return;
                      }
                      
                      alert('Не удалось отправить сообщение');
                  }
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
                  if (!data.result || data.result.length < 1) data.result = {};
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
          '/profile/message/contacts',
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
                              '/profile/message/outbox'
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
  
  
  $(document).ready(function(){
      //$.session.clear();
      var _pf_cmenu = $.session.get('pf.cmenu');
      if (!_pf_cmenu) _pf_cmenu = '';
      _pf_cmenu = _pf_cmenu.split(',');
      $('.side-menu').each(function(){
          if ($.inArray($(this).attr('id'), _pf_cmenu) >= 0) {
              $(this).find('ul').hide();
              $(this).find('i.collapse').addClass('colps');
          }
      });
      
      $('.side-menu i.collapse').click(function(){
          var parent = $(this).parents('.side-menu');
          parent.find('ul').toggle('blind', {duration:200});
          var _pf_cmenu = $.session.get('pf.cmenu');
          if (!_pf_cmenu) _pf_cmenu = '';
          _pf_cmenu = _pf_cmenu.split(','); 
          if ($(this).hasClass('colps')) {
              var _index = $.inArray(parent.attr('id'), _pf_cmenu);
              delete(_pf_cmenu[_index]);
              $(this).removeClass('colps');
          } else {
              _pf_cmenu.push(parent.attr('id'));
              $(this).addClass('colps');
          }
          $.session.set('pf.cmenu', _pf_cmenu.join(',').replace(/^,+|,+$/g, '').replace(/,+/g, ','));
      });
  });
  
  </script>

  
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
  </div>
  
  
  @include('base.templates.profile')

</div>
@stop