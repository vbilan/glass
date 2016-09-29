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

<table cellpadding="0" cellspacing="0" border="2" width="100%">
	<tr>
		<td>№</td>	
		<td>Вид скла</td>
		<td>Розміри</td>
		<td>К-ть</td>
		<td>Малюнок</td>
		<td>Матування</td>
		<td>Термін</td>
		<td width="200px;">Примітка</td>
	</tr>
	{foreach from = $mattings item=row}
	<tr>
		<td>{$row.num}</td>	
		<td>{$row.name}</td>
		<td>{$row.height}x{$row.width}</td>
		<td>{$row.count}</td>
		<td valign=middle>
			<table><tr><td><img src="{$row.img}" width=50 height=100/></td><td>{$row.img_name}</td></tr></table>
		</td>
		<td><i>
			{$row.matting} <br />
			{if ($row.paint_price)}
				Ціна фарбування: {$row.paint_price} Грн.<br />
			{/if}
			{if ($row.mirror)}
				Дзеркальний мал.<br />
			{/if}
			{if ($row.back)}
				Тильна сторона<br />
			{/if}
			{if ($row.paint_color)}
				Кольори: {$row.paint_color}<br />
			{/if}</i>
            
		</td>
		<td>{$row.delivery_date}&nbsp;</td>
		<td>
            <textarea >
            </textarea>
        </td>
	</tr>
	<tr>
	<td colspan="8">
		<br>
		<br>
		<img src="{$row.img}"/>
		<br>
		<br>
	</td>
	</tr>
	{/foreach}
</table>		
	