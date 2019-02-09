<?php require_once '_Resources/Libs/Inc.Require.php'; ?>
<?php require_once '_Resources/Template/Header.php'; ?>

<?php
  $Json_Version_Gladys_Data = file_get_contents("https://developer.gladysproject.com/api/gladys/version?name");
  $Json_Version_Gladys = json_decode($Json_Version_Gladys_Data);
?>

<div id="cl-wrapper" class="fixed-menu">
<div class="cl-sidebar">
<div class="cl-toggle"><i class="fa fa-bars"></i></div>
<div class="cl-navblock">
<div class="menu-space">
<div class="content">
<ul class="cl-vnavigation">
  <li id="Dashboard" class="show"><a href="javascript:ShowOnlyOne('Dashboard');"><i class="fa fa-home fa-3x"></i><span>Dashboard</span></a></li>
  <li id="Entree" class="show"><a href="javascript:ShowOnlyOne('Entree');"><i class="fa fa-square fa-3x"></i><span>Entrée</span></a></li>
  <li id="Salon" class="show"><a href="javascript:ShowOnlyOne('Salon');"><i class="fa fa-television fa-3x"></i><span>Salon</span></a></li>
  <li id="Cuisine" class="show"><a href="javascript:ShowOnlyOne('Cuisine');"><i class="fa fa-cutlery fa-3x"></i><span>Cuisine</span></a></li>
  <li id="Couloir" class="show"><a href="javascript:ShowOnlyOne('Couloir');"><i class="fa fa-road fa-3x"></i><span>Couloir</span></a></li>
  <li id="ChambreEnfant" class="show"><a href="javascript:ShowOnlyOne('ChambreEnfant'); ShowOnly"><i class="fa fa-bed fa-3x"></i><span>Chambre Enfant</span></a></li>
  <li id="ChambreParental" class="show"><a href="javascript:ShowOnlyOne('ChambreParental'); ShowOnlyOn"><i class="fa fa-bed fa-3x"></i><span>Chambre Parental</span></a></li>
  <li id="SalleDeBain" class="show"><a href="javascript:ShowOnlyOne('SalleDeBain');"><i class="fa fa-shower fa-3x"></i><span>Salle De Bain</span></a></li>
  <li id="Toilette" class="show"><a href="javascript:ShowOnlyOne('Toilette');"><i class="fa fa-shower fa-3x"></i><span>Toilette</span></a></li>
  <li id="Chaudiere" class="show"><a href="javascript:ShowOnlyOne('Chaudiere');"><i class="fa fa-fire fa-3x"></i><span>Chaudière</span></a></li>
  <li id="Settings" class="show"><a href="javascript:ShowOnlyOne('Settings');"><i class="fa fa-cogs fa-3x"></i><span>Settings</span></a></li>
  <li id="Monitorings" class="show"><a href="javascript:ShowOnlyOne('Monitorings');"><i class="fa fa-line-chart fa-3x"></i><span>Monitorings</span></a></li>
  <li id="Logs" class="show"><a href="javascript:ShowOnlyOne('Logs');"><i class="fa fa-commenting fa-3x"></i><span>Logs</span></a></li>
  <div class="side-user">
    <p>Number Of Cores : <b style="color: lime"><?php echo $SSH->exec('nproc --all'); ?></b></p>
    <p>CPU Speed : <b style="color: lime"><?php echo (round($SSH->exec('sudo cat /sys/devices/system/cpu/cpu0/cpufreq/cpuinfo_cur_freq')) / 1000); ?></b><b> MHz</b></p>
    <?php
      $Governor = ($SSH->exec('cat /sys/devices/system/cpu/cpu*/cpufreq/scaling_governor'));
      if ($Governor = "ondemande") {
        echo '<p>Scaling Governor :<b style="color: lime"> ' .$Governor. ' </b></p>';
      } else if ($Governor = "powersave") {
        echo '<p>Scaling Governor :<b style="color: blue"> ' .$Governor. ' </b></p>';
      } else {
        echo '<p>Scaling Governor :<b style="color: red"> ' .$Governor. ' </b></p>';
      }
    ?>
    <?php
      $Temp = (substr($SSH->exec('vcgencmd measure_temp | sed "s/temp=//"'), 0, -5));

      if(substr($Temp, 0, -5) < 50 ) {
        echo '<p>Temperature CPU :<b style="color: lime"> ' .$Temp. ' </b>°C</p>';
      } else {
        echo '<p>Temperature CPU :<b style="color: red"> ' .$Temp. ' </b>°C</p>';
      }
    ?>
    <p>IP Server : <b style="color: lime"><?php echo $SSH->exec('wget -q -O - https://ipv4.icanhazip.com/ | tail'); ?></b></p>
    <p>IP Dashboard : <b style="color: lime"><?php echo $SSH->exec('wget -q -O - https://ipv4.icanhazip.com/ | tail'); ?></b></p>
    <p>Version Gladys : <b style="color: lime"><?php echo $Json_Version_Gladys->name; ?></b></p>
    <p>Version Debian : <b style="color: lime"><?php echo $SSH->exec("uname -r"); ?></b></p>
    <p>Debian CodeName : <b style="color: lime"><?php echo $SSH->exec("lsb_release --codename | cut -f2"); ?></b></p>
    <p>Architecture : <b style="color: lime"><?php echo $SSH->exec('uname -m'); ?></b></p>
    <p>Hardaware : <b style="color: lime"><?php echo $SSH->exec("(cat /proc/cpuinfo | awk '/^Hardware/{print $3}')"); ?></b></p>
  </div>
</ul>
</div>
</div>
</div>
</div>

<div id="Dashboard" class="newboxes" style="display: block;">
<div class="page-head">
  <h2>Dashboard</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Settings Gladys</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Reboot</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Shutdown</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Update</button>
        </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Settings NodeJS</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Reboot</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Shutdown</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Update</button>
        </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Settings NGINX</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Reboot</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Shutdown</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Update</button>
        </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Settings PHP</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Reboot</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Shutdown</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Update</button>
        </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Settings Raspberry</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Reboot</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Shutdown</button>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">Update</button>
        </div>
        </div>
      </div>
    </div>

</div>
</div>
</div> 

<div id="Entree" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Entrée</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <form>
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Entree"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Entree"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Entree"></span><span> lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Television</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tv fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Freebox Player</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tasks fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Freebox Server</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tasks fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>
</div>    
</div>
</div> 

<div id="Salon" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Salon</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Salon"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Salon"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Salon"></span><span> lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Aquarium</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-plug fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Music</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-music fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <div class="btn-group-center">
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pause"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-stop"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i></button>
            <input class="form-control bslider" data-slider-value="25" data-slider-step="1" data-slider-max="25" data-slider-min="0" value="">
          </div>
        </div>
      </div>
    </div>
</div>
</div >
</div> 

<div id="Cuisine" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Cuisine</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Cuisine"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Cuisine"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Cuisine"></span><span> lux</span></p>
        </div>
      </div>
    </div>

   <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Refrigerateur</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Refregirateur_Cuisine"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Congelateur</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Congelateur_Cuisine"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Music</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-music fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pause"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-stop"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i></button>
          </div>
        </div>
      </div>
    </div>
</div>
</div >
</div> 

<div id="Couloir" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Couloir</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Couloir"></span><span>  °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Couloir"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Couloir"></span><span> lux</span></p>
        </div>
      </div>
    </div>
</div>
</div>
</div>  

<div id="ChambreEnfant" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Chambre Enfant</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Chambre_Enfants"></span><span>  °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Chambre_Enfants"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Chambre_Enfants"></span><span> lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Television</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tv fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Freebox Player</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tasks fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Music</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-music fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pause"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-stop"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i></button>
          </div>
        </div>
      </div>
    </div>
 </div>
</div>
</div>

<div id="ChambreParental" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Chambre Parental</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Chambre_Parental"></span><span>  °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Chambre_Parental"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Chambre_Parental"></span><span> lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Ordinateur</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tv fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Nas</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tasks fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
            <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Music</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-music fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pause"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-stop"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>    
 </div>
</div>

<div  id="SalleDeBain" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Salle De Bain</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Salle_De_Bain"></span><span> °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Salle_De_Bain"></span><span> %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Salle_De_Bain"></span><span> lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Seche Linge</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-tasks fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Music</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-music fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pause"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-stop"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i></button>
            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i></button>
          </div>
        </div>
      </div>
    </div>
 </div>
</div>
</div >

<div id="Toilette" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Toilette</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Lumiere</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-lightbulb-o fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <button type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Toilette"></span><span>  °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Humiditer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Humiditer : <span style="color: lime;" id="Humiditer_Toilette"></span><span>  %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Luminositer</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Luminositer : <span style="color: lime;" id="Luminositer_Toilette"></span><span>  lux</span></p>
        </div>
      </div>
    </div>

 </div>
</div>
</div>

<div id="Chaudiere" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Chaudière</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Chauffage_Chaudiere"></span><span>  °C</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Eau_Chaude_Chaudiere"></span><span>  %</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Temperature</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-thermometer-half fa-3x"></span>
        </div>
        <br>
        <div class="content text-center">
          <p class="visible-sm visible-md visible-lg visible-xs">Temperature : <span style="color: lime;" id="Temperature_Eau_Froide_Chaudiere"></span><span>  lux</span></p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : </p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : </p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="Monitorings" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Monitorings</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Line Chart</h3>
        </div>
        <div class="content">
          
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Full-Width Chart</h3>
        </div>
        <div class="content">
    
        </div>
      </div>
    </div>      
  </div>

  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Line Chart</h3>
        </div>
        <div class="content">
          
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Full-Width Chart</h3>
        </div>
        <div class="content">
    
        </div>
      </div>
    </div>      
  </div>

  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : </p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>
  </div>
 
</div>
</div>

<div id="Logs" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Logs</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Logs</h3>
        </div>
        <div class="content">
          <div class="framemail">
          <div class="window">
            <ul class="mail">
              <li>
                <i class="read"></i>
                <img class="avatar" src="/_Resources/Assets/Images/update.png" alt="avatar">
                <p class="sender">Upadte</p>
                <p class="message"><strong>B3t4Byt3</strong> - ID : Mis A Jours 1.0.2 - 2 Minutes </p>
                <div class="actions">
                    <a><img src="/_Resources/Assets/Images/trash.png" alt="delete"></a>
                </div>
              </li>
              <li>
                <i class="read"></i>
                <img class="avatar" src="/_Resources/Assets/Images/Warning.png" alt="avatar">
                <p class="sender">Error</p>
                <p class="message"><strong>SSH2</strong> - ID : 54851524 - 1 Heure</p>
                <div class="actions">
                    <a><img src="/_Resources/Assets/Images/trash.png" alt="delete"></a>
                </div>
              </li>
              <li>
                <i class="read"></i>
                <img class="avatar" src="/_Resources/Assets/Images/update.png" alt="avatar">
                <p class="sender">Upadte</p>
                <p class="message"><strong>B3t4Byt3</strong> - ID : Mis A Jours 1.0.3 - 8 Days Ago.</p>
                <div class="actions">
                    <a><img src="/_Resources/Assets/Images/trash.png" alt="delete"></a>
                </div>
              </li>
              <li>
                <i class="read"></i>
                <img class="avatar fa fa-desktop fa-3x" src="/_Resources/Assets/Images/update.png">
                <p class="sender">Upadte</p>
                <p class="message"><strong>B3t4Byt3</strong> - ID : Mis A Jours 1.0.0 - 10 Days Ago.</p>
                <div class="actions">
                    <a><img src="/_Resources/Assets/Images/trash.png" alt="delete"></a>
                </div>
              </li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="Settings" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Settings</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : </p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : </p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-2">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Live Chart</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-desktop fa-3x"></span>
        </div>
        <br>
        <div class="text">
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Hostname : raspberry</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Distribution : Debian GNU/Linux 7.0</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Kernel : Linux 3.6.11+ arm6l</p>
          <p class="hidden-lg hidden-md hidden-sm hidden-lg">Frimware : #434 PREEMTP BST 2017</p>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Reboot Gladys</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
          <?php echo $SSH->exec('hostname -s'); ?>
              <br>HOOST NAME => 
          <?php echo $SSH->exec('date'); ?>
              <br>DATE => 
          <?php echo $SSH->exec('lsb_release -ds'); ?>
              <br>IPv4 => 
        <?php echo $SSH->exec('wget -q -O - https://ipv4.icanhazip.com/ | tail'); ?>
              <br>IPv6 => 
          <?php echo $SSH->exec('wget -q -O - https://ipv6.icanhazip.com/ | tail'); ?>
             <br>VERSION LINUX => 
          <?php echo $SSH->exec('uname -or'); ?>
            <br>UPTIME => 
          <?php echo $SSH->exec('uptime'); ?>
            <br>NOMBRE DE PROCESSUS => 
          <?php echo $SSH->exec('ps ax | wc -l | tr -d " "'); ?>
            <br>GPU TEMP =>
          <?php echo $SSH->exec('(/opt/vc/bin/vcgencmd measure_temp)'); ?>
            <br>CPU TEMP => 
          <?php echo $SSH->exec('vcgencmd measure_temp'); ?>
            <br>000000000 => 
          <?php echo $SSH->exec("cat /proc/cpuinfo | grep 'model name' | head -1 | cut -d':' -f2"); ?>
            <br>DEBIAN VERSION => 
          <?php echo $SSH->exec("uname -r"); ?>
            <br>DEBIAN CODENAME => 
          <?php echo $SSH->exec("lsb_release --codename | cut -f2"); ?>
            <br>ARCHITECTURE => 
          <?php echo $SSH->exec('uname -m'); ?>
            <br>INFO PROCESSEUR => 
          <?php echo $SSH->exec('lscpu'); ?>
            <br>NOMBRE DE COEUR => 
          <?php echo $SSH->exec('nproc --all'); ?>
            <br>Hardware => 
          <?php echo $SSH->exec("(cat /proc/cpuinfo | awk '/^Hardware/{print $3}')"); ?>
            <br>Revision => 
          <?php echo $SSH->exec("(cat /proc/cpuinfo | awk '/^Revision/{print $3}')"); ?>
            <br>Serial => 
          <?php echo $SSH->exec("(cat /proc/cpuinfo | awk '/^Serial/{print $3}')"); ?>
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<div id="Manage_API" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Manage API</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Reboot Gladys</h3>
        </div>
        <div class="text">
        <div class="content text-center">
          <?php
            echo '<pre>';
            echo Debug_AFF();
            echo '</pre>';
          ?>
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<div id="Debug" class="newboxes" style="display: none;">
<div class="page-head">
  <h2>Debug</h2>
  <ol class="breadcrumb"></ol>
</div>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="block-flat">
        <div class="header">
          <h3 class="visible-sm visible-md visible-lg visible-xs">Debug</h3>
        </div>
        <div class="content text-center">
          <span aria-hidden="true" class="fa fa-refresh fa-3x"></span>
        </div>
        <br>
        <div class="text">
        <div class="content text-center">
          <iframe id="iframe" src="/My_Dashboard" frameborder="0" height="912px" width="100%"></iframe>
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

</div>
</div>

<?php require_once '_Resources/Template/Footer.php'; ?>