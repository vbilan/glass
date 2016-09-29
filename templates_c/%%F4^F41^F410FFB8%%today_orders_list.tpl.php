<?php /* Smarty version 2.6.26, created on 2014-10-15 20:47:58
         compiled from today_orders_list.tpl */ ?>
<table width="100%" >

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
			<input  name="date" value="<?php echo $this->_tpl_vars['date']; ?>
" type="hidden"> 
			<input name="date2" value="<?php echo $this->_tpl_vars['date2']; ?>
" type="hidden"> 
			<input type="submit" name="clearFilter" value="&nbsp;clear&nbsp;" onclick="this.form.elements['<?php echo $this->_tpl_vars['class']; ?>
filter'].value='';">
		</form>

	</td>
</tr>

<tr>
	<td>
		<form>
			<input type ="hidden" name="action" value="today_orders">
			<input style="width:80px;" id="date" name="date" value="<?php echo $this->_tpl_vars['date']; ?>
" maxlength="10" type="type"> <a href="javascript:NewCssCal('date','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" height="16" width="16"></a>
			<input style="width:80px;" id="date2" name="date2" value="<?php echo $this->_tpl_vars['date2']; ?>
" maxlength="10" type="type"> <a href="javascript:NewCssCal('date2','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" height="16" width="16"></a>
			<input type="submit" >
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
&date=<?php echo $this->_tpl_vars['date']; ?>
&date2=<?php echo $this->_tpl_vars['date2']; ?>
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
			<tr bgcolor="<?php if (( $this->_tpl_vars['row']['closed'] )): ?>#9cf34e<?php else: ?><?php if (( $this->_tpl_vars['row']['done'] )): ?>#feef89<?php else: ?>#f39c4e<?php endif; ?><?php endif; ?>">
			
				<td align="center" >№  <?php echo $this->_tpl_vars['row']['num']; ?>
 </td>
				<td ><?php echo $this->_tpl_vars['row']['name']; ?>
&nbsp;</td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['matting'] )): ?>checked="checked"<?php endif; ?> ></td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['polish'] )): ?>checked="checked"<?php endif; ?>></td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['facet'] )): ?>checked="checked"<?php endif; ?> ></td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['drilling'] )): ?>checked="checked"<?php endif; ?> ></td>
                <td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['photo'] )): ?>checked="checked"<?php endif; ?> ></td>
                <td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['grinding'] )): ?>checked="checked"<?php endif; ?>></td>
                <td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['kadran'] )): ?>checked="checked"<?php endif; ?>></td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['done'] )): ?>checked="checked"<?php endif; ?> /> </td>
				<td align="center" ><input type="checkbox" disabled <?php if (( $this->_tpl_vars['row']['closed'] )): ?>checked="checked"<?php endif; ?> /></td>
				
				<td align="center" class1="oddcolumn" width="250px;">
					<a href="index.php?action=edit_order&id=<?php echo $this->_tpl_vars['row']['id']; ?>
">Редагувати</a>
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