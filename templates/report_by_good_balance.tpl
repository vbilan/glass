<div class="report_header">Загальний баланс</div>
<form action="" method="post">
<table width="100%" >
	<tr><td align="left"><a href="index.php?action=reports">Назад</a></td></tr>
	<tr><td>
		З <input style="width:80px;" type="type" id="report_begin" name="report_begin" value="{$report_begin}" maxlength="10" /> <a  href="javascript:NewCssCal('report_begin','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		до <input style="width:80px;" type="type" id="report_end" name="report_end" value="{$report_end}" maxlength="10" /> <a  href="javascript:NewCssCal('report_end','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" width="16" height="16" ></a>
		<input type="submit" name="change" value="змінити" />
	<td></tr>
</table>
</form><table width="100%" >

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
			<tr>
						<td align="center" class="evencolumn">{$row.name}&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.income}&nbsp; </td>
						<td align="center" class="evencolumn">{$row.spending}&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.balance}&nbsp; </td>
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>