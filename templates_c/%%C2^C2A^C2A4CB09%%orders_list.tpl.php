<?php /* Smarty version 2.6.26, created on 2014-10-13 09:35:48
         compiled from orders_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'orders_list.tpl', 48, false),)), $this); ?>
<table width="100%" >
<!-- tr>
	<td  align="left">
	<strong>Баланс за день: <a href="index.php?action=report_by_day" > <?php echo $this->_tpl_vars['balanse']; ?>
 грн.</a></strong>
	</td>
	<td align="left">
		
	</td>
</tr-->
<tr>
	<td  align="left">
		<a href="index.php?action=edit_order">Додати</a>
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
				<td align="center" class="oddcolumn">№  <?php echo $this->_tpl_vars['row']['num']; ?>
&nbsp; </td>
				<td class="evencolumn"><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
				<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['price']; ?>
&nbsp;Грн. </td>
				<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['advance']; ?>
&nbsp;Грн.</td>
				<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['debt']; ?>
&nbsp;Грн. </td>
				<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 </td>
                <td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['username']; ?>
&nbsp; </td>
				<td align="center" class="evencolumn"><?php if (( $this->_tpl_vars['row']['till_date'] )): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['till_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 <?php endif; ?> <!--  № <?php if (( ! $this->_tpl_vars['row']['order_groupe'] )): ?><a href="index.php?action=orders&form_groupe&order_id=<?php echo $this->_tpl_vars['row']['id']; ?>
"><?php echo $this->_tpl_vars['row']['order_groupe']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['row']['order_groupe']; ?>
<?php endif; ?>-->&nbsp; </td>
				<td align="center" class="oddcolumn"><nobr><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['done'] )): ?>checked="checked"<?php endif; ?> />гот.</nobr><br><nobr><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['closed'] )): ?>checked="checked"<?php endif; ?> />заб.</nobr></nobr> </td>
				<td align="center" class="evencolumn" width="250px;">
					<a href="index.php?action=edit_order&id=<?php echo $this->_tpl_vars['row']['id']; ?>
">Редагувати</a>
					<br /> 
					<a href="index.php?action=client_bill&id=<?php echo $this->_tpl_vars['row']['id']; ?>
" target="_blank">Бланк клієнта</a>
					<br />
					<?php if (( $this->_tpl_vars['row']['order_groupe'] )): ?>
					<a href="index.php?action=matting_bill&id=<?php echo $this->_tpl_vars['row']['order_groupe']; ?>
" target="_blank"><nobr>Бланк матування</nobr></a>
					<br />
					<a href="index.php?action=cutting_bill&id=<?php echo $this->_tpl_vars['row']['order_groupe']; ?>
" target="_blank"><nobr>Бланк порізки</nobr></a>
					<br />
					<?php endif; ?>
					<a href="index.php?action=general_bill&id=<?php echo $this->_tpl_vars['row']['id']; ?>
" target="_blank"><nobr>Загальний бланк</nobr></a>
					<br />
					<a href="index.php?action=edit_order&id=<?php echo $this->_tpl_vars['row']['id']; ?>
&delete"  onclick="return confirm('Ви дійсно бажаєти видалити цей запис?');">Видалити</a>
				</td>					
			</tr>
			<?php endforeach; endif; unset($_from); ?>
			
		</table>
	</td>
</tr>
<!--  
<tr>
	<td align="right" colspan='2'>
		<a href="index.php?action=orders&form_groupe">Сформувати бланк </a>
	</td>
</tr>
-->
<tr>
	<td align="center" colspan='2'><?php echo $this->_tpl_vars['scroller']; ?>
</td>
</tr>
</table>