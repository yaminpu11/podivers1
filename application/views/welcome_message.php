<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/icon/favicon.png'); ?>">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/animate/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Anton|Kalam|Patua+One|Roboto" rel="stylesheet">

    <!--
    font-family: 'Anton', sans-serif;
    font-family: 'Kalam', cursive;
    font-family: 'Roboto', sans-serif;
    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

</head>

<style>
    body {
        background-color: #F2F2F2;
        font-family: 'Roboto', sans-serif;
    }

    .thumbnail {
        1px solid #dadada;
    }

    /* =========NAVBAR=========== */
    .navbar-default {
        background-color: #083f88;
        border-color: #092d5d;
    }
    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        color: #fff;
        background-color: #092e62;
    }
    .navbar-default .navbar-nav>li>a {
        color: #fff;
    }

    .navbar-default .navbar-nav>li>a:hover {
        color: #fff;
        background-color: #092e62;
    }

    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
        color: #fff;
        background-color: #092e62;
    }

    .navbar-brand {
        padding: 7.5px 15px;
    }
    /* =========NAVBAR=========== */

    #tableTop {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    h3 {
        color: #092e62;
        border-left: 12px solid #FF9800;
        padding-left: 10px;
        font-weight: bold;
    }

    #tableTop tr td {
        text-align: center;
        color: #607D8B;
        /*color: #FF9800;*/
        width: 25%;
        background: #f5f5f5;
    }

    /*#tableTop tr td h4 {*/
        /*color: #092e62;*/
    /*}*/

    .iconHider {
        padding-top: 10px;
        font-size: 19px;
    }

    #tableTop h4 {
        font-family: 'Anton', sans-serif;
    }

    #panelTop {
        -webkit-box-shadow: 0px -8px 24px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px -8px 24px 0px rgba(0,0,0,0.75);
        box-shadow: 0px -8px 24px 0px rgba(0,0,0,0.75);
    }


    #viewHelp .numbering {
        width: 57px;
        height: 51px;
        border: 1px solid #3F51B5;
        background: #3F51B5;
        border-radius: 6px;
        text-align: center;
        padding-top: 0px;
        display: inline-block;
        margin-right: 10px;
        font-size: 11px;
        color: #fff;
    }

    #viewHelp .numbering span {
        font-size: 23px;
    }

    #viewHelp .info {
        position: absolute;
        display: inline-block;
    }

    #viewHelp .info .title-info {
        color: orangered;
        font-size: 12px;
        font-weight: bold;

    }

    #viewHelp .info .help-block {
        margin-top: 0px;
    }

    #viewHelp .list-group-item {
        position: relative;
        display: block;
        padding: 2px 15px;
        margin-bottom: 0px;
        background-color: #f2f2f2;
        border: 1px solid #f2f2f2;
        border-left: 3px solid #dddddd;

        /* font-size: 31px; */
    }

    /* NEW */
    .img-news {
        position: relative;
    }
    .time-news {
        position: absolute;
        background: #1615157d;
        top: 10px;
        right: 0px;
        padding: 3px;
        color: #ffffff;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        font-size: 10px;
    }
</style>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('assets/images/logo-header-hitam-putih.png') ?>" style="width: 150px;">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <!--  <ul class="nav navbar-nav hide">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Tracer Student</a></li>
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Karier</a></li>
                <li><a href="#">Kontak</a></li>

            </ul> -->

            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Tracer Student</a></li>
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div>
    <img src="<?= base_url('assets/images/slide.jpg') ?>" style="width: 100%;">

    <div id="panelTop" style="background-color: #ffffff;border-bottom: 1px solid #dedede;min-height: 10px;margin-bottom: 20px;">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table table-bordered" id="tableTop">
                        <tr>
                            <td>
                                <div class="iconHider">
                                    <i class="fa fa-fire fa-2x" aria-hidden="true"></i>
                                </div>
                                <h4>Trending</h4>
                            </td>
                            <td>
                                <div class="iconHider">
                                    <i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i>
                                </div>
                                <h4>News</h4>
                            </td>
                            <td>
                                <div class="iconHider">
                                    <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                                </div>
                                <h4>Events</h4>
                            </td>
                            <td>
                                <div class="iconHider">
                                    <i class="fa fa-question-circle-o fa-2x" aria-hidden="true"></i>
                                </div>
                                <h4>FAQ</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-xs-8">
            <h3>News</h3>

            <div class="row" style="margin-top: 30px;">
                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/1.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/2.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/3.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/4.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/5.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail" style="padding: 0px;">
                        <div class="img-news">
                            <img src="<?= base_url('images/6.jpg'); ?>" class="img-fitter" style="width: 100%;">
                            <div class="time-news"><i class="fa fa-clock-o"></i> 24 April 2019 09:00</div>
                        </div>

                        <div style="padding: 10px;">
                            <b>Master Class By The Winner of Masterchef Australia</b>
                            <p class="help-block" style="text-align: right;font-size: 10px;">Hotel Binis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <h3>Events</h3>
            <div id="viewHelp" style="margin-top: 30px;">
                <ul class="list-group" id="headerlist">
                    <li class="list-group-item item-head">
                        <div class="numbering">
                            <span>24</span>
                            <br/>
                            April
                        </div>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#0">
                            <div class="info">
                                <div class="title-info">
                                    Open Recruitment Laboratorium Dasar
                                </div>
                                <p class="help-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                </p>

                            </div>

                        </a>
                    </li>
                    <li class="list-group-item item-head">
                        <div class="numbering">
                            <span>20</span>
                            <br/>
                            April
                        </div>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#0">
                            <div class="info">
                                <div class="title-info">
                                    SEMNASTI 2019
                                </div>
                                <p class="help-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                </p>

                            </div>

                        </a>
                    </li>
                    <li class="list-group-item item-head">
                        <div class="numbering">
                            <span>19</span>
                            <br/>
                            April
                        </div>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#0">
                            <div class="info">
                                <div class="title-info">
                                    INDONESIAN YOUNG LEADERS EXCHANGE PROGRAM 2019
                                </div>
                                <p class="help-block">
                                    Lorem ipsum dolor sit amet, consectetur
                                </p>

                            </div>

                        </a>
                    </li>

                </ul>
            </div>


            <div style="margin-top: 50px;">
                <h3>Portal Alumni</h3>
                <div class="thumbnail" style="margin-top: 15px;">
                    <table class="table table-bordered" style="margin-bottom: 5px;">
                        <tr>
                            <td style="width: 30%;">Username</td>
                            <td style="width: 1%;text-align: center;">:</td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <button class="btn btn-primary">Login</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="min-height: 300px;background: #ffffff;margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Video</h3>

            </div>
        </div>
    </div>
</div>




<div style="background-color: #333333;min-height: 150px;"></div>
<div style="background-color: #4b4b4b;min-height: 10px;text-align: center;
            color: #ffffff;padding: 5px;font-size: 12px;">
    Podomoro University
</div>

</body>
</html>