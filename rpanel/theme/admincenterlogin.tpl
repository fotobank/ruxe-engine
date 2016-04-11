<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
	    <title>{TITLE}</title>
		<meta name="generator" content="{GENERATOR}">
		<link href="theme/rpanel.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <section role="form">
		    <noscript>
			    <div class="group-80-offset-10">
				    <div class="container center-text">
					    <h3>ВКЛЮЧИТЕ ПОДДЕРЖКУ JAVASCRIPT В ВАШЕМ БРАУЗЕРЕ</h3>
					    <p>Для полноценной работы Ruxe Engine необходимо включить JavaScript в Вашем браузере</p>
					</div>
				</div>
			</noscript>
			<br>
			<form class="loginform" action="login.php" method="POST">
			    <div class="group-100">
				    <div class="block-100-bg-blue center-text">
					    <div class="container">
						    Вход в Администраторский центр Ruxe Engine
						</div>
					</div>
					<div class="group-100-bg-white">
					    <div class="container">
						    <label for="login">Логин:</label>
							<input id="login" class="group-100" type="text" name="login">
							<label for="pass">Пароль:</label>
							<input id="pass" class="group-100" type="password" name="password">
							<br>
							<div class="block-100">
							    <input class="button-default pull-right" type="submit" name="submit" value="Войти">
							</div>
							<p class="small pull-right">{CREDITS}</p>
							<br>
						</div>
					</div>
				</div>
			</form>
		</section>
    </body>
</html>