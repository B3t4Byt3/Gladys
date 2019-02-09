<div align="center"><strong>GladysDashboard <?php echo'© '.date('Y').' All Rights Reserved';?></strong></div>
</div>
</div>

  <script src="/_Resources/Assets/Js/jquery.nanoscroller/jquery.nanoscroller.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.easypiechart/jquery.easy-pie-chart.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.switch/bootstrap-switch.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/behaviour/general.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/masonry.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/ckeditor/adapters/jquery.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.summernote/dist/summernote.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.wysihtml5/dist/wysihtml5-0.3.0.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/bootstrap.wysihtml5/dist/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/dropzone/dropzone.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.timeline/js/modernizr.custom.js"></script>
  <script src="/_Resources/Assets/Js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/skycons/skycons.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.niftymodals/js/jquery.modalEffects.js" type="text/javascript"></script>   

  <script type="text/javascript">
    $(document).ready(function(){
      App.init();
      App.charts();

      $('.md-trigger').modalEffects();

      // <button id="not-primary" type="button" class="btn btn-primary btn-sm btn-rad" style="width: 80px;">ON</button>
      $('#not-primary').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary2').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary3').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary4').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary5').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary6').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary7').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

      $('#not-primary8').click(function(){
        $.gritter.add({
          title: 'Primary',
          text: 'This is a simple Gritter Notification.',
          class_name: 'primary'
        });
      });

    });
  </script>

  <script src="/_Resources/Assets/Js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/_Resources/Assets/Js/jquery.flot/jquery.flot.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.flot/jquery.flot.pie.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.flot/jquery.flot.resize.js" type="text/javascript"></script>
  <script src="/_Resources/Assets/Js/jquery.flot/jquery.flot.labels.js" type="text/javascript"></script>

  <script>
    $("body").show();
    NProgress.start();
    setTimeout(function() { NProgress.done(); $(".fade").removeClass("out"); }, 1000);
  </script>

  <script>
    var nice = false;
    $(document).ready(
      function() {
        nice = $("html").niceScroll();
      }
    );
  </script>

</body>
</html>