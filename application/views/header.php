<!DOCTYPE html>
<html lang="en" class=" js no-touch no-android chrome no-firefox no-iemobile no-ie no-ie10 no-ios">

<head>
    <meta charset="utf-8">
    <title>Ignited CMS</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        .file-input-wrapper {
            overflow: hidden;
            position: relative;
            cursor: pointer;
            z-index: 1;
        }
        .file-input-wrapper input[type=file],
        .file-input-wrapper input[type=file]:focus,
        .file-input-wrapper input[type=file]:hover {
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
            z-index: 99;
            outline: 0;
        }
        .file-input-name {
            margin-left: 8px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/bootstrap.css" type="text/css">

    


    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/font.css" type="text/css" cache="false">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/fuelux/fuelux.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/datepicker/datepicker.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/js/nestable/nestable.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/plugin.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/app.css" type="text/css">
    <link rel="stylesheet" href="<?php echo (base_url()."resources")?>/css/superfish.css" media="screen">
    

    <!--[if lt IE 9]>
    <script src="<?php echo (base_url()."resources")?>/js/ie/respond.min.js" cache="false"></script>
    <script src="<?php echo (base_url()."resources")?>/js/ie/html5.js" cache="false"></script>
    <script src="<?php echo (base_url()."resources")?>/js/ie/fix.js" cache="false"></script>
  <![endif]-->
    <style type="text/css">

       




        /*For the big icons on dashboard*/
        .big{
            font-size: 30px;
            
        }

        .my-pad{
            padding:20px;
        }
        .my-blk{
            
            padding:10px;
            max-width: 200px;

            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }
        .my-info{
            display:inline-block;
            margin-left: 10px;
            font-weight: bold;
        }
        
        .my-center {
            margin-left: auto;
            margin-right: auto;

        }
        #tidy {
            max-width: 1170px;
            margin: 0 auto;
        }
        .gap {
            margin-top: 50px;
        }
        body {
            background-color: #ebedef;
            font-family: 'Open sans', sans-serif;
            font-size: 14px;
            line-height: 24px;
            color: #777;
            -webkit-font-smoothing: antialiased;
            /* Fix for webkit rendering */
        }
        .shorttag {
            /*display:none;*/
        }
        .pm-footer {
            background-color: #363636;
            bottom: 0px;
        }
        .footer-brand {
            color: #fff;
        }
        .phone-number-bar {
            position: relative;
            min-height: 30px;
            font-size: 16px;
            background-color: #333;
        }
        .phone-number {
            position: relative;
            margin: 0 auto;
            max-width: 1170px;
        }
        .num {
            float: right;
            position: relative;
            padding-top: 5px;
            padding-right: 5px;
            color: #fff;
        }
        .social-media {
            margin-top: 5px;
        }
        .tab-content {
            background-color: #ebedef;
        }
        .pmf-container {
            position: relative;
            max-width: 1170px;
        }
        .pm-header {
            min-height: 150px;
            background-color: #B384A3;
            border-bottom: 1px solid #ccc;
        }
        .pm-btext {
            font-family: 'open sans';
            /*font-family: 'MuseoSans-500', sans-serif;*/
            color: #fff;
        }
        .logo {
            float: left;
            position: relative;
            
        }
        .logo-text {
            position: relative;
            top: 30px;
            margin-left: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .head-outer {
            position: relative;
            background-color: #363636;
            /*box-shadow: 0 4px 4px rgba(0, 0, 0, .11);*/
            min-height: 90px;
            z-index: 999;
        }
        .head {
            height: 80px;
            background-color: #363636;
            color: #fff;
            min-width: 205px;
        }
        a {
            color: #E0604E;
            /*text-decoration: underline;*/
        }
        /*for the login button on menu*/
        a.stop:hover {
            background-color: #E0604E;
        }
        .red{
            color:#811607;
        }


        .purplet {
            /*color: #bc8dbe; */
            color: #E0604E;
        }
        .bg-purplet {
            background-color: #E0604E;
        }
        .btn-purplet {
            color: #fff !important;
            background-color: #E0604E;
            border-color: #E0604E;
        }

        .btn-black{
            color: #fff !important;
            background-color: #363636;
            border-color: #363636;
            
        }
        /*page builder styles*/
        .handle {
            display: inline;
            float: left;
            cursor: move;
        }
        .grow {
            display: inline;
            width: 20px;
            height: 20px;
            float: left;
            text-align: center;
            color: #666;
            cursor: pointer;
        }
        .shrink {
            display: inline;
            width: 20px;
            height: 20px;
            float: left;
            text-align: center;
            color: #666;
            cursor: pointer;
        }
        .remove {
            display: inline;
            width: 20px;
            height: 20px;
            float: right;
            text-align: center;
            color: #333;
            cursor: pointer;
        }
        #sortable {
            /*background-color: #cccccc;
            margin-left: 20px;*/
        }
        .clearfix {
            clear: both;
            font-size: 1px;
        }
        .text {
            display: inline;
            float: left;
            color: #ffffff;
        }
        .popover{
            min-width: 150px;
        }
        .popover-title{
            color:#333;
        }
        .popover-content{
            color:#333;
        }
        .pm-hidden{
            display:none;
        }
        

       
        
    </style>
</head>

<body style="" screen_capture_injected="true">
    <section class="hbox stretch">
   