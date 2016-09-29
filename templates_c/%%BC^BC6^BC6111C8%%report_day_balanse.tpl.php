<?php /* Smarty version 2.6.26, created on 2014-10-16 22:29:33
         compiled from report_day_balanse.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'report_day_balanse.tpl', 38, false),array('modifier', 'date_format', 'report_day_balanse.tpl', 39, false),)), $this); ?>
<div class="report_header" style="">Звіт по клієнтах</div>
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
	<tr>
		<td  align="left">
			<strong>Баланс за сьогодні:  <?php echo $this->_tpl_vars['balanse']; ?>
 грн.</strong>
		</td>
	</tr>
</table>
</form>
<table width="100%" >

<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				<?php $_from = $this->_tpl_vars['colums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
				<th width="300" class="tableheader">
					<?php if (( $this->_tpl_vars['key'] > 1 )): ?>
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
&amp;<?php echo $this->_tpl_vars['class']; ?>
order=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']['title']; ?>
</a>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['value']['title']; ?>

                    <?php endif; ?>    
				</th>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
			
			
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
			<tr >

						<td align="center" class="oddcolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ' ') : number_format($_tmp, 0, ",", ' ')); ?>
  </td>
						<td align="center" class="oddcolumn"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
&nbsp;</td>
						<td align="center" class="evencolumn"><a href="index.php?action=edit_order&id=<?php echo $this->_tpl_vars['row']['order_id']; ?>
">№ <?php echo $this->_tpl_vars['row']['num']; ?>
</a></td>
						
					
					
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