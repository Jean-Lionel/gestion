<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class MyfonctionComponent extends Component
{
	public function add_date($givendate,$mth=0,$day=0,$yr=0) {
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d', 
			mktime(date('h',$cd),
				date('i',$cd),
				date('s',$cd), 
				date('m',$cd)+$mth,
				date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
	}

	public function doComplexOperation($amount1, $amount2)
	{
		return $amount1 + $amount2;
	}



}