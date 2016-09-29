<?php
include_once 'db/dao_manager.php';

$good_types = dao_manager :: get_table_data('goods_type', 0, 10000, ' where actual=1 and groupe='.$_GET ['id'].' ORDER BY name');

$result = '';

foreach ($good_types as $values) {
	$result .= "<option label=\"{$values['name']}\" value=\"{$values['id']}\">{$values['name']}</option>";
}

header("Content-type: text/xml; charset=windows-1251");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

echo $result;
?>