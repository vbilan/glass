<?php /* Smarty version 2.6.26, created on 2016-09-05 17:53:19
         compiled from edit_good.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'edit_good.tpl', 54, false),)), $this); ?>
<?php echo '
<script  type="text/javascript"  charset="windows-1251">

	req = false;
    try { 
        req = new ActiveXObject(\'Msxml2.XMLHTTP\');
    } catch (e) {
        try {
            req=new ActiveXObject(\'Microsoft.XMLHTTP\');
        } catch (e) {
            if(window.XMLHttpRequest){ 
               req = new XMLHttpRequest();
            }
        }
    }

function callServer(select) {

  	var url = "options.php?id=" + select.value;
  	req.open("GET", url, true);

  	req.onreadystatechange = updatePage;

  	req.send(null);
  	
}

function updatePage() {
    if (req.readyState == 4){
        if (req.status == 200) {
        if (req.responseText.length>5) 
             document.getElementById(\'types\').innerHTML = req.responseText;
        } else {
            alert("error "+ req.status+":\\n" + req.statusText);
        }
        
    }
}
</script>
'; ?>


<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['good']['id']; ?>
" />
<input type="hidden" name="date" value="<?php echo $this->_tpl_vars['good']['date']; ?>
" />
<input type="hidden" name="action" value="edit_good" />
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<table cellpadding="0" cellspacing="0" border="1" width="400">
	<tr>
		<td align="right" class="evencolumn" >Група товарів</td>
		<td align="left" class="oddcolumn">
			<select name="groupe" onchange='callServer(this);'>
				<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['good_groupe_ids'],'selected' => $this->_tpl_vars['groupe'],'output' => $this->_tpl_vars['good_groupe_values']), $this);?>

			</select>
	</tr>
	<tr>
		<td align="right" class="evencolumn" >Товар </td>
		<td align="left" class="oddcolumn">
			<select id="types" name="type">
				<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['good_type_ids'],'selected' => $this->_tpl_vars['good']['type'],'output' => $this->_tpl_vars['good_type_values']), $this);?>

			</select>
		</td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn"> Площа </td>
		<td align="left" class="oddcolumn"><input type="text" name="square" value="<?php echo $this->_tpl_vars['good']['square']; ?>
" maxlength="20" /><?php echo $this->_tpl_vars['unit_of_measurement']; ?>
</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> Ціна закупки </td>
		<td align="left" class="oddcolumn"><input type="text" name="buying_price" value="<?php echo $this->_tpl_vars['good']['buying_price']; ?>
" maxlength="20" /></td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">Коментар </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" ><?php echo $this->_tpl_vars['good']['comment']; ?>
</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="Зберегти" /></td>
		<td align="left"><input type="button" value="Відміна" onclick="history.back();"/></td>					
	</tr>
</table>
</form>