<table width="100%" >

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
			<input  name="date" value="{$date}" type="hidden"> 
			<input name="date2" value="{$date2}" type="hidden"> 
			<input type="submit" name="clearFilter" value="&nbsp;clear&nbsp;" onclick="this.form.elements['{$class}filter'].value='';">
		</form>

	</td>
</tr>

<tr>
	<td>
		<form>
			<input type ="hidden" name="action" value="today_orders">
			<input style="width:80px;" id="date" name="date" value="{$date}" maxlength="10" type="type"> <a href="javascript:NewCssCal('date','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" height="16" width="16"></a>
			<input style="width:80px;" id="date2" name="date2" value="{$date2}" maxlength="10" type="type"> <a href="javascript:NewCssCal('date2','ddmmyyyy')"><img style="border:none;" src="images/cal.gif" height="16" width="16"></a>
			<input type="submit" >
		</form>
		
	</td> 
</tr>
<tr>
	<td colspan='2'>
		<table cellpadding="0" cellspacing="0" border="1" width="100%">
			<tr>
				{foreach from = $colums key=key item=value}
				<th width="300" class="tableheader">
					<a href="{$url}&amp;{$class}order={$key}&date={$date}&date2={$date2}">{$value.title}</a>
				</th>
				{/foreach}
				<th class="tableheader">
					Редагувати
				</th>
			</tr>
			
			{foreach from = $data item=row}
			<tr bgcolor="{if ($row.closed)}#9cf34e{else}{if ($row.done)}#feef89{else}#f39c4e{/if}{/if}">
			
				<td align="center" >№  {$row.num} </td>
				<td >{$row.name}&nbsp;</td>
				<td align="center" ><input type="checkbox" disabled {if ($row.matting)}checked="checked"{/if} ></td>
				<td align="center" ><input type="checkbox" disabled {if ($row.polish)}checked="checked"{/if}></td>
				<td align="center" ><input type="checkbox" disabled {if ($row.facet)}checked="checked"{/if} ></td>
				<td align="center" ><input type="checkbox" disabled {if ($row.drilling)}checked="checked"{/if} ></td>
                <td align="center" ><input type="checkbox" disabled {if ($row.photo)}checked="checked"{/if} ></td>
                <td align="center" ><input type="checkbox" disabled {if ($row.grinding)}checked="checked"{/if}></td>
                <td align="center" ><input type="checkbox" disabled {if ($row.kadran)}checked="checked"{/if}></td>
				<td align="center" ><input type="checkbox" disabled {if ($row.done)}checked="checked"{/if} /> </td>
				<td align="center" ><input type="checkbox" disabled {if ($row.closed)}checked="checked"{/if} /></td>
				
				<td align="center" class1="oddcolumn" width="250px;">
					<a href="index.php?action=edit_order&id={$row.id}">Редагувати</a>
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