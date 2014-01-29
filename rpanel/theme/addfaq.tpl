<form name="edit" method="post" action="?action=faq">
 <center>
  <table class="optionstable" border=0 cellpadding=1 cellspacing=0>
   <tr class="titletable"><td>ПРАВКА ЗАПИСИ</td></tr>
   <tr><td align=left>
    <input type="hidden" name="change" value="end_change">
    <input type="hidden" name="select" value="{SELECT}">
    <input type="hidden" name="name" value="{ADMIN_LOGIN}">
    <input type="button" onClick="if (document.getElementById('smiles1').style.display=='none'){document.getElementById('smiles1').style.display='block';} else {document.getElementById('smiles1').style.display='none';};"
    value="Смайлы">
<table bgcolor="white" cellpadding=1 cellspacing=0 class="smilestable" id="smiles1" style="position:absolute;display:none;">
<tr><td width=350>
{SMILES1}
</td>
</tr>
</table>
<input type="button" value="ж" style="font-weight:bold" onClick="tag(document.getElementById('short'),'[b]','[/b]');">
     <input type="button" value="к" style="font-style:italic" onClick="tag(document.getElementById('short'),'[i]','[/i]');">
     <input type="button" value="ч" style="text-decoration:underline" onClick="tag(document.getElementById('short'),'[u]','[/u]');">
     <input type="button" value="п" style="text-decoration:line-through" onClick="tag(document.getElementById('short'),'[s]','[/s]');">
     <input type="button" value="&lt;==" onClick="tag(document.getElementById('short'),'[left]','[/left]');">
     <input type="button" value="&lt;=&gt;" onClick="tag(document.getElementById('short'),'[center]','[/center]');">
     <input type="button" value="==&gt;" onClick="tag(document.getElementById('short'),'[right]','[/right]');">
     <input type="button" value="спойлер" onClick="tag(document.getElementById('short'),'[spoiler=Заголовок спойлера]','[/spoiler]');">
     <input type="button" value="скрыть" onClick="tag(document.getElementById('short'),'[hide]','[/hide]');">
   </td></tr><tr><td>Вопрос:<br><textarea id="short" cols=80 rows=10 name="question" class="g">{QUESTION}</textarea></td></tr>
   <tr><td colspan=2 align=left><br>
    <input type="button" onClick="if (document.getElementById('smiles2').style.display=='none'){document.getElementById('smiles2').style.display='block';} else {document.getElementById('smiles2').style.display='none';};"
    value="Смайлы">
<table bgcolor="white" cellpadding=1 cellspacing=0 class="smilestable" id="smiles2" style="position:absolute;display:none;">
<tr><td width=350>
{SMILES2}
</td>
</tr>
</table>
<input type="button" value="ж" style="font-weight:bold" onClick="tag(document.getElementById('full'),'[b]','[/b]');">
     <input type="button" value="к" style="font-style:italic" onClick="tag(document.getElementById('full'),'[i]','[/i]');">
     <input type="button" value="ч" style="text-decoration:underline" onClick="tag(document.getElementById('full'),'[u]','[/u]');">
     <input type="button" value="п" style="text-decoration:line-through" onClick="tag(document.getElementById('full'),'[s]','[/s]');">
     <input type="button" value="&lt;==" onClick="tag(document.getElementById('full'),'[left]','[/left]');">
     <input type="button" value="&lt;=&gt;" onClick="tag(document.getElementById('full'),'[center]','[/center]');">
     <input type="button" value="==&gt;" onClick="tag(document.getElementById('full'),'[right]','[/right]');">
     <input type="button" value="ссылка" onClick="tag(document.getElementById('full'),'[url=',']Описание ссылки[/url]');">
     <input type="button" value="изображение" onClick="tag(document.getElementById('full'),'[img]','[/img]');">
     <input type="button" value="спойлер" onClick="tag(document.getElementById('full'),'[spoiler=Заголовок спойлера]','[/spoiler]');">
     <input type="button" value="скрыть" onClick="tag(document.getElementById('full'),'[hide]','[/hide]');">
   </td></tr><tr><td>Ответ:<br><textarea cols=80 rows=10 id="full" name="answer">{ANSWER}</textarea></td></tr>
   <tr class="sub"><td align="center"><input type="submit" name="submit" value="Сохранить изменения"></td></tr>
  </table>
 </center>
</form>
<br>