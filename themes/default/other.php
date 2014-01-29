<?
//Оформление комментариев модуля here_last_posts(); 
//{THEMEPATH} - полный адрес до используемой темы без / на конце
//{URL} - адрес новости
//{DATE} - дата публикации комментария
//{NAME} - имя комментатора
//{MESSAGE} - сообщение
$ocms[0] = '
<p>
 <a href="{URL}#comments">{TITLE}</a><br>{DATE}, <b>{NAME}</b>:<br>{MESSAGE}
</p>
';


//Оформление комментариев с аватарами
//{WIDTH} - максимальная ширина аватар
//{NAME} - имя комментатора
//{DATE} - дата комментирования
//{SITE} - адрес сайта без / на конце
//{THEMEPATH} - полный путь до каталога выбранной темы оформления без / на конце
//{HEIGHT} - максимальная высота аватар
//{AVATAR} - физическое имя аватары
//{MESSAGE} - комментарий
//{ONLYNAME} - имя комментатора без генерации тегов
$ocms[14]='
<center>
  <table border=0 class="optionstable" width="80%" cellpadding=1 cellspacing=0>
	<tr class="titletable">
		<td align="center" width={WIDTH}><b>{NAME}</b></td>
		<td><table style="border:none;" cellpadding=0 cellspacing=0 width="100%">
			<tr>
				<td align="left" style="border:none;"><font style="color:silver; font-weight:normal;">{DATE}</font></td>
				<td style="border:none;" align="right">[if_canquote][<a href="#messbox" style="color:white; font-weight:normal;" onClick="copyText(\'{ONLYNAME}\');"  title="Выделите текст в сообщении {ONLYNAME} и нажмите эту ссылку">Цитировать</a>][/if_canquote]</td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td height={HEIGHT} align="center" valign="top"><img src="{AVATAR}" border=0 alt=""><td valign="top">{MESSAGE}</td>
	</tr>
  </table>
</center><br>
';

//Оформление комментариев без аватаров
//{NAME} - имя комментатора
//{DATE} - дата комментирования
//{SITE} - адрес сайта без / на конце
//{THEMEPATH} - полный путь до каталога выбранной темы оформления без / на конце
//{MESSAGE} - комментарий
//{ONLYNAME} - имя комментатора без генерации тегов
$ocms[13]='
<center>
	<table border=0 class="optionstable" width="95%" cellpadding=1 cellspacing=0>
		<tr class="titletable">
			<td align="center" width=120>{NAME}</td>
			<td>
				<table style="border:none;" cellpadding=0 cellspacing=0 width="100%">
					<tr>
						<td align="left" style="border:none;"><font style="color:gray;">{DATE}</font></td>
						<td style="border:none;" align="right">[if_canquote][<a href="#messbox" onClick="copyText(\'{ONLYNAME}\');" style="color:white; font-weight:normal;" title="Выделите текст в сообщении {ONLYNAME} и нажмите эту ссылку">Цитировать</a>][/if_canquote]</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan=2 valign="top">{MESSAGE}</td>
		</tr>
	</table>
</center><br>';

//Главное оформление Каталога файлов (записи настраиваются в $ocms[4])
//{PAGES} - навигация
//{LIST} - список записей
$ocms[3]='
<center><table width="99%" border=0 cellpadding=2 cellspacing=5>
{LIST}
</table></center> <br>
{PAGES}';

//Стиль записей в модуле Каталог файлов
//{BIGIMG} - адрес крупного скриншота
//{PROGRAM} - название файла
//{IMG} - адрес мини скриншота
//{COUNT} - количество скачиваний
//{DESCRIPTION} - описание
//{ADD1} - дополнительное описание 1
//{ADD2} - дополнительное описание 2
//{SITE} - адрес сайта без / на конце
//{FILE} - идентификатор
//{PATHFILE}
$ocms[4]='
<tr>
	<td valign="middle" align="left" width=100>
		<div>
			<a href="{BIGIMG}" title="Увеличить скриншот {PROGRAM}" target="_blank"><img src="{IMG}" border=0 alt=""></a>
		</div>
	</td>
	<td align="left">
		<b>{PROGRAM}</b><br>
		<font color="grey">
		Freeware<br>
	        {COUNT}<br>
		Автор: <a href="{ADD1}">{ADD2}</a><br><br>
		</font>
		{DESCRIPTION}
	</td>
</tr>
<tr>
	<td style="border-bottom: 1px dashed #c7c7c7;" colspan=2 align="center">
		<a href="{PATHFILE}">Скачать {PROGRAM}</a>
	</td>
</tr>';

//Главное оформление модуля F.A.Q. (записи оформляются в $ocms[9])
//{PAGES} - навигатор страниц
//{LIST} - записи
$ocms[8]='<center>{LIST}</center>{PAGES}';

//Оформление записей F.A.Q.
//{THEMEPATH} - полный путь до каталога выбранной темы оформления без / на конце
//{NAME} - имя спрашивающего
//{QUESTION} - вопрос
//{DATE} - дата
//{ADMIN} - имя отвечающего
//{ANSWER} - ответ
$ocms[9]='

<table border=0 class="optionstable" width="95%" cellpadding=1 cellspacing=0>
	<tr class="faqtable">
		<td width=100 style="border-right:none;" valign="top"><b>{NAME}:</b></td>
		<td style="border-right:none;">{QUESTION}</td>
		<td style="border-left:none; text-align:right; color:grey;" valign="top">{DATE}</td>
	</tr>
	<tr>
		<td style="border-right:none;" valign="top"><b>{ADMIN}:</b></td>
		<td colspan=2>{ANSWER}</td>
	</tr>
</table>
<br>';

//Главное оформление модуля Каталог ссылок (записи настраиваются в $ocms[6])
//{LINKS} - записи
$ocms[5]='<table border=0 cellpadding=3 cellspacing=5>
{LINKS}
</table>';

//Оформление записей в Каталоге ссылок
//{SITE} - адрес сайта без / на конце
//{URL} - идентификатор ссылки
//{SHOWED_URL} - ссылка
//{COUNT} - количество переходов
//{DESCRIPTION} - описание ссылки
//{NOINDEX} - заменяется на rel="nofollow" при включённой опции запрета индексации поисковыми системами ссылок
//"Запретить индексацию поисковиками каталога ссылок" и удаляются при отключённой
//{URLPATH}
$ocms[6]='
<tr>
	<td><a {NOINDEX} target="_blank" href="{URLPATH}">{SHOWED_URL}</a> (переходов: {COUNT})</td>
</tr>
<tr>
	<td>{DESCRIPTION}</td>
</tr>';

//Оформление одной записи F.A.Q. для here_random_faq();
//{SITE} - адрес сайта
//{NAME} - имя спрашивающего
//{QUESTION} - вопрос
//{ADMIN} - имя отвечающего
//{ANSWER} - ответ
//{THEMEPATH} - полный путь до каталога выбранной темы оформления без / на конце
$ocms[1]='
<table border=0>
 <tr><td align="left"><img src="{THEMEPATH}/images/quote.gif" border=0 alt=""></td><td><b>{NAME}:</b></td></tr><tr><td></td><td>{QUESTION}</td></tr>
 <tr><td></td><td><b>{ADMIN}:</b></td></tr><tr><td></td><td>{ANSWER}</td></tr>
</table>
';

//Оформление ссылок на категории новостей в here_list_category
//{LINK} - адрес категории
//{ID} - идентификатор новостного раздела
//{CATEGORY} - категория новостей
//{THEMEPATH} - полный путь до каталога выбранной темы оформления без / на конце
//{SITE} - адрес сайта без / на конце
//{PATH} - ....
$ocms[2]='<li><a href="{PATH}">{CATEGORY}</a></li>';

//Оформление результата работы модуля Ротатор баннеров
//{URL} - адрес
//{CODE} - код
$ocms[7]='<a href="{URL}" target="_blank">{CODE}</a>';

//Оформление результатов команды here_top_downloads
//{SITE} - адрес сайта без / на конце
//{NAME} - идентификатор файла
//{DESCRIPTION} - название файла
//{COUNT} - количество скачиваний
//{PATH}
$ocms[10]='<li><a href="{PATH}">{DESCRIPTION}{COUNT}</a></li>';

//Оформление одиночных разделов для комментариев
//{COMMENTFORM} - форма ввода комментариев
//{PAGES} - навигатор страниц
//{COMMENTS} - комментарии
$ocms[11]='{COMMENTFORM}<br>{PAGES}<br>{COMMENTS}{PAGES}';

//Стиль оформления спойлера ([spoiler][/spoiler])
//{TITLE} - заголовок
//{TEXT} - текст
$ocms[15]='<div class="spoiler"><div style="cursor:pointer; display:block;" onClick="if (this.lastChild.style.display != \'\') {this.lastChild.style.display = \'\';} else {this.lastChild.style.display = \'none\';}">{TITLE}:<br><div style="display: none;" class="spoilertext">{TEXT}</div></div></div>';

//Стиль оформления цитат с указанием имени ([quote=TITLE][/quote])
//{TITLE} - имя цитируемого
//{TEXT} - текст
$ocms[16]='<div class="quote">{TITLE} писал(а):<div class="quotetext">{TEXT}</div></div>';

//Стиль оформления скрытого текста ([hide][/hide])
//{HIDE_MESSAGE} - текст
$ocms[17]='<div class="hide">Скрытый текст:<div class="hidetext">{HIDE_MESSAGE}</div></div>';

//Навигатор страниц
//{PAGES} - страницы
$ocms[18]='<div class="pager" style="text-align:center;margin:3px;">Страницы: {PAGES}</div>';

//Стиль оформления цитат без указания имени цитируемого ([quote][/quote])
//{TEXT} - текст
$ocms[19]='<div class="quote">Цитата:<div class="quotetext">{TEXT}</div></div>';

//{PAGES} - Навигатор страниц
//{NEWS} - Краткие новости, каждая из которых будет использовать шаблон newsrecord.html
$ocms[20]='{NEWS}<br>
{PAGES}';

//Оформление ссылок для списка тегов, выводимых командой here_list_tags
//{LINK} - адрес страницы с отфильтрованными новостями
//{CAPTION} - название тега
//Самые частые теги:
$ocms[21]='<a href="{LINK}" style="font-size:18pt;">{CAPTION}</a> ';
//Просто частые теги:
$ocms[22]='<a href="{LINK}" style="font-size:14pt;">{CAPTION}</a> ';
//Обычные теги:
$ocms[23]='<a href="{LINK}" style="font-size:10pt;">{CAPTION}</a> ';
//Очень редкие теги:
$ocms[24]='<a href="{LINK}" style="font-size:8pt;">{CAPTION}</a> ';


//Обязательный системный параметр. Вручную не вносить НИКАКИХ изменений!
$ocms[90] = "0.2";


//Оформление ссылок на популярные новости (here_top_news)
//{URL} - адрес
//{CAPTION} - заголовок новости
//{COUNTER} - число просмотров
//{FULLCOUNTER} - число просмотров + поясняющее слово (напр., 98 просмотров)
$ocms[30] = '<a href="{URL}" style="font-size:8pt;">{CAPTION}</a><font style="font-size:8pt;"> ({FULLCOUNTER})</font><br>';

?>