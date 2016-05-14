<?php


$print = "";
$content = " <!-- Galery -->
       <script src=\"../assets/plugins/gallery/jquery-2.1.3.min.js\"></script>
       <script src=\"../assets/plugins/gallery/jquery-ui.min.js\"></script>
       <script src=\"../assets/plugins/gallery/gallery.js\"></script>
       <script src=\"../assets/plugins/gallery/jquery.uploadifive.min.js\"></script>
       <script src=\"../assets/plugins/gallery/sweetalert.min.js\"></script>
       <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/plugins/gallery/style.css\">
       <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/plugins/gallery/sweetalert.css\">
       <script>
       var pluginAdminUrl = '" . $gallery['pluginAdminUrl'] . "';
       </script>
   <!-- end Gallery -->";

// список альбомов
if (isset($_GET['method']) && $_GET['method'] == 'album_list') {
    $content .= '<h3 class="album-view-title"><i class="fa fa-folder-open-o"></i> Альбомы</h3>
                 <div class="album_list">';

    foreach (file($gallery['dbAlbums']) as $lines) {
        $line = explode('||', $lines);

        // get cover
        $cover = getCoverAlbum($line[0]);

        $content .= '<div id="galleryAlbum" title="Открыть альбом - ' . $line[1] . '" class="album-wrap" data-album="' . $line[0] . '" data-count="' . $line[4] . '">
                        <div class="alb-name alb-c">
                            <a href="' . $gallery['pluginAdminUrl'] . '&method=album_view&id=' . $line[0] . '">' . $line[1] . '</a>
                        </div>
                        <a title="Редактировать название и описание альбома" class="edit-img alb-c" onclick="javascript:editAlbum(' . $line[0] . ',\'' . $line[1] . '\',\'' . $line[2] . '\');"><i class="fa fa-pencil"></i></a>
                        <a href="' . $gallery['pluginAdminUrl'] . '&method=album_view&id=' . $line[0] . '"><img src="' . $cover . '"></a>
                        <a class="del-album alb-c" href="#" onClick="javascript:deleteAlbum(' . $line[0] . ');"><i class="fa fa-times"></i></a>     
                    </div>';
    }

    $content .= '</div>';
}

// добавить альбом
if (isset($_GET['method']) && $_GET['method'] == 'album_list') {
    $content .= "";
}

// просмотр альбома
if (isset($_GET['method']) && $_GET['method'] == 'album_view' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $content .= '<h3 class="album-view-title"><a href="' . $gallery['pluginAdminUrl'] . '&method=album_list">Альбомы</a> Альбом "' . getGalleryRow($id, 1) . '"</h3>
                <div class="album-add-init">Добавить изображения</div>
                <div class="album-ph-list">
                    <div class="alb-droppable"></div>';

    foreach (file($gallery['dbPhotos']) as $lines) {
        $ph = explode('||', $lines);
        if ($id == $ph[1]) {
            $content .= '<div class="album-wrap album-view" data-photo="' . $ph[0] . '" data-album="' . $id . '">
                            <div class="alb-name alb-c">' . $ph[2] . '</div>
                            <a title="Редактировать название и описание изображения" class="edit-img alb-c" onclick="javascript:editPhoto(' . $ph[0] . ',\'' . $ph[2] . '\',\'' . $ph[3] . '\');"><i class="fa fa-pencil"></i></a>
                            <img src="' . $gallery['cmsSite'] . '/uploads/gallery/thumbs/' . $ph[0] . '.jpg">
                            <a title="Удалить изображение" class="del-album alb-c" onClick="javascript:deletePhoto(' . $ph[0] . ', ' . $id . ');"><i class="fa fa-times"></i></a>
                        </div>';
        }
    }

    $content .= "</div>
        <script>
            $(function() {
                $('.album-add-init').uploadifive({
                    'uploadScript' : '" . $gallery['cmsSite'] . "/?gallery=addPhoto&album=" . $id . "',
                    'buttonClass'  : 'btnAddFile',
                    'buttonText'   : 'Добавить фотографии',
                    'width'        : '190px', 
                    'fileObjName'  : 'photo',
                    'onUploadComplete' : addPhoto
                });
            });
        </script>";
}

// создать альбом
if (isset($_GET['method']) && $_GET['method'] == 'album_add') {
    $content .= '<h3 class="album-view-title"><i class="fa fa-plus-circle"></i> Добавить новый альбом</h3>
                <form class="ruxeGallery-form" id="addAlbum">
                    <div class="form-label">Название альбома</div>
                    <input id="album-name-inp" type="text" name="title" placeholder="Введите название альбома..." autofocus>
                    <div class="form-label">Описание альбома</div>
                    <textarea id="album-desc-text" name="description" placeholder="Опишите альбом. Максимум 70 символов..."></textarea>
                    <button class="ruxeGallery-form-button" type="submit"><i class="fa fa-plus-circle"></i> Добавить альбом</button>
                </form>
                <script>$("ul.ruxeGallery-nav li a").removeClass("active-li");$("#add-album-li a").addClass("active-li");</script>';
}

// настройки
if (isset($_GET['method']) && $_GET['method'] == 'conf') {
    $config = json_decode(file_get_contents($gallery['configPath']), true);
    $content .= '<h3 class="album-view-title"><i class="fa fa fa-cogs"></i> Настройки галереи</h3>
                <form class="ruxeGallery-form" id="galleryConfig">
                <br><label for="viewAS"><b>Старт блока вида альбомов</b></label><br>
                <textarea id="viewAS">'.$config['view']['albums']['start'].'</textarea>
                <label for="viewAC"><b>Блок вида альбомов, фото</b></label><br>
                <pre>{ALBUM_URL} - url адрес
{ALBUM_IMG_SMALL} - url миниатюры
{ALBUM_DESCRIPTION} - описания альбома
{ALBUM_TITLE} - названия альбома
                </pre>
                <textarea id="viewAC">'.$config['view']['albums']['content'].'</textarea>
                <label for="viewAE"><b>Конец блока вида альбомов</b></label><br>
                <textarea id="viewAE">'.$config['view']['albums']['end'].'</textarea>

                <label for="viewPS"><b>Старт блока вида открытого фльбома (фото)</b></label><br>
                <pre>{ALBUM_TITLE} - Названия альбома</pre>
                <textarea id="viewPS">'.$config['view']['photos']['start'].'</textarea>

                <label for="viewPC"><b>Блок вида фото</b></label><br>
                <pre>{PHOTO_TITLE} - названия фото
{PHOTO_URL_BIG} - url адрес оригинала
{PHOTO_URL_SMALL} - url адрес миниатюры
{PHOTO_DESCRIPTION} - описания фото</pre>
                <textarea id="viewPC">'.$config['view']['photos']['content'].'</textarea>

                <label for="viewPE"><b>Конец блока вида открытого альбома</b></label><br>
                <textarea id="viewPE">'.$config['view']['photos']['end'].'</textarea>

                <input value="Сохранить настройки" type="submit">
                </form>
                <script>$("ul.ruxeGallery-nav li a").removeClass("active-li");$("#options-album-li a").addClass("active-li");</script>';
}

// Сам скилет
$print = '<div class="ruxeGallery"> 
            <table class="galleryTable">
			    <tr>
			        <td>
			            <ul class="ruxeGallery-nav">
				            <li id="albums-li">
                                <a title="Все альбомы в фотогалереи" class="active-li" href="' . $gallery['pluginAdminUrl'] . '&method=album_list"><i class="fa fa-folder-open-o"></i> Альбомы</a>
                            </li>
                            <li id="add-album-li">
                                <a title="Добавить новый альбом в фотогалерею" href="' . $gallery['pluginAdminUrl'] . '&method=album_add"><i class="fa fa-plus-circle"></i> Добавить альбом</a>
                            </li>
                            <li id="options-album-li">
                                <a title="Настройки галереи" href="' . $gallery['pluginAdminUrl'] . '&method=conf"><i class="fa fa fa-cogs"></i> Настройки</a>
                            </li>
				        </ul>
			        </td>
			    </tr>
			</table>
            <div class="ruxeGallery-content">
            ' . $content . '
            </div>
        </div>';
