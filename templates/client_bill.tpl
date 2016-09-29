{literal}
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
{/literal}
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
		<td>�볺�� <b>{$client}</b></td><td width="200px;" > �������: <b> {$phone}</b></td>
	</tr>
</table>
<center><h2>���������� � {$num}</h2></center>
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
	{foreach from=$sellings item=selling}
	<tr>
		<td class="">
				{$selling.name}
		</td>
		<td class="">
				{$selling.count}
		</td>
		<td class="">
				{$selling.height}x{$selling.width}
		</td>
		<td class="">
				{$selling.height*$selling.width/1000/1000}
		</td>
		<td class="">
				{$selling.avarange_price} ���.
		</td>
		<td class="">
				{$selling.price} ���.
		</td>
		<td  style="width:199px;padding-left:0px;">
				<input type="text" style="width:200px;">
		</td>
	</tr>
	{/foreach}
</table>
<br />
{if ($services_count)}
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
	{foreach from=$services item=service}
	<tr>
		<td class="">
				{$service.name}
		</td>
		
		<td class="">
				{$service.count}
		</td>
		<td class="">
			{if ($service.square)}
				<nobr>{$service.square}</nobr>
			{else}
				&nbsp;
			{/if}
		</td>
		<td class="">
			{if ($service.avarange_price)}
				<nobr>{$service.avarange_price} ���.</nobr>
			{else}
				&nbsp;
			{/if}
		</td>
		<td class="">
				<nobr>{$service.price} ���.</nobr>
		</td>
		<td class="">
			{if ($service.colors)}
				<i>������� : </i>
				{$service.colors}
			{elseif ($service.comment)}
				{$service.comment}
			{else}	
				&nbsp;	
			{/if} 
				
		</td>
	</tr>
	
	{/foreach}
</table>
<br />
{/if}
<table cellpadding="0" cellspacing="0" width="100%" >
	<tr><td valign=top><strong><u>���������� �����������! </u><strong></td>
	<td align=right>
		<table>
			<tr><td>���� </td><td><u>{$order.price} ���.</u></td></tr>
			<tr><td>������� </td><td><u>{$order.advance} ���.</u></td></tr>
			<tr><td>�� ������ </td><td><b><u>{$order.price-$order.advance} ���.</u><b></td></tr>
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
	
	