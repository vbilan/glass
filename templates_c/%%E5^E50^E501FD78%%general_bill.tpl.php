<?php /* Smarty version 2.6.26, created on 2014-08-29 09:18:42
         compiled from general_bill.tpl */ ?>
<table width="100%">
	<tr>
		<td width="30%">&nbsp;</td>
		<td><center><h3>Бланк видачі</h3></center></td>
		<td align="right" width="30%">Клієнт: <strong><?php echo $this->_tpl_vars['client']['name']; ?>
 <?php echo $this->_tpl_vars['client']['phone']; ?>
</strong></td>
	</tr>
	<tr>
		<td width="30%">&nbsp;</td>
		<td ><center><h3>Замовлення № <?php echo $this->_tpl_vars['order']['id']%1000; ?>
<h3><center></td>
		<td width="30%">&nbsp;</td>
	</tr>
</table>
<form action="index.php" method="post">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['order']['id']; ?>
" />
<input type="hidden" name="action" value="edit_order" />
<input type="hidden" name="date" value="<?php echo $this->_tpl_vars['order']['date']; ?>
"/>
<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
	<fort color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br />
<?php endforeach; endif; unset($_from); ?>
<?php echo '
<style>
. hidden {
display:none;
}
</style>
'; ?>

<table cellpadding="0" cellspacing="0" border="1" width="100%">
	<tr>
		<td align="left" class="oddcolumn">
			<div id="sellings">
			
			</div>
		</td>					
	</tr>
	
</table>
</form>
<table width="100%">
	<tr>
		<td><strong>З бланком ознайомлений. Розміри та кількість записані вірно </strong></td>
		<td width="100px;">___________________</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="100px;">&nbsp;</td>
	</tr>	
	<tr>
		<td><strong>Замовлення отримав в повній кількості та  претензій щодо якості не маю</strong></td>
		<td width="100px;">___________________</td>
	<tr>
</table>		
<br />

Відгуки та пропозиції відправляйте на скриньку <strong>vashesklo@mail.ru</strong>, або залишайте на сайті <strong>http://vashesklo.com.ua</strong>

<script  type="text/javascript"  charset="windows-1251">


var i=0;

var facet_prices = new Array();
<?php $_from = $this->_tpl_vars['facet_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['size'] => $this->_tpl_vars['price']):
?>
facet_prices[<?php echo $this->_tpl_vars['size']; ?>
]=<?php echo $this->_tpl_vars['price']; ?>
;
<?php endforeach; endif; unset($_from); ?>
var good_prices = new Array();
<?php $_from = $this->_tpl_vars['good_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['good_type']):
?>
good_prices[<?php echo $this->_tpl_vars['good_type']['id']; ?>
]=<?php echo $this->_tpl_vars['good_type']['price']; ?>
;
<?php endforeach; endif; unset($_from); ?>
var drilling_prices = new Array();
<?php $_from = $this->_tpl_vars['drilling_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['price']):
?>
drilling_prices[<?php echo $this->_tpl_vars['id']; ?>
]=<?php echo $this->_tpl_vars['price']; ?>
;
<?php endforeach; endif; unset($_from); ?>

var j=0; 
var drilling_sizes = new Array();
<?php $_from = $this->_tpl_vars['drilling_size']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['size']):
?>
drilling_sizes[j++]=<?php echo $this->_tpl_vars['size']; ?>
;
<?php endforeach; endif; unset($_from); ?>

var kadran_price=<?php echo $this->_tpl_vars['kadran_price']; ?>
;


var skin_price=<?php echo $this->_tpl_vars['skin_price']; ?>
;

var photo_price = <?php echo $this->_tpl_vars['photo_price']; ?>
;

var matting_price = <?php echo $this->_tpl_vars['matting_price']; ?>
;

var parentVar = "set by parent";

<?php echo '

	function modalWin() {
		if (window.showModalDialog) {
		window.showModalDialog("matting_img.php","modal",
		"dialogWidth:700px;dialogHeight:800px");
		} else {
		window.open(\'matting_img.php\',\'modal\',
		\'height=700,width=900,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no ,modal=yes\');
		}
	} 



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
            add_clients_glass();
        } else {
            alert("error "+ req.status+":\\n" + req.statusText);
        }
        
    }
}

	
	function show_element(id){
		if (document.getElementById(id).style.display==\'block\'){
			document.getElementById(id).style.display=\'none\';
		} else {	
			document.getElementById(id).style.display=\'block\';
		}
	}

	
	function removeElement(elemID) {
		var elem = document.getElementById(elemID);
		elem.parentNode.removeChild(elem);
		calc_general_price();
	}
	
	function get_float_data(id, name){
	
		var data = parseFloat(document.getElementById(id).value);
		if (isNaN(data)) {
			alert(\'Не коректна \'+name);
			document.getElementById(id).focus();
		} else { 
			document.getElementById(id).value = data;
		}
		
		return data;
	}


	function adddrilling2(size, drilling_count, price, j){
			var name =\'drilling\';
		
			var s = \'\';			
			s += \'\\n<table width="100%"><tr><td width="40px;">&nbsp;</td>\'
			+\'\\n<td style="width:220px;font-style: italic; font-weight:bold;">Діаметр - \'+size+\' мм \';
			s+= \'\\n<input id="drilling_count_\'+j+\'_\'+size+\'" type="hidden" name="sellings[\'+j+\'][drilling][\'+size+\'][count]" value="\'+drilling_count+\'">\';
			s+= \'\\n<input id="drilling_post_price\'+j+\'_\'+size+\'" type="hidden" name="sellings[\'+j+\'][drilling][\'+size+\'][price]" value="\'+price+\'">\';
			
			s+= \'\\n</td><td > Кількість - \'+ drilling_count+\' шт.</td>\';
						
			//s+=\'\\n<td width="50px;"><input id="drilling_price_\'+j+\'_\'+size+\'" style="width:50px;" onchange="calc_drilling_price(\\\'\'+j+\'_\'+size+\'\\\')" name="sellings[\'+j+\'][drilling][price]" value="\'+drilling_prices[size]+\'" /></td>\';
			//s+=\'\\n<td width="20px;">\'+print_discounts(\'drilling_price_\'+j+\'_\'+size,\'drilling2_price_\'+j+\'_\'+size)+\'</td>\';
			//s+=\'\\n<td width="20px;"><input id="drilling2_price_\'+j+\'_\'+size+\'" value="\'+drilling_prices[size]+\'" style="width:35px;" disabled/></td>\';
			//s+=\'\\n<td width="60px;"><input style="width:60px;" disabled id="drilling_general_price\'+j+\'_\'+size+\'" value="\'+price+\'"/></td>\'
			//s+=\'\\n<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'drilling_\'+j+\'_\'+size+\'\\\')"></td>\';
			s+=\'</tr></table>\';
			document.getElementById(\'drilling_\'+j+\'_\'+size).innerHTML = s;
	}

	
	function adddrilling(){
		var size = document.getElementById(\'drilling_size\').value;
		var name =\'drilling\';
		
		var drilling_count = get_float_data(\'drilling_count\', \'кількість\');
		if (isNaN(drilling_count)) return;
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el==null || !el.checked) continue;
			
			adddrilling2(size, drilling_count,0, j);
			calc_drilling_price(j+\'_\'+size, j);
		}
		return true;	
	}
	
	function add_additional(){
		var text = document.getElementById(\'additional_text\').value;
		
		var price = get_float_data(\'additional_price\', \'ціна\');
		if (isNaN(price)) return;	
	
		for (var j=0; j <= i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el == null || !el.checked) continue;
			
			add_additional2(price*document.getElementById(\'count\'+j).value, text, j);
			
			calc_general_price();
		}
		return true;
	}
	
	function add_additional2(price, text,j){
	
			var s = \'<input type="hidden" name="sellings[\'+j+\'][additional][price]" value="\'+price+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][additional][text]" value="\'+text+\'">\';	
			s+= \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="font-style: italic; font-weight:bold; width:220px;">Додаткові послуги </td>\';
			s+= \'<td align=left>\'+text+\'</td>\';
			//s+= \'<td> ціна \'+price/document.getElementById(\'count\'+j).value+\'</td>\';
			//s+= \'\\n<td width="60px;"><input style="width:60px;" disabled  id="additional_general_price\'+j+\'" value="\'+price+\'"/></td>\';
			//s+= \'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'additional\' + j+\'\\\')"></td>\';
			s+= \'</tr></table>\';	
		document.getElementById(\'additional\'+j).innerHTML = s;
	}
	
	
	function add_kadran(){
			
		var kadran_num = document.getElementById(\'kadran_num\').value;
		
		var kadran_square = get_float_data(\'kadran_square\', \'площа\');
		if (isNaN(kadran_square)) return;
		
		for (var j=0; j <= i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			
			if (el == null || !el.checked) continue;
			
			add_kadran2(kadran_square, kadran_num, j);
			
			calc_kadran_price(j, kadran_square);
		}
		return true;
	}
	
	function add_kadran2(square, num,j){
			var s = \'<input type="hidden" name="sellings[\'+j+\'][kadran][square]" value="\'+square+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][kadran][num]" value="\'+num+\'">\';	
			s+= \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:220px; font-style: italic; font-weight:bold;">Квадрант (\'+square+\') </td>\';
			s+= \'<td>Колір - \'+num+\'</td>\';
			//s+=\'\\n<td width="50px;"><input id="kadran_price_\'+j+\'" style="width:50px;" onchange="calc_kadran_price(\\\'\'+j+\'\\\', \\\'\'+square+\'\\\')"  value="\'+kadran_price+\'" /></td>\';
			//s+=\'\\n<td width="20px;">\'+print_discounts(\'kadran_price_\'+j,\'kadran2_price_\'+j)+\'</td>\';
			//s+=\'\\n<td width="20px;"><input id="kadran2_price_\'+j+\'" value="\'+kadran_price+\'" style="width:35px;" disabled/></td>\';
			//s+=\'\\n<input type="hidden" name="sellings[\'+j+\'][kadran][price]" value="\' + kadran_price*square +\'">\'
			//s+=\'\\n<td width="60px;"><input style="width:60px;" disabled  id="kadran_general_price\'+j+\'" value="\'+kadran_price*square+\'"/></td>\';
		
			//s+=\'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'kadran\' + j+\'\\\')"></td></tr></table>\';	
		document.getElementById(\'kadran\'+j).innerHTML = s;
	}
	var services = new Array();
	services[0]=\'good\';
	services[1]=\'photo\';	
	services[2]=\'matting\';
	services[3]=\'grinding\';
	services[4]=\'polish\';
	services[5]=\'facet\';
	services[6]=\'skin\';
	
	
	function get_price(id){
		var el= document.getElementById(id);
		if (el == null ) return 0;
		return parseFloat(el.value);
	}
	
	function calc_general_price(){
		var general_price=0;
		
		for (var j=0; j<=i; j++){
			var el1= document.getElementById(\'checkbox\'+j);
			if (el1 == null ) continue;
			
			for (var l=0; l<services.length; l++){
				general_price += get_price(services[l]+\'_general_price\'+j);
			}
			for (var k=0; k<drilling_sizes.length; k++){
				general_price += get_price(\'drilling_general_price\'+j+\'_\'+drilling_sizes[k]);
			}
			general_price += get_price(\'matting_paint_price\'+j);
			
		}	
		document.all[\'price\'].value = Math.ceil(general_price*100)/100;
		document.all[\'price_visible\'].value = document.all[\'price\'].value;
	}
	
	function calc_drilling_price(id, j){
		var price = get_float_data(\'drilling_price_\'+id, \'ціна\');
		if (isNaN(price)) return;
		
		document.getElementById(\'drilling_\'+id).value = price;
		document.getElementById(\'drilling_general_price\'+id).value = Math.ceil(price * document.getElementById(\'drilling_count_\'+id).value*document.getElementById(\'count\'+j).value*100)/100;
		document.getElementById(\'drilling_post_price\'+id).value = document.getElementById(\'drilling_general_price\'+id).value;
		calc_general_price();
	}
	
	function calc_sellins_price(id){
		var price = get_float_data(\'good_type_\'+id, \'ціна\');
		if (isNaN(price)) return;
		
		document.getElementById(\'good_type_\'+id).value = price;
		document.getElementById(\'good_general_price\'+id).value = Math.ceil(price * document.getElementById(\'count\'+id).value * document.getElementById(\'height\'+id).value* document.getElementById(\'width\'+id).value / 10000)/100;
		calc_general_price();
	}
	
	function calc_photo_price(j, s){
		var price = get_float_data(\'photo_price_\'+j, \'ціна\');
		if (isNaN(price)) return;
		document.getElementById(\'photo_general_price\'+j).value = Math.ceil(price*s*100*document.getElementById(\'count\'+j).value)/100;
		
		document.all[\'sellings[\'+j+\'][photo][price]\'].value = document.getElementById(\'photo_general_price\'+j).value;
		 
		calc_general_price();
	}
	
	function calc_matting_price(j, s){
		var price = get_float_data(\'matting_price_\'+j, \'ціна\');
		if (isNaN(price)) return;
		document.getElementById(\'matting_general_price\'+j).value = Math.ceil((price*s+parseInt(document.getElementById(\'matting_paint_price\'+j).value))*100*document.getElementById(\'count\'+j).value)/100;
		
		
		document.all[\'sellings[\'+j+\'][matting][price]\'].value = document.getElementById(\'matting_general_price\'+j).value;
		calc_general_price();
	}
	
	
	function calc_skin_price(j, s){
		var price = get_float_data(\'skin_price_\'+j, \'ціна\');
		if (isNaN(price)) return;
		document.getElementById(\'skin_general_price\'+j).value = Math.ceil(price*s*100*document.getElementById(\'count\'+j).value)/100;
		
		
		document.all[\'sellings[\'+j+\'][skin][price]\'].value = document.getElementById(\'skin_general_price\'+j).value;
		calc_general_price();
	}
	
	
	function calc_service_price(name,j){
		var price = get_float_data(name+\'_\'+j, \'ціна\');
		if (isNaN(price)) return;
		document.getElementById(name+\'_general_price\'+j).value = Math.ceil(document.getElementById(name+j+\'l\').value * price * document.getElementById(\'count\'+j).value/10)/100;
		document.all[\'sellings[\'+j+\'][\'+name+\'][price]\'].value = document.getElementById(name+\'_general_price\'+j).value;
		
		calc_general_price();
	}
	
	function getCheckedValue(radioObj) {
		if(!radioObj)
			return "";
		var radioLength = radioObj.length;
		if(radioLength == undefined)
			if(radioObj.checked)
				return radioObj.value;
			else
				return "";
		for(var i = 0; i < radioLength; i++) {
			if(radioObj[i].checked) {
				return radioObj[i].value;
			}
		}
		return "";
	}
	
	
	function add_skin2(j, height, width, gprice){
		var s = \'<input type="hidden" name="sellings[\'+j+\'][skin][width]" value="\'+width+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][skin][height]" value="\'+height+\'">\';	
			s+= \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="font-style: italic; font-weight:bold;">Плівка антитравматична (\'+height*width/1000000+\') </td>\';
			
			//s+=\'\\n<td width="50px;"><input id="skin_price_\'+j+\'" style="width:50px;" onchange="calc_skin_price(\\\'\'+j+\'\\\', \\\'\'+height*width/1000000+\'\\\')"  value="\'+skin_price+\'" /></td>\';
			//s+=\'\\n<td width="20px;">\'+print_discounts(\'skin_price_\'+j,\'skin2_price_\'+j)+\'</td>\';
			//s+=\'\\n<td width="20px;"><input id="skin2_price_\'+j+\'" value="\'+skin_price+\'" style="width:35px;" disabled/></td>\';
			//s+=\'\\n<input type="hidden" name="sellings[\'+j+\'][skin][price]" value="\' + gprice +\'">\'
			//s+=\'\\n<td width="60px;"><input style="width:60px;" disabled  id="skin_general_price\'+j+\'" value="\'+gprice+\'"/></td>\';
		
			//s+=\'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'skin\' + j+\'\\\')"></td></tr></table>\';	
		document.getElementById(\'skin\'+j).innerHTML = s;
		
	}
	
	function add_skin(){
		for (var j=0; j<=i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el==null || !el.checked) continue;
			
			var height = document.getElementById(\'height\'+j).value;
			var width = document.getElementById(\'width\'+j).value;
			
			add_skin2(j, height, width, 0);
			calc_skin_price(j, height*width/1000000);
		}
	}


	function addmatting2(j, height, width, img, mirror, back, paint_price,paint_color, type, gprice){
			var s = \'<input type="hidden" name="sellings[\'+j+\'][matting][width]" value="\'+width+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][matting][height]" value="\'+height+\'">\';
	
			s += \'<input type="hidden" name="sellings[\'+j+\'][matting][image]" value="\'+img+\'">\';
			
			s += \'<input type="hidden" name="sellings[\'+j+\'][matting][type]" value="\'+getCheckedValue(document.all[\'matting_type\'])+\'">\';
			
			s += \'<input id="matting_paint_colors\'+j+\'" type="hidden" name="sellings[\'+j+\'][matting][paint_color]" value="\'+paint_color+\'">\';
			s += \'<input id="matting_paint_price\'+j+\'" type="hidden" name="sellings[\'+j+\'][matting][paint_price]" value="\'+paint_price+\'">\';
				
			s += \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;"> Матування (S=\'+height*width/1000000+\')</td>\';
			
			s +=\'\\n<td width="45px;"> <strong>\'+height+\'x\'+width+\'</strong></td>\';
			
			
			
			s+=\'<td ><img style="width:60px;height:120px;" src="\'+img+\'"/></td><td>\';
			
			s+= \'<ul><li>\'+type;
			
			if (mirror){
				s += \'<li><input type="hidden" name="sellings[\'+j+\'][matting][mirror]" value="1">Дзеркальне відображення\';
			
			}
			
			if (back){
				s += \'<li><input type="hidden" name="sellings[\'+j+\'][matting][back]" value="1">Тильна сторона\';
			}
			
			if (paint_price>0){
				s+= \'<li>Фарбування \' + paint_price +\' грн.\';
				s+= \'<li>Колір фарбування \' + paint_color;
			}
			
			s +=\'</ul></td>\';
			
		//	s+=\'\\n<td width="50px;"><input id="matting_price_\'+j+\'" style="width:50px;" onchange="calc_matting_price(\\\'\'+j+\'\\\', \\\'\'+height*width/1000000+\'\\\')"  value="\'+matting_price+\'" /></td>\';
		//	s+=\'\\n<td width="20px;">\'+print_discounts(\'matting_price_\'+j,\'matting2_price_\'+j)+\'</td>\';
		//	s+=\'\\n<td width="20px;"><input id="matting2_price_\'+j+\'" value="\'+matting_price+\'" style="width:35px;" disabled/></td>\';
		//	s+=\'\\n<input type="hidden" name="sellings[\'+j+\'][matting][price]" value="\' + gprice +\'">\'
		//	s+=\'\\n<td width="60px;"><input style="width:60px;" disabled  id="matting_general_price\'+j+\'" value="\'+gprice+\'"/></td>\';
		
		//	s+=\'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'matting\' + j+\'\\\')"></td></tr></table>\';
			document.getElementById(\'matting\'+j).innerHTML = s;
		
	}
		
	function addmatting(){
	
		if (document.getElementById(\'matting_img\').src==\'\') {
			alert("Не вибрано малюнка");
			return;
		}
		
		var paint_price = 0;
		paint_color = 0;
		if (document.getElementById(\'paint\').checked){
			paint_price = get_float_data(\'paint_price\', \'ціна\');
			if (isNaN(paint_price)) return;
			
			if (document.getElementById(\'paint_color\').value!=\'\'){
			 	paint_color = document.getElementById(\'paint_color\').value;
			}
			alert(document.getElementById(\'paint_color\').value);
		}
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el==null || !el.checked) continue;
			
			var height = document.getElementById(\'height\'+j).value;
			var width = document.getElementById(\'width\'+j).value;
			
			addmatting2(j, height, width, document.getElementById(\'matting_img\').src, document.getElementById(\'mirror\').checked,
				document.getElementById(\'back\').checked, paint_price, paint_color, getCheckedValue(document.all[\'matting_type\']), 0);
			
			calc_matting_price(j, height*width/1000000);
		}
		
	}
	
	function addphotoprint2(height, width, j, photo, price){
			
			var s = \'<input type="hidden" name="sellings[\'+j+\'][photo][width]" value="\'+width+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][photo][height]" value="\'+height+\'">\';
			s += \'<input type="hidden" name="sellings[\'+j+\'][photo][image]" value="\'+photo+\'">\';
			
			s += \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;"> Фотодрук (S=\'+height*width/1000000+\')</td>\';
			
			s +=\'\\n<td width="100px;"> <strong>\'+height+\' x \'+width+\' </strong></td>\';
			
			s+=\'<td >Фотографія - <strong>"\'+photo+\'"</strong></td>\';
			
			//s+=\'\\n<td width="50px;"><input id="photo_price_\'+j+\'" style="width:50px;" onchange="calc_photo_price(\\\'\'+j+\'\\\', \\\'\'+height*width/1000000+\'\\\')"  value="\'+photo_price+\'" /></td>\';
			//s+=\'\\n<td width="20px;">\'+print_discounts(\'photo_price_\'+j,\'photo2_price_\'+j)+\'</td>\';
			//s+=\'\\n<td width="20px;"><input id="photo2_price_\'+j+\'" value="\'+photo_price+\'" style="width:35px;" disabled/></td>\';
			//s+=\'<input type="hidden" name="sellings[\'+j+\'][photo][price]" value="\'+price+\'">\';
			//s+=\'\\n<td width="60px;"><input style="width:60px;" disabled  id="photo_general_price\'+j+\'"  value="\'+price+\'"/></td>\'
		
			//s+=\'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'photoprinting\' + j+\'\\\')"></td></tr></table>\';
			document.getElementById(\'photoprinting\'+j).innerHTML = s;
		
	}
	
	function addphotoprint(){
	
		var height = get_float_data(\'photo_height\',\'висота\');
		if (isNaN(height)) return;
		
		var width = get_float_data(\'ptoto_width\', \'ширина\');
		if (isNaN(width)) return;
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el==null || !el.checked) continue;
			
			addphotoprint2(height, width, j, document.getElementById(\'photos\').value, 0);
			calc_photo_price(j, height*width/1000000);
		}
		
	}
	
	function add_selling2(height, width, count, good_type, label, price){
		el = document.createElement("div");
		el.id = i;
		
		var s1=\'\';
		if (good_type!=0) {
			s1+=\'\\n<td  class="column" width="215px;" ><input onchange="calc_sellins_price(\'+i+\')" style="width:50px;" name="sellings[\'+i+\'][price]" id="good_type_\'+i+\'" value="\'+good_prices[good_type]+\'" /> \';
			s1+=print_discounts(\'good_type_\'+i,\'good_type2_\'+i);
			s1+=\'\\n<input id="good_type2_\'+i+\'" value="\'+good_prices[good_type]+\'" style="width:35px;" disabled/>\';
			s1+=\'\\n<input style="width:60px;" disabled id="good_general_price\'+i+\'" value="\'+price+\'"/></td>\';
		}
		
		'; ?>

		var driling_data ='';
		<?php $_from = $this->_tpl_vars['drilling_size']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['size']):
?>
		driling_data +='\n<div style="margine-left:20px;" id="drilling_'+i+'_'+<?php echo $this->_tpl_vars['size']; ?>
+'"></div>';
		<?php endforeach; endif; unset($_from); ?>
		<?php echo '
		el.innerHTML=\'<div id="\'+i+\'_selling"><input type="hidden" name="sellings[\'+i+\'][good_type]" value="\'+good_type+\'" />\'+
		\'<table  cellpadding="0" cellspacing="0" border="1" width="100%">\'
		+\'\\n<tr>\'
		//+\'\\n<td width="20px;"><input id="checkbox\'+i+\'" type="checkbox" /></td>\'
		+\'\\n<td class="column">\'+label+\' (\'+width*height/1000000+\')</td>\'
		+\'\\n<td class="column" width="100px;"> <strong>\'+height+\'x\'+width+\'</strong><input value="\'+height+\'" id="height\'+i+\'" type="hidden" name="sellings[\'+i+\'][height]"/>\'
		+\'\\n<input value="\'+width+\'" id="width\'+i+\'" type="hidden" name="sellings[\'+i+\'][width]" /> </td>\'
		
		
		
		+\'\\n<td class="column" width="100px;"> кі-сть  <strong>\'+count+\'</strong><input  value="\'+count+\'" id="count\'+i+\'" type="hidden" name="sellings[\'+i+\'][count]" value="1"/></td>\'
		
		//+ s1
		//+\'\\n<td class="column" width="20px;"><input type="button" value="X" onclick="removeElement(\'+i+\')" /></td>\';
		+\'</tr></table></div>\'
		+\'\\n<div id="grinding\'+i+\'"></div><div id="polish\'+i+\'"></div><div id="facet\'+i+\'"></div>\'
		+\'\\n<div id="drilling\'+i+\'">\'+driling_data+\'</div>\'
		+\'\\n<div id="matting\'+i+\'"></div>\'
		+\'\\n<div id="photoprinting\'+i+\'"></div>\'
		+\'\\n<div id="skin\'+i+\'"></div>\'
		+\'\\n<div id="kadran\'+i+\'"></div>\'
		+\'\\n<div id="additional\'+i+\'"></div>\';
		
		document.getElementById(\'sellings\').appendChild(el);
		
	}
	
	function add_selling(){
	
		var height = get_float_data(\'height\',\'висота\');
		if (isNaN(height)) return;
		
		var width = get_float_data(\'width\', \'ширина\');
		if (isNaN(width)) return;
		

		var count = get_float_data(\'count\');
		if (isNaN(count)) return;
		
		var good_type = document.getElementById(\'types\').value;
		var label = document.getElementById(\'types\').options[document.getElementById(\'types\').selectedIndex].label;
		
		add_selling2(height, width, count, good_type, label, 0);
		
		calc_sellins_price(i);
		i++;
	}
	
	function check_all_sellings(){
		for (var j=0; j<=i; j++){
			if (document.getElementById(\'checkbox\'+j)==null) continue;
			document.getElementById(\'checkbox\'+j).checked = true;
		}	
	}
	
	function clear_element(id){
		document.getElementById(id).innerHTML=\'\';
		calc_general_price();
	}
	
	function print_checkbox(name, checked){
		var ch=\'\';
		if (checked){
			ch=\'checked\';
		}
		return \'<input  type="checkbox" name="\'+name+\'" \'+ch+\' onclick="fixdata(this)" />\';
	}
	
	function fixdata(checkbox){
		checkbox.checked = !checkbox.checked;
	}
	
	function set_discount(id1,id2, select){
			var el = document.getElementById(id1)
			el.value = Math.ceil(document.getElementById(id2).value *(100-select.value))/100;
			if (el.onchange)el.onchange();
	}
	
	
	
	function check_long(id1,id2){
		return document.getElementById(id1).checked ? parseInt(document.getElementById(id2).value):0;
	}
	
	function check_long2(checked,id2){
		return checked ? parseInt(document.getElementById(id2).value):0;
	}
	
	function addservice2(name, caption, checkboxes_data, j, price, price2, size, length){
			var long = 0;
			var s1 = \'\';
			
			var order = new Array();
			order[0]=0;
			order[1]=2;
			order[2]=1;
			order[3]=3;
			var side = \'height\';
			
			long = length;
			
			for (var k=0; k<4; k++){
				if (k>1) {
					side = \'width\';
				}
				
				if (length == 0){
					long += check_long2(checkboxes_data[order[k]], side+j);
				} 
				s1 += print_checkbox(\'sellings[\'+j+\'][\'+name+\'][\'+(order[k]+1)+\']\', checkboxes_data[order[k]]);
			}

			var s = \'\';
			
			s += \'<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;">\' + caption;
			s+= \'&nbsp;&nbsp;\' + (size>0 ? \'<input type="hidden" name="sellings[\'+j+\'][\'+name+\'][size]" value="\'+size+\'">(\'+size+\' mm)\': \'\')+\'</td>\'
			
			s+= \'</td><td style="width:100px;">\';
			
			
			s += s1;
			
			s+=\'<td >Довжина - \'+long+\' мм</td>\';
		//	s+=\'<td width="50px;"><input style="width:50px;" onchange="calc_service_price(\\\'\'+name+\'\\\',\\\'\'+j+\'\\\')"  id="\'+name+\'_\'+j+\'" value="\'+price+\'" /></td>\';
		//	s+=\'<td width="20px;">\'+print_discounts(name+\'_\'+j,name+\'2_\'+j)+\'</td>\';
		//	s+=\'<td width="20px;"><input id="\'+name+\'2_\'+j+\'" value="\'+price+\'" style="width:35px;" disabled/></td>\';
		//	s+=\' <input type="hidden" name="sellings[\'+j+\'][\'+name+\'][price]" value="\'+price2+\'" />\';
		//	s+=\'<td width="60px;"><input style="width:60px;" disabled  id="\'+name+\'_general_price\'+j+\'" value="\'+price2+\'" /></td>\'
		//	s+=\'<td width="20px;"><input type="button" value="X" onclick="clear_element(\\\'\'+name + j+\'\\\')"></td></tr></table>\';
			document.getElementById(name+j).innerHTML = s;
			
		
	}
	
	function addservice(name, caption, id, price, size){
		if (check_checkboxes(id,false)) return false;
		for (var j=0; j<=i; j++){
			var el= document.getElementById(\'checkbox\'+j);
			if (el==null || !el.checked) continue;

			var checkboxes_data = new Array();
			for (var k=1; k<5; k++){
				checkboxes_data[k-1]= document.getElementById(id+k).checked;
			}
			addservice2(name, caption, checkboxes_data, j, price, 0, size, 0);
			calc_service_price(name,j);
		}
		return true;	
	}
	
	'; ?>

	var polish_price = <?php echo $this->_tpl_vars['polish_price']; ?>
;
	var grinding_price = <?php echo $this->_tpl_vars['grinding_price']; ?>
;
	<?php echo '	
	function addpolish(){
		addservice(\'polish\', \'Поліровка\', \'p\', polish_price, 0);
	}
	
	function addgrinding(){
		addservice(\'grinding\', \'Шіфування\', \'g\',grinding_price, 0);
	}
	
	
	function addfacet(){
		addservice(\'facet\', \'Фацет\', \'f\',facet_prices[document.getElementById(\'facet_size\').value] ,document.getElementById(\'facet_size\').value);
	}
	
	function check_checkboxes(id,value){
		var result= true;
		for (var j=1; j<5; j++){
			if (document.getElementById(id+j).checked==value) continue;
			result = false;
			break;
		}
		return result;
	}
	
	function fix_check_all(id){
		document.getElementById(id).checked = check_checkboxes(id,true);
	}
	
	function check_all(check_box){
		for (var j=1; j<5; j++){
			document.getElementById(check_box.id+j).checked = check_box.checked;
		}	
	}
	
	function print_discounts(id1,id2){
		var result=\'<select onchange="set_discount(\\\'\'+id1+\'\\\',\\\'\'+id2+\'\\\',this)">\';
		result+=\'<option value="0">0 %</option>\';
		'; ?>

			<?php $_from = $this->_tpl_vars['discounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['discount']):
?>
		result+='<option value="'+<?php echo $this->_tpl_vars['discount']; ?>
+'">'+<?php echo $this->_tpl_vars['discount']; ?>
+' %</option>';
			<?php endforeach; endif; unset($_from); ?>
		<?php echo '
		result+=\'</select>\';
		return result;
	}
	
	function add_clients_glass(){
	 //	document.getElementById(\'types\').innerHTML += \'<option value="0" label="Скло клієнта">Скло клієнта</option>\';
	}
   
    add_clients_glass();   
'; ?>
	
	<?php if (( $this->_tpl_vars['order']['id'] )): ?>
		<?php $_from = $this->_tpl_vars['sellings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['selling']):
?>
			add_selling2(<?php echo $this->_tpl_vars['selling']['height']; ?>
, <?php echo $this->_tpl_vars['selling']['width']; ?>
, <?php echo $this->_tpl_vars['selling']['count']; ?>
, <?php echo $this->_tpl_vars['selling']['good_type']; ?>
, '<?php echo $this->_tpl_vars['selling']['name']; ?>
',<?php echo $this->_tpl_vars['selling']['price']; ?>
 );
			<?php echo $this->_tpl_vars['selling']['services']; ?>

			i++;
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	
</script>	