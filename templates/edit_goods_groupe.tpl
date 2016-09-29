<form action="index.php" method="post">
<input type="hidden" name="id" value="{$goods_groupe.id}" />
<input type="hidden" name="action" value="edit_goods_groupe" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="{$goods_groupe.name}" maxlength="40" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" {if $goods_groupe.id==0 || $goods_groupe.actual == 1}checked{/if} /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn" >Вимір</td>
		<td align="left" class="oddcolumn">
			<select name="unit_of_measurement_id">
				{html_options values=$units_of_measurement_ids selected=$goods_groupe.unit_of_measurement_id output=$units_of_measurement_values}
			</select>
		
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$goods_groupe.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>