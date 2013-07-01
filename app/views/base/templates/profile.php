  
  <script id="tpl-form-housing-edit" type="text/x-jsrender">
     <div id="form-housing-edit" class="component" style="display:none">
       <form action="">
         <div class="">
            <input type="text" name="" placeholder="Наименование" style="width: 97%;">
         </div>
         <div class="">
            <textarea name="" placeholder="Краткое описание" style="width: 62%; height: 86px;"></textarea>
         </div>
         
         <div class="type-chosen">
           <div class="splitter"></div>
           <div class="btn-group" data-toggle="buttons-radio" style="margin: 0 auto; width: 438px; display: block">
              <button type="button" data-type="flat" class="btn active">Квартира или комната в квартире</button>
              <button type="button" data-type="home" class="btn btn-info">Дом или комната в доме</button>
           </div>
         </div>
         
         <div class="type-tabs">
           <div data-type="flat" class="tab-item">
              <div class="control-group">
                <label class="control-label">Что сдается</label>
                <div class="controls">
                  <label><input name="foo2" type="radio" checked="checked"> - квартира</label>
                  <label><input name="foo2" type="radio"> - комната в квартире</label>               
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Комнат в квартире</label>
                <div class="controls">
                  <select style="width: 70px;">
                    <option value="1">1</option>                 
                    <option value="2">2</option>                 
                    <option value="3">3</option>                 
                    <option value="4">4</option>                 
                    <option value="5">5</option>                 
                    <option value="6">&gt; 5</option>                 
                  </select>                  
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Этаж / этажность</label>
                <div class="controls">
                  <input type="text" style="width: 70px;"> / <input type="text" style="width: 70px;">                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Срок аренды</label>
                <div class="controls">
                  <label><input name="foo" type="radio" checked="checked"> - на длительный срок</label>
                  <label><input name="foo" type="radio"> - посуточно</label>               
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Площадь квартиры</label>
                <div class="controls">
                  <input type="text" style="width: 70px;"> <span>м<sup>2</sup></span>               
                </div>
              </div>
           </div>
           <div data-type="home" class="tab-item" style="display:none">
              <div class="control-group">
                <label class="control-label">Что сдается</label>
                <div class="controls">
                  <label><input name="foo2" type="radio" checked="checked"> - дом</label>
                  <label><input name="foo2" type="radio"> - комната в доме</label>               
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Срок аренды</label>
                <div class="controls">
                  <label><input name="foo" type="radio" checked="checked"> - на длительный срок</label>
                  <label><input name="foo" type="radio"> - посуточно</label>               
                </div>
              </div>
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
              <div class="control-group">
                <label class="control-label">Площадь дома</label>
                <div class="controls">
                  <input type="text" style="width: 70px;"> <span>м<sup>2</sup></span>               
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Площадь участка</label>
                <div class="controls">
                  <input type="text" style="width: 70px;"> <span>соток</span>               
                </div>
              </div>
              
           </div>
         </div>
         
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
                  <select class="form-input-select" id="fld_metro_id" name="metro_id" title="Выберите станцию метро" style="display: block;">
                    <option value="0"></option>
                    <option value="1">Авиамоторная</option>
                    <option value="2">Автозаводская</option>
                    <option value="3">Академическая</option>
                    <option value="4">Александровский сад</option>
                    <option value="151">Алексеевская</option>
                    <option value="2135">Алма-Атинская</option>
                    <option value="5">Алтуфьево</option>
                    <option value="148">Аннино</option>
                    <option value="6">Арбатская</option>
                    <option value="7">Аэропорт</option>
                    <option value="8">Бабушкинская</option>
                    <option value="9">Багратионовская</option>
                    <option value="10">Баррикадная</option>
                    <option value="11">Бауманская</option>
                    <option value="12">Беговая</option>
                    <option value="13">Белорусская</option>
                    <option value="14">Беляево</option>
                    <option value="15">Бибирево</option>
                    <option value="16">Библиотека им. Ленина</option>
                    <option value="215">Борисово</option>
                    <option value="18">Боровицкая</option>
                    <option value="19">Ботанический сад</option>
                    <option value="20">Братиславская</option>
                    <option value="1010">Бульвар адмирала Ушакова</option>
                    <option value="149">Бульвар Дмитрия Донского</option>
                    <option value="1012">Бунинская аллея</option>
                    <option value="22">Варшавская</option>
                    <option value="21">ВДНХ</option>
                    <option value="23">Владыкино</option>
                    <option value="24">Водный стадион</option>
                    <option value="25">Войковская</option>
                    <option value="26">Волгоградский проспект</option>
                    <option value="27">Волжская</option>
                    <option value="1003">Волоколамская</option>
                    <option value="28">Воробьевы Горы</option>
                    <option value="152">Выставочная</option>
                    <option value="29">Выхино</option>
                    <option value="30">Динамо</option>
                    <option value="31">Дмитровская</option>
                    <option value="32">Добрынинская</option>
                    <option value="33">Домодедовская</option>
                    <option value="2001">Достоевская</option>
                    <option value="34">Дубровка</option>
                    <option value="217">Зябликово</option>
                    <option value="35">Измайловская</option>
                    <option value="37">Калужская</option>
                    <option value="38">Кантемировская</option>
                    <option value="39">Каховская</option>
                    <option value="40">Каширская</option>
                    <option value="41">Киевская</option>
                    <option value="42">Китай-город</option>
                    <option value="43">Кожуховская</option>
                    <option value="44">Коломенская</option>
                    <option value="45">Комсомольская</option>
                    <option value="46">Коньково</option>
                    <option value="47">Красногвардейская</option>
                    <option value="48">Краснопресненская</option>
                    <option value="49">Красносельская</option>
                    <option value="50">Красные ворота</option>
                    <option value="51">Крестьянская застава</option>
                    <option value="52">Кропоткинская</option>
                    <option value="53">Крылатское</option>
                    <option value="54">Кузнецкий мост</option>
                    <option value="55">Кузьминки</option>
                    <option value="56">Кунцевская</option>
                    <option value="57">Курская</option>
                    <option value="58">Кутузовская</option>
                    <option value="59">Ленинский проспект</option>
                    <option value="60">Лубянка</option>
                    <option value="61">Люблино</option>
                    <option value="62">Марксистская</option>
                    <option value="2002">Марьина Роща</option>
                    <option value="63">Марьино</option>
                    <option value="64">Маяковская</option>
                    <option value="65">Медведково</option>
                    <option value="1004">Международная</option>
                    <option value="66">Менделеевская</option>
                    <option value="1001">Митино</option>
                    <option value="67">Молодежная</option>
                    <option value="1002">Мякинино</option>
                    <option value="68">Нагатинская</option>
                    <option value="69">Нагорная</option>
                    <option value="70">Нахимовский проспект</option>
                    <option value="71">Новогиреево</option>
                    <option value="2133">Новокосино</option>
                    <option value="72">Новокузнецкая</option>
                    <option value="73">Новослободская</option>
                    <option value="17">Новоясеневская</option>
                    <option value="74">Новые Черемушки</option>
                    <option value="75">Октябрьская</option>
                    <option value="76">Октябрьское поле</option>
                    <option value="77">Орехово</option>
                    <option value="78">Отрадное</option>
                    <option value="79">Охотный ряд</option>
                    <option value="80">Павелецкая</option>
                    <option value="82">Парк культуры</option>
                    <option value="81">Парк Победы</option>
                    <option value="36">Партизанская</option>
                    <option value="83">Первомайская</option>
                    <option value="84">Перово</option>
                    <option value="85">Петровско-Разумовская</option>
                    <option value="86">Печатники</option>
                    <option value="87">Пионерская</option>
                    <option value="88">Планерная</option>
                    <option value="89">Площадь Ильича</option>
                    <option value="90">Площадь революции</option>
                    <option value="91">Полежаевская</option>
                    <option value="92">Полянка</option>
                    <option value="93">Пражская</option>
                    <option value="94">Преображенская площадь</option>
                    <option value="95">Пролетарская</option>
                    <option value="96">Проспект Вернадского</option>
                    <option value="97">Проспект Мира</option>
                    <option value="98">Профсоюзная</option>
                    <option value="99">Пушкинская</option>
                    <option value="2136">Пятницкое шоссе</option>
                    <option value="100">Речной вокзал</option>
                    <option value="101">Рижская</option>
                    <option value="102">Римская</option>
                    <option value="103">Рязанский проспект</option>
                    <option value="104">Савеловская</option>
                    <option value="105">Свиблово</option>
                    <option value="106">Севастопольская</option>
                    <option value="107">Семеновская</option>
                    <option value="108">Серпуховская</option>
                    <option value="1005">Славянский бульвар</option>
                    <option value="109">Смоленская</option>
                    <option value="110">Сокол</option><option value="111">Сокольники</option><option value="112">Спортивная</option><option value="1007">Сретенский бульвар</option><option value="214">Строгино</option><option value="113">Студенческая</option><option value="114">Сухаревская</option><option value="115">Сходненская</option><option value="116">Таганская</option><option value="117">Тверская</option><option value="118">Театральная</option><option value="119">Текстильщики</option><option value="120">Теплый стан</option><option value="121">Тимирязевская</option><option value="122">Третьяковская</option><option value="1006">Трубная</option><option value="123">Тульская</option><option value="124">Тургеневская</option>
                    <option value="125">Тушинская</option>
                    <option value="126">Улица 1905 года</option><option value="128">Улица академика Янгеля</option><option value="1011">Улица Горчакова</option><option value="127">Улица Подбельского</option><option value="1009">Улица Скобелевская</option><option value="1008">Улица Старокачаловская</option><option value="129">Университет</option><option value="130">Филевский парк</option><option value="131">Фили</option><option value="132">Фрунзенская</option><option value="133">Царицыно</option><option value="134">Цветной бульвар</option><option value="135">Черкизовская</option><option value="136">Чертановская</option><option value="137">Чеховская</option><option value="138">Чистые пруды</option><option value="139">Чкаловская</option><option value="140">Шаболовская</option><option value="216">Шипиловская</option><option value="141">Шоссе Энтузиастов</option><option value="142">Щелковская</option><option value="143">Щукинская</option><option value="144">Электрозаводская</option><option value="145">Юго-Западная</option><option value="146">Южная</option><option value="147">Ясенево</option></select>                
                </div>
              </div>
         </fildset>
         
         <button class="btn">Сохранить</button>
         <button class="btn">Отмена</button>
         
       </form>
     </div>
  </script>