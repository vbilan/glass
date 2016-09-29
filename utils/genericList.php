<?php


/*
 * Created on 29 груд 2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

//-----------------------------------------------------------------------------------
require_once "settings_object.php"; 
class generic_list  extends settings_object{

	var $sessionName;
	var $sqlTable;
	var $sqlFilter = '';
	var $colums = array ();
	var $sorttype = array (
		'1' => 'ASC',
		'2' => 'DESC'
	);
	var $defOrderInt;
	var $defDescInt;

	var $scrolLimit;
	var $order_int;
	var $desc_int;
	var $order;
	var $desc;
	var $pageNum;
	var $rowCount;
	var $pageCount;
	var $rowsOnPage;
	var $scroller = '';
	var $additionalUrlParams = array ();

	var $link;

	var $db_manager = null;
	var $rowsLimit = 2;
	var $filterField;

	//-----------------------------------------------------------------------------------

	function generic_list($db_manager, $table,$rows_limit, $scrol_limit, $filter_field) {
		$this->db_manager = $db_manager;
		$this->defOrderInt = 1;
		$this->defDescInt = 1;
		$this->sqlTable = $table;
		
		$this->scrolLimit = $scrol_limit;//links count in scroller
		$this->rowsLimit = $rows_limit;// rows per page
		$this->filterField = $filter_field;
	}

	//-----------------------------------------------------------------------------------

	// Functions for convenient session variables handling

	function getSessionParam($key) {
		if (!session_id())
			@session_start();

		return isset ($_SESSION[get_class($this).$key]) ? $_SESSION[get_class($this).$key] : null;

	}

	function setSessionParam($key, $value) {
		if (!session_id())
			@session_start();
		$_SESSION[get_class($this).$key] = $value;

	}

	function syncSessionRequestParam($key, $defaultValue) {
		$resultValue = null;

		if (isset ($_GET[get_class($this).$key])) {
			$this->setSessionParam($key, $_GET[get_class($this).$key]);
			$resultValue = $_GET[get_class($this).$key];
		} else
			if (is_null($this->getSessionParam($key))) {
				$this->setSessionParam($key, $defaultValue);
				$resultValue = $defaultValue;
			} else {
				$resultValue = $this->getSessionParam($key);
			}
		return $resultValue;
	}

	//-----------------------------------------------------------------------------------

	function getRedirectLink()
	{
		return '/index.php?action='.$_GET['action'];
	}
	function setParams() {
		//print_r($_SESSION);
		$startOrder = $this->getSessionParam('order');

		$this->syncSessionRequestParam('order', $this->defOrderInt);
		$this->desc_int = $this->syncSessionRequestParam('desc', $this->defDescInt);

		$this->pageNum = $this->syncSessionRequestParam('page', 1);

		if (isset ($_GET[get_class($this).'order'])) {
			if ($_GET[get_class($this).'order'] == $startOrder) {
				//$this->pageNum = 1;
				$this->setSessionParam('page', $this->pageNum);
				$this->reverseDesc();
			} else {
				$this->desc_int = $this->defDescInt;
			}
			$this->setSessionParam('desc', $this->desc_int);
			
			//погана річ ;-)
			
			$this->redirect($this->getRedirectLink());
		}

		$this->sqlFilter = $this->syncSessionRequestParam('filter', '');
		if (!empty ($_GET[get_class($this).'filter'])) {
			$this->pageNum = 1;
			$this->setSessionParam('page', $this->pageNum);
		}

		$this->setOrder($this->getSessionParam('order'));
		$this->setDesc($this->getSessionParam('desc'));

	}

	//-----------------------------------------------------------------------------------

	function setOrder($val) {
		if (array_key_exists($val, $this->colums))
			$this->order = $this->colums[$val]['field'];
		else
			$this->order = $this->colums[1]['field'];
	}

	function setDesc($val) {
		if (array_key_exists($val, $this->sorttype))
			$this->desc = $this->sorttype[$val];
		else
			$this->desc = $this->sorttype[1];
	}

	function reverseDesc() {
		$this->desc_int;
		switch ($this->desc_int) {
			case 1 :
				$this->desc_int = 2;
				break;
			case 2 :
				$this->desc_int = 1;
				break;
		}
	}

	//-----------------------------------------------------------------------------------

	function getNumRows() {

		$query = $this->prepareCountSQL($this->sqlFilter);

		$res = $this->db_manager->query($query);

		if ($res) {
			$row_count = mysql_result($res, 0);
		} else {
			$row_count=0;	
		}
		
		$this->rowCount = $row_count;

		if ($row_count >= $this->rowsLimit) {
			$this->pageCount = ceil($row_count / $this->rowsLimit);
		} else {
			$this->pageCount = 1;
		}

		if ($this->pageNum > $this->pageCount)
			$this->pageNum = $this->pageCount;

	}

	//-----------------------------------------------------------------------------------

	function formingScroll() {
		$scrol = '';
		$sps = '&nbsp;';
		$fp = '&#60;&#60;';
		$lp = '&#62;&#62;';
		$prev = '&#60;';
		$next = '&#62;';
		$separ = '|';

		//* Set Scrolling "From/To" *//

		if (!is_null($this->getSessionParam('scrollFirstPage')) && (!is_null($this->getSessionParam('scrollLastPage')))) {
			$scrollFirstPage = $this->getSessionParam('scrollFirstPage');
			$scrollLastPage = $this->getSessionParam('scrollLastPage');

			if ($scrollFirstPage < 1) {
				$this->setSessionParam('scrollFirstPage', 1);
				$scrollFirstPage = 1;
			}

			if ($this->pageCount < $scrollLastPage) {
				$scrollLastPage = $this->pageCount;
			}

			if ($this->sqlFilter != '') {
				$scrollFirstPage = $this->getSessionParam('filterScrollFirstPage');
				$scrollLastPage = $this->getSessionParam('filterScrollLastPage');
			}

			if (($this->pageNum >= $scrollFirstPage) && ($this->pageNum <= $scrollLastPage)) {
				$pageFrom = $scrollFirstPage;
				$pageTo = $scrollLastPage;
			} else
				if ($this->pageNum <= $scrollFirstPage) {
					if ($this->pageNum > 1) {
						$pageFrom = $this->pageNum;
					} else {
						$pageFrom = 1;
					}
					$pageTo = $pageFrom + $this->scrolLimit - 1;
				}

			if ($this->pageNum > $scrollLastPage) {
				if ($this->pageNum < $this->pageCount) {
					$pageFrom = $this->pageCount - $this->scrolLimit;
				} else {
					$pageFrom = $this->pageCount - $this->scrolLimit + 1;
				}
				$pageTo = $pageFrom + $this->scrolLimit - 1;
			}
		} else {
			$pageFrom = 1;
			if ($this->pageCount > $this->scrolLimit) {
				$pageTo = $pageFrom + $this->scrolLimit - 1;
			} else {
				$pageTo = $this->pageCount;
			}
		}

		if ($this->sqlFilter == '') {
			$this->setSessionParam('scrollFirstPage', $pageFrom);
			$this->setSessionParam('scrollLastPage', $pageTo);
		} else {
			$pageFrom = 1;
			if ($this->pageCount < $this->scrolLimit)
				$pageTo = $this->pageCount;
			else
				$pageTo = $this->scrolLimit;

			$this->setSessionParam('filterScrollFirstPage', $pageFrom);
			$this->setSessionParam('filterScrollLastPage', $pageTo);
		}

		//* Forming "First Page" and "Preview" *//

		if ($this->pageCount > 1) {

			if ($this->pageNum > 1) {
				$pageNumPrev = $this->pageNum - 1;
				$scrol .= '<a href="'.$this->getUrl(array (
					get_class($this
				)."page" => 1)).'">'.$fp.'</a>'.$sps.$separ.$sps;
				$scrol .= '<a href="'.$this->getUrl(array (
					get_class($this
				)."page" => $pageNumPrev)).'">'.$prev.'</a>'.$sps.$separ.$sps;
			} else {
				$scrol .= $fp.$sps.$separ.$sps.$prev.$sps.$separ;
			}

			//Forming from to pages
			$step = (int) ($this->scrolLimit / 2);

			$pageTo = min($this->pageNum + $step, $this->pageCount);
			$pageFrom = max($this->pageNum - $step, 1);

			$delta = $this->pageNum - $pageTo + $step;
			if ($delta) {
				$pageFrom = max(1, $pageFrom - $delta);
			} else {

				$delta = $pageFrom + $step - $this->pageNum;
				if ($delta) {
					$pageTo = min($this->pageCount, $pageTo + $delta);
				}
			}
			//* Forming Page Numbers *//

			for ($i = $pageFrom; $i <= $pageTo; $i++) {
				//$url_pn = '&page='.$i;

				if ($i != $this->pageNum) {
					$scrol .= $sps.'<a href="'.$this->getUrl(array (
						get_class($this
					)."page" => $i)).'">'.$i.'</a>'.$sps.$separ;
				} else {
					$scrol .= $sps.'<b>'.$i.'</b>'.$sps.$separ;
				}
			}

			//* Forming "Next" and "Last Page" *//

			if ($this->pageNum < $this->pageCount) {
				$pageNumNext = $this->pageNum + 1;
				$scrol .= $sps.'<a href="'.$this->getUrl(array (
					get_class($this
				)."page" => $pageNumNext)).'">'.$next.'</a>';
				$scrol .= $sps.$separ.$sps.'<a href="'.$this->getUrl(array (
					get_class($this
				)."page" => $this->pageCount)).'">'.$lp.'</a>';
			} else {
				$scrol .= $sps.$next.$sps.$separ.$sps.$lp;
			}
		}

		$this->scroller = $scrol;
	}

	//-----------------------------------------------------------------------------------

	function getData() {
		$sqlOffset = ($this->pageNum - 1) * $this->rowsLimit;

		 $query = $this->prepareSQL($this->sqlFilter, $this->order, $this->desc, $sqlOffset, $this->rowsLimit);

		$res = $this->db_manager->query($query);

		if ($res === FALSE)
			die('Incorrect query');

		$rowsOnPage = $this->db_manager->num_rows($res);
		$this->rowsOnPage = $rowsOnPage;
		$data = array();
		while ($row = $this->db_manager->fetch_array($res)) {
			$data[] = $row;
		}

		return $data;
	}

	//-----------------------------------------------------------------------------------

	function prepareCountSQL($filter) {
		$query = "select count(*) from ".$this->sqlTable;
		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%" ';
		}
		return $query;
	}

	function prepareSQL($filter, $order, $orderDesc, $offset, $limit) {
		$query = "select * from ".$this->sqlTable;

		if ($filter != '') {
			$query .= ' where '.$this->filterField.' like "%'.$filter.'%"';
		}
		$query .= ' order by '.$order.' '.$orderDesc;
		$query .= ' limit '.$offset.', '.$limit;

		return $query;
	}

	function getFieldByName($field) {
		foreach ($this->colums as $key => $val) {
			if ($this->colums[$key]['name'] == $field) {
				return array (
					'orderKey' => $key,
					'title' => $this->colums[$key]['title']
				);
			}
		}
	}

	//-----------------------------------------------------------------------------------

//	function renderFilterForm() {
//		$resp = '<form action="'.$this->getUrl().'" method="get">';
//		$data = array (
//			"filter_caption" => "filter",
//			"ok_caption" => "ok",
//			"clear_caption" => "clear"
//		);
//		$resp .= '<label>'.$data["filter_caption"].':</label>';
//		$resp .= '<input type="text" name="'.get_class($this).'filter" value="'.$this->sqlFilter.'" maxlength="20">';
//		$resp .= '<input type="submit" class="btn" name="sabmFilter" value="&nbsp;'.$data["ok_caption"].'&nbsp;" />';
//		$resp .= '<input type="submit" class="btn" name="clearFilter" value="&nbsp;'.$data["clear_caption"].'&nbsp;" onclick="this.form.elements[\''.get_class($this).'filter\'].value=\'\';" />';
//		$resp .= '</form>';
//
//		return $resp;
//	}

	function renderOrderField($field) {
		$arr = $this->getFieldByName($field);
		$orderKey = $arr['orderKey'];
		$title = $arr['title'];

		$resp = '<a href="'.$this->getUrl(array (
			get_class($this
		)."order" => $orderKey)).'">';
		$resp .= $title;
		$resp .= '</a>';

		return $resp;
	}

	function renderScroller() {
		return $this->scroller;
	}

	//-----------------------------------------------------------------------------------

	function prepare() {
		$this->setParams();

		$this->getNumRows();
		$this->formingScroll();
	}

	function getListData() {
		return $this->getData();
	}

	function getUrl($param = array ()) {
		$param = array_merge($this->additionalUrlParams, $param);
		$tmp="";
		
		foreach ($param as $key => $value) {
			$tmp .= $key."=".$value;
		}
		return $this->link. ($tmp ? '&' : "").$tmp;
	}

	function addAdditionalUrlParams($params = array ()) {
		$this->additionalUrlParams = array_merge($this->additionalUrlParams, $params);
	}
	//-----------------------------------------------------------------------------------
	function redirect($to) {
		
		 $host = strlen(dirname($_SERVER['HTTP_REFERER'])) ? dirname($_SERVER['HTTP_REFERER']) : $_SERVER['SERVER_NAME'];
		
		if (strpos( basename($_SERVER['HTTP_REFERER']), '.') === false ){
			 $host.='/'.basename($_SERVER['HTTP_REFERER']);
		}
		
		//if (headers_sent()){
		///echo "Location: $host$to";
		//	return false;
		//}
		//else {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $host$to");
			exit ();
		//}
	}
}
?>