<form action="index.php" method="post">
<input type="hidden" name="id" value="{$units_of_measurement.id}" />
<input type="hidden" name="action" value="edit_units_of_measurement" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >������� ����� </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="{$units_of_measurement.name}" maxlength="40" /></td>					
	</tr>
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="��������" /></td>
		<td align="left"><input type="button" value="³����" onclick="history.back();"/></td>					
	</tr>
</table>
</form>