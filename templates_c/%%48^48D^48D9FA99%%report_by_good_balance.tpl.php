<?php /* Smarty version 2.6.26, created on 2014-10-11 13:45:30
         compiled from report_by_good_balance.tpl */ ?>
<div class="report_header">Загальний баланс</div>
<form action="" method="post">
<table width="100%" >
	<tr><td align="left"><a href="index.php?action=reports">Назад</a></td></tr>
	<tr><td>
		З <input style="width:80px;" type="type" id="report_begin" name="report_begin" value="<?php echo $this->_tpl_vars['report_begin']; ?>
" maxlength="10" /> <a  href="javascript:NewCssCal('report_begin','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		до <input style="width:80px;" type="type" id="report_end" name="report_end" value="<?php echo $this->_tpl_vars['report_end']; ?>
" maxlength="10" /> <a  href="javascript:NewCssCal('report_end','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		<input type="submit" name="change" value="змінити" />
	<td></tr>
</table>
</form><table width="100%" >

<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				<?php $_from = $this->_tpl_vars['colums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<th width="300" class="tableheader">
					<?php echo $this->_tpl_vars['value']['title']; ?>

				</th>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
			
			
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
			<tr>
						<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
						<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['income']; ?>
&nbsp; </td>
						<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['spending']; ?>
&nbsp;</td>
						<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['balance']; ?>
&nbsp; </td>
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