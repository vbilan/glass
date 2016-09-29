<?php /* Smarty version 2.6.26, created on 2016-09-05 17:20:19
         compiled from goods_groupes_list.tpl */ ?>
<table width="100%" >
<tr>
	<td  align="left">
		<a href="index.php?action=edit_goods_groupe">Додати</a>
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
				<td align="center" class="oddcolumn"><?php if ($this->_tpl_vars['row']['actual'] == 1): ?>так<?php else: ?>ні<?php endif; ?>&nbsp;&nbsp;</td>
				<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['unit_of_measurement']; ?>
&nbsp;</td>
				<td align="center" class="oddcolumn"  width="100px;">
					<a href="index.php?action=edit_goods_groupe&id=<?php echo $this->_tpl_vars['row']['id']; ?>
">Редагувати</a>
						<br />
					<a href="index.php?action=edit_goods_groupe&id=<?php echo $this->_tpl_vars['row']['id']; ?>
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