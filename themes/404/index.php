<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title><?php here_title(); ?></title>
        <link rel="shortcut icon" href="<?php here_urlsite(); ?>/favicon.ico" type="image/x-icon">
        <link rel="alternate" type="application/rss+xml" title="RSS лента" href="<?php here_urlrss(); ?>">
        <?php here_metaredirect(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php here_keywords(); ?>">
        <meta name="generator" content="<?php here_generator(); ?>">
        <meta name="description" content="<?php here_description(); ?>">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500italic&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php here_urlsite(); ?>/themes/default/style.css" type="text/css">
        <script src="<?php here_urlsite(); ?>/themes/default/js/prefixfree.min.js"></script>
        <link rel="stylesheet" href="<?php here_themepath(); ?>/layout.css" type="text/css">
        <script src="<?php here_urlsite(); ?>/themes/default/js/jquery-1.7.2.min.js"></script>
        <script src="<?php here_urlsite(); ?>/themes/default/js/jquery.leanModal.min.js"></script><!-- Скрипт Модального окна http://leanmodal.finelysliced.com.au/ -->
        <script src="<?php here_themepath(); ?>/js/main.js"></script>
        <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            $(document).ready(function(){

            $(".btn-slide").click(function(){
            $("#panel").slideToggle("slow");
            $(this).toggleClass("actived"); return false;
            });
            });
        </script>
        <script>
            $(function() {
            $('.icon').click(function() {
    
            if($('.items').is(':visible')) {
            $('.items').removeClass('showitems'); 
            }
            else {
            $('.items').addClass('showitems'); 
            }   
            }); 
            });
        </script>
        <script type="text/javascript">
            $(function() {
            $('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });        
            });
        </script>
        <style>
            p {font-family: 'Roboto', sans-serif;}
        </style>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php here_urlsite(); ?>/assets/plugins/gallery/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php here_urlsite(); ?>/assets/plugins/gallery/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    </head>
    <body>
        <!-- Nav -->
        <nav class="menu navbar-default">
            <div class="group-80-offset-010">
                <a href="#"><div class="icon fa fa-align-justify"></div></a>
                <div class="top items pull-left">
                    <a href="<?php here_urlsite(); ?>" title="Главная"><i class="fa fa-home"></i></a>
                    <a href="#"><i class="fa fa-search btn-slide"></i></a>
                    <a id="go" rel="leanModal" name="signup" href="#signup"><i class="fa fa-sign-in"></i></a>
                </div>
                <ul>    
                    <div class="items pull-right">
						<a href="<?php here_urlsite(); ?>/somepage.html" title="Применение дизайна"><li>Применение дизайна</li></a>
                        <a href="<?php here_urlsite(); ?>/gallery.html" title="Галерея"><li>Галерея</li></a>
						<a href="<?php here_urlsite(); ?>/downloads.html" title="Скачать"><li>Скачать</li></a><!--PHP функция here_urlsite(); возвращает полный адрес сайта (с http://), без / на конце.-->
						<a href="<?php here_urlsite(); ?>/faq.html" title="F.A.Q"><li>F.A.Q</li></a>
						<a href="<?php here_urlsite(); ?>/contact.html" title="Контакты"><li>Контакты</li></a>
                    </div>
                </ul>
            </div>
            <div id="panel">
                <?php if(function_exists('here_shortsearch')) {here_shortsearch();} ?>
            </div>
        </nav>
        <!-- Header -->
        <section id="header" role="banner">
            <div class="overlay">
                <div class="container center-text">
                    <h1>Страница не найдена! <span class="color">Error&nbsp;404!</span></h1>
                    <p class="lead">Возможно, что вы ошиблись при вводе адреса, или публикация перемещена в другой раздел.<br>Пожалуйста, воспользуйтесь меню сайта или <a href="<?php here_urlsite(); ?>/search.html">поиском по сайту</a></p>
                </div>
            </div>
        </section>
        <!-- Основное содержание страницы -->
        <div class="group-100 subject">
            <div class="group-60-offset-20">
                <?php here_pagecontent(); ?>
            </div>
        </div>
        <!-- Форма авторизации -->
        <div id="signup">
            <div class="loginform">
                <div id="login">
                    <div id="login-content">
                        <a class="modal_close" href="#"></a>
                        <?php here_login(); ?>                            
                    </div>
                </div>
            </div>
        </div>
        <!--  Footer  -->
        <div id="footer" class="group-100">
            <div class="block-90-offset-005">
                <div class="pull-left">
                    <p>© 2016. Дизайн <a href="http://webdesign.ru.net">D-Sign</a>. {CREDITS}</a></p>
                </div>
                <div class="pull-right">
                    <ul class="footer-social">
                        <li><a href="<?php here_urlrss(); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                        <li><a href="https://github.com/maindefine/ruxe-engine" target="_blank"><i class="fa fa-github"></i></a></li>
                        <li><a href="https://vk.com/ruxeengine" target="_blank"><i class="fa fa-vk"></i></a></li>
                        <li><a href="https://www.facebook.com/groups/1587191988261451/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
                <br>
            </div>
        </div>
    </body>
</html>