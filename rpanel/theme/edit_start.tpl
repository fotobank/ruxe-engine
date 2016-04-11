<h2>Редактор файлов</h2>
<font class="desc">Редактируемый файл: <b>{FILE}</b></font><br><br>
<center>
    <table class="optionstable" border=0 cellpadding=1 cellspacing=0>
        <tr class="titletable">
            <td>РЕДАКТОР ФАЙЛОВ</td>
        </tr>
        <tr>
            <td>
                <script type="text/javascript">
                    editAreaLoader.init({
                        id: "code"
                        ,
                        syntax: "html"
                        ,
                        start_highlight: true
                        ,
                        language: "ru"
                        ,
                        toolbar: 'fullscreen, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap'
                        ,
                        gecko_spellcheck: false
                        ,
                        allow_toggle: true
                        ,
                        font_family: "{FONTFAMILY}"
                        ,
                        font_size:{FONTSIZE}
                        ,
                        display: "{EDITAREA}"
                        ,
                        word_wrap:{WP}
                    });
                </script>
                <style>
                    #EditAreaArroundInfos_code label {
                        float: none !important;
                    }
                </style>
                <center>
                    <form name="editform"
                          action="saver.php?saverdo=savefile{ADDPARAMS}"
                          method="post">
                        <input type="hidden" name="file" value="{FILE}">
                        {INFORMATION}<br>

                        <!-- start: Кнопки -->

                        <input type="button" value="Ж" style="font-weight:bold" onClick="addToEditor('bold');">
                        <input type="button" value="К" style="font-style:italic" onClick="addToEditor('italic');">
                        <input type="button" value="Ч" style="text-decoration:underline" onClick="addToEditor('underline');">
                        <input type="button" value="Ссылка" onClick="addToEditor('link');">
                        <input type="button" value="Изображение" onClick="addToEditor('image');">
                        <input type="button" value="Счётчик загрузок" onClick="addToEditor('downloadsCounter');">
                        <input type="button" value="Адрес сайта" onClick="addToEditor('siteUrl');">
                        <input type="button" value="Путь до темы оформления" onClick="addToEditor('themeUrl');">

                        <script>
                            function addToEditor(type)
                            {
                                switch (type) {
                                    case "image":
                                        editAreaLoader.insertTags('code', '<img src="', '" border=0 alt="">');
                                        break;
                                    case "link":
                                        editAreaLoader.insertTags('code', '<a href="" target="_blank">', '</a>');
                                        break;
                                    case "downloadsCounter":
                                        editAreaLoader.insertTags('code', '<?php here_show_downloads("', '"); ?>');
                                        break;
                                    case "bold":
                                        editAreaLoader.insertTags('code', '<b>', '</b>');
                                        break;
                                    case "italic":
                                        editAreaLoader.insertTags('code', '<i>', '</i>');
                                        break;
                                    case "underline":
                                        editAreaLoader.insertTags('code', '<u>', '</u>');
                                        break;
                                    case "siteUrl":
                                        editAreaLoader.insertTags('code', '<?php here_urlsite(); ?>', '');
                                        break;
                                    case "themeUrl":
                                        editAreaLoader.insertTags('code', '<?php here_themepath(); ?>', '');
                                        break;
                                }
                            }
                        </script>

                        <!-- end: Кнопки -->
 <textarea name="text" id="code" style="width:99%; height:500px;">
