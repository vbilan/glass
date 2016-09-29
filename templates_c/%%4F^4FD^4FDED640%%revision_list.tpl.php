<?php /* Smarty version 2.6.26, created on 2014-09-01 15:53:45
         compiled from revision_list.tpl */ ?>
<table width="100%">
<!--tr>
	<td  align="left">
		<a href="index.php?action=write_offs">Cисок списань</a>
	</td>
</tr-->


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
				<td align="center" class="oddcolumn"><?php echo $this->_tpl_vars['row']['total']; ?>
&nbsp; </td>
				<td align="center" class="evencolumn"><?php echo $this->_tpl_vars['row']['groupe']; ?>
&nbsp; </td>
				<td align="center" class="oddcolumn"  width="100px;"><a href="index.php?action=reset_good&type=<?php echo $this->_tpl_vars['row']['type']; ?>
&total=<?php echo $this->_tpl_vars['row']['total']*100; ?>
">Редагувати</a></td>					
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