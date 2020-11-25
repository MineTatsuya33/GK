<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarView {
    
    protected $carbon;
	protected function getWeeks(){
		$weeks = [];
		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();
		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();
		//1周週目
		$weeks[] = $this->getWeek($firstDay->copy());
		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$weeks[] = $this->getWeek($tmpDay->copy(), count($weeks));
			//次の週=+7日する
			$tmpDay->addDay(7);
		}
		return $weeks;
	}
	/**
	 * @return CalendarWeek
	 */
	protected function getWeek(Carbon $date, $index = 0){
		return new CalendarWeek($date, $index);
	}
	
}
	

	
	/**
	 * カレンダーを出力する
	 */
	function render(){
		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>月</th>';
		$html[] = '<th>火</th>';
		$html[] = '<th>水</th>';
		$html[] = '<th>木</th>';
		$html[] = '<th>金</th>';
		$html[] = '<th>土</th>';
		$html[] = '<th>日</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';
		
		$html[] = '<tbody>';
		
		$weeks = $this->getWeeks();
		foreach($weeks as $week){
			$html[] = '<tr class="'.$week->getClassName().'">';
			$days = $week->getDays();
			foreach($days as $day){
				$html[] = '<td class="'.$day->getClassName().'">';
				$html[] = $day->render();
				$html[] = '</td>';
			}
			$html[] = '</tr>';
		}
		
		$html[] = '</tbody>';
		$html[] = '</table>';
		$html[] = '</div>';
		return implode("", $html);
	}
}