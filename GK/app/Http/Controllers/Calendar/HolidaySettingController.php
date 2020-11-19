<?php

namespace App\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar\HolidaySetting;

class HolidaySettingController extends Controller
{
    function form(){
		
		//取得
		$setting = HolidaySetting::all()->first();
		if (!$setting)$setting = new HolidaySetting();
		return view("calendar/holiday_setting_form", [
			"setting" => $setting,
			"FLAG_OPEN" => HolidaySetting::OPEN,
			"FLAG_CLOSE" => HolidaySetting::CLOSE
		]);
	}
	function update(Request $request){
		//取得
		$setting = HolidaySetting::all()->first();
		if (!$setting)$setting = new HolidaySetting();
		//更新
		$setting->update($request->all());
		return redirect()
			->action("Calendar\HolidaySettingController@form")
			->withStatus("保存しました");
	}
    
    
    //
}
