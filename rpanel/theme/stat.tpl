<h2>Добро пожаловать в админ-центр Ruxe Engine</h2>
<font class="desc">Приятной работы с Ruxe Engine.</font><br><br>
<noscript>
	<center>
		<table class="optionstable" border=0 cellpadding=1 cellspacing=0>
			<tr class="titlered"><td>ВКЛЮЧИТЕ ПОДДЕРЖКУ JAVASCRIPT В ВАШЕМ БРАУЗЕРЕ</td></tr>
			<tr class="redtd"><td>Для полноценной работы Ruxe Engine необходимо включить JavaScript в Вашем браузере</td></tr>
		</table>
	</center><br>
</noscript>
<center>
    <table class="optionstable" border=0 cellpadding=1 cellspacing=0>
        <tr class="titletable">
            <td colspan=2>О ПРОГРАММЕ</td>
        </tr>
        <tr>
            <td colspan=2 align="center">
                <a href="http://ruxe-engine.ru/" target="_blank">Сайт программы</a> •
                <a href="https://github.com/maindefine/ruxe-engine/blob/master/README.md"
                   target="_blank">Документация</a> •
                <a href="http://ruxe-engine.ru/viewforum.php?f=21" target="_blank">Дополнения</a> •
                <a href="?action=system&amp;go=thanks">Благодарности</a> •
                <a href="https://github.com/maindefine/ruxe-engine/blob/master/LICENSE-FULL-EN.txt">Лицензия</a>
            </td>
        </tr>{INSTALL}
        <tr class="titletable">
            <td width="50%">СТАТИСТИКА</td>
            <td width="50%">ЗАМЕТКИ</td>
        </tr>
        <tr>
            <td valign="top" rowspan="3">
                <table id="without" border=0>
                    <tr>
                        <td>Всего просмотрено страниц:</td>
                        <td>{ALL_HITS}</td>
                    </tr>
                    <tr>
                        <td>За всё время посетило людей:</td>
                        <td>{ALL_HOSTS}</td>
                    </tr>
                    <tr>
                        <td>Сегодня просмотрено страниц:</td>
                        <td>{HITS}</td>
                    </tr>
                    <tr>
                        <td>Вчера посетило людей:</td>
                        <td>{LAST_HOSTS}</td>
                    </tr>
                    <tr>
                        <td>Серверное время:</td>
                        <td>{SERVER_TIME}</td>
                    </tr>
                    <tr>
                        <td>Время с учётом часового пояса:</td>
                        <td>{UTCTIME}</td>
                    </tr>
                    <tr>
                        <td>Сегодня посетило людей:</td>
                        <td>{HOSTS}</td>
                    </tr>
                    <tr>
                        <td>Сейчас людей на сайте:</td>
                        <td>{ONLINE}</td>
                    </tr>
                    <tr>
                        <td>Роботов сегодня:</td>
                        <td>{BOTS}</td>
                    </tr>
                    <tr>
                        <td>RSS-канал новостей:</td>
                        <td>{RSS_NEWS}</td>
                    </tr>
                    <tr>
                        <td>Серверное DOCUMENT_ROOT:</td>
                        <td>{DEFAULT_ROOT}</td>
                    </tr>
                    <tr>
                        <td>register_globals:</td>
                        <td>{register_globals}</td>
                    </tr>
                </table>
            </td>
            <td valign="top">
                <div id="flowerContainer" class="sortContainer">
                    {NOTES}
                    Заметки можно перетаскивать мышью.
                    <a href="?action=notes&subaction=add">Добавить заметку</a>
                </div>
            </td>
        </tr>
        <tr class="titletable">
            <td>НЕДАВНИЕ КОММЕНТАРИИ</td>
        </tr>
        <tr>
            <td valign="top" align="center">
                {MESSAGES}
            </td>
        </tr>
    </table>
</center>
<br>
<h2>Кто где</h2>
<font class="desc">Просмотр информации о посетителях, побывавших на сайте за последние {TIME_RECORD} минут</font><br><br>
<center> 
	<table class="optionstable" border=0 cellpadding=1 cellspacing=0>
		<tr class="titletable"><td width=100>IP</td><td width=300>ПОСЛЕДНЕЕ ДЕЙСТВИЕ</td><td>БРАУЗЕР</td></tr>
		{WHOONLINE}
	</table>
</center>
<script src="theme/js/jquery-1.12.2.min.js"></script>
<script src="theme/js/jquery-ui.min.js"></script>
<div id="info" class="ui-widget">
    <div>ID элемента: <span id="itemId">не определено</span></div>
    <div>Позиция: <span id="pos">не определено</span></div>
</div>
<script>
    $(function() {

        $('#flowerContainer').sortable({
            sort: function(event, ui) {
                $('#itemId').text(ui.item.attr("id"))
            },
            change: function(event, ui) {
                $('#pos').text($('#flowerContainer *').index(ui.placeholder))
            }
        });

    });
</script>
