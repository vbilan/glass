<?php


/*
 * Created on 17 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
include_once 'base_object.php';
include_once 'utils/settings.php';

class edit_settings extends base_object {

	function prepare_prices($data) {
		$tmp = explode(';', $data);
		$result = '';
		for ($i = 0; $i < count($tmp) - 1; $i = $i +2) {
			$result .= "{$tmp[$i]};{$tmp[$i +1]}\n";
		}
		return $result;
	}

	function get_content() {

		$keys = array (
			'photo_price',
			'matting_price',
			'polish_price',
			'grinding_price',
			'discounts',
			'facet_price',
			'drilling_price',
			'skin_price',
			'kadran_price',
			'end',
			'begin'
		);
		$diff_keys = array (
			'discounts',
			'facet_price',
			'drilling_price'
		);
		$errors = array ();
		$settings_data = array ();

		$settings = new settings('configs/prices.config');
		if (isset ($_POST["submit"])) {
			foreach ($_POST as $key => $value) {
				if (array_search($key, $keys) === null)
					continue;
				if (array_search($key, $diff_keys) !== null) {
					$value = str_replace("\r\n", ';', trim($value));
				}
				$settings->set_property($key, $value);
			}
			$settings->update_properties();

		}
		foreach ($keys as $key) {
			$settings_data[$key] = $settings->get_property($key);
		}
		$settings_data['discounts'] = implode("\n", explode(';', $settings_data['discounts']));
		$settings_data['facet_price'] = $this->prepare_prices($settings_data['facet_price']);
		$settings_data['drilling_price'] = $this->prepare_prices($settings_data['drilling_price']);

		$settings_data['errors'] = $errors;
		return $this->smarty_get($this->prepare_data($settings_data), 'edit_settings.tpl');
	}
}
?>
