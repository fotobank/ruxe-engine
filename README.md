[Ruxe Engine](http://ruxe-engine.ru/) - Понятная CMS для людей
=====================================================

Оглавление
---------------------------------
1. [О проекте][about]
2. 

[about]: 1. О проекте
---------------------------------

Ruxe Engine (далее RE) — это лёгкая, быстрая и бесплатная Open Source система управления сайтом (CMS) на PHP. Она не использует базы данных (такие как, например, MySQL), работает на файлах. Но заострять внимание на этом факте не стоит, ибо это просто способ хранения данных. Для небольших порталов, блогов и сайтов компаний, использование баз данных не оправдывает себя — это просто тяжёлый балласт, замедляющий генерацию страниц.

Суть RE в особом подходе к управлению сайтом. Его можно назвать классическим, продвинутым. Главная идея RE — это гибкость. Нынче мода упрощать до безобразия CMS: установка в один клик, настройка из 5 переключателей и т.п. В итоге, чтобы что-то изменить под себя, приходится или копаться в исходнике, или пытаться это реализовать с помощью редактирования десятков tpl файлов, составляющих шаблон оформления. Порой даже узнать кто присутствует на сайте в данный момент нельзя... Такие CMS предназначены для создания однотипных сайтов за 2 минуты.

RE же предоставляет глубокую настройку вплоть до мельчайших деталей. С его помощью можно сделать непохожий на другие небольшой портал, сайт-визитку, блог и др. С дизайном возиться долго не потребуется — основа шаблонизации лишь один файл. Плюс ещё 6 файлов для тонкой настройки. Для вызова той или иной функции RE используются специальные слова-команды в шаблонах и страницах. В шаблонах не запрещается использовать PHP-код, как и в страницах.

RE работает полностью в UTF-8 кодировке, поддерживает кириллические домены. Весь генерируемый на сайте HTML 4.01 код и RSS-лента проходят проверку на W3.org. Немалое внимание в Ruxe Engine уделяется и безопасности — защита от флуда, премодерация, запрет кэширования страниц, бан посетителей, сессии админ-центра по IP, серьёзная капча (сложная для спам-ботов, но удобная для людей), закрытие определённых страниц от гостей и др.

И напоследок, краткий перечень основных функций RE: шаблонизация, не запрещающая использовать язык PHP; создание и редактирование страниц сайта в админ-центре, которые можно также редактировать и любым другим внешним редактором; ЧПУ; неограниченное число новостных разделов; RSS лента; комментирование в новостях, гостевой книге и отдельных разделах комментариев; регистрация пользователей с аватарами, подписями, активацией по e-mail, восстановлением паролей и прочим; модуль F.A.Q.; каталог файлов; каталог ссылок; ротатор баннеров. Начиная с 0.6.5 версии, появилась поддержка популярного сервиса gravatar.com. Но функционал CMS не ограничивается лишь стандартными модулями — есть и [дополнения](http://ruxe-engine.ru/viewforum.php?f=21), а новые дополнения можно написать самому. Функционал RE постоянно совершенствуется.


Требования к серверу
---------------------------------
1. Apache 2 с установленным и разрешённым mod_rewrite (Примечание от Buranek: на lighttpd работает, но без ЧПУ; **примечание от разработчика: использование сервера, отличного от Apache, не специалистом может быть небезопасно!**)
2. PHP версии 5.2.17 или новее
3. mbstring должен быть разрешён
4. PHP.ini должен содержать register_globals = Off
5. Установленная библиотека GD 2 для PHP
6. Возможность отправки писем через функцию PHP mail()
7. iconv разрешён (желательно)


Установка
---------------------------------

1. Убедитесь, что конфигурация сервера удовлетворяет требованиям выше.
2. Скачайте стабильный релиз Ruxe Engine по адресу [ruxe-engine.ru](http://ruxe-engine.ru).
3. Распакуйте скачанный архив на сервер (в корень не обязательно - можно и в подкаталог).
4. Перейдите по http://адрес_сайта/install.php (или http://адрес_сайта/подкаталог/install.php).
5. Следуйте инструкциям.


Применение нового дизайна
---------------------------------

### 1. Файловая структура темы оформления

Тема оформления должна иметь следующую файловую структуру:

    /themes/
        /название_темы/
            commentform.html
            index.php
            list.dat
            message.html
            newsfullrecord.html
            newsrecord.html
            other.php
            users.php
            и другие файлы и каталоги на своё усмотрение

Рассмотрим каждый элемент по отдельности.

 Элемент             | Описание
 ------------------- | --------
 название_темы       | Папка с файлами темы оформления. Каждая папка в каталоге themes - новая тема. Имя папки соответствует её названию. В качестве имён рекомендуется использовать только строчные буквы латинского алфавита и цифры.
 commentform.html    | Здесь находится оформление форм отправки комментариев и личных сообщений. Возьмите его из default темы оформления и вносите изменения, если необходимо.
 index.php           | Шаблон оформления всех страниц сайта.
 newsfullrecord.html | Здесь указывается стиль оформления **полной** записи новостного раздела. Рекомендуется за основу взять шаблон из default темы оформления.
 newsrecord.html     | Здесь находится оформление **краткой** записи новостного раздела. Рекомендуется за основу взять шаблон из default темы оформления. Краткие записи отображаются в списке новостей.
 other.php           | В файле указывается оформление различных модулей движка и стили их записей. С нуля создавать его нельзя - необходимо брать его из default темы оформления и вносить в него нужные изменения.
 users.php           | Содержит в себе оформление всех пользовательских форм, меню и т.п. С нуля создавать его нельзя - необходимо брать его из default темы оформления и вносить в него нужные изменения.

А в list.dat файле прописываются имена пользовательских файлов, находящихся в папке темы, которые будут отображены в правой части раздела "Оформление" Админ-центра, в конце списка, и будут доступны для редактирования встроенным редактором.
Каждый новый файл - на новой строке.
Синтаксис файла следующий:

	имя_файла.расширение|описание_файла

Пример:

	menu.html|Главное меню на сайте

В файлах с расширением .php допускается применять любые языки вёрстки (например, HTML) и веб-программирования, включая серверные (например, PHP). А в файлах с расширением .html - только клиентские языки веб-программирования (например, JavaScript, VisualBasic) и вёрстки. В указанных типах файлов используются HTML-теги и специальные команды движка.


### 2. Пример оформления простейшего шаблона страницы в файле index.php

```html
<!-- Тип документа и синтаксиса языка разметки; RuxeEngine адаптирован под HTMLv4.01 Transitional -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
        <!-- Заголовок страницы -->
        <title><?php here_title(); ?></title>
        <!-- ОБЯЗАТЕЛЬНАЯ команда, которая выводит meta-тег с переадресацией в промежуточных страницах; при отключенных промежуточных страницах оставляет на месте себя только перенос строки -->
        <?php here_metaredirect(); ?>
        <!-- Параметры RSS-ленты -->
        <link rel="alternate" type="application/rss+xml" title="RSS-лента" href="<?php here_urlsite(); ?>/rss">
        <!-- Иконка сайта -->
        <link rel="SHORTCUT ICON" href="<?php here_urlsite(); ?>/favicon.ico">
        <!--Тип содержимого и кодировка страницы-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Описание страницы-->
        <meta name="description" content="<?php here_description(); ?>">
        <!--Ключевые слова страницы-->
        <meta name="keywords" content="<?php here_keywords(); ?>">
</head>
<body>
        <!-- Здесь может быть заголовок, слоган сайта, главное меню, сайдбар и др.-->
        <h1>МОЙСАЙТ</h1>
        <!-- Команда для вывода контента той или иной страницы -->
        <?php here_pagecontent(); ?>
        <!-- Команда для вывода текста "Powered by Ruxe Engine" с указанием ссылки на официальный сайт (команда необязательная, но мы надеемся, что вы её будете использовать); местоположение данной команды может быть в любом месте страницы в пределах тегов <body></body>-->
        {CREDITS}
</body>
</html>
```


Что такое «команды» в Ruxe Engine
---------------------------------

Команда представляет собой определённую фразу, интерпретировав которую, движок выполняет ту или иную функцию, выдавая результат этой функции, либо подставляет значение вместо указанной переменной.

Команды делятся на те, которые употребляются только на страницах и в главном шаблоне – index.php (Имеется ввиду index.php, находящийся в /themes/**название_темы**/. Здесь и далее не путать с index.php, расположенным в корне сайта), и те, которые присутствуют в других шаблонах темы оформления.

**Пример 1**. На страничке сайта нужно вывести форму авторизации на сайте. Для этого в основном шаблоне страницы (админ-центр, раздел «Оформление») в нужном месте вставляем команду **<?php here_login(); ?>** и сохраняем изменения.

```html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
        <head>
                <title>Заголовок</title>
        </head>
<body>
<h1>Мой сайт</h1><br>
<h2>Форма авторизации:</h2>
<?php here_login(); ?>
</body>
</html>
```

При просмотре сайта через браузер, в том месте, где была вставлена команда, будет находиться форма авторизации. Аналогичным образом можно вставить форму Обратной связи, список категорий новостных разделов, статистику посещения и др.

**Пример 2**. При публикации записи система автоматически подставляет некоторые данные вместо переменных, указанных в шаблоне краткой новости: заголовок статьи ({TITLE}), категорию ({CATEGORY}) со ссылкой на адрес категории ({CATURL}), автора ({AUTHOR}) со ссылкой на его профиль, дату публикации ({DATE}), счётчик количества просмотров ({VIEWS}) и количество комментариев ({COMMENTS}) со ссылкой на них ({COMURL}). Отредактировав файл шаблона краткой новости (админ-центр, раздел «Оформление»), можно изменить порядок их вывода, либо совсем убрать некоторые из них.

Существуют также обязательные команды: если их не будет в основном шаблоне сайта, то движок, либо некоторые его функции работать не будут. К ним относятся **<?php here_metaredirect(); ?>** (выводит meta-тег с переадресацией в промежуточных страницах, размещать её нужно сразу после закрывающего тега ) и **{CREDITS}** (выводит текст "Powered by Ruxe Engine" со ссылкой на официальный сайт движка, она может быть расположена в любом месте страницы в пределах тегов, начиная с версии 1.72 команда не является обязательной, но мы надеемся, что вы будете её использовать).

Список стандартных команд движка может быть расширен благодаря установленным дополнениям.


Список большинства «команд»
---------------------------------

### Команды страниц, а также шаблона index.php

Употребляются в исходном коде страниц, использующих Ruxe Engine, и в шаблоне index.php для активации тех или иных функций при последующем просмотре страниц в браузере.


	<?php here_pagecontent(); ?>

Обязательная команда. Используется в шаблоне index.php, на месте её вызова подключаются страницы сайта (созданные в Админ-центр->Страницы).

	<?php here_title(); ?>

Выводит заголовок страницы для тега title.

	<?php here_keywords(); ?>

Подставляются ключевые слова страницы, указанные при её создании, для тега meta name="keywords"....

	<?php here_description(); ?>

Подставляется описание страницы, указанное при её создании, для тега meta name="description"....

	<?php here_urltheme(); ?>

Полный путь до каталога выбранной темы оформления без / на конце. Например, **<?php here_urltheme(); ?>** = **http://site/themes/default**.

	<?php here_metaredirect(); ?>

Обязательная команда. Выводит meta-тег с переадресацией в промежуточных страницах. В иных случаях - оставляет на месте себя только перенос строки. Целесообразно размещать её сразу после закрытия тега /title.

	<?php here_thispage(); ?>

Возвращает имя активной страницы сайта. Если активна самая главная страница сайта, то функция возвращает "index.php".

	<?php here_urlrss(); ?>

Выводит полный правильный путь до RSS ленты с учётом опции ЧПУ.

	<?php here_urlsite(); ?>

Адрес сайта без / на конце. Для этой команды существует также дополнительный параметр, в качестве которого выступает имя страницы:

	<?php here_urlsite("страница"); ?>

В этом случае команда вернёт правильный путь до этой страницы с учётом опции ЧПУ. Например, **<?php here_urlsite('mypage'); ?>** = **http://site/mypage** (ЧПУ активирован) или **http://site/?viewpage=mypage** (ЧПУ деактивирован).

	<?php here_news("ID"); ?>

Выводит записи из определённого новостного раздела, где ID - его идентификатор, указанный в параметрах.

	<?php here_time_generation(); ?>

Время генерации страницы в секундах.

	<?php here_last_posts(); ?>

Выводит недавние комментарии.

	<?php here_random_faq(); ?>

Случайная пара вопрос-ответ из модуля F.A.Q.

	<?php here_list_tags("ID"); ?>

Выводит Облако меток из Новостного раздела, где ID - его идентификатор, указанный в параметрах.

	<?php here_list_category("ID"); ?>

Выводит список используемых категорий в Новостном разделе, где ID - его идентификатор, указанный в параметрах.

	<?php here_login(); ?>

Форма входа, либо пользовательское меню.

	<?php here_hosts(); ?>

Количество посетителей за сутки (без ботов).

	<?php here_last_hosts(); ?>

Количество посетителей за вчерашний день (без ботов).

	<?php here_bots(); ?>

Количество ботов за сутки.

	<?php here_hits(); ?>

Количество просмотров страниц сайта за сутки.

	<?php here_all_hits(); ?>

Количество просмотров страниц сайта за всё время.

	<?php here_all_hosts(); ?>

Количество посетителей (без ботов) за всё время.

	<?php here_links(); ?>

Каталог ссылок.

	<?php here_hided_counter_views("ID"); ?>

Счётчик просмотров по идентификатору (не показывает результат, а только меняет значение при каждом посещении страницы).

	<?php here_show_views("ID"); ?>

Показывает результат счётчика просмотров по идентификатору, но не меняет его.

	<?php here_top_news("ID"); ?>

Выводит ссылки на популярные новости из новостного раздела по идентификатору.

	<?php here_mail(); ?>

Выводит форму Обратной связи.

	<?php here_show_downloads("ID"); ?>

Показывает количество загрузок файла из модуля Каталога файлов по идентификатору.

	<?php here_rotator(); ?>

Ротатор баннеров.

	<?php here_record_online(); ?>

Выводит зафиксированный рекорд посетителей, одновременно находившихся на сайте за определенный промежуток времени (по умолчанию, 5 минут).

	<?php here_faq(); ?>

F.A.Q.

	<?php here_question(); ?>

Форма вопроса для F.A.Q.

	<?php here_top_downloads(); ?>

Список наиболее скачиваемых файлов модуля Каталога файлов.

	<?php here_online(); ?>

Посетители, находящиеся на сайте.

	<?php here_messages("ID"); ?>

Выводит одиночный раздел комментирования, где ID - его идентификатор, указанный в параметрах.


### Команды для остальных шаблонов


#### message.html:

Шаблон промежуточных страниц (например, с сообщением "Ваш комментарий успешно добавлен").

	{TITLE}

Заголовок сообщения.

	{MESSAGE}

Сообщение.

	{THEMEPATH}

Полный адрес до каталога выбранной темы оформления, без / на конце.


#### commentform.html:

Шаблон формы ввода комментариев. Далее только самые главные команды.

	{URL}

Путь до обрабатывающего форму скрипта.

	{HIDDENS}

Скрытые поля (input type="hidden"...) с необходимой системной информацией.

	[if_user_entered] [/if_user_entered]

Код, заключённый между этими тегами будет использован только если пользователь или администратор вошёл под своим аккаунтом.

	{SITE}

Адрес сайта без / на конце.

	{NAME_VALUE}

Если пользователь не вошёл под своим аккаунтом, заменяется на value="имя, указанное в GET name", если GET name существует. В противном случае автоматически удаляется. Если же пользователь вошёл под своим аккаунтом, то команда вернёт имя пользователя.

	[if_user_not_entered] [/if_user_not_entered]

Код, заключённый между этими тегами, будет использован только в том случае, если пользователь не вошёл под своим аккаунтом (т.е. он - гость).

	[if_pm_list] [/if_pm_list]

Если выводится список пользователей (для ЛС), то используется код, заключённый между этими тегами.

	[if_pm_input] [/if_pm_input]

Если список пользователей при написании ЛС не выводится, то используется код, заключённый между этими тегами.

	[if_pm] [if_pm]

Код, заключённый между этими тегами, используется только если форма ввода комментария выводится для написания нового ЛС.

	[if_here_mail] [/if_here_mail]

Код, заключённый между этими тегами, используется только если форма ввода комментария выводится для написания сообщения в Обратную связь (here_mail).

	[if_can_smiles] [/if_can_smiles]

Если разрешено использовать смайлы и BB-код, то используется код, заключённый между этими тегами.

	{MAIL_VALUE}

Заменяется на value="e-mail, указанное в GET mail", если GET mail существует. В противном случае автоматически удаляется.

	{THEMES}

Добавляет теги option value... с темами Обратной связи.

	{THEMEPATH}

Полный адрес до каталога выбранной темы оформления, без / на конце.

	{MESSAGE_VALUE}

Заменяется на комментарий, указанный в GET message, если GET message существует. В противном случае автоматически удаляется.

	{SECURITY}

Изображение капчи.

	{FROM}

Системное значение для <input type="hidden" name="from" .. >.

	{MAXMESSAGE}

Максимально разрешённое количество символов в комментарии.


#### newsfullrecord.html:

Шаблон полной (отдельной) новости. Далее только самые главные команды.

	{TITLE}

Заголовок новости.

	{THEMEPATH}

Путь до темы оформления без / на конце.

	{AUTHOR}

Автор.

	{DATE}

Дата публикации.

	{VIEWS}

Количество просмотров.

	{COMMENTFORM}

Форма ввода комментариев.

	{PAGES}

Навигатор страниц комментариев.

	{COMMENTS}

Сами комментарии.

	{DESCRIPTION}

Текст новости.

	{DAY}

День публикации.

	{MONTH}

Месяц публикации.

	{YEAR}

Год публикации.


#### newsrecord.html:

Шаблон краткой новости. Далее только самые главные команды.

	{URL}

Адрес полной новости.

	{THEMEPATH}

Путь до темы оформления без / на конце.

	{TITLE}

Заголовок.

	{CATURL}

Адрес категории.

	{CATEGORY}

Категория.

	{AUTHOR}

Автор.

	{DATE}

Дата публикации.

	{VIEWS}

Количество просмотров.

	{COMURL}

Адрес полной новости с якорем #messbox.

	{COMMENTS}

Количество комментариев.

	[if_oncomments] [/if_oncomments]

Код, заключённый между этими тегами, будет использован только если разрешены комментарии в новости.

	{DESCRIPTION}

Текст новости.

	{DAY}

День публикации.

	{MONTH}

Месяц публикации.

	{YEAR}

Год публикации.


#### other.php, users.php:

Возможные команды указаны в исходном тексте.


Команды плагинов
---------------------------------

### Блоки

Дополнение позволяет использовать на страницах и в шаблонах блоки с различным HTML, JavaScript и PHP кодом.

    <?php here_block("ID"); ?>
    
Выводит блок, где ID - идентификатор созданного блока.


### Extended Comments

Собирает комментарии из нескольких новостей и/или разделов комментариев в одном месте. 
Используется как надстройка одиночных разделов комментариев: также выводит форму ввода комментариев, 
откуда новые комментарии поступают в выбранный одиночный раздел комментариев.

Администрирование осуществляется в админ-центре -> «Другие модули» -> 
«Extended Comments». 

    <?php here_excomments("ID"); ?>

На странице, где необходимо вывести собранные комментарии, используйте эту команду 
и замените ID на идентификатор расширенного раздела.


### Мини-новости

Вывод определённого количества мини-новостей.

Мини-новости могут состоять лишь из одной ссылки с заголовком новостей, а могут и с показом даты публикации, 
количества комментариев и др.

    <?php here_mininews('идентификатор'); ?>

Для вывода на мини-новостей на сайте используйте эту команду, где "идентификатор" замените на идентификатор нужного новостного раздела.

Оформление мини-новостей в настройках дополнения.



### Поиск

Поиск по страницам и новостям сайта, работающего под управлением Ruxe Engine.
Результаты выводятся в соответствии с подсчитанной релевантностью. Поиск производится по словам с 
разным окончанием (например, ищите "темы", а найдутся и "тема", "теме" и т.п.).
Для повышения быстродействия используется поисковый индекс, обновляемый в настройках дополнения или автоматически.
Имеется и защита от чрезмерной нагрузки на сервер - при превышении указанного в опциях максимального времени, 
поиск будет остановлен с выводом найденных результатов.
Закрытые разделы и текст в новостях между BB-кодами [скрыть][/скрыть] [hide][/hide] не индексируются.

    <?php here_results(); ?>
    
    <?php here_shortsearch(); ?>
    
После включения, необходимо обновить поисковый индекс в опциях дополнения. Там же указать страницу сайта, 
на которой разместите команду <?php here_results(); ?>. Эта страница будет использоваться для вывода результатов поиска.
Для вывода маленькой формы поиска (можно разместить на всех страницах сайта, например) используйте команду <?php here_shortsearch(); ?>.
Оформление меняется в файле template.php в соответствии с PHP синтаксисом.



### Голосования

    <? here_votes(); ?>

Дополнение позволит создавать на сайте неограниченное число голосований с неограниченным числом вариантов ответов.
 
Голосования выводятся в случайном порядке.

Оформление в файле template.php.


Статусы пользователей
---------------------------------


### Главный администратор

Присваивается ТОЛЬКО владельцу сайта при установке системы.

- Обладает всеми привилегиями.
- Не действует премодерация и защита от флуда на сайте.
- Нельзя сменить статус главного администратора.
- Нельзя удалить, забанить главного администратора.


### Администратор

Человек, имеющий данный статус, может «присматривать» за сайтом во время отсутствия Главного администратора, а также контролировать работу Модераторов и Редакторов и давать им соответствующие права.

- Обладает практически всеми привилегиями.
- Не действует премодерация и защита от флуда на сайте.
- Не может управлять логами админ-центра.
- Не может удалить, забанить главного администратора.


### Модератор

Обладает расширенными правами Редактора.

Полномочия Модератора регулирует Администратор (в Админ-центре, в разделе «Пользователи» выбрать ник пользователя - Редактировать - Звание - установить «Модератор» и настроить необходимые права) в зависимости от количества доверенных ему новостных разделов и обязанностей. Настройки прав уникальны для каждого модератора.

- Настройка своего профиля, установка аватара.
- Отправка личных сообщений и комментариев без ввода капчи.
- Добавление (с публикацией и без), редактирование и удаление записей в указанных Администратором новостных разделах.
- Управление комментариями к записям новостных разделов (если разрешено).
- Управление модулем «Разделы комментариев» (если разрешено).
- Управление модулем «Гостевая книга» (если разрешено).
- Управление установленными дополнениями (если разрешено).
- Блокировка посетителей по IP-адресу (если разрешено).
- Может просматривать закрытые разделы (страницы) сайта.
- Доступ имеется только в определённые разделы Админ-центра.
- Действуют ограничения, установленные Администратором в соответствии с заданными им правами.


### Редактор

Это Суперпользователь с возможностью управления записями в новостных разделах.

Полномочия Редактора регулирует Администратор (в Админ-центре, в разделе «Пользователи» выбрать ник пользователя - Редактировать - Звание - установить «Редактор» и настроить необходимые права) в зависимости от количества доверенных ему новостных разделов и функций. Настройки прав уникальны для каждого редактора.

- Настройка своего профиля, установка аватара.
- Отправка личных сообщений и комментариев без ввода капчи.
- Добавление (с публикацией и без), редактирование и удаление записей в указанных Администратором новостных разделах.
- Может просматривать закрытые разделы (страницы) сайта.
- Доступ имеется только в определённые разделы Админ-центра.
- Действуют ограничения, установленные Администратором в соответствии с заданными им правами.
- Не может редактировать и удалять чужие новости.

### Суперпользователь

Тот же Пользователь, но имеющий доступ в закрытые разделы (страницы) сайта.

Закрытые разделы создаются Администратором сайта (Админ-центр, раздел «Пользователи» - Закрытые разделы).

- Настройка своего профиля, установка аватара.
- Отправка личных сообщений и комментариев без ввода капчи.
- Просмотр закрытых разделов (страниц) сайта.
- Нет доступа в админ-центр.

### Пользователь

Это обычный зарегистрированный (и активированный) посетитель сайта.

- Настройка своего профиля, установка аватара.
- Отправка личных сообщений и комментариев без ввода капчи.
- Нет доступа в админ-центр.
- Не может просматривать закрытые разделы (страницы) сайта.

### Заблокирован

Это Пользователь, который был забанен Администратором или Модератором с целью блокировки ему доступа к своему профилю и правам из-за выявленных нарушений.

Однако, несмотря на блокировку, он может просматривать сайт в качестве незарегистрированного посетителя (гостя).

- Никаких привелегий.
- Нельзя зайти на сайт под своим логином/паролем и воспользоваться правами.

### Не активирован

Такой статус устанавливается при регистрации нового пользователя при включенной опции «Активация новых пользователей по e-mail». По окончании активации статус меняется на «Пользователь».

- Никаких привелегий.
- Нельзя зайти на сайт под своим логином/паролем и воспользоваться правами.


Установка дополнений
---------------------------------

На данный момент большинство дополнений имеют одинаковую и простую (в этом вы сможете убедится сами, установив, например, дополнение Поиск) схему установки:

1. Скачиваем выбранное дополнение.
2. В архиве с дополнением есть папка, например, search - её загружаем в /includes/plugins/ на сервере.
3. Заходим в Админ-центр - Другие модули.
4. Переходим по ссылке "Настроить".
5. Находим в списке новое дополнение и включаем его.

Всё. В описании, как правило, находится краткая инструкция по использованию дополнения.

**ВАЖНО**: перед удалением дополнения из каталога /includes/plugins/ его необходимо **обязательно** отключить.


Создание собственного дополнения
---------------------------------

При создании дополнения полезным будет использовать Ruxe Engine API.

### 1. Файловая структура дополнения.

Все дополнения располагаются в каталоге /includes/plugins/. Они могут использовать папку /conf/ для хранения своих настроек. Изменять системные файлы запрещается.

    /includes/
        plugins/
            название_дополнения/
                admin.php
                functions.php
                info.dat

В дополнении должны быть как минимум эти три вышеуказанных файла. Можно также размещать и другие, необходимые для правильного функционирования или оформления выводимого результата. Рассмотрим каждый элемент по отдельности.

 Элемент                  | Описание
 ------------------------ | ----------------
 **название_дополнения**  | Имя папки дополнения. Настоятельно рекомендуется использовать только английские буквы и/или цифры. Каждая новая папка - новое дополнение.
 **admin.php**            | В данном файле находится код, который автоматически подключается (через include) в Админ-центре, в разделе "Дополнения". **Примечание:** страница дополнения не будет отображаться до тех пор, пока дополнение не будет включено (Админ-центр => Другие модули => Дополнения => Настроить => название_дополнения => Включить).
 **functions.php**        | Этот файл подключается (через include) после обработки системного файла functions.command.php. В нём находятся команды дополнения.
 **info.dat**             | В этом файле находится справочная информация о дополнении (название, версия, описание, автор, адрес сайта дополнения, параметр использования промежуточных страниц).


###2. Пример содержимого файла admin.php.

```php
<?php
    /*
        То, что пользователь может увидеть на странице дополнения, должно быть в переменной $print. Не следует допускать прямой вывод на страницу.
    */
    $print = "Тут могли бы быть настройки дополнения";
?>
```


###3. Пример содержимого файла functions.php.

```php
<?php
    /*
        Если существует $_GET['action'] при запросе страницы, то система сравнивает с своей базой действий значение $_GET['action'] и, если не находит соответствие, выдаёт ошибку ("Действие не найдено").
Вы можете добавить своё действие. Для этого в info.dat переменная $addaction должна равняться единице ($addaction = 1;). Вашим действием станет имя каталога дополнения (в данном случае example). В действии обязательно должны использоваться переменные $openpage и $pagetitle. $openpage = текст страницы, а $pagetitle - заголовок.
        Пример:
        function here_example()
        {
            echo '<a href="?action=example">Проверка</a>';
        };
        if (isset($_GET['action']))
        {
            if ($_GET['action']=="example")
            {
                $openpage = "Проверка пройдена!";
                $pagetitle = "Сообщение";
            };
        };

        В действии можно включить автоматическую переадресацию. Но в этом случае страница действия не будет отображена, если отключена опция показа промежуточных страниц в админ-центре, а будет сразу переадресация на указанный адрес. Для включения автоматической переадресации необходимо заполнить переменную $pageredirect.
        Пример:

        function here_example()
        {
            echo '<a href="?action=example">Проверка</a>';
        };
        if (isset($_GET['action']))
        {
            if ($_GET['action']=="example")
            {
                $openpage = "Проверка пройдена!";
                $pagetitle = "Сообщение";
                $pageredirect = "http://mysite.domain";
            };
        };
    */
    function here_example()
    {
        echo "Hello World!";
    };
    if (isset($_GET['action']))
    {
        if ($_GET['action']=="example")
        {
            $openpage = "привет";
            $pagetitle = "Тест";
            $pageredirect = "http://ruxe-engine.ru";
        };
    };

    function installExamplePlugin(){
	  // функция автоматически выполнится при активации дополнения
	}

	function uninstallExamplePlugin(){
	  // функция автоматически выполнится при деактивации дополнения
	}

?>
```

Пример содержимого файла info.dat.

```php
<?php
    /*
        Справочная информация о дополнении
        $name - имя Вашего дополнения
        $version - версия
        $description - описание
        $author - имя автора
        $site - адрес сайта дополнения
        $addaction - доступные значения 1 и 0. Включает и отключает соответственно использование промежуточных страниц для дополнения.
        $install - имя функции которая автоматически выполнится при активации дополнения
 		$uninstall - имя функции которая автоматически выполнится при деактивации дополнения
    */
$name = "Тестовый модуль";
$version = "1.0";
$description = "Пример дополнения";
$author = "Ruxe Engine";
$site = "http://ruxe-engine.ru/";
$addaction = 1;

$install - 'installExamplePlugin';
$uninstall - 'uninstallExamplePlugin';
?>
```


Ruxe Engine API
---------------------------------

При создании дополнений для Ruxe Engine будет полезным использовать готовые функции Ruxe Engine.


### $GlobalCache->

	cats('идентификатор новостного раздела')

Обновление кэша категорий указанного новостного раздела.

	tags('идентификатор новостного раздела')

Обновление кэша меток указанного новостного раздела.


### $GlobalUsers->

	checkthisuser()

Проверяет логин и пароль вошедшего (если вошёл) пользователя. Если неверны - обнуляет cookie и перенаправляет на главную страницу сайта.

	fullname(string): string

Возвращает логин пользователя с учётом его регистра, в независимости от подставленного в параметре.

	checklogin(string,bool): bool|string

Проверяет правильность логина (нет ли запрещённых символов и т.п.). Если во втором параметр указано true, то функция вернёт нужные сообщения об ошибке из языкового файла.

	checkpassword(string, string, bool): bool|string

Проверяет правильность пароля и повтора пароля (совпадают ли, нет ли запрещённых символов и т.п.) первый и второй параметры соответственно. Если в третьем параметре указано true, то результат выполнения функции будет сообщение об ошибке из языкового файла (если будет ошибка) или же true.

	pmpath(int): string

Выдаёт путь до файла с ЛС пользователя по идентификатору в параметре.

	isuser(string): bool

Проверяет существует ли пользователь с именем из параметра (чувствительно к регистру!).

	thisisuser(): bool

Проверят логин и пароль активного пользователя.

	finduser(string): int

Ищет идентификатор пользователя string. Если не находит - возвращает -1.

	getpole(string,int): string

Возвращает значение поля (указывается во втором параметре) пользователя (указывается в первом параметре) из users.dat.

	banmessage(string): string

Возвращает причину бана пользователя.

	getstatus(string): string

Возвращает статус (admin, editor, moderator, и др.) пользователя. Если пользователь не найден, то возвращает no.

	getuser(int): string

Возвращает имя пользователя по идентификатору.

	getid(string): int

Возвращает идентификатор пользователя.

	lastid(): int

Возвращает последний зарегистрированный идентификатор пользователей.

	newid();

Увеличивает на единицу счётчик последнего идентификатора пользователей.

	thisusertime(): int

Возвращает время последней активности активного пользователя.


### $GlobalTemplate->

	getonlywords(string): string

Удаляет из строки все знаки.

	template(array,array,string): string

Заменяет значения из массива 1 параметра на значения массива 2 параметра в файле 3 параметра (не изменяя файл) и возвращает полученный результат.

	getsmiles(): array

Возвращает список смайлов.

	usebbcodes(string1,'html'): string

Заменяет BB коды из string1 на HTML реализацию и возвращает полученный результат.


### $GlobalBFG->

	refreshrewrite()

Обновляет .htaccess в соответствии с параметрами ЧПУ.


### $Filtr->

	randwords(int): string

Возвращает случайную комбинацию букв, цифр и знаков длиной, указанной в параметре.

	delendslash(string): string

Удаляет только конечный / (если есть) и возвращает результат.

	clear(string): string

Преобразовывает HTML теги в сущности, а также удаляет другие небезопасные символы и возвращает результат.

	tolat(string): string

Преобразовывает кириллицу в латиницу.

	tolower(string): string

Понижает регистр букв русского и английского алфавита. Возвращает результат.

	utf8_substr(string,int,int): string

Аналог substr, только для UTF-8 кодировки.


### $FileManager->

	makedir(string)

Создание каталога string.

	removedir(string)

Удаление каталога string.

	fsize(string):int

Возвращает размер файла(в параметре путь до файла).

	removefile(string)

Удаление файла string.

	checkfilename(string): bool

Проверка правильности файлового имени.


Разработчики
---------------------------------

- **Ахрамеев Денис Викторович** ([http://ahrameev.ru](http://ahrameev.ru)) - Автор, программирование
- **Александр Wasilich Плотников** ([http://webdesign.ru.net/](http://webdesign.ru.net/)) - Темы оформления
- **Игорь Dr1D** - Логотип, дизайн админ-центра
- **Олег Прохоров** ([htp://ruxe-engine.ru/old/viewprofile/Tanatos](http://ruxe-engine.ru/old/viewprofile/Tanatos)) - Контроль качества, документация


Лицензия
---------------------------------

Это произведение доступно по Open Source лицензии Creative Commons «Attribution-ShareAlike» («Атрибуция — На тех же условиях») 4.0 Всемирная (CC BY-SA 4.0).

Краткий текст лицензионного соглашения: [на русском](http://creativecommons.org/licenses/by-sa/4.0/deed.ru), [на английском](http://creativecommons.org/licenses/by-sa/4.0/deed.en).
