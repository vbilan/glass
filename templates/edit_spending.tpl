<form action="index.php" method="post">
<input type="hidden" name="id" value="{$spending.id}" />
<input type="hidden" name="date" value="{$spending.date}" />
<input type="hidden" name="action" value="edit_spending" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Тип витрати </td>
		<td align="left" class="oddcolumn">
			<select name="service_type">
				{html_options values=$spending_types selected=$spending.service_type output=$spending_names}
			</select>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Сума витрати </td>
		<td align="left" class="oddcolumn"><input name="amount" value="{$spending.amount}" maxlength="20" /></td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$spending.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>						
	</tr>
</table>
</form>