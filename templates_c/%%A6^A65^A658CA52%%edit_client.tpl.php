<?php /* Smarty version 2.6.26, created on 2014-09-02 09:20:00
         compiled from edit_client.tpl */ ?>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['client']['id']; ?>
" />
<input type="hidden" name="action" value="edit_client" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Клієнт </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="<?php echo $this->_tpl_vars['client']['name']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Телефон </td>
		<td align="left" class="oddcolumn"><input type="phone" name="phone" value="<?php echo $this->_tpl_vars['client']['phone']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" <?php if ($this->_tpl_vars['client']['id'] == 0 || $this->_tpl_vars['client']['actual'] == 1): ?>checked<?php endif; ?> /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" ><?php echo $this->_tpl_vars['client']['comment']; ?>
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