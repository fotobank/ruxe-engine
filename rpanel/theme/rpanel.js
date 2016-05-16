function checkcomments_() {
	if (
		(document.getElementById('link_').value!='')
		&&
		(document.getElementById('link_').value!='http://')
	)
		document.getElementById('comments_').checked = false;
	else
		document.getElementById('comments_').checked = true;
}
function addtag() {
	if (document.getElementById('selectags').value!='')
	{
		if (document.getElementById('inputags').value=='')
			document.getElementById('inputags').value+=document.getElementById('selectags').value;
		else
			document.getElementById('inputags').value+=', '+document.getElementById('selectags').value;
		document.getElementById('selectags').remove(document.getElementById('selectags').selectedIndex);
	};
}
function jstr_replace(search, replace, subject) {
	return subject.split(search).join(replace);
} 
function generalwwwredirect() {
	var sitewithout	=	jstr_replace('http://', '', document.getElementById('jsite').value);
    sitewithout = jstr_replace('https://', '', sitewithout);
	if (document.getElementById('jsite').value.indexOf('www.') + 1)
	{ 
		//document.getElementById('jwww').innerHTML = 'Включить переадресацию с адреса, <b>без</b> поддомена www, на адрес <b>с</b> поддоменом www:';
		document.getElementById('jwww').innerHTML = 'Включить переадресацию с <b>' + jstr_replace('www.','',sitewithout) +'</b> на <b>'+ sitewithout + '</b>:';
	} 
	else 
	{ 
		//document.getElementById('jwww').innerHTML = 'Включить переадресацию с адреса, <b>имеющим</b> поддомен www, на адрес <b>без</b> поддомена www:'; 
		document.getElementById('jwww').innerHTML = 'Включить переадресацию с <b>www.' + sitewithout +'</b> на <b>'+ sitewithout + '</b>:';
	};
}
function diuc() {
	if (document.getElementById('statuser').value == 'baned')
	{ 
		document.getElementById('whyban').style.display='inline'; 
	} 
	else
	{ 
		document.getElementById('whyban').style.display='none';
	};
	if (document.getElementById('statuser').value == 'editor')
	{ 
		document.getElementById('display_editor').style.display='inline'; 
	} 
	else
	{ 
		document.getElementById('display_editor').style.display='none';
	};
	if (document.getElementById('statuser').value == 'moderator')
	{ 
		document.getElementById('display_editor').style.display='inline'; 
		document.getElementById('display_moderator').style.display='inline'; 
	} 
	else
	{ 
		document.getElementById('display_moderator').style.display='none';
	};
};

function checkhead() {
	return confirm('Вы уверены? Это действие нельзя будет отменить.');
};

function tag (TXT, startTag, endTag) {
TXT.focus ();
if (document.selection) with (document.selection.createRange ())
   {
   var t = text; text = startTag + text + endTag;
   if (!t.length) moveEnd ('character', endTag.length * (-1)); select ();
   }
else if (TXT.selectionStart >= 0) with (TXT)
   {
   var sT = scrollTop, sL = scrollLeft, t = value,
   stS = selectionStart, leS = selectionEnd - stS,
   w = (startTag + t.substr (stS, leS) + endTag).length;
   value = t.substr (0, stS) + startTag + t.substr (stS, leS) + endTag + t.substr (stS + leS);
   if (leS) 
   {
     selectionStart = stS + w;
     selectionEnd = selectionStart;
   }
   else
   {
     selectionStart = stS + startTag.length;
     selectionEnd = selectionStart;
   };
   scrollTop = sT, scrollLeft = sL;
   }
else TXT.value += startTag + endTag;
};

function showpole(pole)	{
   document.getElementById(pole).style.display='inline';
   document.getElementById(pole+'b').style.display='inline';
   document.getElementById(pole+'c').style.display='block';
};

function showpage(pole)	{
   document.getElementById(pole).style.display='inline';
   document.getElementById(pole+'b').style.display='inline';
   document.getElementById(pole+'c').style.display='block';
};

function delpole(pole)	{
   document.getElementById(pole).style.display='none';
   document.getElementById(pole+'b').style.display='none';
   document.getElementById(pole+'c').style.display='none';
   document.getElementById(pole).value='';
};

function delpage(pole) {
   document.getElementById(pole).style.display='none';
   document.getElementById(pole+'b').style.display='none';
   document.getElementById(pole+'c').style.display='none';
   document.getElementById(pole).value='';
};

function addpole() {
  var found = false;
  var i = 1;
  while (found!=true)
  {
     if (i>7) 
     {
        found=true;
        alert('Нельзя больше создать');
     }
     else
     {
       if (document.getElementById('pole'+i).style.display=='none')
       {
          showpole('pole'+i);
          found = true;
       }
       else
       {
          i++;
       };
     };
  };
};

function addpage() {
  var found = false;
  var i = 0;
  while (found!=true)
  {
     if (i >= 50) {
        found=true;
        alert('Нельзя больше создать');
     }
     else
     {
       if (document.getElementById('page'+i).style.display=='none')
       {
          showpage('page'+i);
          document.getElementById('page'+i).value = document.getElementById('newpage').value;
          found = true;
       }
       else
       {
          i++;
       };
     };
  };
};

function checkpoles() {
 var allpoles;
 var i = 1;
 while (i<8)
 {
    if (document.getElementById('pole'+i).value=='')
    {
      document.getElementById('pole'+i).style.display='none';
      document.getElementById('pole'+i+'b').style.display='none';
      document.getElementById('pole'+i+'c').style.display='none';
    }
    i++;
 };
 
 i = 0;
 while (i < 50) {
    if (document.getElementById('page'+i).value=='')
    {
      document.getElementById('page'+i).style.display='none';
      document.getElementById('page'+i+'b').style.display='none';
      document.getElementById('page'+i+'c').style.display='none';
    }
    i++;
 };
};
