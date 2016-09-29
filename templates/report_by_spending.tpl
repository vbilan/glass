
<div class="report_header" style="">Звіт по витратах</div>
<form action="" method="post">
<table width="100%" >
	<tr><td align="left"><a href="index.php?action=reports">Назад</a></td></tr>
	<tr><td>
		З <input style="width:80px;" type="type" id="report_begin" name="report_begin" value="{$report_begin}" maxlength="10" /> <a  href="javascript:NewCssCal('report_begin','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		до <input style="width:80px;" type="type" id="report_end" name="report_end" value="{$report_end}" maxlength="10" /> <a  href="javascript:NewCssCal('report_end','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		<input type="submit" name="change" value="змінити" />
	<td></tr>
</table>
</form>
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
					<td align="center" class="totaldata">&nbsp; </td>
					<td align="center" class="totaldata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
					<td align="center" class="totaldata">&nbsp; </td>
				{else}
					{if (!$row.date)}
						<td align="center" class="sumdata">{$row.name}&nbsp;</td>
						<td align="center" class="sumdata">&nbsp; </td>
						<td align="center" class="sumdata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
						<td align="center" class="sumdata">{$row.comment}&nbsp; </td>
					{else}
						<td align="center" class="evencolumn">&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.date|date_format:"%d/%m/%Y"}&nbsp; </td>
						<td align="center" class="evencolumn">{$row.amount|number_format:0:",":" "}&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.comment}&nbsp;</td>
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