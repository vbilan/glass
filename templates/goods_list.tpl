<table width="100%" >
<tr>
	<td  align="left">
		<a href="index.php?action=edit_good">������</a>
	</td>
	<td align="right">
		<form action="{$url}" method="get">
			<label> Գ���� : </label>
			<input type="hidden" name="action" value="{$action}" />
			<input type="text" name="{$class}filter" value="{$filter_value}" maxlength="20" />
			<input type="submit" name="sabmFilter" value="&nbsp;ok&nbsp;" />
			<input type="submit" name="clearFilter" value="&nbsp;clear&nbsp;" onclick="this.form.elements['{$class}filter'].value='';">
		</form>

	</td>
</tr>


<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				{foreach from = $colums key=key item=value}
				<th width="300" class="tableheader">
					<a href="{$url}&amp;{$class}order={$key}">{$value.title}</a>
				</th>
				{/foreach}
				<th class="tableheader">
					����������
				</th>
			</tr>
			
			
			{foreach from = $data item=row}
			<tr>
				<td align="center" class="evencolumn">{$row.groupe}&nbsp; </td>	
				<td align="center" class="oddcolumn">{$row.name}&nbsp;</td>
				<td align="center" class="evencolumn">{$row.square}&nbsp;{$row.unit_of_measurement} </td>
				
				<td align="center" class="oddcolumn">{$row.buying_price}&nbsp;</td>
				<td align="center" class="evencolumn">{$row.buying_amount}&nbsp;</td>
				<td align="center" class="oddcolumn">{$row.price}&nbsp;</td>
				<td align="center" class="evencolumn">{$row.date|date_format:"%d/%m/%Y"}</td>
				<td align="center" class="evencolumn"  width="100px;">
					<a href="index.php?action=edit_good&id={$row.id}">����������</a>
					<br />
					<a href="index.php?action=edit_good&id={$row.id}&delete"  onclick="return confirm('�� ����� ������ �������� ��� �����?');">��������</a>
				</td>					
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>