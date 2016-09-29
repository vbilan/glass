<?php
class settings{
	
	var $SETTING_REGEX = '(^[[:space:][:alnum:]_]+)=(.+)';
	
	var $properties = array();
	var $fileName;
	
	function settings($fileName){
		setlocale(LC_ALL,"ru_RU.UTF-8");
		$this->fileName = $fileName;	
		$this->refresh();
	}
		
	function refresh(){
		unset ($this->properties);
		$matches = null;
		$fHandle = fopen($this->fileName, 'r');
		while ($fHandle && !feof($fHandle)){
			$line = fgets($fHandle);			
			if(@ereg($this->SETTING_REGEX, $line, $matches)){
				$this->properties[trim($matches[1])] = $matches[2];
			}	
		}		
		fclose($fHandle);
	}	
	
	
	function get_property($name){
		return $this->properties[$name];
	}
	
	function set_property($name, $value){
		$this->properties[$name]=$value;
	}
	
	function update_properties(){
		$new_settings = '';
		$fHandle = fopen($this->fileName, 'r');
		while ($fHandle && !feof($fHandle)) {
			$line = fgets($fHandle);
			
			if(ereg($this->SETTING_REGEX, $line, $matches)){
				if (isset($this->properties[trim($matches[1])])){
						$line = ereg_replace($this->SETTING_REGEX, $matches[1].'='.$this->properties[trim($matches[1])]."\r\n", $line);
				} 			
			}
			$type =trim(str_replace("#", "",$line)); 
			if ($line!="\r\n")
			$new_settings .= $line;		
		}
		
		fclose($fHandle);	
		$fHandle = fopen($this->fileName, 'w');
		fputs($fHandle, $new_settings);
		fclose($fHandle);	
	}
	
}
?>