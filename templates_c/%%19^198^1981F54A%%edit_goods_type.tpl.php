<?php /* Smarty version 2.6.26, created on 2014-08-29 14:12:30
         compiled from edit_goods_type.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'edit_goods_type.tpl', 21, false),)), $this); ?>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['goods_type']['id']; ?>
" />
<input type="hidden" name="action" value="edit_goods_type" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="300">
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn"><input type="text" name="name" value="<?php echo $this->_tpl_vars['goods_type']['name']; ?>
" maxlength="80" /></td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn" >Ціна </td>
		<td align="left" class="oddcolumn"><input type="text" name="price" value="<?php echo $this->_tpl_vars['goods_type']['price']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn" >Група </td>
		<td align="left" class="oddcolumn">
			<select name="groupe">
				<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['good_groupe_ids'],'selected' => $this->_tpl_vars['goods_type']['groupe'],'output' => $this->_tpl_vars['good_groupe_values']), $this);?>

			</select>
		
	</tr>
	<tr>
		<td align="right" class="evencolumn" >% бою </td>
		<td align="left" class="oddcolumn"><input type="text" name="smash_percent" value="<?php echo $this->_tpl_vars['goods_type']['smash_percent']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Актуальний </td>
		<td align="left" class="oddcolumn"><input type="checkbox" name="actual" <?php if ($this->_tpl_vars['goods_type']['id'] == 0 || $this->_tpl_vars['goods_type']['actual'] == 1): ?>checked<?php endif; ?> /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" ><?php echo $this->_tpl_vars['goods_type']['comment']; ?>
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