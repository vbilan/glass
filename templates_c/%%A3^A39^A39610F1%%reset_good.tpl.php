<?php /* Smarty version 2.6.26, created on 2014-09-01 15:55:38
         compiled from reset_good.tpl */ ?>
<form action="index.php" method="post">
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['good']['type']; ?>
" />
<input type="hidden" name="total" value="<?php echo $this->_tpl_vars['good']['total']; ?>
" />
<input type="hidden" name="action" value="reset_good" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn"><?php echo $this->_tpl_vars['good']['name']; ?>
 (<?php echo $this->_tpl_vars['good']['total']; ?>
)</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Залишок </td>
		<td align="left" class="oddcolumn"><input type="text" name="square" value="<?php echo $this->_tpl_vars['good']['square']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Списання </td>
		<td align="left" class="oddcolumn"><input type="text" name="amount" value="<?php echo $this->_tpl_vars['good']['amount']; ?>
" maxlength="20" /></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>