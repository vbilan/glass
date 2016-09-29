{literal}
<script  type="text/javascript"  charset="windows-1251">

	req = false;
    try { 
        req = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            req=new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e) {
            if(window.XMLHttpRequest){ 
               req = new XMLHttpRequest();
            }
        }
    }

function callServer(select) {

  	var url = "options.php?id=" + select.value;
  	req.open("GET", url, true);

  	req.onreadystatechange = updatePage;

  	req.send(null);
  	
}

function updatePage() {
    if (req.readyState == 4){
        if (req.status == 200) {
        if (req.responseText.length>5) 
             document.getElementById('types').innerHTML = req.responseText;
        } else {
            alert("error "+ req.status+":\n" + req.statusText);
        }
        
    }
}
</script>
{/literal}

<form action="index.php" method="post">
<input type="hidden" name="id" value="{$good.id}" />
<input type="hidden" name="date" value="{$good.date}" />
<input type="hidden" name="action" value="edit_good" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="400">
	<tr>
		<td align="right" class="evencolumn" >Група товарів</td>
		<td align="left" class="oddcolumn">
			<select name="groupe" onchange='callServer(this);'>
				{html_options values=$good_groupe_ids selected=$groupe output=$good_groupe_values}
			</select>
	</tr>
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn">
			<select id="types" name="type">
				{html_options values=$good_type_ids selected=$good.type output=$good_type_values}
			</select>
		</td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn"> Площа </td>
		<td align="left" class="oddcolumn"><input type="text" name="square" value="{$good.square}" maxlength="20" />{$unit_of_measurement}</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Ціна закупки </td>
		<td align="left" class="oddcolumn"><input type="text" name="buying_price" value="{$good.buying_price}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$good.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>