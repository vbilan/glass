<form action="index.php" method="post">
<input type="hidden" name="id" value="{$order.id}" />
<input type="hidden" name="action" value="edit_order" />
<input type="hidden" name="date" value="{$order.date}"/>
{foreach from = $errors item=error}
	<fort color="red">{$error}</font><br />
{/foreach}

<table cellpadding="0" cellspacing="0" border="1" width="1000">
	<tr>
		<td align="right" class="evencolumn" width="80px;">�볺�� </td>
		<td align="left" class="oddcolumn">
			<select name="client[id]">
				{html_options values=$clients_ids selected=$order.client output=$clients_values}
			</select>
			<input type="button" value="�����" onclick="show_element('client')">
			<div id="client" style='display:none;'>
				<table style="margin-top:10px" cellpadding="0" cellspacing="0" border="2" width="100%">					
					<tr>						
						<td align="right" class="column" >�볺�� </td>						
						<td align="left" class="column"><input type="text" name="client[name]" maxlength="20" /></td>
					</tr>
					<tr>						
						<td align="right" class="column">������� </td>
						<td align="left" class="column"><input type="text" name="client[phone]" maxlength="20" /></td>					
					</tr>
					<tr>
						<td align="right" class="column">�������� </td>
						<td align="left" class="column"><textarea  name="client[comment]" ></textarea></td>	
					</tr>				
				</table>
			</div>
			
		</td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn"> ������ </td>
		<td align="left" class="oddcolumn">
			<div id="sellings">
			
			</div>
			<hr>
			<div style="margin-top:6px;">
				<input type="button" value="v" onclick="check_all_sellings()"/><br>
				
				<select name="groupe" onchange='callServer(this);'>
					{html_options values=$good_groupe_ids selected=$goods_type.groupe output=$good_groupe_values}
				</select>
				<select id="types">
					{html_options values=$good_type_ids output=$good_type_values}
				</select>
				
				���. : <input id="height" type="text" value="1000" style="width:45px;"/>
				���. : <input id="width" type="text" value="1000" style="width:45px;"/> 
				�-��� : <input id="count" type="text" value="1" style="width:35px;"/>
		
				<input type="button" value="��������" onclick="add_selling()"/>
				
			</div>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> ��������� </td>
		<td align="left" class="oddcolumn">
			<input id="g" type="checkbox" onchange="check_all(this);" /> &nbsp;&nbsp;&nbsp;&nbsp;
					
			<input id="g1" type="checkbox" onchange="fix_check_all('g')"/>
			<input type="checkbox" id="g3" onchange="fix_check_all('g')" />
			&nbsp;&nbsp;&nbsp;
			
			<input id="g2" type="checkbox" onchange="fix_check_all('g')" />
			<input id="g4" type="checkbox" onchange="fix_check_all('g')" />
			
			&nbsp;&nbsp;&nbsp<input type="button" value="������" onclick="addgrinding()"/>
			
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn"> �������� </td>
		<td align="left" class="oddcolumn">
			<input id="p" type="checkbox" onchange="check_all(this);" /> &nbsp;&nbsp;&nbsp;&nbsp;		
			<input id="p1" type="checkbox" onchange="fix_check_all('p')" />
			<input type="checkbox" id="p3" onchange="fix_check_all('p')" />
			&nbsp;&nbsp;&nbsp;
			<input id="p2" type="checkbox" onchange="fix_check_all('p')" />
			<input id="p4" type="checkbox" onchange="fix_check_all('p')" />
			&nbsp;&nbsp;&nbsp<input type="button" value="������" onclick="addpolish()"/>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">�����</td>
		<td align="left" class="oddcolumn">
			<input id="f" type="checkbox" onchange="check_all(this);" /> &nbsp;&nbsp;&nbsp;&nbsp;		
			<input id="f1" type="checkbox" onchange="fix_check_all('f')" />
			<input type="checkbox" id="f3" onchange="fix_check_all('f')" />
			&nbsp;&nbsp;&nbsp;
			<input id="f2" type="checkbox" onchange="fix_check_all('f')" />
			<input id="f4" type="checkbox" onchange="fix_check_all('f')" />
			&nbsp;&nbsp;&nbsp 
			<select id="facet_size">
					{html_options values=$facet_size output=$facet_size}
			</select>
			<input type="button" value="������" onclick="addfacet()"/>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">��������</td>
		<td align="left" class="oddcolumn">
			�-��� :<input type="text" style="width:30px;" id="drilling_count" value="1"/>&nbsp;&nbsp;
			������ :<select id="drilling_size">
					{html_options values=$drilling_size output=$drilling_size}
			</select>	
			<input type="button" value="������" onclick="adddrilling()"/>
		</td>					
	</tr>
	
	<tr>
		<td align="right" class="evencolumn">��������</td>
		<td align="left" class="oddcolumn">
				<select id="photos">
					{html_options values=$photos output=$photos}
				</select>
			
				������ : <input id="photo_height" type="text" value="1000" style="width:45px;"/>
				������ : <input id="ptoto_width" type="text" value="1000" style="width:45px;"/> 
				<input type="button" value="������" onclick="addphotoprint()"/>
		</td>					
	</tr>
	 
	<tr>
		<td align="right" class="evencolumn">���������</td>
		<td align="left" class="oddcolumn">
				<table cellpadding="0" cellspacing="0" border=1 style="margin-bottom:10px;" ><tr><td>
				<table cellpadding="0" cellspacing="0" >
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<input id="matting_type" type="radio" name="matting_type" value="���" /> ��� �������
									</td>
								<tr>
								</tr>	
									<td>	
										<input type="radio" name="matting_type"  checked value="�������" /> ���. �������
									</td>
								</tr>
							</table>
							<input id="mirror" type="checkbox" /><label for="mirror"> ���������� �����������</label><br />
							<input id="back" type="checkbox" /><label for="back"> ������ �������</label><br />
							<input id="paint" type="checkbox" /><label for="paint"> ����������</label>
								<input id="paint_price" type="text"style="width:35px;"/> 
								<input id="paint_color" style="width:40px;" type="text"/> <br />
							
						</td>
						<td style="padding-left:10px" align="center">
						<img  id="matting_img" style="display:none; margin:10px;" width="60px;" height="120px;" />
						<a href="#" 
							onclick="modalWin(); return false;">���.</a> 	
						</td>
					</tr>
				</table>			
				</td>
				</tr>
				</table>						
				<input type="button" value="������" onclick="addmatting()"/>
		</td>					
	</tr> 
	
	<tr>
		<td align="right" class="evencolumn"> ����� </td>
		<td align="left" class="oddcolumn">
			<input type="button" value="������ ��������������� �����" onclick="add_skin()"/>
		</td>					
	</tr>
	
	 
	<tr>
		<td align="right" class="evencolumn"> ֳ�� </td>
		<td align="left" class="oddcolumn"><input disabled type="text" name="price_visible" value="{$order.price}" maxlength="20" /></td>	
		<input type="hidden" name="price" value="{$order.price}" maxlength="20" />				
	</tr>
	<tr>
		<td align="right" class="evencolumn"> ��������/�������� </td>
		<td align="left" class="oddcolumn">
			<input type="text" name="advance" value="{$order.advance}" maxlength="20" />
			<input type="hidden" name="advance_old" value="{$order.advance}"/>
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">����� ���������</td>
		<td align="left" class="oddcolumn">
			<input type="text" name="delivery_date" value="{$order.delivery_date}" maxlength="20" />
		</td>					
	</tr>
	<tr>
		<td align="right" class="evencolumn">�������� </td>
		<td align="left" class="oddcolumn"><textarea  name="comment" >{$order.comment}</textarea></td>					
	</tr>	
		
</table>
<table  width="300">
	<tr>
		<td width="44%" align="right"><input type="submit" name="submit" value="��������" /></td>
		<td align="left"><input type="button" value="³����" onclick="history.back();"/></td>						
	</tr>
</table>
</form>

<script  type="text/javascript"  charset="windows-1251">

var i=0;

var facet_prices = new Array();
{foreach from = $facet_price key=size item=price}
facet_prices[{$size}]={$price};
{/foreach}
var good_prices = new Array();
{foreach from = $good_types  item=good_type}
good_prices[{$good_type.id}]={$good_type.price};
{/foreach}
var drilling_prices = new Array();
{foreach from = $drilling_price key=id item=price}
drilling_prices[{$id}]={$price};
{/foreach}

var j=0; 
var drilling_sizes = new Array();
{foreach from = $drilling_size item=size}
drilling_sizes[j++]={$size};
{/foreach}

var skin_price={$skin_price};

var photo_price = {$photo_price};

var matting_price = {$matting_price};

var parentVar = "set by parent";

{literal}

	function modalWin() {
		if (window.showModalDialog) {
		window.showModalDialog("matting_img.php","modal",
		"dialogWidth:700px;dialogHeight:800px");
		} else {
		window.open('matting_img.php','modal',
		'height=700,width=900,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no ,modal=yes');
		}
	} 



	req = false;
    try { 
        req = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            req=new ActiveXObject('Microsoft.XMLHTTP');
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
            document.getElementById('types').innerHTML = req.responseText;
            add_clients_glass();
        } else {
            alert("error "+ req.status+":\n" + req.statusText);
        }
        
    }
}

	
	function show_element(id){
		if (document.getElementById(id).style.display=='block'){
			document.getElementById(id).style.display='none';
		} else {	
			document.getElementById(id).style.display='block';
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
			alert('�� �������� '+name);
			document.getElementById(id).focus();
		} else { 
			document.getElementById(id).value = data;
		}
		
		return data;
	}


	function adddrilling2(size, drilling_count, price, j){
			var name ='drilling';
		
			var s = '';			
			s += '\n<table width="100%"><tr><td width="40px;">&nbsp;</td>'
			+'\n<td style="width:220px;font-style: italic; font-weight:bold;">ĳ����� - '+size+' �� ';
			s+= '\n<input id="drilling_count_'+j+'_'+size+'" type="hidden" name="sellings['+j+'][drilling]['+size+'][count]" value="'+drilling_count+'">';
			s+= '\n<input id="drilling_post_price'+j+'_'+size+'" type="hidden" name="sellings['+j+'][drilling]['+size+'][price]" value="'+price+'">';
			
			s+= '\n</td><td > ʳ������ - '+ drilling_count+' ��.</td>';
						
			s+='\n<td width="50px;"><input id="drilling_price_'+j+'_'+size+'" style="width:50px;" onchange="calc_drilling_price(\''+j+'_'+size+'\')" name="sellings['+j+'][drilling][price]" value="'+drilling_prices[size]+'" /></td>';
			s+='\n<td width="20px;">'+print_discounts('drilling_price_'+j+'_'+size,'drilling2_price_'+j+'_'+size)+'</td>';
			s+='\n<td width="20px;"><input id="drilling2_price_'+j+'_'+size+'" value="'+drilling_prices[size]+'" style="width:35px;" disabled/></td>';
			s+='\n<td width="60px;"><input style="width:60px;" disabled id="drilling_general_price'+j+'_'+size+'" value="'+price+'"/></td>'
			s+='\n<td width="20px;"><input type="button" value="X" onclick="clear_element(\'drilling_'+j+'_'+size+'\')"></td></tr></table>';
			document.getElementById('drilling_'+j+'_'+size).innerHTML = s;
	}

	
	function adddrilling(){
		var size = document.getElementById('drilling_size').value;
		var name ='drilling';
		
		var drilling_count = get_float_data('drilling_count', '�������');
		if (isNaN(drilling_count)) return;
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById('checkbox'+j);
			if (el==null || !el.checked) continue;
			
			adddrilling2(size, drilling_count,0, j);
			calc_drilling_price(j+'_'+size, j);
		}
		return true;	
	}
	
	var services = new Array();
	services[0]='good';
	services[1]='photo';	
	services[2]='matting';
	services[3]='grinding';
	services[4]='polish';
	services[5]='facet';
	services[6]='skin';
	
	
	function get_price(id){
		var el= document.getElementById(id);
		if (el == null ) return 0;
		return parseFloat(el.value);
	}
	
	function calc_general_price(){
		var general_price=0;
		
		for (var j=0; j<=i; j++){
			var el1= document.getElementById('checkbox'+j);
			if (el1 == null ) continue;
			
			for (var l=0; l<services.length; l++){
				general_price += get_price(services[l]+'_general_price'+j);
			}
			for (var k=0; k<drilling_sizes.length; k++){
				general_price += get_price('drilling_general_price'+j+'_'+drilling_sizes[k]);
			}
			general_price += get_price('matting_paint_price'+j);
			
		}	
		document.all['price'].value = Math.ceil(general_price);
		document.all['price_visible'].value = document.all['price'].value;
	}
	
	function calc_drilling_price(id, j){
		var price = get_float_data('drilling_price_'+id, '����');
		if (isNaN(price)) return;
		
		document.getElementById('drilling_'+id).value = price;
		document.getElementById('drilling_general_price'+id).value = Math.ceil(price * document.getElementById('drilling_count_'+id).value*document.getElementById('count'+j).value);
		document.getElementById('drilling_post_price'+id).value = document.getElementById('drilling_general_price'+id).value;
		calc_general_price();
	}
	
	function calc_sellins_price(id){
		var price = get_float_data('good_type_'+id, '����');
		if (isNaN(price)) return;
		
		document.getElementById('good_type_'+id).value = price;
		document.getElementById('good_general_price'+id).value = Math.ceil(price * document.getElementById('count'+id).value * document.getElementById('height'+id).value* document.getElementById('width'+id).value / 1000000);
		calc_general_price();
	}
	
	function calc_photo_price(j, s){
		var price = get_float_data('photo_price_'+j, '����');
		if (isNaN(price)) return;
		document.getElementById('photo_general_price'+j).value = Math.ceil(price*s*document.getElementById('count'+j).value);
		
		document.all['sellings['+j+'][photo][price]'].value = document.getElementById('photo_general_price'+j).value;
		 
		calc_general_price();
	}
	
	function calc_matting_price(j, s){
		var price = get_float_data('matting_price_'+j, '����');
		if (isNaN(price)) return;
		document.getElementById('matting_general_price'+j).value = Math.ceil((price*s+parseInt(document.getElementById('matting_paint_price'+j).value))*document.getElementById('count'+j).value);
		
		
		document.all['sellings['+j+'][matting][price]'].value = document.getElementById('matting_general_price'+j).value;
		calc_general_price();
	}
	
	
	function calc_skin_price(j, s){
		var price = get_float_data('skin_price_'+j, '����');
		if (isNaN(price)) return;
		document.getElementById('skin_general_price'+j).value = Math.ceil(price*s*document.getElementById('count'+j).value);
		
		
		document.all['sellings['+j+'][skin][price]'].value = document.getElementById('skin_general_price'+j).value;
		calc_general_price();
	}
	
	
	function calc_service_price(name,j){
		var price = get_float_data(name+'_'+j, '����');
		if (isNaN(price)) return;
		document.getElementById(name+'_general_price'+j).value = Math.ceil(document.getElementById(name+j+'l').value * price * document.getElementById('count'+j).value/1000);
		document.all['sellings['+j+']['+name+'][price]'].value = document.getElementById(name+'_general_price'+j).value;
		
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
		var s = '<input type="hidden" name="sellings['+j+'][skin][width]" value="'+width+'">';
			s += '<input type="hidden" name="sellings['+j+'][skin][height]" value="'+height+'">';	
			s+= '<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="font-style: italic; font-weight:bold;">����� ��������������� ('+height*width/1000000+') </td>';
			s+='\n<td width="50px;"><input id="skin_price_'+j+'" style="width:50px;" onchange="calc_skin_price(\''+j+'\', \''+height*width/1000000+'\')"  value="'+skin_price+'" /></td>';
			s+='\n<td width="20px;">'+print_discounts('skin_price_'+j,'skin2_price_'+j)+'</td>';
			s+='\n<td width="20px;"><input id="skin2_price_'+j+'" value="'+skin_price+'" style="width:35px;" disabled/></td>';
			s+='\n<input type="hidden" name="sellings['+j+'][skin][price]" value="' + gprice +'">'
			s+='\n<td width="60px;"><input style="width:60px;" disabled  id="skin_general_price'+j+'" value="'+gprice+'"/></td>';
		
			s+='<td width="20px;"><input type="button" value="X" onclick="clear_element(\'skin' + j+'\')"></td></tr></table>';	
		document.getElementById('skin'+j).innerHTML = s;
		
	}
	
	function add_skin(){
		for (var j=0; j<=i; j++){
			var el= document.getElementById('checkbox'+j);
			if (el==null || !el.checked) continue;
			
			var height = document.getElementById('height'+j).value;
			var width = document.getElementById('width'+j).value;
			
			add_skin2(j, height, width, 0);
			calc_skin_price(j, height*width/1000000);
		}
	}


	function addmatting2(j, height, width, img, mirror, back, paint_price,paint_color, type, gprice){
			var s = '<input type="hidden" name="sellings['+j+'][matting][width]" value="'+width+'">';
			s += '<input type="hidden" name="sellings['+j+'][matting][height]" value="'+height+'">';
	
			s += '<input type="hidden" name="sellings['+j+'][matting][image]" value="'+img+'">';
			
			s += '<input type="hidden" name="sellings['+j+'][matting][type]" value="'+getCheckedValue(document.all['matting_type'])+'">';
			
			s += '<input id="matting_paint_colors'+j+'" type="hidden" name="sellings['+j+'][matting][paint_color]" value="'+paint_color+'">';
			s += '<input id="matting_paint_price'+j+'" type="hidden" name="sellings['+j+'][matting][paint_price]" value="'+paint_price+'">';
				
			s += '<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;"> ��������� (S='+height*width/1000000+')</td>';
			
			s +='\n<td width="45px;"> <strong>'+height+'x'+width+'</strong></td>';
			
			
			
			s+='<td ><img style="width:60px;height:120px;" src="'+img+'"/></td><td>';
			
			s+= '<ul><li>'+type;
			
			if (mirror){
				s += '<li><input type="hidden" name="sellings['+j+'][matting][mirror]" value="1">���������� �����������';
			
			}
			
			if (back){
				s += '<li><input type="hidden" name="sellings['+j+'][matting][back]" value="1">������ �������';
			}
			
			if (paint_price>0){
				s+= '<li>���������� ' + paint_price +' ���.';
				s+= '<li>���� ���������� ' + paint_color;
			}
			
			s +='</ul></td>';
			
			s+='\n<td width="50px;"><input id="matting_price_'+j+'" style="width:50px;" onchange="calc_matting_price(\''+j+'\', \''+height*width/1000000+'\')"  value="'+matting_price+'" /></td>';
			s+='\n<td width="20px;">'+print_discounts('matting_price_'+j,'matting2_price_'+j)+'</td>';
			s+='\n<td width="20px;"><input id="matting2_price_'+j+'" value="'+matting_price+'" style="width:35px;" disabled/></td>';
			s+='\n<input type="hidden" name="sellings['+j+'][matting][price]" value="' + gprice +'">'
			s+='\n<td width="60px;"><input style="width:60px;" disabled  id="matting_general_price'+j+'" value="'+gprice+'"/></td>';
		
			s+='<td width="20px;"><input type="button" value="X" onclick="clear_element(\'matting' + j+'\')"></td></tr></table>';
			document.getElementById('matting'+j).innerHTML = s;
		
	}
		
	function addmatting(){
	
		if (document.getElementById('matting_img').src=='') {
			alert("�� ������� �������");
			return;
		}
		
		var paint_price = 0;
		paint_color = 0;
		if (document.getElementById('paint').checked){
			paint_price = get_float_data('paint_price', '����');
			if (isNaN(paint_price)) return;
			
			if (document.getElementById('paint_color').value!=''){
			 	paint_color = document.getElementById('paint_color').value;
			}
		}
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById('checkbox'+j);
			if (el==null || !el.checked) continue;
			
			var height = document.getElementById('height'+j).value;
			var width = document.getElementById('width'+j).value;
			
			addmatting2(j, height, width, document.getElementById('matting_img').src, document.getElementById('mirror').checked,
				document.getElementById('back').checked, paint_price, paint_color, getCheckedValue(document.all['matting_type']), 0);
			
			calc_matting_price(j, height*width/1000000);
		}
		
	}
	
	function addphotoprint2(height, width, j, photo, price){
			
			var s = '<input type="hidden" name="sellings['+j+'][photo][width]" value="'+width+'">';
			s += '<input type="hidden" name="sellings['+j+'][photo][height]" value="'+height+'">';
			s += '<input type="hidden" name="sellings['+j+'][photo][image]" value="'+photo+'">';
			
			s += '<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;"> �������� (S='+height*width/1000000+')</td>';
			
			s +='\n<td width="100px;"> <strong>'+height+' x '+width+' </strong></td>';
			
			s+='<td >���������� - <strong>"'+photo+'"</strong></td>';
			
			s+='\n<td width="50px;"><input id="photo_price_'+j+'" style="width:50px;" onchange="calc_photo_price(\''+j+'\', \''+height*width/1000000+'\')"  value="'+photo_price+'" /></td>';
			s+='\n<td width="20px;">'+print_discounts('photo_price_'+j,'photo2_price_'+j)+'</td>';
			s+='\n<td width="20px;"><input id="photo2_price_'+j+'" value="'+photo_price+'" style="width:35px;" disabled/></td>';
			s+='<input type="hidden" name="sellings['+j+'][photo][price]" value="'+price+'">';
			s+='\n<td width="60px;"><input style="width:60px;" disabled  id="photo_general_price'+j+'"  value="'+price+'"/></td>'
		
			s+='<td width="20px;"><input type="button" value="X" onclick="clear_element(\'photoprinting' + j+'\')"></td></tr></table>';
			document.getElementById('photoprinting'+j).innerHTML = s;
		
	}
	
	function addphotoprint(){
	
		var height = get_float_data('photo_height','������');
		if (isNaN(height)) return;
		
		var width = get_float_data('ptoto_width', '������');
		if (isNaN(width)) return;
		
		for (var j=0; j<=i; j++){
			var el= document.getElementById('checkbox'+j);
			if (el==null || !el.checked) continue;
			
			addphotoprint2(height, width, j, document.getElementById('photos').value, 0);
			calc_photo_price(j, height*width/1000000);
		}
		
	}
	
	function add_selling2(height, width, count, good_type, label, price){
		el = document.createElement("div");
		el.id = i;
		
		var s1='';
		if (good_type!=0) {
			s1+='\n<td  class="column" width="215px;" ><input onchange="calc_sellins_price('+i+')" style="width:50px;" name="sellings['+i+'][price]" id="good_type_'+i+'" value="'+good_prices[good_type]+'" /> ';
			s1+=print_discounts('good_type_'+i,'good_type2_'+i);
			s1+='\n<input id="good_type2_'+i+'" value="'+good_prices[good_type]+'" style="width:35px;" disabled/>';
			s1+='\n<input style="width:60px;" disabled id="good_general_price'+i+'" value="'+price+'"/></td>';
		}
		
		{/literal}
		var driling_data ='';
		{foreach from=$drilling_size item=size}
		driling_data +='\n<div style="margine-left:20px;" id="drilling_'+i+'_'+{$size}+'"></div>';
		{/foreach}
		{literal}
		el.innerHTML='<div id="'+i+'_selling"><input type="hidden" name="sellings['+i+'][good_type]" value="'+good_type+'" />'+
		'<table  cellpadding="0" cellspacing="0" border="1" width="100%">'
		+'\n<tr>'
		+'\n<td width="20px;"><input id="checkbox'+i+'" type="checkbox" /></td>'
		+'\n<td class="column">'+label+' ('+width*height/1000000+')</td>'
		+'\n<td class="column" width="70px;"> <strong>'+height+'x'+width+'</strong><input value="'+height+'" id="height'+i+'" type="hidden" name="sellings['+i+'][height]"/>'
		+'\n<input value="'+width+'" id="width'+i+'" type="hidden" name="sellings['+i+'][width]" /> </td>'
		
		
		
		+'\n<td class="column" width="60px;"> �-���  <strong>'+count+'</strong><input  value="'+count+'" id="count'+i+'" type="hidden" name="sellings['+i+'][count]" value="1"/></td>'
		
		+ s1
		+'\n<td class="column" width="20px;"><input type="button" value="X" onclick="removeElement('+i+')" /></td></tr></table></div>'
		+'\n<div id="grinding'+i+'"></div><div id="polish'+i+'"></div><div id="facet'+i+'"></div>'
		+'\n<div id="drilling'+i+'">'+driling_data+'</div>'
		+'\n<div id="matting'+i+'"></div>'
		+'\n<div id="photoprinting'+i+'"></div>'
		+'\n<div id="skin'+i+'"></div>';
		
		document.getElementById('sellings').appendChild(el);
		
	}
	
	function add_selling(){
	
		var height = get_float_data('height','������');
		if (isNaN(height)) return;
		
		var width = get_float_data('width', '������');
		if (isNaN(width)) return;
		

		var count = get_float_data('count');
		if (isNaN(count)) return;
		
		var good_type = document.getElementById('types').value;
		var label = document.getElementById('types').options[document.getElementById('types').selectedIndex].label;
		
		add_selling2(height, width, count, good_type, label, 0);
		
		calc_sellins_price(i);
		i++;
	}
	
	function check_all_sellings(){
		for (var j=0; j<=i; j++){
			if (document.getElementById('checkbox'+j)==null) continue;
			document.getElementById('checkbox'+j).checked = true;
		}	
	}
	
	function clear_element(id){
		document.getElementById(id).innerHTML='';
		calc_general_price();
	}
	
	function print_checkbox(name, checked){
		var ch='';
		if (checked){
			ch='checked';
		}
		return '<input  type="checkbox" name="'+name+'" '+ch+' onclick="fixdata(this)" />';
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
			var s1 = '';
			
			var order = new Array();
			order[0]=0;
			order[1]=2;
			order[2]=1;
			order[3]=3;
			var side = 'height';
			
			long = length;
			
			for (var k=0; k<4; k++){
				if (k>1) {
					side = 'width';
				}
				
				if (length == 0){
					long += check_long2(checkboxes_data[order[k]], side+j);
				} 
				s1 += print_checkbox('sellings['+j+']['+name+']['+(order[k]+1)+']', checkboxes_data[order[k]]);
			}

			var s = '';
			
			s += '<table width="100%"><tr><td width="40px;">&nbsp;</td><td style="width:120px;font-style: italic; font-weight:bold;">' + caption;
			s+= '&nbsp;&nbsp;' + (size>0 ? '<input type="hidden" name="sellings['+j+']['+name+'][size]" value="'+size+'">('+size+' mm)': '')+'</td>'
			
			s+= '</td><td style="width:100px;">';
			
			
			s += s1;
			
			s+='<td >������� - <input name="sellings['+j+']['+name+'][length]" id="'+name+j+'l" type="text" value="'+long+'" style="width:45px;" onchange="calc_service_price(\''+name+'\',\''+j+'\')" /> ��</td>';
			s+='<td width="50px;"><input style="width:50px;" onchange="calc_service_price(\''+name+'\',\''+j+'\')"  id="'+name+'_'+j+'" value="'+price+'" /></td>';
			s+='<td width="20px;">'+print_discounts(name+'_'+j,name+'2_'+j)+'</td>';
			s+='<td width="20px;"><input id="'+name+'2_'+j+'" value="'+price+'" style="width:35px;" disabled/></td>';
			s+=' <input type="hidden" name="sellings['+j+']['+name+'][price]" value="'+price2+'" />';
			s+='<td width="60px;"><input style="width:60px;" disabled  id="'+name+'_general_price'+j+'" value="'+price2+'" /></td>'
			s+='<td width="20px;"><input type="button" value="X" onclick="clear_element(\''+name + j+'\')"></td></tr></table>';
			document.getElementById(name+j).innerHTML = s;
			
		
	}
	
	function addservice(name, caption, id, price, size){
		if (check_checkboxes(id,false)) return false;
		for (var j=0; j<=i; j++){
			var el= document.getElementById('checkbox'+j);
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
	
	{/literal}
	var polish_price = {$polish_price};
	var grinding_price = {$grinding_price};
	{literal}	
	function addpolish(){
		addservice('polish', '��������', 'p', polish_price, 0);
	}
	
	function addgrinding(){
		addservice('grinding', 'س�������', 'g',grinding_price, 0);
	}
	
	
	function addfacet(){
		addservice('facet', '�����', 'f',facet_prices[document.getElementById('facet_size').value] ,document.getElementById('facet_size').value);
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
		var result='<select onchange="set_discount(\''+id1+'\',\''+id2+'\',this)">';
		result+='<option value="0">0 %</option>';
		{/literal}
			{foreach from = $discounts item=discount}
		result+='<option value="'+{$discount}+'">'+{$discount}+' %</option>';
			{/foreach}
		{literal}
		result+='</select>';
		return result;
	}
	
	function add_clients_glass(){
	 //	document.getElementById('types').innerHTML += '<option value="0" label="���� �볺���">���� �볺���</option>';
	}
   
    add_clients_glass();   
{/literal}	
	{if ($order.id)}
		{foreach from=$sellings item=selling}
			add_selling2({$selling.height}, {$selling.width}, {$selling.count}, {$selling.good_type}, '{$selling.name}',{$selling.price} );
			{$selling.services}
			i++;
		{/foreach}
	{/if}
	
</script>	
