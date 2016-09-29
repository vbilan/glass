<table>
<tr>
<td width="300px;">
<h3><i>Дата {$date}</i></h3>
</td>
<td>
<h3>Бланк № {$id}</h3>
</td>
</tr>
</table>

{literal}
<style>

td	{
	text-align:center;
}
</style>
{/literal}

<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td>№</td>	
		<td>Вид скла</td>
		<td>Розміри</td>
		<td>К-ть</td>
		<td>Обробка</td>
		<td>Різчик</td>
		<td width="200px;">Примітка</td>
	</tr>
	{foreach from = $cuttings item=row}
	<tr>
		<td>{$row.num}</td>	
		<td>{$row.name}</td>
		<td >
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr><td align=right>{$row.height}</td><td width="10px;">x</td><td>{$row.width}</td></tr>
				{if ($row.grinding||$row.polish)}
					<tr><td><center>
						<table cellpadding="0" cellspacing="0" border=0 style="margin-bottom:4px;">
							<tr>
								<td>&nbsp;{$row.grinding.0}{$row.polish.0}&nbsp;</td>
								<td>|<td>
								<td>&nbsp;{$row.grinding.2}{$row.polish.2}&nbsp;</td>
							</tr>
						</table></center>
					</td>
					<td width="10px;">&nbsp;</td>
					<td>
						<center>
						<table cellpadding="0" cellspacing="0" border=0 style="margin-bottom:4px;">
							<tr>
								<td>&nbsp;{$row.grinding.1}{$row.polish.1}&nbsp;</td>
								<td>|<td>
								<td>&nbsp;{$row.grinding.3}{$row.polish.3}&nbsp;</td>
							</tr>
						</table></center>
					</td></tr>
				{/if}
				
				
			</table>	
		</td>
		<td>{$row.count}</td>
		<td>
		{if ($row.skin)}
		<strong>
			Плівка.
		</strong>
		{/if}
		<i>{$row.services}</i>&nbsp;
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	{/foreach}
</table>		
	