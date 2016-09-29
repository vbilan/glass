<?php /* Smarty version 2.6.26, created on 2014-10-15 11:32:00
         compiled from cutting_bill.tpl */ ?>
<table>
<tr>
<td width="300px;">
<h3><i>Дата <?php echo $this->_tpl_vars['date']; ?>
</i></h3>
</td>
<td>
<h3>Бланк № <?php echo $this->_tpl_vars['id']; ?>
</h3>
</td>
</tr>
</table>

<?php echo '
<style>

td	{
	text-align:center;
}
</style>
'; ?>


<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td>№</td>	
		<td>Вид скла</td>
		<td>Розміри</td>
		<td>К-ть</td>
		<td>Обробка</td>
		<td>Різчик</td>
		<td width="200px;">Примітка</td>
	</tr>
	<?php $_from = $this->_tpl_vars['cuttings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
	<tr>
		<td><?php echo $this->_tpl_vars['row']['num']; ?>
</td>	
		<td><?php echo $this->_tpl_vars['row']['name']; ?>
</td>
		<td >
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr><td align=right><?php echo $this->_tpl_vars['row']['height']; ?>
</td><td width="10px;">x</td><td><?php echo $this->_tpl_vars['row']['width']; ?>
</td></tr>
				<?php if (( $this->_tpl_vars['row']['grinding'] || $this->_tpl_vars['row']['polish'] )): ?>
					<tr><td><center>
						<table cellpadding="0" cellspacing="0" border=0 style="margin-bottom:4px;">
							<tr>
								<td>&nbsp;<?php echo $this->_tpl_vars['row']['grinding']['0']; ?>
<?php echo $this->_tpl_vars['row']['polish']['0']; ?>
&nbsp;</td>
								<td>|<td>
								<td>&nbsp;<?php echo $this->_tpl_vars['row']['grinding']['2']; ?>
<?php echo $this->_tpl_vars['row']['polish']['2']; ?>
&nbsp;</td>
							</tr>
						</table></center>
					</td>
					<td width="10px;">&nbsp;</td>
					<td>
						<center>
						<table cellpadding="0" cellspacing="0" border=0 style="margin-bottom:4px;">
							<tr>
								<td>&nbsp;<?php echo $this->_tpl_vars['row']['grinding']['1']; ?>
<?php echo $this->_tpl_vars['row']['polish']['1']; ?>
&nbsp;</td>
								<td>|<td>
								<td>&nbsp;<?php echo $this->_tpl_vars['row']['grinding']['3']; ?>
<?php echo $this->_tpl_vars['row']['polish']['3']; ?>
&nbsp;</td>
							</tr>
						</table></center>
					</td></tr>
				<?php endif; ?>
				
				
			</table>	
		</td>
		<td><?php echo $this->_tpl_vars['row']['count']; ?>
</td>
		<td>
		<?php if (( $this->_tpl_vars['row']['skin'] )): ?>
		<strong>
			Плівка.
		</strong>
		<?php endif; ?>
		<i><?php echo $this->_tpl_vars['row']['services']; ?>
</i>&nbsp;
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>		
	