<form action="index.php" method="post">
<input type="hidden" name="id" value="{$client.id}" />
<input type="hidden" name="action" value="edit_client" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Клієнт </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="{$client.name}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Телефон </td>
		<td align="left" class="oddcolumn"><input type="phone" name="phone" value="{$client.phone}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" {if $client.id==0 || $client.actual == 1}checked{/if} /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$client.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>						
	</tr>
</table>
</form>