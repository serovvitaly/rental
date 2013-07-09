@extends('base.layout')

@section('layout')

    <div class="row">
    
      <div class="span3 content-conteiner">
        <div class="filter-box">
        
          <div class="filter-group">
          
            <button class="btn" onclick="upd()">Обновить</button>
          
            <label><input type="checkbox"> автообновление списка</label>
          </div>
        
          <div class="filter-group">
            <h4 class="fg-header">Площадь</h4>
            <div class="fg-body">
              <div>общая:</div>
              <div class="slider range"></div>
              <div>жилая:</div>
              <div class="slider range"></div>
              <div>кухня:</div>
              <div class="slider range"></div>
            </div>
          </div>
          
          <div class="filter-group">
            <h4 class="fg-header">Строение</h4>
            <div class="fg-body">
              <div>этаж:</div>
              <div class="slider range"></div>
              <div>этажность дома:</div>
              <div class="slider range"></div>
              <div>материал строения:</div>
              <select style="width: 100%;">
                <option></option>
                <option>кирпич</option>
                <option>блок</option>
              </select>
            </div>
          </div>
          
          <div class="filter-group">
            <h4 class="fg-header">Расположение</h4>
            <div class="fg-body">
              <div>метро:</div>
              <select style="width: 100%;">
                <option></option>
                <option>Алтуфьево</option>
                <option>Бибирево</option>
              </select>
              <div>пешком до метро:</div>
              <div class="slider norange"></div>
            </div>
          </div>
          
          <div class="filter-group">
            <h4 class="fg-header">Дополнительно</h4>
            <div class="fg-body">
              <label><input type="checkbox"> лифт</label>
              <label><input type="checkbox"> телефон</label>
              <label><input type="checkbox"> стиральная машина</label>
              <label><input type="checkbox"> балкон</label>
              <label><input type="checkbox"> интернет</label>
              <label><input type="checkbox"> телевизор</label>
              <label><input type="checkbox"> с мебелью</label>
              <label><input type="checkbox"> без мебели</label>
            </div>
          </div>
          
        </div>
      </div>
      <div class="span9">
        <div class="row" id="result-container">
          
        </div>
      </div>
    
    </div>
    
    <script>
    
    function upd(){
        loadCollectionList()
    }
    
    function loadCollectionList(){
        $.ajax({
            url: '/list/get',
            type: 'POST',
            dataType: 'json',
            data: {},
            success: function(data){
                
                if (data.error && data.error.length > 0) {
                    
                    for (var i = 0; i < data.error.length; i++) {
                        $().toastmessage(data.error[i].type, data.error[i].message);
                    }
                    
                    return false;
                }
                
                if (data.success && data.result) {
                    if (data.result.length > 0) {
                        $('#result-container').html('<div id="collection-list"></div>');
                        for (var i = 0; i < data.result.length; i++) {
                            $('#collection-list').append( $('#tpl-collection-list-item').render(data.result[i]) );
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                var data = jqXHR.responseJSON.error;
                
                var text = data.type + '<br>' + data.message;
                
                $().toastmessage('showErrorToast', text);
                console.log(data);
            }
        });
    }
    
    $(document).ready(function(){
        $('.slider.range').slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
        });
        $('.slider.norange').slider({
            range: 'min',
            max: 500,
            values: [200],
        });
        
        loadCollectionList();
    });
    </script>
    
    @include('base.templates.collection')
  
@stop