<!DOCTYPE html>
<html lang="en-US" class="webkit chrome mac js">
    <!-- BEGIN: Head-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        
        <meta name="description" content="Admin Login">
        <meta name="keywords" content="Admin Login">
        <meta name="author" content="VIVEK">
        <title>Admin Login</title>
        
        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css">
        
        <!-- BEGIN: Vendor JS-->
            <script type="text/javascript" src="<?php echo  LOAD_PLUGIN; ?>jquery/jquery-2.1.4.min.js"></script>
        <!-- BEGIN Vendor JS-->
        
        <!-- CORE CSS -->
            <link href="<?=  LOAD_PLUGIN; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
     
        
        <!-- THEME CSS -->
            <link href="<?=  LOAD_ADMIN; ?>css/essentials.css" rel="stylesheet" type="text/css">
            <link href="<?=  LOAD_ADMIN; ?>css/layout.css" rel="stylesheet" type="text/css">
            <link href="<?=  LOAD_ADMIN; ?>css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme">
            <link href="<?=  LOAD_PLUGIN; ?>styleswitcher/styleswitcher.css" rel="stylesheet" type="text/css">
        
            <link href="<?=  LOAD_PLUGIN; ?>toastr/toastr.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .jqstooltip {
                position: absolute;
                left: 0px;
                top: 0px;
                visibility: hidden;
                background: rgb(0, 0, 0) transparent;
                background-color: rgba(0,0,0,0.6);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
                -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
                color: white;
                font: 10px arial, san serif;
                text-align: left;
                white-space: nowrap;
                padding: 5px;border: 1px solid white;
                z-index: 10000;
            }
            
            .jqsfield { 
                color: white;
                font: 10px arial, san serif;
                text-align: left;
            }
        </style>
    </head>
    <!-- END: Head-->
    
    <!-- BEGIN: Body-->
    <body>
        <div class="padding-15">
            <?php echo $this->fetch('content'); ?>
        </div>
        
        <!-- JAVASCRIPT FILES -->
            <script type="text/javascript">var plugin_path = 'http://localhost/smarty/assets/plugins/';</script>
            <script type="text/javascript" src="<?=  LOAD_ADMIN; ?>js/app.js"></script>
            <script type="text/javascript" src="<?=  LOAD_PLUGIN; ?>bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?=  LOAD_PLUGIN; ?>toastr/toastr.js"></script>
        
    <!-- END: Body-->
    </body>
</html>
