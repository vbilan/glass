<?php /* Smarty version 2.6.26, created on 2014-09-05 11:34:54
         compiled from edit_user.tpl */ ?>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['user']['id']; ?>
" />
<input type="hidden" name="action" value="edit_user" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >���������� </td>
		<td align="left" class="oddcolumn"><input type="text" name="login" value="<?php echo $this->_tpl_vars['user']['login']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">������ </td>
		<td align="left" class="oddcolumn"><input type="password" name="pass" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">�������� ������ </td>
		<td align="left" class="oddcolumn"><input type="password" name="password2" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">����������� </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="admin" <?php if ($this->_tpl_vars['user']['admin'] == 1): ?>checked<?php endif; ?> /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> ���������� </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" <?php if ($this->_tpl_vars['user']['id'] == 0 || $this->_tpl_vars['user']['actual'] == 1): ?>checked<?php endif; ?> /></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="��������" /></td>
		<td align="left"><input type="button" value="³����" onclick="history.back();"/></td>						
	</tr>
</table>
</form>