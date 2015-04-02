<?php
namespace backend\models;

use yii\base\model;

class AppointmentReport extends Model
{
	public $fromDate;
	public $toDate;
	
	public function rules()
	{
		return [
				[['fromDate', 'toDate'], 'required'],
			   [['fromDate', 'toDate'], 'safe']
		
		];
	}
	
	public function getFromDate()
	{
		return $this->fromDate;
	}
	
	public function getToDate()
	{
		return $this->toDate;
	}
}

