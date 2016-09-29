<?php
require_once 'db_manager.php';

class dao_manager {
	
	
	function get_goods_price(){
		$query = '
			select sum( total * price) as store from(
				select type, sum(total) as total, sum(price) as price from
				(
					select  b.type,  sum(b.amount) as total, null as price from
					(
						select goods.type, sum(goods.square) as amount, goods_type.name
						from goods,goods_type
						where goods.type=goods_type.id and goods_type.price>0
						group by goods.type
			
						union
			
						select goods_type.id,
						 - sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as amount,
						 goods_type.name
						from sellings,goods_type
						where sellings.order_id>0
						and sellings.good_type=goods_type.id and goods_type.price>0
						 group by goods_type.id
						 		
						union
								
						select goods_type.id,
						 - sum(sellings.count*sellings.height*sellings.width/1000000) as amount,
						 goods_type.name
						from sellings,goods_type
						where sellings.order_id=0
						and sellings.good_type=goods_type.id and goods_type.price>0
						
						 group by goods_type.id
			
			 		) b
					group by b.type
							
					union
				select type, null as total, price/square as price  from
			 	(select sum(square) as square, sum(square*buying_price) as price, type from goods group by type) b where square >0
				) b
				group by type
			)b';
		return self :: get_query_single_value($query);  
	}
	function get_selling_incoming($begin, $end){
		 $query = "	
				select sum(sellings.price) as price 
        			from sellings, orders 
					where orders.id=sellings.order_id and sellings.price > 0 and orders.date > $begin AND orders.date <$end
	       			";
	     return self :: get_query_single_value($query);  			
	       			
	} 
	
	function get_services_balance($begin, $end){
		$query = "select round(sum(income-spending),2) as profit
		   	from
		    (
		    		select sum(amount) as spending, 0 as income, service_type from spendings 
		    		where date > $begin AND date < $end 
		    		group by service_type
			
					union
		
					select  0 as spending, sum(services.price) as income, services.service_type from services,  sellings, orders 
					where  services.selling= sellings.id and sellings.order_id=orders.id and orders.date > $begin AND orders.date < $end  group by service_type
			)
            b ";
           return self :: get_query_single_value($query);
	}
	
	function get_buying_amount($begin, $end){
		$query = "select sum(square*buying_price) from goods where date > $begin AND date < $end ";
		return self :: get_query_single_value($query);
	}
	
	function get_selling_square($begin, $end){
	     return self :: get_data(' sellings,goods_type, orders ',
	     "  where orders.id=sellings.order_id and sellings.good_type=goods_type.id and goods_type.price>0
       		and orders.date > $begin AND orders.date < $end
			group by goods_type.id	",
	     ' goods_type.id, sum((1+goods_type.smash_percent/100)*sellings.count*sellings.height*sellings.width/1000000) as square '
	     );  			
	       			
	} 
	
	function get_goods_data($begin){
	     return self :: get_data(' goods ',
	     "  where date > $begin group by type	",
	     ' sum(square) as square, sum(square*buying_price) as price, type '
	     );  			
	       			
	} 
	
	function form_groupe($id = 0) {
		$groupe = self :: get_query_single_value("SELECT MAX(order_groupe) from orders ");
		$groupe++;
		$query = "UPDATE orders SET order_groupe=$groupe WHERE order_groupe=0 ";
		if ($id) {
			$query .= ' AND id='.$id;
		}
		self :: execute_query($query);
	}

	function get_groupe_matting_data($id) {
		return self :: get_data(' orders,goods_type,sellings,services  ', "
	      WHERE
	      orders.id=sellings.order_id
	      AND
	      sellings.good_type=goods_type.id
	      AND
	      sellings.id=services.selling
	      AND
	      services.service_type='matting'
	      AND
	      orders.order_groupe=$id      
	            
	      ORDER BY num       
	      ", ' orders.id%1000 AS num,
	      orders.delivery_date,
	      goods_type.name,
	      sellings.height,
	      sellings.width,
	      sellings.count,
	      services.service_data ');
	}

    
	function get_groupe_cutting_data($id) {
		return self :: get_data(' orders ', "
LEFT JOIN sellings ON orders.id=sellings.order_id
LEFT JOIN goods_type ON sellings.good_type=goods_type.id
LEFT JOIN services ON sellings.id = services.selling
LEFT JOIN service_name ON services.service_type = service_name.type
WHERE   orders.order_groupe={$id}

ORDER BY goods_type.name, sellings.id", '  orders.id%1000 AS num,
	      goods_type.name,
	      sellings.height,
	      sellings.width,
	      sellings.count,
	      services.service_type,
	      services.service_data,
        service_name.short,
        sellings.id ');
	}

	function get_query_single_value($query) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();

		$res = $db_manager->query($query);

		if (!$res)
			return 0;
		$result = mysql_result($res, 0);
		$db_manager->disconnect();
		return $result;
	}

	function get_day_balance() {
		$date = mktime();
		$date -= $date % (24 * 60 * 60);

		return self :: get_query_single_value("
					select sum(amount) as amount from
						(select sum(amount) as amount from paiments where date > $date
						union
						select -sum(amount) as amount from spendings where date > $date)b
					");

	}

	function get_user($login) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		$res = $db_manager->query('SELECT * FROM users WHERE login = \''.mysql_real_escape_string($login).'\'');

		$result = $db_manager->num_rows($res) == 1 ? $db_manager->fetch_assoc($res) : null;

		$db_manager->disconnect();
		return $result;
	}

	function get_last_id($table) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();

		$res = $db_manager->query("SELECT max(id) FROM $table");

		if (!$res)
			return 0;
		$result = mysql_result($res, 0);
		$db_manager->disconnect();
		return $result;
	}
	function update_new_order($id) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();

		$db_manager->query("UPDATE `orders`  SET order_groupe=id WHERE id={$id}");

		$db_manager->disconnect();
	}

	function form_edge($data) {
		$result = 0;
		$l = 1;
		for ($i = 1; $i < 5; $i++) {
			if (isset ($data[$i])) {
				$result += $l;
			}
			$l *= 2;
		}
		return $result;
	}

	function form_grinding($data) {
		return self :: form_edge($data);
	}

	function form_polish($data) {
		return self :: form_edge($data);
	}

	function form_facet($data) {
		return self :: form_edge($data).'++'.$data['size'];
	}

	function form_photo($data) {
		return $data['width'].'++'.$data['height'].'++'.$data['image'].'++'.$data['price'];

	}
	
	function form_kadran($data){
		return $data['square'].'++'.$data['num'].'++'.$data['price'];
	}
	function form_additional($data){
		return $data['text'].'++'.$data['price'];
	}

	function form_drilling($data) {
		$result = '';
		foreach ($data as $key => $value) {
			if (!is_array($value))
				continue;
			if ($result) {
				$result .= '++';
			}
			$result .= $key.'++'.$value['price'].'++'.$value['count'];
		}
		return $result;
	}
	function form_matting($data) {
		$keys = array (
			'width',
			'height',
			'image',
			'type',
			'paint_price',
			'mirror',
			'back',
			'paint_color'
		);
		$res = '';
		foreach ($keys as $value) {
			if ($res) {
				$res .= '++';
			}
			$res .= isset ($data[$value]) ? $data[$value] : '0';
		}
		//print_r($data);
		return $res;
	}

	function form_skin($data) {
		$keys = array (
			'width',
			'height',
			'price'
		);
		$res = '';
		foreach ($keys as $value) {
			if ($res) {
				$res .= '++';
			}
			$res .= @ $data[$value];
		}
		return $res;
	}

	function save_service($type, $data, $selling_id) {
		$service = array ();
		$service['price'] = $data['price'];
		$service['selling'] = $selling_id;
		$service['length']=(int)@$data['length'];
		$method = 'form_'.$type;
		$service['service_data'] = self :: $method ($data);

		$service['service_type'] = $type;

		self :: save_item('services', $service);
	}

	function delete_order($id) {
		self :: delete_order_sellings($id);

		$query = 'DELETE FROM paiments WHERE order_id='.$id;
		self :: execute_query($query);

		self :: delete_item('orders', $id);
	}

	function delete_goods_groupe($id) {
		$goods_types = self :: get_table_data('goods_type', 0, 10000000, ' where groupe ='.$id);
		foreach ($goods_types as $goods_type) {
			self :: delete_goods_type($goods_type['id']);
		};
		self :: delete_item('goods_groupes', $id);
	}

	function delete_goods_type($id) {
		$sellings = self :: get_table_data('sellings', 0, 10000000, ' where good_type ='.$id);
		foreach ($sellings as $selling) {
			self :: delete_order($selling['order_id']);
		};
		$goods = self :: get_table_data('goods', 0, 10000000, ' where type ='.$id);
		foreach ($goods as $good) {
			self :: delete_item('goods', $good['id']);
		};
		self :: delete_item('goods_type', $id);
	}

	function delete_client($id) {
		$orders = self :: get_table_data('orders', 0, 10000000, ' where client ='.$id);
		foreach ($orders as $order) {
			self :: delete_order($order['id']);
		};
		self :: delete_item('clients', $id);
	}

	function delete_order_sellings($id) {
		$sellings = self :: get_table_data('sellings', 0, 10000000, ' where order_id ='.$id);
		foreach ($sellings as $selling) {
			self :: delete_selling($selling['id']);
		};
	}

	function delete_selling($id) {
		self :: delete_item('sellings', $id);
		$query = 'DELETE FROM services WHERE selling='.$id;
		return self :: execute_query($query);
	}

	function validate_revision($good) {
		$errors = array ();

		if ($good['amount'] <= 0 && $good['square'] <= 0) {
			$errors[] = 'Не вибрано залишку чи списання !';
		}
		if ($good['total'] - $good['square'] < 0) {
			$errors[] = 'Площа більша від залишку товару !';
		}
		return $errors;
	}

	function save_revision($good) {
		if ($good['square'] > 0) {
			$good['amount'] = $good['total'] - $good['square'];
		}
		$selling = array ();
		$selling['id'] = 0;
		$selling['good_type'] = $good['type'];
		$selling['height'] = $good['amount'] * 1000000;
		$selling['date'] = mktime();
		return self :: save_item('sellings', $selling);

	}
	function validate_order($order) {
		return array ();
	}

	function save_order($order) {
		return self :: save_item('orders', $order);
	}

	function save_selling($salling) {
		return self :: save_item('sellings', $salling);
	}

	function validate_spending($spending) {
		$errors = array ();
		if (!trim($spending['service_type'])) {
			$errors[] = 'Не вибрано типу витрати!';
		}
		if ($spending['amount'] == 0) {
			$errors[] = 'Не введено суму витрати!';
		}

		return $errors;
	}

	function save_spending($spending) {
		return self :: save_item('spendings', $spending);
	}

	function validate_good($good) {
		$errors = array ();
		if ($good['square'] == 0) {
			$errors[] = 'Не введено площу товару!';
		}
		if ($good['buying_price'] == 0) {
			$errors[] = 'Не введено закупівельну ціну товару!';
		}

		return $errors;
	}

	function save_good($good) {
		return self :: save_item('goods', $good);
	}

	function validate_goods_type($goods_type) {
		$errors = array ();

		if (!isset ($goods_type['name']) || trim($goods_type['name']) == '') {
			$errors[] = 'Не введено назву товару!';
		}
		if ($goods_type['smash_percent'] < 0 || $goods_type['smash_percent'] >= 100) {
			$errors[] = 'Не вірний процент бою!';
		}
		if ($goods_type['id'] == 0) {
			if (self :: get_item_by_field('goods_type', 'name', trim($goods_type['name'])))
				$errors[] = 'Такий товар вже існує!';
		}

		return $errors;
	}

	function save_goods_type($goods_type) {
		return self :: save_item('goods_type', $goods_type);
	}

	function validate_goods_groupe($goods_groupe) {
		$errors = array ();
		if (!isset ($goods_groupe['name']) || trim($goods_groupe['name']) == '') {
			$errors[] = 'Не введено назву грапи товарів!';
		}
		if ($goods_groupe['id'] == 0) {
			if (self :: get_item_by_field('goods_groupes', 'name', trim($goods_groupe['name'])))
				$errors[] = 'Така група вже існує!';
		}

		return $errors;
	}
	
	
	static function validate_units_of_measurement($units_of_measurement) {
		$errors = array ();
		if (!isset ($units_of_measurement['name']) || trim($units_of_measurement['name']) == '') {
			$errors[] = 'Не введено назву!';
		}
		if ($units_of_measurement['id'] == 0) {
			if (self :: get_item_by_field('units_of_measurement', 'name', trim($units_of_measurement['name'])))
				$errors[] = 'Така одиниця вже існує!';
		}
	
		return $errors;
	}
	

	function save_goods_groupe($goods_groupe) {
		return self :: save_item('goods_groupes', $goods_groupe);
	}
	
	static function save_units_of_measurement($units_of_measurement) {
		return self :: save_item('units_of_measurement', $units_of_measurement);
	}

	function validate_client($client) {
		$errors = array ();
		if (!isset ($client['name']) || trim($client['name']) == '') {
			$errors[] = 'Не введено клієнта!';
		}
		if ($client['id'] == 0) {
			if (self :: get_item_by_field('clients', 'name', trim($client['name'])))
				$errors[] = 'Такий клієнт вже існує!';
		}

		return $errors;
	}

	function save_client($client) {
		return self :: save_item('clients', $client);
	}

	function validate_user($user) {
		$errors = array ();
		if ((int) $_SESSION['logged_user']['id'] == $user['id'] && $user['admin'] != 1) {
			$errors[] = 'Ви не можете стати простим користувачем';
		}
		if (!isset ($user['login']) || trim($user['login']) == '') {
			$errors[] = 'Не введено користувача!';
		}
		if ($user['id'] == 0) {
			if (self :: get_item_by_field('users', 'login', trim($user['login'])))
				$errors[] = 'Такий користувач вже існує!';
		}
		if ($user['pass'] != $user['password2']) {
			$errors[] = 'Паролі не співпадають!';
		}
		return $errors;
	}

	function save_user($user) {
		return self :: save_item('users', $user);
	}

	static function save_item($table, $item) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		if (@ $item['id']) {
			$query = self :: form_update_query($table, $item);
		} else {
			$query = self :: form_insert_query($table, $item);
		}
		
		$db_manager->query($query);
		if (!mysql_error())
			$result = true;
		else
			$result = false;
		$db_manager->disconnect();
		return $result;
	}

	static function form_insert_query($table, $data) {
		$fields = '';
		$values = '';
		foreach ($data as $key => $value) {
			if (is_array($value))
				continue;
			if ($key == 'id') {
				continue;
			}
			if ($fields) {
				$fields .= ',';
				$values .= ',';
			}
			$fields .= $key;
			$values .= "'".mysql_real_escape_string($value)."'";
		}
		return "insert into $table ($fields) values ($values)";
	}

	static function form_update_query($table, $data) {
		$values = '';
		$id = 0;
		foreach ($data as $key => $value) {
			if (is_array($value))
				continue;

			if ($key == 'id') {
				$id = $value;
				continue;
			}
			if ($values) {
				$values .= ',';
			}
			$values .= "$key='$value'";
		}
		return "update $table  set $values where id='$id'";
	}

	static function get_select_result($query)
	{
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		
		$res = $db_manager->query($query);
		$result = null;
		if (!$res)
			die('query error');
		while ($row = $db_manager->fetch_assoc($res)) {
			$result = $row;
		}
		$db_manager->disconnect();
		return $result;
	}
	
	static function get_item_by_field($table, $field_name, $field_value) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();

		$res = $db_manager->query('SELECT * FROM '.$table.' WHERE '.$field_name.'=\''.mysql_real_escape_string($field_value).'\'');
		$result = null;
		if (!$res)
			die('query error');
		while ($row = $db_manager->fetch_assoc($res)) {
			$result = $row;
		}
		$db_manager->disconnect();
		return $result;
	}

	static function get_item($table, $id) {
		return self :: get_item_by_field($table, 'id', $id);
	}

	function get_data($tables, $where = '', $fields = '*') {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		$query = 'SELECT '.$fields.' FROM '.$tables.$where;
		$res = $db_manager->query($query);
		$result = array ();
		if (!$res)
			die('query error');
		while ($row = $db_manager->fetch_assoc($res)) {
			$result[] = $row;
		};

		$db_manager->disconnect();
		return $result;
	}

	function get_table_data($table, $from, $count, $where = '') {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		$res = $db_manager->query('SELECT * FROM '.$table.$where.' LIMIT '.$from.','.$count);
		$result = array ();
		if (!$res)
			die('query error');
		while ($row = $db_manager->fetch_assoc($res)) {
			$result[] = $row;
		};

		$db_manager->disconnect();
		return $result;
	}

	function delete_item($table, $id) {
		$query = 'DELETE FROM '.$table.' WHERE id='.$id;
		return self :: execute_query($query);
	}

	function execute_query($query) {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();

		$db_manager->query($query);
		if (!mysql_error())
			$result = true;
		else
			$result = false;
		$db_manager->disconnect();
		return $result;
	}

	function get_table_count($table, $additional_data = '') {
		$db_manager = new db_manager();
		$db_manager->connect();
		$db_manager->select_db();
		$res = $db_manager->query('SELECT count(*) FROM '.$table.$additional_data);
		if (!$res)
			die('query error');
		$result = mysql_result($res, 0);
		$db_manager->disconnect();
		return $result;
	}
}
?>