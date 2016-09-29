<form action="index.php" method="post">
<input type="hidden" name="id" value="{$user.id}" />
<input type="hidden" name="action" value="edit_user" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Користувач </td>
		<td align="left" class="oddcolumn"><input type="text" name="login" value="{$user.login}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Пароль </td>
		<td align="left" class="oddcolumn"><input type="password" name="pass" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Повторіть пароль </td>
		<td align="left" class="oddcolumn"><input type="password" name="password2" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Адміністратор </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="admin" {if $user.admin == 1}checked{/if} /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" {if $user.id==0 || $user.actual == 1}checked{/if} /></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>						
	</tr>
</table>
</form>