<?php 
  if($Auth->Is_Login()) {
  } else {
    header('location: /Show_Error?Titre=Privilege Required&Message=You have not privilege required to access this page.&Redirection=/');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="Copyright" content="<?php echo $Config['Site_Name']; ?> © <?php echo $Config['Date']; ?> By <?php echo $Config['Developer']; ?>">
    <meta name="Generator" content="Sublime Text 3">
    <meta name="Description" content="<?php echo $Config['Description']; ?>">
    <meta name="Keywords" content="<?php echo $Config['Keywords']; ?>">
    <meta name="Indentifier-URL" content="<?php echo $Config['URL']; ?>">
    <meta name="robots" content="index, nofollow">
    <meta name="Author" LANG="en" content="<?php echo $Config['Developer']; ?>">
    <meta name="Publisher" content="<?php echo $Config['Developer']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/_Resources/Assets/Images/favicon.ico" rel="shortcut icon">
    <link href="/_Resources/Assets/Images/Apple/152x152.png" rel="apple-touch-icon-precomposed" sizes="152x152">
    <link href="/_Resources/Assets/Images/Apple/144x144.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="/_Resources/Assets/Images/Apple/120x120.png" rel="apple-touch-icon-precomposed" sizes="120x120">
    <link href="/_Resources/Assets/Images/Apple/114x114.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="/_Resources/Assets/Images/Apple/76x76.png" rel="apple-touch-icon-precomposed" sizes="76x76">
    <link href="/_Resources/Assets/Images/Apple/72x72.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="/_Resources/Assets/Images/Apple/57x57.png" rel="apple-touch-icon-precomposed" sizes="57x57">

    <title><?php echo $Config['Site_Name_Maj']; ?></title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="/_Resources/Assets/Js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="/_Resources/Assets/Js/jquery.gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet">

    <!-- IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9] >
      <script src="_Resources/Assets/Js/html5shiv.js"></script>
      <script src="_Resources/Assets/Js/respond.min.js"></script>
    <![endif]-->

    <link href="/_Resources/Assets/Js/jquery.nanoscroller/nanoscroller.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/jquery.easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/bootstrap.switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/jquery.select2/select2.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/bootstrap.slider/css/slider.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/jquery.magnific-popup/dist/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/bootstrap.wysihtml5/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/bootstrap.summernote/dist/summernote.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/dropzone/css/dropzone.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Js/jquery.timeline/css/component.css" rel="stylesheet" type="text/css">

    <link href="/_Resources/Assets/Css/main.css" rel="stylesheet">
    <link href="/_Resources/Assets/Css/font-style.css" rel="stylesheet">

    <link href="/_Resources/Assets/Css/pygments.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Css/style.css" rel="stylesheet" type="text/css">
    <link href="/_Resources/Assets/Css/nprogress.css" rel="stylesheet" type="text/css">

    <script src="/_Resources/Assets/Js/jquery-2.0.js"></script>
    <script src="/_Resources/Assets/Js/nprogress.js"></script>

    <script>
      var nice = false;

      $(document).ready(function() {
        nice = $('html').niceScroll();
        Update_Module();
        ShowOnlyOne('Dashboard');
      });
     
      var obj = window;
        console.log(obj.length);
        console.log('selector' in obj);
    </script>

    <script>
      function ShowOnlyOne(thechosenone) {
        var newboxes = document.getElementsByTagName("div");
        var vnavigation = document.getElementsByTagName("ul");

          for(var x=0; x<newboxes.length; x++) {
            name = newboxes[x].getAttribute("class");
            if (name == "newboxes") {
              if (newboxes[x].id == thechosenone) {
                newboxes[x].style.display = "block";
              } else {
                newboxes[x].style.display = "none";
            }
          }
        }

          for(var x=0; x<vnavigation.length; x++) {
            name = vnavigation[x].getAttribute("class");
            if (name == "vnavigation") {
              if (vnavigation[x].id == thechosenone) {
                vnavigation[x].style.display = "block";
              } else {
                vnavigation[x].style.display = "none";
            }
          }
        }

        var show = document.getElementsByTagName("li");
          for(var xx=0; xx<show.length; xx++) {
            name2 = show[xx].getAttribute("class");
            if (name2 == "show") {
              if (show[xx].id == thechosenone) {
                $("Dashboard").removeClass("show active").addClass("show");
                $("Entree").removeClass("show active").addClass("show");
                $("Salon").removeClass("show active").addClass("show");
                $("Cuisine").removeClass("show active").addClass("show");
                $("Couloir").removeClass("show active").addClass("show");
                $("ChambreEnfant").removeClass("show active").addClass("show");
                $("ChambreParental").removeClass("show active").addClass("show");
                $("SalleDeBain").removeClass("show active").addClass("show");
                $("Toilette").removeClass("show active").addClass("show");
                $("Chaudiere").removeClass("show active").addClass("show");
                $("Settings").removeClass("show active").addClass("show");
                $("Monitorings").removeClass("show active").addClass("show");
                $("Logs").removeClass("show active").addClass("show");
                $(show[xx]).addClass("show active");
              } 
            } else {
                $("Dashboard").removeClass("show active").addClass("show");
                $("Entree").removeClass("show active").addClass("show");
                $("Salon").removeClass("show active").addClass("show");
                $("Cuisine").removeClass("show active").addClass("show");
                $("Couloir").removeClass("show active").addClass("show");
                $("ChambreEnfant").removeClass("show active").addClass("show");
                $("ChambreParental").removeClass("show active").addClass("show");
                $("SalleDeBain").removeClass("show active").addClass("show");
                $("Toilette").removeClass("show active").addClass("show");
                $("Chaudiere").removeClass("show active").addClass("show");
                $("Settings").removeClass("show active").addClass("show");
                $("Monitorings").removeClass("show active").addClass("show");
                $("Logs").removeClass("show active").addClass("show");
                $(show[xx]).removeClass("show active").addClass("show");
            }
        }
      }
    </script>

    <script>
      function Update_Module() {

        Capteur_Temperature_Entree();
        Capteur_Humiditer_Entree();
        Capteur_Luminositer_Entree();

        Capteur_Temperature_Salon();
        Capteur_Humiditer_Salon();
        Capteur_Luminositer_Salon();

        Capteur_Temperature_Cuisine();
        Capteur_Humiditer_Cuisine();
        Capteur_Luminositer_Cuisine();
        Capteur_Temperature_Refregirateur_Cuisine();
        Capteur_Temperature_Congelateur_Cuisine();

        Capteur_Temperature_Couloir();
        Capteur_Humiditer_Couloir();
        Capteur_Luminositer_Couloir();

        Capteur_Temperature_Chambre_Enfants();
        Capteur_Humiditer_Chambre_Enfants();
        Capteur_Luminositer_Chambre_Enfants();

        Capteur_Temperature_Chambre_Parental();
        Capteur_Humiditer_Chambre_Parental();
        Capteur_Luminositer_Chambre_Parental();

        Capteur_Temperature_Salle_De_Bain();
        Capteur_Humiditer_Salle_De_Bain();
        Capteur_Luminositer_Salle_De_Bain();

        Capteur_Temperature_Toilette();
        Capteur_Humiditer_Toilette();
        Capteur_Luminositer_Toilette();

        Capteur_Temperature_Chauffage_Chaudiere();
        Capteur_Temperature_Eau_Chaude_Chaudiere();
        Capteur_Temperature_Eau_Froide_Chaudiere();

        function Capteur_Temperature_Entree() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Entree').html(data[0].value);
            }); 
        }

        function Capteur_Humiditer_Entree() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Entree').html(data[1].value);
            }); 
        }

        function Capteur_Luminositer_Entree() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Entree').html(data[3].value);
            }); 
        }

        function Capteur_Temperature_Salon() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Salon').html(data[4].value);
            }); 
        }

        function Capteur_Humiditer_Salon() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Salon').html(data[5].value);
            }); 
        }

        function Capteur_Luminositer_Salon() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Salon').html(data[6].value);
            }); 
        }

        function Capteur_Temperature_Cuisine() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Cuisine').html(data[7].value);
            }); 
        }

        function Capteur_Humiditer_Cuisine() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Cuisine').html(data[8].value);
            }); 
        }

        function Capteur_Luminositer_Cuisine() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Cuisine').html(data[6].value);
            }); 
        }

        function Capteur_Temperature_Refregirateur_Cuisine() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Refregirateur_Cuisine').html(data[8].value);
            }); 
        }

        function Capteur_Temperature_Congelateur_Cuisine() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Congelateur_Cuisine').html(data[8].value);
            }); 
        }

        function Capteur_Temperature_Couloir() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Couloir').html(data[9].value);
            }); 
        }

        function Capteur_Humiditer_Couloir() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Couloir').html(data[10].value);
            }); 
        }

        function Capteur_Luminositer_Couloir() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Couloir').html(data[11].value);
            }); 
        }

        function Capteur_Temperature_Chambre_Enfants() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Chambre_Enfants').html(data[12].value);
            }); 
        }

        function Capteur_Humiditer_Chambre_Enfants() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Chambre_Enfants').html(data[13].value);
            }); 
        }

        function Capteur_Luminositer_Chambre_Enfants() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Chambre_Enfants').html(data[14].value);
            }); 
        }

        function Capteur_Temperature_Chambre_Parental() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Chambre_Parental').html(data[15].value);
            }); 
        }

        function Capteur_Humiditer_Chambre_Parental() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Chambre_Parental').html(data[16].value);
            }); 
        }

        function Capteur_Luminositer_Chambre_Parental() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Chambre_Parental').html(data[17].value);
            }); 
        }

        function Capteur_Temperature_Salle_De_Bain() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Salle_De_Bain').html(data[18].value);
            }); 
        }

        function Capteur_Humiditer_Salle_De_Bain() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Salle_De_Bain').html(data[19].value);
            }); 
        }

        function Capteur_Luminositer_Salle_De_Bain() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Salle_De_Bain').html(data[20].value);
            }); 
        }

        function Capteur_Temperature_Toilette() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Toilette').html(data[21].value);
            }); 
        }

        function Capteur_Humiditer_Toilette() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Humiditer_Toilette').html(data[22].value);
            }); 
        }

        function Capteur_Luminositer_Toilette() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Luminositer_Toilette').html(data[23].value);
            }); 
        }

        function Capteur_Temperature_Chauffage_Chaudiere() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Chauffage_Chaudiere').html(data[24].value);
            }); 
        }

        function Capteur_Temperature_Eau_Chaude_Chaudiere() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Eau_Chaude_Chaudiere').html(data[25].value);
            }); 
        }

        function Capteur_Temperature_Eau_Froide_Chaudiere() {
          var Url = "https://gladysdashboard.ddns.net/";
          var Token = "52c7e5078932312740b80e05b9246333ce3e8f5e";

          // $.getJSON(Url + "devicestate?Token=" + Token,
          $.getJSON("https://gladysdashboard.ddns.net/devicestate?token=52c7e5078932312740b80e05b9246333ce3e8f5e",
            function(data) {
               $('#Temperature_Eau_Froide_Chaudiere').html(data[26].value);
            }); 
        }

        setTimeout("Update_Module()",60000);
      }
    </script>

</head>

<body style="display: none" bgcolor="#1f1f1f" ondragstart="return false" onselectstart="return false">
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="fa fa-gear"></span></button>
    <span class="navbar-brand"><?php echo $Config['Site_Name_Maj']; ?></span>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right user-nav">
    <li class="dropdown profile_menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="30" height="30" src="/_Resources/Assets/Images/Avatar/B3t4Byt3.png"> B3t4Byt3 <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="javascript:ShowOnlyOne('Dashboard');"><i class="fa fa-desktop"></i><span> Dashboard</span></a></li>
        <li><a href="javascript:ShowOnlyOne('Manage_API');"><i class="fa fa-flask"></i><span> Manage API</span></a></li>
        <li class="divider"></li>
        <li><a href="javascript:ShowOnlyOne('Settings');"><i class="fa fa-gears"></i><span> Settings</span></a></li>
        <li><a href="javascript:ShowOnlyOne('Debug');"><i class="fa fa-gears"></i><span> Debug</span></a></li>
        <li class="divider"></li>
     <li><a href="/_Resources/Libs/Log_Out.php"><i class="fa fa-power-off"></i><span> Log Out</span></a></li>
    </ul>
    </li>
</ul>

<ul class="nav navbar-nav navbar-right not-nav">
  <li class="button">
  <a href="javascript:ShowOnlyOne('Logs');" class="toggle"><i class="fa fa-globe"></i><span class="bubble">3</span></a>
  </li>
</ul>

</div>
</div>
</div>