{SCRIPTS}
<form name="post" method="post" action="{PATH}">
	<center>
		<table class="optionstable2" border=0 cellpadding=1 cellspacing=0>
			<tr class="titletable"><td>{TITLETABLE}</td></tr>
			<tr><td style="border-bottom: 0px;">
				Заголовок:<br>
				<input type="text" name="title" value="{TITLE}" style="width:350px;">
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				<a name="categ"></a>Категория:<br>
				<select id="ns" name="category" class="g">
					{LISTCATEGORY}
				</select> <input style="display: none; width:350px;" type="text" id="nc" name="newcategory" value=""> <a href="#categ" id="nl" onClick="document.getElementById('ns').style.display='none'; document.getElementById('nl').style.display='none'; document.getElementById('nc').style.display='inline';">Создать новую</a>
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Краткая запись{ADD1}:{ADD3}{ADD2}
				<table cellpadding=0 cellspacing=0>
					<tr><td style="border:none;">
						{BUTTONS1}
						<textarea id="short" name="text" style="width:925px; height: 300px;" class="g">{TEXT}</textarea>
					</td></tr>
				</table>
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Полная запись{ADD1}:{ADD4}{ADD2}
				<table cellpadding=0 cellspacing=0>
					<tr><td style="border:none;">
						{BUTTONS2}
						<textarea id="full" name="textplus" style="width:925px; height: 500px;" class="g">{TEXTPLUS}</textarea>
					</td></tr>
				</table>
			</td></tr>
			<tr><td style="border-bottom: 0px; border-top: 1px solid silver;">
				{BRS}
				<input type="checkbox" name="tire" value="yes"> Использовать умную замену дефиса - на тире —<br>
				<br>
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Если Вы хотите использовать в качестве ссылки на полную новость адрес другого сайта, то заполните поле ниже:<br>
				<input type="text" id="link_" onKeyUp="checkcomments_();" maxlength=255 name="link" value="{LINK}" style="width:925px;">
				{HIDDENS}
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Ключевые слова: <br>
				<input type="text" maxlength=200 name="keys" value="{KEYS}" style="width:925px;">
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Метки (через запятую): <br>
				<select id="selectags" name="t">{TAGSLIST}</select><input type="button" onClick="addtag();" name="t2" value="Добавить"> &gt; <input type="text" maxlength=150 name="tegs" id="inputags" value="{TEGS}" style="width:525px;">
			</td></tr>
			<tr><td style="border-bottom: 0px;">
				Описание (для &lt;meta name="description"...): <br>
				<input type="text" maxlength=255 name="description" value="{DESCRIPTION}" style="width:925px;">
			</td></tr>
			<tr class="sub"><td>
				<INPUT TYPE="checkbox" {POST_PUBLIC} NAME="post_public" VALUE="yes"> Опубликовать
				{ADD5}
				<INPUT id="comments_" TYPE="checkbox" {COMMENTS_} NAME="comments_" VALUE="yes"> Разрешить комментарии
				<input type="checkbox" {UPPED} name="upped" value="yes"> Закрепить сверху<br>
				<br>
				<input type="submit" name="submit" value="{SUBMIT}" class="g">
			</td></tr>
		</table>
	</center>
</form>
<br>