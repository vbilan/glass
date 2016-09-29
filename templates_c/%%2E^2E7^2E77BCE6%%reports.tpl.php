<?php /* Smarty version 2.6.26, created on 2014-08-29 11:13:54
         compiled from reports.tpl */ ?>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<?php $_from = $this->_tpl_vars['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['report']):
?>
	<tr>
		<td align="center" width="68px;"><image height="46px;" width="58px;" src="images/bag.gif"/> &nbsp;</td>
		<td align="left" class="oddcolumn">
		<fieldset><a href="index.php?action=<?php echo $this->_tpl_vars['report']['action']; ?>
"><?php echo $this->_tpl_vars['report']['name']; ?>
</a></fieldset>
		</td>					
	</tr>
	<?php endforeach; endif; unset($_from); ?>
		
</table>
