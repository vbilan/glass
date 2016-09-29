{foreach from=$orders item=row}
<iframe src="index.php?action=general_bill&id={$row.id}" name="{$row.id}">
{/foreach}
