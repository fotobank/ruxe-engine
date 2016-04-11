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
 <textarea name="text" id="code" style="width:99%; height:500px;">
