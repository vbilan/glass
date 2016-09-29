<?php /* Smarty version 2.6.26, created on 2016-08-31 11:07:15
         compiled from edit_units_of_measurement.tpl */ ?>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['units_of_measurement']['id']; ?>
" />
<input type="hidden" name="action" value="edit_units_of_measurement" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Одиниця виміру </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="<?php echo $this->_tpl_vars['units_of_measurement']['name']; ?>
" maxlength="40" /></td>					
	</tr>
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>