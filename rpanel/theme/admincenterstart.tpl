<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
	    <title>{TITLE}</title>
	    <link rel="shortcut icon" href="theme/favicon.ico" type="image/x-icon">
	    <meta name="generator" content="{GENERATOR}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <link rel="stylesheet" type="text/css" href="theme/rpanel.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	    <script type="text/javascript" src="theme/rpanel.js"></script>
	    <script type="text/javascript" src="theme/edit_area/edit_area_full.js"></script>
	    <script type="text/javascript" src="theme/tiny_mce/tinymce.min.js"></script>
        <script type="text/javascript" src="theme/tiny_mce/langs/ru.js"></script>
    </head>
    <body{ADDINFO}>
        <div id="main">
		<a name="top"></a>
		<div class="admin-header group-100-center-text">
		    <div class="container">
				<div class="pull-left center-text">
				    <img style="width: 80px; height: 80px; border-radius: 50%;" src="{AVATAR}" alt="Avatar">
					<h6>{ADMIN}</h6>
					{NEWMESS}
					<i class="fa fa-envelope-o"><a href="?action=newmessages"> {COUNT_NEW}</a></i>&nbsp;
					{/NEWMESS}
					<i class="fa fa-eye"><a href="../" target="_blank"> просмотр сайта</a></i>&nbsp;
					<i class="fa fa-sign-in"><a href="login.php?logout=true"> выход</a></i><br>&nbsp;
			    </div>
			        <img src="theme/images/{LOGO}.png" alt="logo">
					<h1>АДМИНИСТРАТОРСКИЙ ЦЕНТР</h1>
			</div>
		</div>
		<div class="group-100">
		<aside role="navigation">
        <div class="nav group">
            <div id="menu">
                <ul>
                    {GENERALMENU}
                </ul>
            </div>
        </div>
		</aside>