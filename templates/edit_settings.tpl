<form action="index.php" method="post">
<input type="hidden" name="action" value="edit_settings" />
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}
<table cellpadding="0" cellspacing="0" border="1" width="800">
 
	<tr>
		<td align="right" class="evencolumn" >Поліровка </td>
		<td align="left" class="oddcolumn"><input type="text" name="polish_price" value="{$polish_price}" maxlength="20" /></td>					
		<td align="center" class="evencolumn">Знижки</td>
		<td align="center" class="evencolumn">Фацет</td>
		<td align="center" class="evencolumn">Сверління</td>
	</tr>
	<tr>
		<td align="right" class="evencolumn">Шліфування </td>
		<td align="left" class="oddcolumn"><input type="test" name="grinding_price" value="{$grinding_price}" maxlength="20" /></td>					
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="discounts" >{$discounts}</textarea>
		</td>
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="facet_price" >{$facet_price}</textarea>
		</td>
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="drilling_price" >{$drilling_price}</textarea>
		</td>
	</tr>
	<tr>
		<td align="right" class="evencolumn">Матування </td>
		<td align="left" class="oddcolumn"><input type="type" name="matting_price" value="{$matting_price}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Плівка </td>
		<td align="left" class="oddcolumn"><input type="type" name="skin_price" value="{$skin_price}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Фотодрук </td>
		<td align="left" class="oddcolumn"><input type="type" name="photo_price" value="{$photo_price}" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Кадрант </td>
		<td align="left" class="oddcolumn"><input type="type" name="kadran_price" value="{$kadran_price}" maxlength="20" /></td>					
	</tr>
	
	
	<tr>
		<td align="right" class="evencolumn">Дата початку </td>
		<td align="left" class="oddcolumn">
		<table>
		<tr>
		<td>
		<input type="type" id="begin" name="begin" value="{$begin}" maxlength="10" />
		</td>
		<td>
		<a  href="javascript:NewCssCal('begin','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		</td>
		</tr>
		</table>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Дата кінця </td>
		<td align="left" class="oddcolumn">
		<table>
		<tr>
		<td>
		<input type="type" id="end" name="end" value="{$end}" maxlength="10" />
		</td>
		<td>
		<a href="javascript:NewCssCal('end','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		</td>
		</tr>
		</table>
		</td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="reset" value="Відміна" /></td>						
	</tr>
</table>
</form>