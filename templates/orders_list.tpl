<table width="100%" >
<!-- tr>
	<td  align="left">
	<strong>Баланс за день: <a href="index.php?action=report_by_day" > {$balanse} грн.</a></strong>
	</td>
	<td align="left">
		
	</td>
</tr-->
<tr>
	<td  align="left">
		<a href="index.php?action=edit_order">Додати</a>
	</td>
	<td align="right">
		<form action="{$url}" method="get">
			<label> Фільтр : </label>
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
					Редагувати
				</th>
			</tr>
			
			{foreach from = $data item=row}
			<tr>
				<td align="center" class="oddcolumn">№  {$row.num}&nbsp; </td>
				<td class="evencolumn">{$row.name}&nbsp;</td>
				<td align="center" class="oddcolumn">{$row.price}&nbsp;Грн. </td>
				<td align="center" class="evencolumn">{$row.advance}&nbsp;Грн.</td>
				<td align="center" class="oddcolumn">{$row.debt}&nbsp;Грн. </td>
				<td align="center" class="evencolumn">{$row.date|date_format:"%d/%m/%Y"} </td>
                <td align="center" class="oddcolumn">{$row.username}&nbsp; </td>
				<td align="center" class="evencolumn">{if ($row.till_date)}{$row.till_date|date_format:"%d/%m/%Y"} {/if} <!--  № {if (!$row.order_groupe)}<a href="index.php?action=orders&form_groupe&order_id={$row.id}">{$row.order_groupe}</a>{else}{$row.order_groupe}{/if}-->&nbsp; </td>
				<td align="center" class="oddcolumn"><nobr><input type="checkbox" disabled {if ($row.done)}checked="checked"{/if} />гот.</nobr><br><nobr><input type="checkbox" disabled {if ($row.closed)}checked="checked"{/if} />заб.</nobr></nobr> </td>
				<td align="center" class="evencolumn" width="250px;">
					<a href="index.php?action=edit_order&id={$row.id}">Редагувати</a>
					<br /> 
					<a href="index.php?action=client_bill&id={$row.id}" target="_blank">Бланк клієнта</a>
					<br />
					{if ($row.order_groupe)}
					<a href="index.php?action=matting_bill&id={$row.order_groupe}" target="_blank"><nobr>Бланк матування</nobr></a>
					<br />
					<a href="index.php?action=cutting_bill&id={$row.order_groupe}" target="_blank"><nobr>Бланк порізки</nobr></a>
					<br />
					{/if}
					<a href="index.php?action=general_bill&id={$row.id}" target="_blank"><nobr>Загальний бланк</nobr></a>
					<br />
					<a href="index.php?action=edit_order&id={$row.id}&delete"  onclick="return confirm('Ви дійсно бажаєти видалити цей запис?');">Видалити</a>
				</td>					
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>
<!--  
<tr>
	<td align="right" colspan='2'>
		<a href="index.php?action=orders&form_groupe">Сформувати бланк </a>
	</td>
</tr>
-->
<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>