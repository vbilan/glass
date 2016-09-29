<?php /* Smarty version 2.6.26, created on 2014-10-15 10:54:40
         compiled from report_by_balance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'report_by_balance.tpl', 29, false),)), $this); ?>
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
				<?php if (( ! $this->_tpl_vars['row']['income'] && ! $this->_tpl_vars['row']['spending'] )): ?>
						<td align="center" class="totaldata"><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['income'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp; </td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['spending'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['store'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp; </td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['profit'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
				<?php else: ?>
						<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
						<td align="center" class="oddcolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['income'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp; </td>
						<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['spending'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
						<td align="center" class="oddcolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['store'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;<?php if (( $this->_tpl_vars['row']['store'] )): ?><?php endif; ?> </td>
						<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['profit'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
				<?php endif; ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
			
			
			
			<tr>
					<td align="center" class="evencolumn">Продажі&nbsp;</td>
					<td align="center" class="oddcolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['selling_incomming'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp; </td>
					<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['buying_sum'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
					<td align="center" class="oddcolumn">&nbsp; </td>
					<td align="center" class="evencolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['selling_incomming']-$this->_tpl_vars['buying_sum'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
			</tr>	
			<tr>
						<td align="center" class="totaldata">Сумарно&nbsp;</td>
						<td align="center" class="totaldata">&nbsp; </td>
						<td align="center" class="totaldata">&nbsp;</td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['goods_price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp; </td>
						<td align="center" class="totaldata"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
&nbsp;</td>
			</td>
			<!--tr>
						<td align="center" class="totaldata">Товар &nbsp;</td>
						<td align="center" class="totaldata">&nbsp; </td>
						<td align="center" class="totaldata"><?php echo $this->_tpl_vars['buying_amount_all']; ?>
&nbsp;</td>
						<td align="center" class="totaldata"><?php echo $this->_tpl_vars['goods_price']; ?>
&nbsp; </td>
						<td align="center" class="totaldata">&nbsp;</td>
			</td-->
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'><?php echo $this->_tpl_vars['scroller']; ?>
</td>
</tr>
</table>