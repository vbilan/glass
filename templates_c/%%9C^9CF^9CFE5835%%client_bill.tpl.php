<?php /* Smarty version 2.6.26, created on 2014-08-29 11:23:31
         compiled from client_bill.tpl */ ?>
<?php echo '
<style>

.address{
	font-weight: bold;
}
.client{
	font-style: italic;
}
.header{
	font-weight: bold;
}
td	{
	padding-left:5px;
}
.report {
	text-align:center;
}
</style>
'; ?>

<table width="100%">
	<tr>
		<td><img src="images/logo.png" width="100px;" height="100px;"></td>
		<td width="80%">
			<fieldset style="margin:0px;">
			<table class="address" width="100%" >
				<tr>
					<td width="55px;" ><nobr>������ :<nobr><td>
					<td> �. ����, ��� �. �������������, 188</td>
				</tr>
				<tr>
					<td valign="top"> <td>
					<td> 
						<nobr>�. (032) 247-55-77; 067-17-57-486 &nbsp;&nbsp;&nbsp; ����;</nobr>&nbsp;<nobr> 067-67-31-244&nbsp;&nbsp;&nbsp; ����;</nobr>&nbsp;<nobr>	098-45-18-534 &nbsp;&nbsp;&nbsp;����; </nobr>&nbsp;<br />
						<i>http://vashesklo.com.ua</i> e-mail: <i>vashesklo@mail.ru </i>
					</td>
				</tr>
			</table>
			
			</fieldset>
		</td>
	</tr>
</table>
<table width="100%" class="client">
	<tr>
		<td>�볺�� <b><?php echo $this->_tpl_vars['client']; ?>
</b></td><td width="200px;" > �������: <b> <?php echo $this->_tpl_vars['phone']; ?>
</b></td>
	</tr>
</table>
<center><h2>���������� � <?php echo $this->_tpl_vars['num']; ?>
</h2></center>
<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td class="header">
				��� ����
		</td>
		<td class="header" width="35px;">
				�-��
		</td>		
		<td class="header" width="90px;">
				�����(��)
		</td>		
		<td class="header" width="60px;">
				�����
		</td>
		<td class="header" width="70px;">
				ֳ��
		</td>
		<td class="header" width="70px;">
				����
		</td>
		<td class="header" width="200px;">
				�������
		</td>
	</tr>
	<?php $_from = $this->_tpl_vars['sellings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['selling']):
?>
	<tr>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['name']; ?>

		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['count']; ?>

		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['height']; ?>
x<?php echo $this->_tpl_vars['selling']['width']; ?>

		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['height']*$this->_tpl_vars['selling']['width']/1000/1000; ?>

		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['avarange_price']; ?>
 ���.
		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['price']; ?>
 ���.
		</td>
		<td  style="width:199px;padding-left:0px;">
				<input type="text" style="width:200px;">
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<?php if (( $this->_tpl_vars['services_count'] )): ?>
<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td class="header">
				�������
		</td>
		
		<td class="header" width="35px;">
				�-��
		</td>
		<td class="header" width="155px;">
				�����/��������
		</td>
		<td class="header" width="70px;">
				ֳ��
		</td>
		<td class="header" width="70px;">
				����
		</td>
		<td class="header" width="200px;">
				�������
		</td>
	</tr>
	<?php $_from = $this->_tpl_vars['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['service']):
?>
	<tr>
		<td class="">
				<?php echo $this->_tpl_vars['service']['name']; ?>

		</td>
		
		<td class="">
				<?php echo $this->_tpl_vars['service']['count']; ?>

		</td>
		<td class="">
			<?php if (( $this->_tpl_vars['service']['square'] )): ?>
				<nobr><?php echo $this->_tpl_vars['service']['square']; ?>
</nobr>
			<?php else: ?>
				&nbsp;
			<?php endif; ?>
		</td>
		<td class="">
			<?php if (( $this->_tpl_vars['service']['avarange_price'] )): ?>
				<nobr><?php echo $this->_tpl_vars['service']['avarange_price']; ?>
 ���.</nobr>
			<?php else: ?>
				&nbsp;
			<?php endif; ?>
		</td>
		<td class="">
				<nobr><?php echo $this->_tpl_vars['service']['price']; ?>
 ���.</nobr>
		</td>
		<td class="">
			<?php if (( $this->_tpl_vars['service']['colors'] )): ?>
				<i>������� : </i>
				<?php echo $this->_tpl_vars['service']['colors']; ?>

			<?php elseif (( $this->_tpl_vars['service']['comment'] )): ?>
				<?php echo $this->_tpl_vars['service']['comment']; ?>

			<?php else: ?>	
				&nbsp;	
			<?php endif; ?> 
				
		</td>
	</tr>
	
	<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<?php endif; ?>
<table cellpadding="0" cellspacing="0" width="100%" >
	<tr><td valign=top><strong><u>���������� �����������! </u><strong></td>
	<td align=right>
		<table>
			<tr><td>���� </td><td><u><?php echo $this->_tpl_vars['order']['price']; ?>
 ���.</u></td></tr>
			<tr><td>������� </td><td><u><?php echo $this->_tpl_vars['order']['advance']; ?>
 ���.</u></td></tr>
			<tr><td>�� ������ </td><td><b><u><?php echo $this->_tpl_vars['order']['price']-$this->_tpl_vars['order']['advance']; ?>
 ���.</u><b></td></tr>
		</table>
	</td></tr>
<table>
<table width="100%">
	<tr>
		<td><strong>� ������� ������������. ������ �� ���� ������� ���� </strong></td>
		<td width="100px;">___________________</td>
		<td width="140px;">&nbsp;</td>
	</tr>	
	<tr><td><strong>� ������� ������������ �� ������ <strong></td>
	<td width="100px;">&nbsp;</td>
	<td width="140px;">&nbsp;</td>
	</tr>
	
</table>

<center><h4>�����������</h4></center>
<ul>
<li>��� ������� ���� ���� ������ ������������ ������ �� ����� ���������� ���������</li>
<li>����� <strong>�����</strong> ������ - ������� ������ ��/��� ������� ���� ��� : <br>
���������� ����, ��� ������ ���� 3-4 �� ������ <nobr>+/-1 ��;</nobr><br>
���������� ����, ��� ������ ���� 5-10 �� ������ <nobr>+/-2 ��;</nobr><br>
���������� ����, ��� ������ ���� 3-10 �� ������ <nobr>+/-3 ��.</nobr><br>
</li>
<li>���������� �� ���� ������������� �� ������������ ���������� ���������� ����������.</li>
<li>�� ���� ��������� ������ �� ��������� �� ������糿 ���� �������� �����  ��������� �� �����������. </li>
</ul>	

<b>³����� �� ���������� ����������� �� �������� <strong>vashesklo@mail.ru</strong>, ��� ��������� �� ���� <strong>http://vashesklo.com.ua</strong></b>
	
	