<?php /* Smarty version 2.6.26, created on 2014-10-13 09:27:16
         compiled from matting_bill.tpl */ ?>
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


<table cellpadding="0" cellspacing="0" border="2" width="100%">
	<tr>
		<td>№</td>	
		<td>Вид скла</td>
		<td>Розміри</td>
		<td>К-ть</td>
		<td>Малюнок</td>
		<td>Матування</td>
		<td>Термін</td>
		<td width="200px;">Примітка</td>
	</tr>
	<?php $_from = $this->_tpl_vars['mattings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
	<tr>
		<td><?php echo $this->_tpl_vars['row']['num']; ?>
</td>	
		<td><?php echo $this->_tpl_vars['row']['name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['row']['height']; ?>
x<?php echo $this->_tpl_vars['row']['width']; ?>
</td>
		<td><?php echo $this->_tpl_vars['row']['count']; ?>
</td>
		<td valign=middle>
			<table><tr><td><img src="<?php echo $this->_tpl_vars['row']['img']; ?>
" width=50 height=100/></td><td><?php echo $this->_tpl_vars['row']['img_name']; ?>
</td></tr></table>
		</td>
		<td><i>
			<?php echo $this->_tpl_vars['row']['matting']; ?>
 <br />
			<?php if (( $this->_tpl_vars['row']['paint_price'] )): ?>
				Ціна фарбування: <?php echo $this->_tpl_vars['row']['paint_price']; ?>
 Грн.<br />
			<?php endif; ?>
			<?php if (( $this->_tpl_vars['row']['mirror'] )): ?>
				Дзеркальний мал.<br />
			<?php endif; ?>
			<?php if (( $this->_tpl_vars['row']['back'] )): ?>
				Тильна сторона<br />
			<?php endif; ?>
			<?php if (( $this->_tpl_vars['row']['paint_color'] )): ?>
				Кольори: <?php echo $this->_tpl_vars['row']['paint_color']; ?>
<br />
			<?php endif; ?></i>
            
		</td>
		<td><?php echo $this->_tpl_vars['row']['delivery_date']; ?>
&nbsp;</td>
		<td>
            <textarea >
            </textarea>
        </td>
	</tr>
	<tr>
	<td colspan="8">
		<br>
		<br>
		<img src="<?php echo $this->_tpl_vars['row']['img']; ?>
"/>
		<br>
		<br>
	</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>		
	