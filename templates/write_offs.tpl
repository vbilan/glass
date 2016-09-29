<table width="100%" >
<tr>
	<td  align="left">
		&nbsp;
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
				<td align="center" class="evencolumn">{$row.groupe}&nbsp;</td>
				<td align="center" class="oddcolumn">{$row.name}&nbsp;</td>
				<td align="center" class="evencolumn">{$row.square}&nbsp;</td>
				<td align="center" class="oddcolumn">{$row.date|date_format:"%A, %B %e, %Y"}&nbsp;</td>
				<td align="center" class="evencolumn"><a href="index.php?action=edit_spending&id={$row.id}">Редагувати</a></td>					
			</tr>
			{/foreach}
			
		</table>
	</td>
</tr>

<tr>
	<td align="center" colspan='2'>{$scroller}</td>
</tr>
</table>