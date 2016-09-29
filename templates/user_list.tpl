<table width="100%" >
<tr>
	<td  align="left">
		<a href="index.php?action=edit_user">Додати</a>
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
				<td class="evencolumn">{$row.login}&nbsp;</td>
				<td align="center" class="oddcolumn">{if $row.admin == 1}так{else}ні{/if}&nbsp;</td>
				<td align="center" class="evencolumn">{if $row.actual == 1}так{else}ні{/if}&nbsp;</td>
				<td align="center" class="oddcolumn"  width="100px;">
				<a href="index.php?action=edit_user&id={$row.id}">Редагувати</a>
				<br />
				<a href="index.php?action=edit_user&id={$row.id}&delete"  onclick="return confirm('Ви дійсно бажаєти видалити цей запис?');">Bидалити</a>
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