<?php
	$acms['without_get_message']		=	"Не указан параметр";
	$acms['without_get_title']		=	"Ошибка";
	
	$acms['file_exists_title']		=	"Ошибка";
	$acms['file_exists_message']		=	"Указанный вами файл существует";
	$acms['file_exists_back']		=	"?action=manager";
	
	$acms['razdel_specsymbols_title']	=	"Ошибка";
	$acms['razdel_specsymbols_message']	=	"В идентификаторе разрешено использовать только символы латинского алфавита (a-z, A-Z), числа (0-9) и знаки - _";
	$acms['razdel_specsymbols_back']	=	"?action=message&go=add";
	
	$acms['empty_id_title']			=	"Ошибка";
	$acms['empty_id_message']		=	"Не указан идентификатор";
	$acms['empty_id_back']			=	"?action=downloads&go=add&rand=".rand(1,999);
	
	$acms['reguser_error_title']		=	"Пользователь не создан";
	$acms['reguser_error_message']		=	(isset($_GET['errortext'])) ? $_GET['errortext'] : '';
	$acms['reguser_error_back']		=	"?action=users";
	
	$acms['without_submit_title']		=	'Ошибка';
	$acms['without_submit_message']		=	'Нет POST данных';

	$acms['bfg_used_title']			=	'Ошибка';
	$acms['bfg_used_message']		=	'Идентификатор уже используется';
	$acms['bfg_used_back']			=	'?action=bfg&go=new';
	
	$acms['bfg_symbols_title']		=	'Ошибка';
	$acms['bfg_symbols_message']		=	'В идентификаторе можно использовать только буквы латинского алфавита (a-z, A-Z), числа (0-9) и символ -';
	$acms['bfg_symbols_back']		=	'?action=bfg&go=new';
	
	$acms['bfg_length_title']		=	'Ошибка';
	$acms['bfg_length_message']		=	'Длина идентификатора должна быть как минимум 3 символа';
	$acms['bfg_length_back']		=	'?action=bfg&go=new';
