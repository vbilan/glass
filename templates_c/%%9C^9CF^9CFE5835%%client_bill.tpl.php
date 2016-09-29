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
					<td width="55px;" ><nobr>Адреса :<nobr><td>
					<td> м. Львів, вул Б. Хмельницького, 188</td>
				</tr>
				<tr>
					<td valign="top"> <td>
					<td> 
						<nobr>т. (032) 247-55-77; 067-17-57-486 &nbsp;&nbsp;&nbsp; Іван;</nobr>&nbsp;<nobr> 067-67-31-244&nbsp;&nbsp;&nbsp; Олег;</nobr>&nbsp;<nobr>	098-45-18-534 &nbsp;&nbsp;&nbsp;Олег; </nobr>&nbsp;<br />
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
		<td>Клієнт <b><?php echo $this->_tpl_vars['client']; ?>
</b></td><td width="200px;" > Телефон: <b> <?php echo $this->_tpl_vars['phone']; ?>
</b></td>
	</tr>
</table>
<center><h2>Замовлення № <?php echo $this->_tpl_vars['num']; ?>
</h2></center>
<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td class="header">
				Вид скла
		</td>
		<td class="header" width="35px;">
				К-ть
		</td>		
		<td class="header" width="90px;">
				Розмір(мм)
		</td>		
		<td class="header" width="60px;">
				Площа
		</td>
		<td class="header" width="70px;">
				Ціна
		</td>
		<td class="header" width="70px;">
				Сума
		</td>
		<td class="header" width="200px;">
				Примітка
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
 грн.
		</td>
		<td class="">
				<?php echo $this->_tpl_vars['selling']['price']; ?>
 грн.
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
				Послуга
		</td>
		
		<td class="header" width="35px;">
				К-ть
		</td>
		<td class="header" width="155px;">
				Площа/Периметр
		</td>
		<td class="header" width="70px;">
				Ціна
		</td>
		<td class="header" width="70px;">
				Сума
		</td>
		<td class="header" width="200px;">
				Примітка
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
 грн.</nobr>
			<?php else: ?>
				&nbsp;
			<?php endif; ?>
		</td>
		<td class="">
				<nobr><?php echo $this->_tpl_vars['service']['price']; ?>
 грн.</nobr>
		</td>
		<td class="">
			<?php if (( $this->_tpl_vars['service']['colors'] )): ?>
				<i>Кольори : </i>
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
	<tr><td valign=top><strong><u>Попередньо передзвоніть! </u><strong></td>
	<td align=right>
		<table>
			<tr><td>Сума </td><td><u><?php echo $this->_tpl_vars['order']['price']; ?>
 грн.</u></td></tr>
			<tr><td>Внесено </td><td><u><?php echo $this->_tpl_vars['order']['advance']; ?>
 грн.</u></td></tr>
			<tr><td>До оплати </td><td><b><u><?php echo $this->_tpl_vars['order']['price']-$this->_tpl_vars['order']['advance']; ?>
 грн.</u><b></td></tr>
		</table>
	</td></tr>
<table>
<table width="100%">
	<tr>
		<td><strong>З бланком ознайомлений. Розміри та сума записані вірно </strong></td>
		<td width="100px;">___________________</td>
		<td width="140px;">&nbsp;</td>
	</tr>	
	<tr><td><strong>З умовами ознайомлений та згідний <strong></td>
	<td width="100px;">&nbsp;</td>
	<td width="140px;">&nbsp;</td>
	</tr>
	
</table>

<center><h4>Нагадування</h4></center>
<ul>
<li>При фігурній формі скла розміри враховуються беручи до уваги прямокутну заготовку</li>
<li>Згідно <strong>ГОСТу</strong> України - точність нарізки та/або обробки скла при : <br>
прямолінійній формі, при товщині скла 3-4 мм складає <nobr>+/-1 мм;</nobr><br>
прямолінійній формі, при товщині скла 5-10 мм складає <nobr>+/-2 мм;</nobr><br>
криволінійній формі, при товщині скла 3-10 мм складає <nobr>+/-3 мм.</nobr><br>
</li>
<li>Склонарізка не несе відповідальності за довготривале збереження виконаного замовлення.</li>
<li>На скло замовника гарантії не надаються та претензії щодо виконаної якості  продукції не приймаються. </li>
</ul>	

<b>Відгуки та пропозиції відправляйте на скриньку <strong>vashesklo@mail.ru</strong>, або залишайте на сайті <strong>http://vashesklo.com.ua</strong></b>
	
	