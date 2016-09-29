<table width="100%">
<!--tr>
	<td  align="left">
		<a href="index.php?action=write_offs">Cисок списань</a>
	</td>
</tr-->


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
				<td align="center" class="evencolumn">{$row.name}&nbsp;</td>
				<td align="center" class="oddcolumn">{$row.total}&nbsp; </td>
				<td align="center" class="evencolumn">{$row.groupe}&nbsp; </td>
				<td align="center" class="oddcolumn"  width="100px;"><a href="index.php?action=reset_good&type={$row.type}&total={$row.total*100}">Редагувати</a></td>					
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>