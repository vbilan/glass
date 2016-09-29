<?php /* Smarty version 2.6.26, created on 2014-11-27 11:43:09
         compiled from edit_spending.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'edit_spending.tpl', 13, false),)), $this); ?>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['spending']['id']; ?>
" />
<input type="hidden" name="date" value="<?php echo $this->_tpl_vars['spending']['date']; ?>
" />
<input type="hidden" name="action" value="edit_spending" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Тип витрати </td>
		<td align="left" class="oddcolumn">
			<select name="service_type">
				<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['spending_types'],'selected' => $this->_tpl_vars['spending']['service_type'],'output' => $this->_tpl_vars['spending_names']), $this);?>

			</select>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Сума витрати </td>
		<td align="left" class="oddcolumn"><input name="amount" value="<?php echo $this->_tpl_vars['spending']['amount']; ?>
" maxlength="20" /></td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" ><?php echo $this->_tpl_vars['spending']['comment']; ?>
</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>						
	</tr>
</table>
</form>