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
    </head>

    <body>
       <!-- WRAPPER -->
       <div id="wrapper">
            <!-- 
                ASIDE 
                Keep it outside of #wrapper (responsive purpose)
            -->
                <?php echo $this->element('leftbar'); ?>
            <!-- /ASIDE -->
       
       
            <header id="header">

           <!-- Mobile Button -->
           <button id="mobileMenuBtn" class=""></button>

           <!-- Logo -->
           <span class="logo pull-left">
               <img src="<?= LOAD_ADMIN ?>images/logo_light.png" alt="admin panel" height="35">
           </span>
           <nav>

               <!-- OPTIONS LIST -->
               <ul class="nav pull-right">

                   <!-- USER OPTIONS -->
                   <li class="dropdown pull-left">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <img class="user-avatar" alt="" src="<?= LOAD_ADMIN ?>images/noavatar.jpg" height="34"> 
                           <span class="user-name">
                               <span class="hidden-xs">
                                   John Doe <i class="fa fa-angle-down"></i>
                               </span>
                           </span>
                       </a>
                       <ul class="dropdown-menu hold-on-click">
                           <li>
                               <!-- logout -->
                               <a href="#"><i class="fa fa-power-off"></i> Log Out</a>
                           </li>
                       </ul>
                   </li>
                   <!-- /USER OPTIONS -->

               </ul>
               <!-- /OPTIONS LIST -->

           </nav>

       </header>
       
            <!-- 
             MIDDLE 
            -->
       
            <section id="middle">
           
   

       