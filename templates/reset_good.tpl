<form action="index.php" method="post">
<input type="hidden" name="type" value="{$good.type}" />
<input type="hidden" name="total" value="{$good.total}" />
<input type="hidden" name="action" value="reset_good" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn">{$good.name} ({$good.total})</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Залишок </td>
		<td align="left" class="oddcolumn"><input type="text" name="square" value="{$good.square}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Списання </td>
		<td align="left" class="oddcolumn"><input type="text" name="amount" value="{$good.amount}" maxlength="20" /></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>