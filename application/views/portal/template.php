<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon/favicon.png'); ?>">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<!--    <link href="--><?php //echo base_url('assets/bootstrap/css/bootstrap-theme.min.css'); ?><!--" rel="stylesheet">-->

    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font/custom-font.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/animate/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Anton|Kalam|Patua+One|Roboto" rel="stylesheet">
    <link href="<?= base_url('assets/summernote/summernote.css')?>" rel="stylesheet" type="text/css" />

    <!--
    font-family: 'Anton', sans-serif;
    font-family: 'Kalam', cursive;
    font-family: 'Roboto', sans-serif;
    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- JWT Encode -->
    <script type="text/javascript" src="<?php echo url_server_live.'assets/plugins/';?>jwt/encode/hmac-sha256.js"></script>
    <script type="text/javascript" src="<?php echo url_server_live.'assets/plugins/';?>jwt/encode/enc-base64-min.js"></script>
    <script type="text/javascript" src="<?php echo url_server_live.'assets/plugins/';?>jwt/encode/jwt.encode.js"></script>

    <!-- JWT Decode -->
    <script type="text/javascript" src="<?php echo url_server_live.'assets/plugins/';?>jwt/decode/build/jwt-decode.min.js"></script>

    <link href="<?php echo base_url().'assets/select2/select2.min.css'?>" rel="stylesheet" />
    <script src="<?php echo base_url().'assets/select2/select2.min.js'?>"></script>

    <!--   toastr -->
    <script type="text/javascript" src="<?php echo base_url('assets/toastr/toastr.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo url_server_live.'assets/template/'; ?>plugins/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo url_server_live.'assets/moment-range/'; ?>moment-range.js"></script>

    <script type="text/javascript" src="<?php echo url_server_live;?>assets/custom/jquery.maskMoney.js"></script>

    <!-- Page specific plugins -->
    <script type="text/javascript" src="<?= base_url('assets/summernote/summernote.js')?>"></script>

    <!-- Plugin DataTbales -->
    <!-- CSS-->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>datatables/dataTables.bootstrap.min.js"></script>

    <!-- End Plugin DataTbales -->
    
    <!-- General JS-->
    <script type="text/javascript" src="<?= base_url('js/App_template_aps.js')?>"></script>
    <script type="text/javascript">
        let App_template = new App_template_aps();

        window.base_url_js = "<?php echo base_url(); ?>";
        window.base_url_js_pcam = "<?php echo url_server_ws; ?>";
        window.sessionNPM = "<?php echo $this->session->userdata('alumni_NPM'); ?>";
        window.sessionName = "<?php echo $this->session->userdata('alumni_Name'); ?>";

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
               var url = base_url_js+'auth/logoutAlumni';
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
    <!-- End General JS-->
</head>


<style>
    body {
        background: #eaeaea;
        /*font-family: 'Maven Pro', sans-serif;*/
        font-family: 'MavenPro-Medium';
    }

    .margin-right {
        margin-right: 5px;
    }
    #listMenu {
        padding: 0px;
        border: 1px solid transparent;
        border-radius: 0px;
    }
    #listMenu .list-group {
        margin-bottom: 0px;
    }

    #listMenu .list-group-item {
        border-bottom: none;
        border-top: none;
        border-radius: 0px !important;
        /*font-weight: bold;*/
    }


    .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover,
    #listMenu .list-group-item:hover {
        text-shadow: none !important;
        background-image: none !important;
        background-color: #f9f9f9 !important;
        border: none;
        border-left: 7px solid #ff392a !important;
        color: #ff392a !important;
        padding-left: 8px !important;
    }

    .navbar-inverse, .navbar-default {
        border-radius: 0px;
    }

    .navbar-default {
        background: #200122;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6f0000, #200122);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6f0000, #200122); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        border-color: #420606;
    }
    .navbar-default .navbar-brand {
        color: #ecf0f1;
    }
    .navbar-default .navbar-brand:hover,
    .navbar-default .navbar-brand:focus {
        color: #ffffff;
    }
    .navbar-default .navbar-text {
        color: #ecf0f1;
    }
    .navbar-default .navbar-nav > li > a {
        color: #ecf0f1;
    }
    .navbar-default .navbar-nav > li > a:hover,
    .navbar-default .navbar-nav > li > a:focus {
        color: #ffffff;
        background: #420606;

    }
    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        color: #ffffff;
        background-color: #420606;
    }
    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
        color: #ffffff;
        background-color: #420606;
    }
    .navbar-default .navbar-toggle {
        border-color: #420606;
    }
    .navbar-default .navbar-toggle:hover,
    .navbar-default .navbar-toggle:focus {
        background-color: #420606;
    }
    .navbar-default .navbar-toggle .icon-bar {
        background-color: #ecf0f1;
    }
    .navbar-default .navbar-collapse,
    .navbar-default .navbar-form {
        border-color: #ecf0f1;
    }
    .navbar-default .navbar-link {
        color: #ecf0f1;
    }
    .navbar-default .navbar-link:hover {
        color: #ffffff;
    }

    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #ecf0f1;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #ffffff;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #ffffff;
            background-color: #420606;
        }
    }

    .label-notification, .label-notification2 {
        position: absolute;
        top: -13.5px;
        right: -12px;
        height: 19px;
        width: 19px;
        background: #F44336;
        border-radius: 10px;
        border: 2px solid #fff;
        color: #fff;
        padding: 3px 0px 0px 0px;
        font-size: 9px;
    }

    h3.heading-small {
        border-left: 15px solid #ff9800;
        padding-left: 10px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .panel-default, .panel-default>.panel-heading {
        border: none !important;
    }

    .panel-title {
        font-family: "MavenPro-SemiBold";
    }

    .panel-default>.panel-heading {
        position: relative;
    }

    .panel-heading .panel-heading-button-right {
        position: absolute;
        top: 3px;
        right: 17px;
        color: #009688;
    }

    .list-group-item {
        border: none;
    }
</style>

<body>

<div class="container" style="margin-top: 5px;">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-md-12">
            <img src="<?= base_url('images/icon/logo_pu.png') ?>" style="width: 100%; max-width: 200px;">
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?= ($this->uri->segment(2)=='profile' || $this->uri->segment(2)=='') ? 'active' : ''; ?>"><a href="<?= base_url('portal/profile'); ?>"><i class="fa fa-user margin-right"></i> Profile</a></li>
                <li class="<?= ($this->uri->segment(2)=='questionnaire') ? 'active' : ''; ?>"><a href="<?= base_url('portal/questionnaire'); ?>"><i class="fa fa-question-circle margin-right"></i> Questionnaire</a></li>
                <li class="<?= ($this->uri->segment(2)=='alumni-forum') ? 'active' : ''; ?>"><a href="<?= base_url('portal/alumni-forum'); ?>"><i class="fa fa-comments margin-right"></i> Alumni Forum</a></li>
                <li class="<?= ($this->uri->segment(2)=='testimony') ? 'active' : ''; ?>"><a href="<?= base_url('portal/testimony'); ?>"><i class="fa fa-quote-left margin-right"></i> Testimony</a></li>
            </ul>

            <div style="float: right;">
                <a href="<?= base_url('portal/notification'); ?>" class="btn btn-default navbar-btn">
                    <i class="fa fa-bell" style="position: relative;">
                        <div class="label-notification">0</div>
<!--                        <div class="label-notification2">200</div>-->
                    </i>
                </a>
                <button type="button" id="btnLogOut" class="btn btn-danger navbar-btn"><i class="fa fa-power-off margin-right"></i> Sign out</button>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div style="min-height: 500px;">
    <?= $content; ?>
</div>




<div style="background: #d8d4d4;min-height: 30px;margin-top: 30px;text-align: center;padding: 15px;">

    <i class="fa fa-copyright margin-right"></i> 2020 Universitas Agung Podomoro

</div>
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

<!-- Global Modal -->
<div class="modal fade" id="GlobalModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Notification -->
<div class="modal fade" id="NotificationModal" role="dialog" style="top: 100px;">
    <div class="modal-dialog" style="width: 400px;" role="document">
        <div class="modal-content animated flipInX">
            <!--            <div class="modal-header"></div>-->
            <div class="modal-body"></div>
            <!--            <div class="modal-footer"></div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>