<div class="report_header" style="">Звіт по клієнтах</div>
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
					{if ($key > 1)}
                        <a href="{$url}&amp;{$class}order={$key}">{$value.title}</a>
                    {else}
                        {$value.title}
                    {/if}    
				</th>
				{/foreach}
			</tr>
			
			
			{foreach from = $data item=row}
			<tr {if (!$row.date)}id="1" onclick="change_visibility(this);"{else}class="hiddenrow"{/if}>
				{if (!$row.name)}
						<td align="center" class="totaldata">Сумарно&nbsp;</td>
						
						<td align="center" class="totaldata">&nbsp;</td>
						<td align="center" class="totaldata">&nbsp;</td>
						{if $admin==1}
						<td align="center" class="totaldata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
						{/if}
				{else}	
					{if (!$row.date)}
						<td align="center" class="sumdata"><a href="index.php?action=edit_client&id={$row.client}">{$row.name}</a>&nbsp;</td>
						
						<td align="center" class="sumdata">&nbsp;</td>
						<td align="center" class="sumdata">&nbsp;</td>
						{if $admin==1}
						<td align="center" class="sumdata">{$row.amount|number_format:0:",":" "}&nbsp; </td>
						{/if}
					{else}
						<td align="center" class="evencolumn">&nbsp;</td>
						<td align="center" class="oddcolumn">{$row.date|date_format:"%d/%m/%Y"}&nbsp;</td>
						<td align="center" class="evencolumn"><a href="index.php?action=edit_order&id={$row.id}">№ {$row.num}</a></td>
						{if $admin==1}
						<td align="center" class="oddcolumn">{$row.amount|number_format:0:",":" "}  </td>
						{/if}
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