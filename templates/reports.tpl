
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	{foreach from=$reports item=report}
	<tr>
		<td align="center" width="68px;"><image height="46px;" width="58px;" src="images/bag.gif"/> &nbsp;</td>
		<td align="left" class="oddcolumn">
		<fieldset><a href="index.php?action={$report.action}">{$report.name}</a></fieldset>
		</td>					
	</tr>
	{/foreach}
		
</table>

