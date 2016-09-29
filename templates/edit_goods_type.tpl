<form action="index.php" method="post">
<input type="hidden" name="id" value="{$goods_type.id}" />
<input type="hidden" name="action" value="edit_goods_type" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="{$goods_type.name}" maxlength="80" /></td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn" >Ціна </td>
		<td align="left" class="oddcolumn"><input type="text" name="price" value="{$goods_type.price}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn" >Група </td>
		<td align="left" class="oddcolumn">
			<select name="groupe">
				{html_options values=$good_groupe_ids selected=$goods_type.groupe output=$good_groupe_values}
			</select>
		
	</tr>
	<tr>
		<td align="right" class="evencolumn" >% бою </td>
		<td align="left" class="oddcolumn"><input type="text" name="smash_percent" value="{$goods_type.smash_percent}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" {if $goods_type.id==0 || $goods_type.actual == 1}checked{/if} /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$goods_type.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>