<?php /* Smarty version 2.6.26, created on 2014-08-29 11:14:07
         compiled from spending_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'spending_list.tpl', 38, false),)), $this); ?>
<table width="100%" >
<tr>
	<td  align="left">
		<a href="index.php?action=edit_spending">Додати</a>
	</td>
	<td align="right">
		<form action="<?php echo $this->_tpl_vars['url']; ?>
" method="get">
			<label> Фільтр : </label>
			<input type="hidden" name="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
			<input type="text" name="<?php echo $this->_tpl_vars['class']; ?>
filter" value="<?php echo $this->_tpl_vars['filter_value']; ?>
" maxlength="20" />
			<input type="submit" name="sabmFilter" value="&nbsp;ok&nbsp;" />
			<input type="submit" name="clearFilter" value="&nbsp;clear&nbsp;" onclick="this.form.elements['<?php echo $this->_tpl_vars['class']; ?>
filter'].value='';">
		</form>

	</td>
</tr>


<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				<?php $_from = $this->_tpl_vars['colums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<th width="300" class="tableheader">
					<a href="<?php echo $this->_tpl_vars['url']; ?>
&amp;<?php echo $this->_tpl_vars['class']; ?>
order=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']['title']; ?>
</a>
				</th>
				<?php endforeach; endif; unset($_from); ?>
				<th class="tableheader">
					Редагувати
				</th>
			</tr>
			
			
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
			<tr>
				<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
				<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['amount']; ?>
&nbsp;Грн.</td>
				<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
&nbsp;</td>
				<td align="center" class="oddcolumn">
					<a href="index.php?action=edit_spending&id=<?php echo $this->_tpl_vars['row']['id']; ?>
">Редагувати</a>
					<br />
					<a href="index.php?action=edit_spending&id=<?php echo $this->_tpl_vars['row']['id']; ?>
&delete"  onclick="return confirm('Ви дійсно бажаєти видалити цей запис?');">Видалити</a>
				
				</td>					
			</tr>
			<?php endforeach; endif; unset($_from); ?>
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'><?php echo $this->_tpl_vars['scroller']; ?>
</td>
</tr>
</table>