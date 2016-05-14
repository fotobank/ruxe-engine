/**
 * Инстализация Drag&Drop
 */
var photoIdDrop = 0;
var albumOldIdDrop = 0;

/**
 * fix thmb картинок
 */
function convertPhotoImages() {
    $('.album-view img, .album-wrap a img').each(function (i, item) {
        // Альбомы
        if ($(item).parent('a').parent('div').attr('id') == 'galleryAlbum') {
            var div = $(item).parent('a').parent('div');

            $(div).append('<div class="view_background_fix"></div>');

            $(div).find('.view_background_fix').css({
                'background-image': 'url(' + $(item).attr('src') + ')',
                'background-size': 'cover',
                'width': '100%',
                'height': '100%',
            });

            $(div).find('.view_background_fix').css({
                'cursor': 'pointer'
            }).click(function () {
                document.location.href = $(item).parent('a').attr('href');
            });
        }
        // Фото
        else {
            var div = $(item).parent('div');

            $(div).css({
                'background-image': 'url(' + $(item).attr('src') + ')',
                'background-size': 'cover',
                'cursor': 'move'
            });
        }
    });
}

/**
 * Инстализация Drag&Drop
 */
function initDragDrop() {
    $('.album-view').draggable({
        helper: 'clone',
        opacity: 0.3,
        start: function () {
            getAlbum(function () {
                $(".alb-droppable div").droppable({
                    drop: function (event, ui) {
                        var albumIdDrop = $(this).attr('data-album');
                        swal({
                            title: "Вы уверены?",
                            text: "Переместить фото в другой альбом?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Да!",
                            cancelButtonText: "Нет",
                            closeOnConfirm: false
                        }, function () {
                            movePhotoInAlbum(photoIdDrop, albumIdDrop, albumOldIdDrop);
                            swal("Успешно!", "Фото успешно размещено в другой альбом", "success");
                        });
                    },
                });
            });
        },
        stop: function () {
            $('.alb-droppable').html(' ');
        }
    });
}

/**
 * Переместить фото в другой альбом
 */
function movePhotoInAlbum(photo, album, oldAlbum) {
    if (!photo || !album || !oldAlbum)
        return;

    var queryUrl = '../?gallery=movePhotoInAlbum';
    var query = 'photo=' + photo + '&album=' + album + '&oldAlbum=' + oldAlbum;

    $.post(queryUrl, query, function (data) {
        if (data.result == true) {
            $('.album-view[data-photo=' + photo + ']').remove();
            return;
        } else {
            sweetAlert("Ошибка...", "Не удалось переместить фотографию!", "error");
        }
    });
}

/**
 * Добавить фотографию
 */
function addPhoto(file, e) {
    e = JSON.parse(e);

    if (e.result == true) {
        var html = "<div class=\"album-wrap album-view\" data-photo=\"" + e.id + "\">"
            + "<a title=\"Редактировать название и описание изображения\" class=\"edit-img alb-c\" onclick=\"javascript:editPhoto(" + e.id + ", '', '');\"><i class=\"fa fa-pencil\"></i></a>"
            + "<img src=\"" + e.thumb + "\">"
            + "<a title=\"Удалить изображение\" class=\"del-album alb-c\" onclick=\"javascript:deletePhoto(" + e.id + ", " + e.album + ");\"><i class=\"fa fa-times\"></i></a>"
            + "</div>";

        $('.album-ph-list').append(html);
        initDragDrop();
        convertPhotoImages();
    }
}

/**
 * Удалить фото
 */
function deletePhoto(photo, album) {
    var queryUrl = '../?gallery=delPhoto&photo=' + photo + '&album=' + album;
    swal({
        title: "Вы уверены?",
        text: "Вы точно хотите удалить фото",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Нет",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Да, удалить!",
        closeOnConfirm: false
    }, function () {
        $.get(queryUrl, function (data) {
            if (data.result == true) {
                $('.album-view[data-photo=' + photo + ']').remove();
            } else {
                sweetAlert("Ошибка...", "Не удалось удалить фотографию!", "error");
            }
            swal('Фото успешно удалено');
        });
    });
}

/**
 * Изменить фото
 */
function editPhoto(photo, oldTitle, oldDesc) {
    photo = photo || 0;
    oldTitle = oldTitle || '';
    oldDesc = oldDesc || '';

    swal({
        title: "Название фото",
        text: "Придумайте названия фотографии:",
        type: "input",
        showCancelButton: true,
        inputValue: oldTitle,
        cancelButtonText: "Отмена",
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Название"
    }, function (newTitle) {
        newTitle = newTitle || '';
        swal({
            title: "Описание фото",
            text: "Придумайте Описание фотографии:",
            type: "input",
            showCancelButton: true,
            inputValue: oldDesc,
            cancelButtonText: "Отмена",
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Описание"
        }, function (newDesc) {
            newDesc = newDesc || '';
            var queryUrl = '../?gallery=editPhoto';
            var query = 'photo=' + photo + '&title=' + newTitle + '&description=' + newDesc;

            $.post(queryUrl, query, function (data) {
                if (data.result == true) {
                    $('.album-view[data-photo=' + photo + '] div.alb-name').text(newTitle);
                    swal('Фото успешно изменено');
                } else {
                    sweetAlert("Ошибка...", "Не удалось изменить фотографию!", "error");
                }
            });
        });
    });
}

/**
 * Добавить альбом
 */
function addAlbum(title, description) {
    var title = title || prompt("Название альбома", '');
    var description = description || prompt("Описание альбома", '');

    var queryUrl = '../?gallery=addAlbum';
    var query = 'title=' + title + '&description=' + description;

    if (title == '') {
        sweetAlert("Ошибка...", "Некорректное имя альбома!", "error");
        return;
    }

    $.post(queryUrl, query, function (data) {
        if (data.result == true) {
            window.location.href = pluginAdminUrl + '&method=album_view&id=' + data.id;
        } else {
            sweetAlert("Ошибка...", "Не удалось создать альбом!", "error");
        }
    });
}

/**
 * Удалить альбом
 */
function deleteAlbum(album) {
    album = album || 0;
    albumEl = $('.album-wrap[data-album=' + album + ']');
    albumTl = albumEl.find('.alb-name a').text();
    albumCp = parseInt(albumEl.attr('data-count'), 10);

    var queryUrl = '../?gallery=deleteAlbum&album=' + album;

    swal({
        title: "Вы уверены?",
        text: 'Вы точно хотите удалить альбом «' + albumTl + '» и все его (' + albumCp + ') фотографии? \n\n Восстановить информацию будет невозможно!',
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Нет",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Да, удалить!",
        closeOnConfirm: false
    }, function () {
        $.get(queryUrl, function (data) {
            if (data.result == true) {
                albumEl.remove();
                swal('Альбом успешно удален');
            } else {
                sweetAlert("Ошибка...", "Не удалось удалить альбом!", "error");
            }
        });
    });
}

/**
 * Изменить альбом (drag & drop)
 */
function editAlbum(album, oldTitle, oldDesc) {
    album = album || 0;
    oldTitle = oldTitle || '';
    oldDesc = oldDesc || '';

    swal({
        title: "Название альбома",
        text: "Придумайте названия альбома:",
        type: "input",
        showCancelButton: true,
        inputValue: oldTitle,
        cancelButtonText: "Отмена",
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Название",
        closeOnConfirm: false
    }, function (newTitle) {
        newTitle = newTitle || '';
        swal({
            title: "Описание альбома",
            text: "Придумайте Описание альбома:",
            type: "input",
            showCancelButton: true,
            inputValue: oldDesc,
            cancelButtonText: "Отмена",
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Описание",
            closeOnConfirm: false
        }, function (newDesc) {
            newDesc = newDesc || '';

            var queryUrl = '../?gallery=editAlbum';
            var query = 'album=' + album + '&title=' + newTitle + '&description=' + newDesc;

            $.post(queryUrl, query, function (data) {
                if (data.result == true) {
                    $('.album-wrap[data-album=' + album + ']').find('.alb-name a').text(newTitle);
                    swal('Альбом успешно изменен');
                } else {
                    sweetAlert("Ошибка...", "Не удалось изменить альбом!", "error");
                }
            });

        });
    });


}

/**
 * Получить список всех альбомов
 */
function getAlbum(cb) {
    var queryUrl = '../?gallery=getAlbum';
    var html = '';
    $('.alb-droppable').html(' ');
    $.get(queryUrl, function (data) {
        $.each(data, function (i, item) {
            html = html + '<div data-album="' + item.id + '">' + item.title + '</div>';

        });
        $('.alb-droppable').append(html);
        cb();
    });
}

function saveConfig() {
    var queryUrl = '../?gallery=saveConfig';
    var query = 'viewAS=' + $('#viewAS').val() + '&viewAC=' + $('#viewAC').val() + '&viewAE=' + $('#viewAE').val() + '&viewPS=' + $('#viewPS').val() + '&viewPC=' + $('#viewPC').val() + '&viewPE=' + $('#viewPE').val();

    $.post(queryUrl, query, function (data) {
        if (data.result == true) {
            sweetAlert("Настройки сохранены");
        } else {
            sweetAlert("Ошибка...", "Не удалось сохранить настройки", "error");
        }
    });
}


$(function () {
    $('.album-view').hover(function () {
        photoIdDrop = $(this).attr('data-photo');
        albumOldIdDrop = $(this).attr('data-album');
    });

    initDragDrop();
    convertPhotoImages();

    // Форма создание альбома
    $('form#addAlbum').submit(function (e) {
        e.preventDefault();

        var title = $(this).find('#album-name-inp').val();
        var description = $(this).find('#album-desc-text').val();

        addAlbum(title, description);
    });

    $('form#galleryConfig').submit(function (e) {
        e.preventDefault();
        saveConfig();
    });
});