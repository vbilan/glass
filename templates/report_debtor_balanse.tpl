<div class="report_header" style="">Звіт по неоплачених замовленнях</div>
<table width="100%" ><tr><td align="left"><a href="index.php?action=reports">Назад</a></td></tr></table>
<table width="100%" >

<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				{foreach from = $colums key=key item=value}
				<th width="300" class="tableheader">
					{$value.title}
				</th>
				{/foreach}
			</tr>
			
			
			{foreach from = $data item=row}
			<tr {if (!$row.date)}id="1" onclick="change_visibility(this);"{else}class="hiddenrow"{/if}>
				{if (!$row.name)}
				<td align="center" class="totaldata">Сумарно&nbsp;</td>
				
				<td align="center" class="totaldata">&nbsp;</td>
				<td align="center" class="totaldata">&nbsp;</td>
				<td align="center" class="totaldata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
				<td align="center" class="totaldata">{$row.price|number_format:0:",":" "}&nbsp; </td>
				<td align="center" class="totaldata">{$row.advance|number_format:0:",":" "}&nbsp; </td>
				{else}
			
					{if (!$row.date)}
						<td align="center" class="sumdata"><a href="index.php?action=edit_client&id={$row.client}">{$row.name}</a>&nbsp;</td>
				
						<td align="center" class="sumdata">&nbsp;</td>
						<td align="center" class="sumdata">&nbsp;</td>
						<td align="center" class="sumdata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
						<td align="center" class="sumdata">{$row.price|number_format:0:",":" "}&nbsp; </td>
						<td align="center" class="sumdata">{$row.advance|number_format:0:",":" "}&nbsp; </td>
					{else}
						<td align="center" class="evencolumn">&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.date|date_format:"%d/%m/%Y"}&nbsp;</td>
						<td align="center" class="evencolumn"><a href="index.php?action=edit_order&id={$row.id}">№ {$row.num}</a></td>
						<td align="center" class="oddcolumn">{$row.amount|number_format:0:",":" "}  </td>
						<td align="center" class="evencolumn">{$row.price|number_format:0:",":" "} </td>
						<td align="center" class="oddcolumn">{$row.advance|number_format:0:",":" "}  </td>
					{/if}
				{/if}
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>