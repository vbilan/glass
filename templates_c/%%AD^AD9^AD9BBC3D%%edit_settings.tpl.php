<?php /* Smarty version 2.6.26, created on 2014-09-05 11:34:20
         compiled from edit_settings.tpl */ ?>
<form action="index.php" method="post">
<input type="hidden" name="action" value="edit_settings" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="800">
 
	<tr>
		<td align="right" class="evencolumn" >Поліровка </td>
		<td align="left" class="oddcolumn"><input type="text" name="polish_price" value="<?php echo $this->_tpl_vars['polish_price']; ?>
" maxlength="20" /></td>					
		<td align="center" class="evencolumn">Знижки</td>
		<td align="center" class="evencolumn">Фацет</td>
		<td align="center" class="evencolumn">Сверління</td>
	</tr>
	<tr>
		<td align="right" class="evencolumn">Шліфування </td>
		<td align="left" class="oddcolumn"><input type="test" name="grinding_price" value="<?php echo $this->_tpl_vars['grinding_price']; ?>
" maxlength="20" /></td>					
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="discounts" ><?php echo $this->_tpl_vars['discounts']; ?>
</textarea>
		</td>
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="facet_price" ><?php echo $this->_tpl_vars['facet_price']; ?>
</textarea>
		</td>
		<td rowspan="7" align="center" class="oddcolumn">
			<textarea rows="9" cols="10" name="drilling_price" ><?php echo $this->_tpl_vars['drilling_price']; ?>
</textarea>
		</td>
	</tr>
	<tr>
		<td align="right" class="evencolumn">Матування </td>
		<td align="left" class="oddcolumn"><input type="type" name="matting_price" value="<?php echo $this->_tpl_vars['matting_price']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Плівка </td>
		<td align="left" class="oddcolumn"><input type="type" name="skin_price" value="<?php echo $this->_tpl_vars['skin_price']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Фотодрук </td>
		<td align="left" class="oddcolumn"><input type="type" name="photo_price" value="<?php echo $this->_tpl_vars['photo_price']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Кадрант </td>
		<td align="left" class="oddcolumn"><input type="type" name="kadran_price" value="<?php echo $this->_tpl_vars['kadran_price']; ?>
" maxlength="20" /></td>					
	</tr>
	
	
	<tr>
		<td align="right" class="evencolumn">Дата початку </td>
		<td align="left" class="oddcolumn">
		<table>
		<tr>
		<td>
		<input type="type" id="begin" name="begin" value="<?php echo $this->_tpl_vars['begin']; ?>
" maxlength="10" />
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
		<input type="type" id="end" name="end" value="<?php echo $this->_tpl_vars['end']; ?>
" maxlength="10" />
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