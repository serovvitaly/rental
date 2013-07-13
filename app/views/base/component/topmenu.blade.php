<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="/">Ночёвка</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="/list">Список</a>
              </li>
              <li class="">
                <a href="./getting-started.html">Get started</a>
              </li>
              <li class="">
                <a href="./scaffolding.html">Scaffolding</a>
              </li>
            </ul>
            
            <ul class="nav pull-right">
              <li class="divider-vertical"></li>
              <? if ( Auth::check() ) { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= Auth::user()->full_name() ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Избранное</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="/profile">Личный кабинет</a></li>
                  <li class="divider"></li>
                  <li><a href="/auth/logout">Выход</a></li>
                </ul>
              </li>
              <? } else { ?>
              <li>
                <div style="background: #F7F7F7; padding: 2px;margin-top: 5px;border-radius: 3px;">
                  <button style="margin: 0;" class="btn btn-danger btn-small" onclick="window.location='/auth'" title="Вы сможете добавлять свои объекты и управлять ими.">Регистрация для владельцев</button>
                  <button style="margin: 0;" class="btn btn-success btn-small" onclick="window.location='/auth'" title="Вы сможете только снимать объекты.">Регистрация</button>
                  <button style="margin: 0;" class="btn btn-small" onclick="window.location='/auth'">Вход</button>
                </div>
              </li>
              <? } ?>
            </ul>
            
          </div>
        </div>
      </div>
    </div>