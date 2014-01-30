<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title><? here_title(); ?></title>
	<link rel="SHORTCUT ICON" href="<? here_urlsite(); ?>/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="RSS лента" href="<? here_urlrss(); ?>">
	<? here_metaredirect(); ?>
	<meta name="keywords" content="<? here_keywords(); ?>">
	<meta name="generator" content="<? here_generator(); ?>">
	<meta name="description" content="<? here_description(); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<? here_themepath(); ?>/style.css" type="text/css">
</head>

<body>

<div class="headimage"> 
	<div class="sitename"><h1>Мой сайт</h1></div>
</div>

<div class="menu">
	<ul>
		<!--
			PHP функция here_urlsite(); возвращает полный адрес сайта (с http://), без / на конце.
		-->
		<li><a href="<? here_urlsite(); ?>/">Новости</a></li>
		<!--
			Если в качестве параметра передать этой функции имя страницы (Админ-центр - Страницы),
			то в зависимости от того, задействован ЧПУ или нет (Админ-центр - Настройки - Активировать ЧПУ),
			вернёт правильный адрес страницы сайта.
			Пример:
			ЧПУ активирован, страница "downloads.html", результат: http://ваш_сайт/downloads.html
			ЧПУ не используется, та же страница, результат: http://ваш_сайт/?viewpage=downloads.html
		-->
		<li><a href="<? here_urlsite('downloads.html'); ?>">Загрузки</a></li>
		<!--
			Другими словами, чтобы не вводить адрес сайта, используйте команду here_urlsite() без параметров.
			А для указания ссылки на страницу сайта, правильнее использовать команду с 
			параметром here_urlsite('тут имя страницы').
			
			Подробнее о командах в документации.
		-->
		<li><a href="<? here_urlsite('faq.html'); ?>">F.A.Q.</a></li>
		<li><a href="<? here_urlsite('contact.html'); ?>">Обратная связь</a></li>
		<li><a href="<? here_urlsite(); ?>/#">Ссылка 1</a></li>
		<li><a href="<? here_urlsite(); ?>/#">Ссылка 2</a></li>
	</ul>
</div>

<div class="main">
	<div class="leftbl">
		<div class="leftblContent">
			<? here_pagecontent(); ?>
		</div>
		<div class="rightbl">
			<div class="rightbl2">
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Дополнительное меню:</font><br><br>
				<ul>
					<li><a href="<? here_urlsite('somepage.html'); ?>">Как перенести свой дизайн в Ruxe Engine</a></li>
					<li><a href="<? here_urlsite(); ?>/README.md">Документация</a></li>
				</ul><br><br><br>
			
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Аккаунт:</font><br><br>
				<? here_login(); ?><br><br><br>
				
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Вопрос-ответ:</font><br><br>
				<? here_random_faq(); ?><br>
				<a href="<? here_urlsite('faq.html'); ?>">Ещё</a><br><br><br>
			
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Статистика:</font><br><br>
				На сайте: <? here_online(); ?><br>
				Рекорд онлайн: <? here_record_online(); ?><br>
				Сегодня посетителей: <? here_hosts(); ?><br>
				Сегодня ботов: <? here_bots(); ?><br>
				Просмотрено страниц: <? here_hits(); ?><br>
				Вчера посетителей: <? here_last_hosts(); ?><br>
				За всё время посетило: <? here_all_hosts(); ?><br>
				И просмотрело страниц: <? here_all_hits(); ?>
				<br><br><br>
			
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Облако меток:</font><br><br>
				<center><? here_list_tags('news'); ?></center><br><br><br>
			
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Последние комментарии:</font><br><br>
				<? here_last_posts(); ?><br><br><br>
			
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Категории новостей:</font><br><br>
				<ul>
					<? here_list_category("news"); ?>
				</ul><br><br><br>
				
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Популярные новости:</font><br><br>
				<? here_top_news('news'); ?><br><br><br>
				
				<font style="font-weight:bold; font-size:12pt; margin-left:10px;">Ротатор баннеров:</font><br><br>
				<center><? here_rotator(); ?></center>
			</div>
		</div>
		<div style="width:685px;" class="newsdown"></div>
	</div>
</div>
<div class="footer">
	<table border=0 width="100%" cellpadding=0 cellspacing=0>
		<tr><td align="left" valign="middle" style="padding-left:10px;"><a href="http://validator.w3.org/check?uri=<? here_urlsite(); ?>"><img
			src="<? here_themepath(); ?>/images/valid-html401.png"
			alt="Valid HTML 4.01 Transitional" height="31" width="88"></a><a href="http://feed2.w3.org/check.cgi?url=<? here_urlsite(); ?>/rss"><img src="<? here_themepath(); ?>/images/valid-rss-rogers.png" alt="[Valid RSS]" title="Validate my RSS feed"></a><a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"
			src="<? here_themepath(); ?>/images/vcss.gif"
			alt="Правильный CSS!"></a></td>
			<td align="right" valign="middle" style="padding-right:10px;">Дизайн: <a style="color:white;" href="http://ruxe-engine.ru/viewprofile/Dr1D">Dr1D</a>. Генерация: <? here_time_generation(); ?> секунд. {CREDITS}</td></tr>
	</table>        
</div>
</body>
</html>