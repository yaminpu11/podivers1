<!-- <?php $AuthDivisionCrud = array(16,12); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <title>Dashboard | Podomoro University</title>

  <!--=== CSS ===-->
  <link href="<?= base_url('assets/img/logo-podivers.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/logo-podivers.png') ?>" rel="apple-touch-icon">
  <!-- Bootstrap -->
  <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
  <!-- <link href="<?= base_url('assets/css/compiled-4.10.1.min.css')?>" rel="stylesheet" type="text/css" /> -->

  <!-- jQuery UI -->
  <!--<link href="<?= base_url('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.css')?>" rel="stylesheet" type="text/css" />-->
  <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css')?>"/>
  <![endif]-->

  <!-- Theme -->
  <link href="<?= base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/responsive.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome.css')?>">
  <!--[if IE 7]>
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/font-awesome-ie7.min.css')?>">
  <![endif]-->

  <!--[if IE 8]>
    <link href="<?= base_url('assets/css/ie8.css')?>" rel="stylesheet" type="text/css" />
  <![endif]-->
  <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
  <link href="<?= base_url('assets/plugins/summernote/summernote.css')?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('assets/css/prettify.css')?>" rel="stylesheet" type="text/css" />

  <!--=== JavaScript ===-->

  <script type="text/javascript" src="<?= base_url('assets/js/libs/jquery-1.10.2.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')?>"></script>

  <script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/libs/lodash.compat.min.js')?>"></script>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="<?= base_url('assets/js/libs/html5shiv.js')?>"></script>
  <![endif]-->
  <script type="text/javascript" src="<?php echo url_server_live.'assets/template/'; ?>plugins/daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo url_server_live.'assets/moment-range/'; ?>moment-range.js"></script>
  <!-- Smartphone Touch Events -->
  <script type="text/javascript" src="<?= base_url('assets/plugins/touchpunch/jquery.ui.touch-punch.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/event.swipe/jquery.event.move.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/event.swipe/jquery.event.swipe.js')?>"></script>

  <!-- General -->
  <script type="text/javascript" src="<?= base_url('assets/js/libs/breakpoints.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/respond/respond.min.js')?>"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
  <script type="text/javascript" src="<?= base_url('assets/plugins/cookie/jquery.cookie.min.js')?>"></script>
  <!-- <script type="text/javascript" src="<?= base_url('assets/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/slimscroll/jquery.slimscroll.horizontal.min.js')?>"></script> -->

  <!-- JWT Encode -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/hmac-sha256.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/enc-base64-min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/encode/jwt.encode.js')?>"></script>

    <!-- JWT Decode -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/jwt/decode/build/jwt-decode.min.js')?>"></script>

  <!-- Page specific plugins -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/summernote/summernote.js')?>"></script>
  <!-- Forms -->
  <script type="text/javascript" src="<?= base_url('assets/plugins/typeahead/typeahead.min.js')?>"></script> 
  <script type="text/javascript" src="<?= base_url('assets/plugins/autosize/jquery.autosize.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/inputlimiter/jquery.inputlimiter.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/uniform/jquery.uniform.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/fileinput/fileinput.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/validation/jquery.validate.min.js')?>"></script>
  <!-- Noty -->
  <script type="text/javascript" src="<?= base_url('assets/plugins/noty/jquery.noty.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/noty/layouts/top.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/noty/themes/default.js')?>"></script>
  <!-- bootstrap-wysihtml5 -->
  <!-- <script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap-wysihtml5/wysihtml5.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js')?>"></script> -->

  <!-- Styled radio and checkboxes -->
  <!-- DataTables -->
  <!-- OLD dari Yamin
  <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/DT_bootstrap.js')?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/responsive/datatables.responsive.js')?>"></script> -->
  <!-- optional -->
  <!-- OLD dari Yamin -->

  <!--<script type="text/javascript" src="--><!--plugins/datatables/jquery.dataTables.min.js"></script>-->
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/tes/jquery.dataTables.js"></script>
  <!--<script type="text/javascript" src="--><!--plugins/datatables/tes/dataTables.bootstrap.min.js"></script>-->
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/datatables/DT_bootstrap.js"></script>
  <!--<script type="text/javascript" src="--><!--plugins/datatables/dataTables.rowReorder.js"></script>-->

  <!-- Plugin DataTbales -->
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/datatables/dataTables.rowsGroup.js"></script>
  <!--toastr-->
  <link href="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://pcam.podomorouniversity.ac.id/assets/template/plugins/toastr/toastr.min.js"></script>

  <!-- App -->
  <!-- <script type="text/javascript" src="<?= base_url('assets/js/app.js')?>"></script> -->
  <!-- <script type="text/javascript" src="<?= base_url('assets/js/plugins.js')?>"></script> -->
  <script type="text/javascript" src="<?= base_url('assets/js/plugins.form-components.js')?>"></script>
  <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea.default'});</script> -->


  <script>
  $(document).ready(function(){
    "use strict";
    // App.init(); // Init layout and core plugins
    // Plugins.init(); // Init all plugins
    FormComponents.init(); // Init all form-specific plugins

    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  });


  </script>
  <script type="text/javascript" src="<?= base_url('assets/js/demo/form_validation.js')?>"></script>

  <script type="text/javascript">
      window.base_url_js = "<?php echo base_url(); ?>";
      window.base_url_js_sw = "<?= url_blog ?>"; //routes url_blogs_admin in index.php
  </script>
  <!-- General JS-->
    <script type="text/javascript" src="<?= base_url('js/App_template_aps.js')?>"></script>
    <script type="text/javascript">
        let App_template = new App_template_aps();

        window.base_url_js = "<?php echo base_url(); ?>";
        window.base_url_js_pcam = "<?php echo url_server_ws; ?>";
        window.sessionNPM = "<?php echo $this->session->userdata('podivers_NPM'); ?>";
        window.sessionName = "<?php echo $this->session->userdata('podivers_Name'); ?>";

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $(document).off('click','#btnLogOut').on('click','#btnLogOut',function(e){
            if(confirm('Are you sure to log out?')){
               var url = base_url_js+'auth/logoutPodivers';
               FormSubmitAuto(url, 'POST',{},'');
            }
        });

        function FormSubmitAuto(action, method, values,blank = '_blank') {
            var form = $('<form/>', {
                action: action,
                method: method
            });
            $.each(values, function() {
                form.append($('<input/>', {
                    type: 'hidden',
                    name: this.name,
                    value: this.value
                }));
            });
            form.attr('target', blank);
            form.appendTo('body').submit();
        }

        function AjaxSubmitFormPromises(url='',token='',ArrUploadFilesSelector=[],Apikey='',requestHeader={}){
            return new Promise((resolve, reject) => {
               var form_data = new FormData();
               form_data.append('token',token);
               if (ArrUploadFilesSelector.length>0) {
                  for (var i = 0; i < ArrUploadFilesSelector.length; i++) {
                      var NameField = ArrUploadFilesSelector[i].NameField+'[]';
                      var Selector = ArrUploadFilesSelector[i].Selector;
                      var UploadFile = Selector[0].files;
                      for(var count = 0; count<UploadFile.length; count++)
                      {
                       form_data.append(NameField, UploadFile[count]);
                      }
                  }
               }

               $.ajax({
                 type:"POST",
                 // url:url+'?apikey='+Apikey,
                 url:(Apikey!='') ? url+'?apikey='+Apikey : url,
                 data: form_data,
                 contentType: false,       // The content type used when sending data to the server.
                 cache: false,             // To unable request pages to be cached
                 processData:false,
                 dataType: "json",
                 beforeSend: function (xhr)
                 {
                    for (key in requestHeader){
                       xhr.setRequestHeader(key,requestHeader[key]);
                    }
                   
                 },
                 success:function(data)
                 {
                  resolve(data);
                 },  
                 error: function (data) {
                   reject();
                 }
               })
            })
        }

        function AjaxSubmitForm(url='',token='',ArrUploadFilesSelector=[],Apikey='',requestHeader={}){
             var def = jQuery.Deferred();
             var form_data = new FormData();
             form_data.append('token',token);
             if (ArrUploadFilesSelector.length>0) {
                for (var i = 0; i < ArrUploadFilesSelector.length; i++) {
                    var NameField = ArrUploadFilesSelector[i].NameField+'[]';
                    var Selector = ArrUploadFilesSelector[i].Selector;
                    var UploadFile = Selector[0].files;
                    for(var count = 0; count<UploadFile.length; count++)
                    {
                     form_data.append(NameField, UploadFile[count]);
                    }
                }
             }

             $.ajax({
               type:"POST",
               // url:url+'?apikey='+Apikey,
               url:(Apikey!='') ? url+'?apikey='+Apikey : url,
               data: form_data,
               contentType: false,       // The content type used when sending data to the server.
               cache: false,             // To unable request pages to be cached
               processData:false,
               dataType: "json",
               beforeSend: function (xhr)
               {
                  // xhr.setRequestHeader("Hjwtkey",Hjwtkey);
                  for (key in requestHeader){
                     xhr.setRequestHeader(key,requestHeader[key]);
                  }
                 
               },
               success:function(data)
               {
                def.resolve(data);
               },  
               error: function (data) {
                 def.reject();
               }
             })
             return def.promise();
        }

        function file_validation_image(ev,TheName = '')
        {
            var files = ev[0].files;
            var error = '';
            var msgStr = '';
            var max_upload_per_file = 1;
            if (files.length > 0) {
              if (files.length > max_upload_per_file) {
                msgStr += 'Upload File '+TheName + ' 1 Document should not be more than 1 Files<br>';

              }
              else
              {
                for(var count = 0; count<files.length; count++)
                {
                 var no = parseInt(count) + 1;
                 var name = files[count].name;
                 var extension = name.split('.').pop().toLowerCase();
                 if(jQuery.inArray(extension, ['jpg','jpeg','png']) == -1)
                 {
                  msgStr += 'Upload File '+TheName + ' Invalid Type File<br>';
                 }

                 var oFReader = new FileReader();
                 oFReader.readAsDataURL(files[count]);
                 var f = files[count];
                 var fsize = f.size||f.fileSize;

                 if(fsize > 3000000) // 3mb
                 {
                  msgStr += 'Upload File '+TheName +  ' Image File Size is very big<br>';
                 }
                 
                }
              }
            }
            else
            {
              msgStr += 'Upload File '+TheName + ' Required';
            }

            if (msgStr == '') {
                return true;
            }
            else
            {
                toastr.info(msgStr);
                return false;
            }
        }

        function Validation_leastCharacter(leastNumber,string,theName) {
            var result = {status:1, messages:""};
            var stringLenght =  string.length;
            if (stringLenght < leastNumber) {
                result = {status : 0,messages: theName + " at least " + leastNumber + " character"};
            }
            return result;
        }

        function Validation_email(string,theName)
        {
            var result = {status:1, messages:""};
            var regexx =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (!string.match(regexx)) {
                result = {status : 0,messages: theName + " an invalid email address! "};
            }
            return result;
        }

        function Validation_required(string,theName)
        {
            var result = {status:1, messages:""};
            if (string == "" || string == null) {
                result = {status : 0,messages: theName + " is required! "};
            }
            return result;
        }

        function Validation_numeric(string,theName)
        {
            var result = {status:1, messages:""};
            var regexx =  /^\d+$/;
            if (!string.match(regexx)) {
                result = {status : 0,messages: theName + " only numeric! "};
            }
            return result;
        }

        function loading_page(selector) {
            selector.html('<div class="row">' +
                '<div class="col-md-12" style="text-align: center;">' +
                '<h3 class="animated flipInX"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> <span>Loading page . . .</span></h3>' +
                '</div>' +
                '</div>');
        }

        $(document).ready(function(e){
            App_template.count_notif();
        })
    </script>

</head>

<body>

  <!-- Header -->
  <header class="header navbar navbar-fixed-top" role="banner">
    <!-- Top Navigation Bar -->
    <div class="container-flued">

      <!-- Only visible on smartphones, menu toggle -->
      <ul class="nav navbar-nav">
        <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
      </ul>

      <!-- Logo -->
      <a class="navbar-brand" href="<?= base_url('dashboard')?>">
        <img src="<?= base_url('assets/img/logo-podivers.png')?>" alt="logo" style="width: 70px;margin-left: 20px"/>
      </a>
      <!-- /logo -->

      <!-- Sidebar Toggler -->
      <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
        <i class="icon-reorder"></i>
      </a>
      <!-- /Sidebar Toggler -->

      <!-- Top Left Menu -->
      <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
        <li>
          <a href="<?= base_url('dashboard')?>">
            Dashboard
          </a>
        </li>
        <li>
          <a href="https://podivers.org/" target="_blink">
            Preview Live
            <i class="icon-external-link"></i>
          </a>
          
        </li>
      </ul>
      <!-- /Top Left Menu -->

      <!-- Top Right Menu -->
      <ul class="nav navbar-nav navbar-right">
        

        <!-- User Login Dropdown -->
        <li class="dropdown user">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img alt="" src="<?= base_url('assets/img/avatar1_small.jpg')?>" /> -->
            <i class="icon-male"></i>
            <span class="username"><?php echo $this->session->userdata('podivers_Name') ?></span>
            <i class="icon-caret-down small"></i>
          </a>
          <ul class="dropdown-menu">
            <!-- <li><a href="pages_user_profile.html"><i class="icon-user"></i> My Profile</a></li>
            <li><a href="pages_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
            <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li> -->
            <!-- <li class="divider"></li> -->
            <li><a href="<?php echo base_url().'auth/logoutPodivers' ?>"><i class="icon-key"></i> Log Out</a></li>
          </ul>
        </li>
        <!-- /user login dropdown -->
      </ul>
      <!-- /Top Right Menu -->
    </div>
    <!-- /top navigation bar -->

  </header> <!-- /.header -->

  <div id="container">
    <div id="sidebar" class="sidebar-fixed">
      <div id="sidebar-content">
        <div class="text-center" style="margin-top: 20px;">
         <!-- <img width="90" alt="" src="<?= base_url('images/icon/podivers.png')?>" /> -->
          <img class="img-circle" width="90" src="<?= $this->session->userdata('podivers_Photo')?>">
          <p><strong><?php echo $this->session->userdata('podivers_Name') ?></strong></p>
          <!-- <p><?= $this->session->userdata('podivers_Faculty')?></p> -->
        </div>
        
        <!--=== Navigation ===-->
        <ul id="nav">
          <li class="<?php if($this->uri->segment(1) == 'portal' ){echo 'current';} ?>">
            <a href="<?=  base_url('portal')?>">
              <i class="icon-home"></i>
              Dashboard
            </a>
          </li>
          <li class="<?php if($this->uri->segment(1) == 'banner' ){echo 'current';} ?>">
            <a href="<?=  base_url('portal/banner')?>">
              <i class="icon-th-large"></i>
              Banner Home
            </a>
            
          </li>
          <li class="<?php if($this->uri->segment(1) == 'portal/partnert' ){echo 'current';} ?>">
            <a href="<?=  base_url('portal/partnert')?>">
              <i class="icon-globe"></i>
              Partner
            </a>
            
          </li>
          
          <li class="<?php if($this->uri->segment(1) == 'portal/content' ){echo 'current open';} ?>">
            <a href="javascript:void(0);">
              <i class="icon-desktop"></i>
              Content
<!--              <span class="label label-info pull-right">6</span>
 -->            </a>
            <ul class="sub-menu">
              <li class="<?php if($this->uri->segment(2) == 'article' ){echo 'current';} ?>">
                <a href="<?=  base_url('portal/content/article')?>">
                <i class="icon-angle-right"></i>
                Article
                </a>
              </li>

              <li class="<?php if($this->uri->segment(2) == 'category' ){echo 'current';} ?>">
                <a href="<?=  base_url('portal/content/category')?>">
                <i class="icon-angle-right"></i>
                Category
                </a>
              </li>
            </ul>
          </li>
          <li class="<?php if($this->uri->segment(1) == 'portal/event' ){echo 'current';} ?>">
            <a href="<?=  base_url('portal/event')?>">
              <i class="icon-calendar-empty"></i>
              Event
            </a>
              
          </li>
          <li class="<?php if($this->uri->segment(1) == 'portal/testimonial' ){echo 'current';} ?>">
            <a href="<?=  base_url('portal/testimonial')?>">
              <i class="icon-comments-alt"></i>
              Testimonial
            </a>
              
          </li>
          <li class="<?php if($this->uri->segment(1) == 'newsletter' ){echo 'open';} ?>">
            <a href="<?= base_url('newsletter')?>">
              <i class="icon-book"></i>
              Newsletter
            </a>
            
          </li>
          <!-- <li>
            <a href="javascript:void(0);">
              <i class="icon-user"></i>
              User
            </a>
            
          </li> -->
          <li class="<?php if($this->uri->segment(1) == 'portal/setting' ){echo 'open';} ?>">
            <a href="<?= base_url('portal/setting')?>">
              <i class="icon-cog"></i>
              Setting
            </a>
          </li>
          
            </ul>
          </li>
        </ul>
        
        <!-- /Navigation -->
        

        <div class="sidebar-widget align-center">
          <div class="btn-group" data-toggle="buttons" id="theme-switcher">
            <label class="btn active">
              <input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
            </label>
            <label class="btn">
              <input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
            </label>
          </div>
        </div>

      </div>
      <div id="divider" class="resizeable"></div>
    </div>
    <!-- /Sidebar -->

    <?= $content; ?>

  </div>

</body>
</html>

<!-- Global Modal Large -->
<div class="modal fade" id="GlobalModalLarge" role="dialog">
    <div class="modal-dialog" role="document" style="width:900px;">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Global Modal Large -->
<!-- Global Modal ExtraLarge -->
<div class="modal fade" id="GlobalModalXtraLarge" role="dialog">
    <div class="modal-dialog" role="document" style="width:1280px;">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

  function Validation_leastCharacter(leastNumber,string,theName) {
      var result = {status:1, messages:""};
      var stringLenght =  string.length;
      if (stringLenght < leastNumber) {
          result = {status : 0,messages: theName + " at least " + leastNumber + " character"};
      }
      return result;
  }

  function Validation_email(string,theName)
  {
      var result = {status:1, messages:""};
      var regexx =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      if (!string.match(regexx)) {
          result = {status : 0,messages: theName + " an invalid email address! "};
      }
      return result;
  }

  function Validation_email_gmail(string,theName)
  {
      var result = {status:1, messages:""};
      var regexx =  /^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
      if (!string.match(regexx)) {
          result = {status : 0,messages: theName + " only gmail allowed to register! "};
      }
      return result;
  }

  function Validation_required(string,theName)
  {
      var result = {status:1, messages:""};
      if (string == "" || string == null) {
          result = {status : 0,messages: theName + " is required! "};
      }
      return result;
  }

  function Validation_numeric(string,theName)
  {
      var result = {status:1, messages:""};
      var regexx =  /^\d+$/;
      if (!string.match(regexx)) {
          result = {status : 0,messages: theName + " only numeric! "};
      }
      return result;
  }
  function Validation_decimal(string,theName)
  {
      var result = {status:1, messages:""};
      var regexx =  /^\d*\.?\d*$/;
      if (!string.match(regexx)) {
          result = {status : 0,messages: theName + " only decimal! "};
      }
      return result;
  }

  function AjaxSubmit(url='',token='',ArrUploadFilesSelector=[]){
       var def = jQuery.Deferred();
       var form_data = new FormData();
       form_data.append('token',token);
       if (ArrUploadFilesSelector.length>0) {
          for (var i = 0; i < ArrUploadFilesSelector.length; i++) {
              var NameField = ArrUploadFilesSelector[i].NameField+'[]';
              var Selector = ArrUploadFilesSelector[i].Selector;
              var UploadFile = Selector[0].files;
              for(var count = 0; count<UploadFile.length; count++)
              {
               form_data.append(NameField, UploadFile[count]);
              }
          }
       }

       $.ajax({
         type:"POST",
         url:url,
         data: form_data,
         contentType: false,       // The content type used when sending data to the server.
         cache: false,             // To unable request pages to be cached
         processData:false,
         dataType: "json",
         success:function(data)
         {
          def.resolve(data);
         },  
         error: function (data) {
           // toastr.info('No Result Data'); 
           def.reject();
         }
       })
       return def.promise();
  }

  function loading_button2(selector) {
      selector.html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
      selector.prop('disabled',true);
  }

  function end_loading_button2(selector,html='Save'){
      selector.prop('disabled',false).html(html);
  }
</script>