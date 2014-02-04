<?php
//Форма входа пользователей и администраторов
//{SITE} - адрес сайта без / на конце
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{REGLINK} - ...
//{RESTORELINK} - ...
$logincms[0]='
<form name="loginform" action="{SITE}/index.php?action=login" method="POST">
	<table border=0>
		<tr><td colspan=2>Логин:</td></tr>
		<tr><td colspan=2><input type="text" name="login" size=20></td></tr>
		<tr><td colspan=2>Пароль:</td></tr>
		<tr><td colspan=2><input type="password" name="password" size=20></td></tr>
		<tr><td colspan=2><input type="checkbox" name="save" value="true"> Запомнить</td></tr>
		<tr><td align="left"><a href="{REGLINK}">Регистрация</a><br><a href="{RESTORELINK}">Забыли пароль?</a></td><td valign="middle" align="right"><input type="submit" name="submit" value="Войти"></td></tr>
	</table>
</form>';

//Меню администратора на сайте
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{AVATAR} - полный путь до аватары
//{LOGIN} - имя администратора
//{SITE} - адрес сайта без / на конце
//{PM} - количество непрочитанных личных сообщений
//{PMLINK} - ...
//{PROFILELINK} - ...
$logincms[1]='
<table border=0>
	<tr><td><img src="{AVATAR}" border=0 alt=""></td><td>
	Вы вошли как <b>{LOGIN}</b><br>
	<a href="{PMLINK}">ЛС ({PM})</a><br>
	<a href="{PROFILELINK}">Мой профиль</a><br>
	<a target="_blank" href="{SITE}/rpanel">Админ-центр</a><br>
	<a href="{SITE}/index.php?action=logout">Выйти</a></td></tr>
</table>';

//Меню редактора на сайте
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{AVATAR} - полный путь до аватары
//{LOGIN} - имя администратора
//{SITE} - адрес сайта без / на конце
//{PM} - количество непрочитанных личных сообщений
//{PMLINK} - ...
//{PROFILELINK} - ...
$logincms[14]='
<table border=0>
	<tr><td><img src="{AVATAR}" border=0 alt=""></td><td>
	Вы вошли как <b>{LOGIN}</b><br>
	<a href="{PMLINK}">ЛС ({PM})</a><br>
	<a href="{PROFILELINK}">Мой профиль</a><br>
	<a target="_blank" href="{SITE}/rpanel">Управление</a><br>
	<a href="{SITE}/index.php?action=logout">Выйти</a></td></tr>
</table>';

//Меню модератора на сайте
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{AVATAR} - полный путь до аватары
//{LOGIN} - имя администратора
//{SITE} - адрес сайта без / на конце
//{PM} - количество непрочитанных личных сообщений
//{PMLINK} - ...
//{PROFILELINK} - ...
$logincms[15]='
<table border=0>
	<tr><td><img src="{AVATAR}" border=0 alt=""></td><td>
	Вы вошли как <b>{LOGIN}</b><br>
	<a href="{PMLINK}">ЛС ({PM})</a><br>
	<a href="{PROFILELINK}">Мой профиль</a><br>
	<a target="_blank" href="{SITE}/rpanel">Управление</a><br>
	<a href="{SITE}/index.php?action=logout">Выйти</a></td></tr>
</table>';

//Меню пользователей на сайте
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{AVATAR} - полный путь до аватары
//{LOGIN} - имя пользователя
//{SITE} - адрес сайта без / на конце
//{PM} - количество непрочитанных личных сообщений
//{PMLINK} - ...
//{PROFILELINK} - ...
$logincms[2]='
<table border=0>
	<tr><td><img src="{AVATAR}" border=0 alt=""></td>
		<td>Вы вошли как <b>{LOGIN}</b><br>
		<a href="{PMLINK}">ЛС ({PM})</a><br>
		<a href="{PROFILELINK}">Мой профиль</a><br>
		<a href="{SITE}/index.php?action=logout">Выйти</a>
	</td></tr>
</table>';

//Форма регистрации
//{SITE} - адрес сайта без / на конце
//{LOGIN} - значение логина при возврате страницы
//{PASSWORD} - значение пароля при возврате страницы
//{SPASSWORD} - значение повтора пароля при возврате страницы
//{MAIL} - значение email при возврате страницы
//{SMAIL} - значение повтора email при возврате страницы
//{SECURITY} - изображение капчи
//{THEMEPATH} - полный адрес до используемой темы без / на конце
$logincms[3]='
<br><br>
<form name="register" action="{REGSTEP2}" method="POST">
  <center><table class="optionstable" border=0 cellpadding=1 cellspacing=0>
   <tr class="titletable"><td colspan=2>Регистрация</td></tr>
   <tr><td width=200>Логин:</td><td><input type="text" name="login" size=20 value="{LOGIN}"></td></tr>
   <tr><td width=200>Пароль:</td><td><input type="password" name="password" size=20 value="{PASSWORD}"></td></tr>
   <tr><td width=200>Повторите пароль:</td><td><input type="password" name="spassword" size=20 value="{SPASSWORD}"></td></tr>
   <tr><td width=200>E-mail (не отображается на сайте):</td><td><input type="text" name="mail" size=20 value="{MAIL}"></td></tr>
   <tr><td width=200>Повторите e-mail:</td><td><input type="text" name="smail" size=20 value="{SMAIL}"></td></tr>
   <tr><td width=200>Введите код: <img src="{SECURITY}" border=0 alt=""></td><td><input type="text" name="security" size=20></td></tr>
   <tr><td colspan=2 align="center"><input type="submit" value="Зарегистрироваться" name="submit"></td></tr>
  </table></center>
 </form>
';

//Просмотр аккаунта
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{NAME} - имя пользователя
//{AVATAR}
//{STATUS} - роль пользователя
//{CM} - всего сообщений
//[if_used_pole(1-7,about)][/if_used_pole(1-7,about)] - код, находящийся между этими тегами будет использован только если пользователь
//заполнел поле (1-7,about)
//[if_user_entered][/if_user_entered] - код, заключённый между этими тегами будет использован только, если пользователь вошёл в свой
//аккаунт
//{POLECAPTION(1-7)} - названия полей
//{POLE(1-7)RESULT} - содержимое полей
//{ABOUTUSER} - поле "О себе"
//{PMNEW}
$logincms[4]='
<br><br>
 <center><table class="optionstable" width=500 border=0 cellpadding=1 cellspacing=0>
 <tr class="titletable"><td colspan=2>Профиль {NAME}</td></tr>
 {AVATAR}
 <tr><td>Имя пользователя: </td><td><b>{NAME}</b> [if_user_entered]<a href="{PMNEW}">Отправить ЛС</a>[/if_user_entered]</td></tr>
 <tr><td>Звание: </td><td><b>{STATUS}</b></td></tr>
 <tr><td>Сообщений: </td><td><b>{CM}</b></td></tr>
 <tr><td>Дата регистрации: </td><td><b>{REGDATE}</b></td></tr>
[if_used_pole1]<tr><td>{POLECAPTION1}: </td><td><b>{POLE1RESULT}</b></td></tr>[/if_used_pole1]
[if_used_pole2]<tr><td>{POLECAPTION2}: </td><td><b>{POLE2RESULT}</b></td></tr>[/if_used_pole2]
[if_used_pole3]<tr><td>{POLECAPTION3}: </td><td><b>{POLE3RESULT}</b></td></tr>[/if_used_pole3]
[if_used_pole4]<tr><td>{POLECAPTION4}: </td><td><b>{POLE4RESULT}</b></td></tr>[/if_used_pole4]
[if_used_pole5]<tr><td>{POLECAPTION5}: </td><td><b>{POLE5RESULT}</b></td></tr>[/if_used_pole5]
[if_used_pole6]<tr><td>{POLECAPTION6}: </td><td><b>{POLE6RESULT}</b></td></tr>[/if_used_pole6]
[if_used_pole7]<tr><td>{POLECAPTION7}: </td><td><b>{POLE7RESULT}</b></td></tr>[/if_used_pole7]
[if_used_about]<tr><td>О себе: </td><td><b>{ABOUTUSER}</b></td></tr>[/if_used_about]
 </table></center>
 ';
 
//Восстановление аккаунта
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{SITE} - адрес сайта без / на конце
$logincms[5]='
<table border=0 cellspacing=60 cellpadding=40 width="100%" align="center">
                   <tr><td align="center">
                           <table class="optionstable" cellpadding=5 width="100%" cellspacing=0 border=0>
                                  <tr class="titletable"><Td>
                                          Восстановление пароля
                                  </td></tr><tr><td align="center">
                                          <br><form name="restore" action="{RESTORESTEP2}" method="POST">
                                           Введите Ваш e-mail:<br><input type="text" name="mail" size=20><br><br>
                                           <input type="submit" name="submit" value="Получить новый пароль">
                                          </form><br>
                                  </td></tr>
                           </table>
                   </td></tr>
 </table>
';

//Редактирование профиля
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//[if_can_avatars][/if_can_avatars] - код, заключённый между этими тегами будет использован только, если включены аватары
//в Основных настройках админ-центра
//[if_can_ps][/if_can_ps] - код, между этими тегами будет использоватся только, если включены подписи в Основных настройках админ-центра
//[if_can_pole(1-7)][/if_can_pole(1-7)] - если номер поля используется в дополнительных полях (админ-центр - Пользователи - Дополнителные
//поля), то код между этими тегами будет использован
//{SITE} - адрес сайта без / на конце
//{AVATAR} - вставляет тег с изображением аватары
//{NAME} - имя пользователя
//{STATUS} - роль
//{MAXSIZE} - максимальный размер аватары
//{WIDTH} - максимальная ширина аватары
//{HEIGHT} - максимальная высота аватары
//{POLECAPTION(1-7)} - описание поля
//{POLE(1-7)RESULT} - значение поля
//{ABOUTUSER} - поле "О себе"
//... дописать позже
$logincms[6]='
<br><br>
<script type="text/javascript">
function tag (TXT, startTag, endTag)
{
TXT.focus ();
if (document.selection) with (document.selection.createRange ())
   {
   var t = text; text = startTag + text + endTag;
   if (!t.length) moveEnd (\'character\', endTag.length * (-1)); select ();
   }
else if (TXT.selectionStart >= 0) with (TXT)
   {
   var sT = scrollTop, sL = scrollLeft, t = value,
   stS = selectionStart, leS = selectionEnd - stS,
   w = (startTag + t.substr (stS, leS) + endTag).length;
   value = t.substr (0, stS) + startTag + t.substr (stS, leS) + endTag + t.substr (stS + leS);
   if (leS) 
   {
     selectionStart = stS + w;
     selectionEnd = selectionStart;
   }
   else
   {
     selectionStart = stS + startTag.length;
     selectionEnd = selectionStart;
   };
   scrollTop = sT, scrollLeft = sL;
   }
else TXT.value += startTag + endTag;
};
</script>

 <center><table border=0 width=500 class="optionstable" cellpadding=1 cellspacing=0>
  <tr class="titletable"><td colspan=2>Главное</td></tr>
  [if_can_avatars]<tr><td colspan=2><img src="{AVATAR}" border=0 alt=""></td></tr>[/if_can_avatars]
  <tr><td>Имя пользователя:</td><td><b>{NAME}</b></td></tr>
  <tr><td>Звание: </td><td><b>{STATUS}</b></td></tr>
  <tr><td>Сообщений: </td><td><b>{CM}</b></td></tr>
 </table><br>
 
[if_can_avatars]<form name="uploadavatar" action="{STEPUPLOAD}" method="POST" enctype="multipart/form-data">
  <table width=500 border=0 class="optionstable" cellpadding=1 cellspacing=0>
   <tr class="titletable"><td>Аватар</td></tr>
   <tr><td>Загрузить новый аватар (необязательно):<br><input type="file" size=30 name="avatarfile"><br>{RULES}</td></tr>
   <tr class="titletable"><td align="center"><input type="submit" name="submit" value="Сменить аватар"></td></tr>
  </table>
 </form>
  <br>[/if_can_avatars]
 <form name="editprofile" id="profileedit" action="{STEP2}" method="POST">
  <table width=500 border=0 class="optionstable" cellpadding=1 cellspacing=0>
   <tr class="titletable"><td>Изменение личных данных</td></tr>
   <tr><td>E-mail:<br><input type="text" name="mail" size=30 value="{MAIL}"></td></tr>
[if_can_pole1]<tr><td>{POLECAPTION1}:<br><input type="text" name="pole1" size=30 value="{POLE1RESULT}"></td></tr>[/if_can_pole1]
[if_can_pole2]<tr><td>{POLECAPTION2}:<br><input type="text" name="pole2" size=30 value="{POLE2RESULT}"></td></tr>[/if_can_pole2]
[if_can_pole3]<tr><td>{POLECAPTION3}:<br><input type="text" name="pole3" size=30 value="{POLE3RESULT}"></td></tr>[/if_can_pole3]
[if_can_pole4]<tr><td>{POLECAPTION4}:<br><input type="text" name="pole4" size=30 value="{POLE4RESULT}"></td></tr>[/if_can_pole4]
[if_can_pole5]<tr><td>{POLECAPTION5}:<br><input type="text" name="pole5" size=30 value="{POLE5RESULT}"></td></tr>[/if_can_pole5]
[if_can_pole6]<tr><td>{POLECAPTION6}:<br><input type="text" name="pole6" size=30 value="{POLE6RESULT}"></td></tr>[/if_can_pole6]
[if_can_pole7]<tr><td>{POLECAPTION7}:<br><input type="text" name="pole7" size=30 value="{POLE7RESULT}"></td></tr>[/if_can_pole7]
   <tr><td>О себе:<br>(Не более 255 символов)<br><textarea rows=5 cols=55 name="about">{ABOUTUSER}</textarea></td></tr>
   [if_can_ps]
   <tr><td>Подпись:<br>(Подпись, содержащая более {PS_MAX} символов будет урезана)</td></tr>
   <tr><td><input type="button" value="ж" style="font-weight:bold" onClick="tag(document.getElementById(\'mess\'),\'[ж]\',\'[/ж]\');">
     <input type="button" value="к" style="font-style:italic" onClick="tag(document.getElementById(\'mess\'),\'[к]\',\'[/к]\');">
     <input type="button" value="ч" style="text-decoration:underline" onClick="tag(document.getElementById(\'mess\'),\'[ч]\',\'[/ч]\');">
     <input type="button" value="п" style="text-decoration:line-through" onClick="tag(document.getElementById(\'mess\'),\'[п]\',\'[/п]\');">
     <input type="button" value="&lt;==" onClick="tag(document.getElementById(\'mess\'),\'[слева]\',\'[/слева]\');">
     <input type="button" value="&lt;=&gt;" onClick="tag(document.getElementById(\'mess\'),\'[по центру]\',\'[/по центру]\');">
     <input type="button" value="==&gt;" onClick="tag(document.getElementById(\'mess\'),\'[справа]\',\'[/справа]\');">
    <input type="button" value="Ссылка" onClick="tag(document.getElementById(\'mess\'),\'[url]\',\'[/url]\');">
    <br><textarea rows=3 cols=55 id="mess" name="ps">{PS}</textarea></td></tr>
   [/if_can_ps]
   <tr class="titletable"><td>Смена пароля</td></tr>
   <tr><td><b>Не заполняйте следующие поля, если не хотите менять пароль</b></td></tr>
   <tr><td>Новый пароль:<br><input type="password" name="newpassword" size=30></td></tr>
   <tr><td>Повторите новый пароль:<br><input type="password" name="newspassword" size=30></td></tr>
   <tr><td>Старый пароль:<br><input type="password" name="oldpassword" size=30></td></tr>
   <tr class="titletable"><td align="center"><input type="submit" name="submit" value="Сохранить все изменения"></td></tr>
  </table>
 </form>
 </center>
<script type="text/javascript">
document.getElementById("profileedit").setAttribute("autocomplete","off");
</script> 
';

//Имя пользователя в комментариях
//{SITE} - адрес сайта без / на конце
//{THEMEPATH} - полный адрес до выбранной темы оформления без / на конце
//{NAME} - имя пользователя
$logincms[7]='<a style="color:white;" href="{PROFILELINK}" onClick="window.open(\'{PROFILELINK}\'); return false;">{NAME}</a>';

//Имя администратора в комментариях
//{SITE} - адрес сайта без / на конце
//{THEMEPATH} - полный адрес до выбранной темы оформления без / на конце
//{NAME} - имя администратора
$logincms[8]='<a style="color:red;" href="{PROFILELINK}" onClick="window.open(\'{PROFILELINK}\'); return false;">{NAME}</a>';

//Главный стиль ЛС
//{MENU} - меню
//{LIST} - содержимое
$logincms[9]='
<div style="margin:10px 0px 0px 10px; width:100%;">
  <div>{MENU}</div>
  <div style="margin-top: 15px; margin-right:20px;">{LIST}</div>
</div>
';

//Стиль списка входящих и отправленных сообщений (ЛС)
//{BYORTO} - заменяется на $lcms['pm_by'], если просматриваются входящие сообщения, и на $lcms['pm_to'] - если отправленные
//{LIST} - список сообщений
//{DELETEALLLINK} - ссылка на чистку всей папки (с входящими сообщениями или исходящими)
$logincms[10]='
<table border=0 class="optionstable" cellpadding=1 cellspacing=0 width="100%">
<tr class="titletable"><td width=185>Дата</td><td>Тема</td><td width=95>{BYORTO}</td><td width=68>Действия</td></tr>
{LIST}
<tr class="titletable"><td colspan=4 align="right"><a style="color:white;" href="#" onClick="{DELETEALLLINK}">Очистить всю папку</a></td></tr>
</table>
';

//Стиль надписи над сообщением из ЛС
//{THEME} - тема
$logincms[11]='
 <div style="margin-left:64px;margin-bottom:5px;"><b>Тема:</b> {THEME}</div>
';

//Что генерировать после сообщения из ЛС
//{REPLYFORM} - форма для ответа на сообщение
$logincms[12]='
 <div style="margin-left:64px;">Ответить:</div>
 {REPLYFORM}
';

//Стиль оформления ссылок в меню ЛС
$logincms[13]='<a style="text-decoration:underline;" href="{LINK}">{CAPTION}</a>';




//Обязательный системный параметр. Вручную не вносить НИКАКИХ изменений!
$logincms[90] = "0.2";
