<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeek {

	protected $carbon;
	protected $index = 0;

	/**
	 * @return CalendarWeekDay[]
	 */
	function getDays(HolidaySetting $setting){
		$days = [];
		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();
		//作業用
		$tmpDay = $startDay->copy();
		//月曜日〜日曜日までループ
		while($tmpDay->lte($lastDay)){
			//前の月、もしくは後ろの月の場合は空白を表示
			if($tmpDay->month != $this->carbon->month){
				$day = new CalendarWeekBlankDay($tmpDay->copy());
				$days[] = $day;
				$tmpDay->addDay(1);
				continue;	
			}
				
			//今月
			$days[] = $this->getDay($tmpDay->copy(), $setting);
			//翌日に移動
			$tmpDay->addDay(1);
		}
		
		return $days;
	}

	/**
	 * @return CalendarWeekDay
	 */
	function getDay(Carbon $date, HolidaySetting $setting){
		$day = new CalendarWeekDay($date);
		$day->checkHoliday($setting);
		return $day;
	}
}