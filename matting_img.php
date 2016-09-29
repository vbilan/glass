<?php
/*
 * Created on 9 груд 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 function get_files() {
		$path = 'images/matting';
		$files = array ();
		if ($path) {
			$d = dir($path);
			while (false !== ($entry = $d->read())) {
				if ($entry == '.' || $entry == '..')
					continue;
				$files[] = $path.'/'.$entry;
			}
			$d->close();
		}
		return $files;
	}
	
$files = get_files();
natsort($files);
echo'
<script>
	function save(file){
	 	window.opener.document.getElementById("matting_img").src=file;
	 	$tmp = file.split("/");
	 	$tmp2 = $tmp[2].split(".");
	 	window.opener.document.getElementById("matting_img_text").value=$tmp2[0];
	 	window.opener.document.getElementById("matting_img").style.display="block";
	 	self.close(); 
	}
</script>
';
foreach ($files as $file){
	echo "<a href='#' onclick='save(\"$file\"); return false;'><img width='100' height='200' src='$file' />";
}	
?>
