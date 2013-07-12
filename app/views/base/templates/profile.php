  
<script id="tpl-form-housing-edit" type="text/x-jsrender">
<div id="form-housing-edit" class="component" style="display:none">
  <form action="" class="master">   
  <div class="tabbable restyle" style="margin-bottom: 18px;">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Основное</a></li>
        <li><a href="#tab2" data-toggle="tab">Дополнительно</a></li>
        <li><a href="#tab3" data-toggle="tab">Адрес и местоположение</a></li>
        <li><a href="#tab4" data-toggle="tab">Условия и требования</a></li>
        <li><a href="#tab5" data-toggle="tab">Фотогалерея</a></li>
      </ul>
      <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
        <div class="tab-pane active" id="tab1">
        
        <fieldset style="margin-bottom: 30px">
          
          <table><tbody>
            <tr>
              <th style="width: 100px; text-align:left">Что сдается</th>
              <td class="select-160" style="width: 200px;">
                <select style="width: 160px;">
                  <option>квартира</option>
                  <option>комната в квартире</option>
                  <option>дом</option>
                  <option>комната в доме</option>
                </select>
              </td>
              <td rowspan="2">
                  <input type="text" style="font-size: 40px;height: 40px;width: 200px; margin-right:5px; margin-bottom: 0;">
                  <select>
                    <option value="RUB">РУБ</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                  </select>
                  <p style="padding-left: 17px;color: #9E9E9E;">Введите корректную стоимость</p> 
              </td>
            </tr>
            <tr>
              <th style="text-align:left">Срок аренды</th>
              <td class="select-160">
                <select style="width: 160px;">
                  <option>на длительный срок</option>
                  <option>посуточно</option>
                </select>
              </td>
            </tr>
          </tbody></table>
          
        </fieldset>
        
        <fieldset style="margin-bottom: 20px">
          <textarea name="" placeholder="Краткое описание (не более 500 символов). На вкладке ``Условия и требования`` вы сможете внести более подробные данные." style="width: 656px; height: 86px;"></textarea>
        </fieldset>
        
        <fieldset style="margin-bottom: 20px">
          <legend>Характеристики объекта</legend>

          <table class="fields">
            <tr>
              <th>Площадь</th>
              <td>общая:</td>
              <td><input type="text" style="width: 70px;"> <span>м<sup>2</sup></span></td>
              <td>жилая:</td>
              <td><input type="text" style="width: 70px;"> <span>м<sup>2</sup></span></td>
              <td>кухня:</td>
              <td><input type="text" style="width: 70px;"> <span>м<sup>2</sup></span></td>
            </tr>
            <tr>
              <th>Площадь</th>
              <td>дома:</td>
              <td><input type="text" style="width: 70px;"> <span>м<sup>2</sup></span></td>
              <td>участка:</td>
              <td><input type="text" style="width: 70px;"> <span>м<sup>2</sup></span></td>
            </tr>
            <tr>
              <th>Этаж/этажность</th>
              <td>этаж:</td>
              <td><input type="text" style="width: 70px;"></td>
              <td>этажность:</td>
              <td><input type="text" style="width: 70px;"></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>Тип строения</th>
              <td></td>
              <td colspan="5">
                  <select name="building_type">
                    <option value=""></option>
                    <option value="блочный">Блочный</option>
                    <option value="панельный">Панельный</option>
                    <option value="монолит">Монолит</option>
                    <option value="таунхаус">Таунхаус</option>
                    <option value="сталинский">Сталинский</option>
                    <option value="кирпичный">Кирпичный</option>
                    <option value="кирпично-монолитный">Кирпично-монолитный</option>
                    <option value="элитный">Элитный</option>
                  </select>
              </td>
            </tr>
            <tr>
              <th>Жилых комнат</th>
              <td></td>
              <td colspan="5">
                  <div class="ui-sommer">
                    <div class="uis-head">
                      <span>1</span>
                      <span>2</span>
                      <span>3</span>
                      <span>4</span>
                      <span>5</span>
                      <span>>5</span>
                    </div>
                    <div class="slider6 uis-slider"></div>
                </div>
              </td>
            </tr>
          </table>
        </fieldset>
         
                  
         <div class="type-tabs">

           <div data-type="home" class="tab-item" style="display:none">

              <div class="control-group">
                <label class="control-label">Расстояние до города, км.</label>
                <div class="controls">
                  <select style="width: 200px;">
                    <option value=""></option>
                    <option value="5786">в черте города</option>
                    <option value="5787">0-4</option>
                    <option value="5788">5-9</option>
                    <option value="5789">10-14</option>
                    <option value="5790">15-19</option>
                    <option value="5791">20-24</option>
                    <option value="5792">25-29</option>
                    <option value="5793">30-39</option>
                    <option value="5794">40-49</option>
                    <option value="5795">50-59</option>
                    <option value="5796">60-79</option>
                    <option value="5797">80-99</option>
                    <option value="5798">&gt; 100</option>
                  </select>                  
                </div>
              </div>
              
           </div>
         </div>
          
        </div>
        <div class="tab-pane" id="tab2">

        <fieldset style="margin-bottom: 20px">
          <legend>Разрешено</legend>
          <div class="row-fluid">
            <div class="span4 ui-sommer">
                <div class="uis-head">
                  <span class="uish-left red active">Нет</span>
                  <span class="uish-center">С детьми</span>
                  <span class="uish-right green">Да</span>
                </div>
                <div class="slider3 uis-slider"></div>
            </div>
            <div class="span4 ui-sommer">
                <div class="uis-head">
                  <span class="uish-left red">Нет</span>
                  <span class="uish-center">C животными</span>
                  <span class="uish-right green active">Да</span>
                </div>
                <div class="slider3 uis-slider"></div>
            </div>
            <div class="span4 ui-sommer">
                <div class="uis-head">
                  <span class="uish-left red active">Нет</span>
                  <span class="uish-center">Курение</span>
                  <span class="uish-right green">Да</span>
                </div>
                <div class="slider3 uis-slider"></div>
            </div>
          </div>    
        </fieldset> 
        
        <fieldset style="margin-bottom: 20px">
          <legend>Опции</legend>
           <div class="row-fluid">
             <ul class="span4 list">
               <li><input type="checkbox" name=""><label> Телефон</label></li>     
               <li><input type="checkbox" name=""><label> Мебель</label></li>     
               <li><input type="checkbox" name=""><label> Балкон</label></li>     
               <li><input type="checkbox" name=""><label> Лифт</label></li>     
               <li><input type="checkbox" name=""><label> Мусоропровод</label></li>
             </ul>
             <ul class="span4 list">
               <li><input type="checkbox" name=""><label> Парковка</label></li>     
               <li><input type="checkbox" name=""><label> Лоджия</label></li>     
               <li><input type="checkbox" name=""><label> Кондиционер</label></li>     
               <li><input type="checkbox" name=""><label> Холодильник</label></li>     
               <li><input type="checkbox" name=""><label> Телевизор</label></li>
             </ul>
             <ul class="span4 list">
               <li><input type="checkbox" name=""><label> Стиральная машина</label></li>     
               <li><input type="checkbox" name=""><label> Интернет</label></li>     
               <li><input type="checkbox" name=""><label> Домофон</label></li>     
               <li><input type="checkbox" name=""><label> Бытовые приборы</label></li>     
               <li><input type="checkbox" name=""><label> Охрана</label></li>
             </ul>
           </div>
        </fieldset>
        
        </div>
        <div class="tab-pane" id="tab3">
          
          <fildset>
           <legend>Адрес</legend>
           <p>Только в г.Москва</p>
              <div class="control-group">
                <label class="control-label">Улица</label>
                <div class="controls">
                  <input type="text" style="width: 300px;">               
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Дом / корпус (строение)</label>
                <div class="controls">
                  <input type="text" style="width: 70px;"> / <input type="text" style="width: 70px;">                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Ближайшая станция метро</label>
                <div class="controls">
                  <select name="" title="Выберите станцию метро" style="display: block;">
                    <option value="0"></option>
                    <option value="1">Авиамоторная</option>
                  </select>
                  </div>
              </div>
         </fildset>
          
        </div>
        
        <div class="tab-pane" id="tab4">

        <fieldset style="margin-bottom: 20px">
          <p>Здесь вы можете описать условия проживания и требования к съемщику(кам).</p>
          <textarea name="" placeholder="" style="width: 656px; height: 384px;"></textarea>
        </fieldset>
        
        </div>
        
        <div class="tab-pane" id="tab5">
          <p>What up girl, this is Section 3.</p>
        </div>
        
      </div>
  </div>
  
         
         <button class="btn btn-small">Сохранить</button>
         <button class="btn btn-small">Отмена</button>
         
       </form>
     </div>
  </script>
  
  
<script id="tpl-profile-messages" type="text/x-jsrender">
<div id="form-profile-msinbox" class="component" style="display:none">
  <div style="margin-bottom: 10px">
    <div class="pagination pagination-small" style="float:right; margin: 0">
      <span style="vertical-align: top;line-height: 28px;padding-right: 10px;">{{:total}}</span>
      <ul>
        <li><a href="#"><i class="icon-chevron-left"></i></a></li>
        <li><a href="#"><i class="icon-chevron-right"></i></a></li>
      </ul>
    </div>
    <button class="btn btn-small" onclick="newMessage()">Написать сообщение</button>
  </div>

  <table class="table table-condensed table-hover table-striped">
      <colgroup>
        <col width="30" />
        <col width="30" />
        <col width="220" />
        <col />
        <col width="140" style="text-align:right" />
      </colgroup>
      <tbody>
      {{if rows.length > 0}}
        {{for rows}}
        <tr>
          <td></td>
          <td><img alt="" src="/skins/base/img/star-lit4.png"></td>
          <td>{{:names}}</td>
          <td>{{:title}}</td>
          <td>{{:created.date}}</td>
        </tr>
        {{/for}}
      {{else}}
        <tr>
          <td colspan="5" style="text-align:center">Список пуст</td>
        </tr>
      {{/if}}
      </tbody>
  </table>
  
</div>
</script>
  
<script id="tpl-profile-mscontacts" type="text/x-jsrender">
<div id="form-profile-mscontacts" class="component" style="display:none">

  <table class="table table-condensed table-hover table-striped">
      <colgroup>
        <col width="30" />
        <col />
        <col width="220" />
      </colgroup>
      <tbody>
      {{if rows.length > 0}}
        {{for rows}}
        <tr>
          <td>v</td>
          <td>{{:name}}</td>
          <td><a href="#">написать сообщение</a> | <a href="#">подробнее</a></td>
        </tr>
        {{/for}}
      {{else}}
        <td colspan="3" style="text-align:center">Список пуст</td>
      {{/if}}
      </tbody>
  </table>

</div>
</script> 
  
<script id="tpl-form-message-edit" type="text/x-jsrender">
<div id="form-message-edit" class="component" style="display:none">

  <div>
    <form action="/profile/message/send" method="POST">
      <select class="chosen" name="to[]" multiple="multiple" style="width:670px" data-placeholder="Получатель">
      {{for rows}}
        <option value="{{:id}}">{{if name != ''}}{{:name}}{{else}}{{:id}}{{/if}}</option>
      {{/for}}
      </select>
      <input type="text" style="width:656px" name="title" placeholder="Тема сообщения">
      <textarea style="width:656px; height: 260px" name="content"></textarea>
      <div>
        <button class="button button-flat-primary button-small"><i class="icon-cloud"></i> Отправить сообщение</button>
        <button class="button button-flat button-small">Отмена</button>
      </div>
    </form>

  </div>

</div>
</script>