<?php

class StaffReportController extends BaseController {

	protected $requireGMOStaff = true;

    public function index(){
        return View::make('report/show_all_report');
    }
    
    
	public function reportPlantList() {		
         $ex = DB::table('gmo.export_certificate_request_examples')
                     ->select(DB::raw('type_of_example,quantity as qty, updated_at '));
                     
                     
        $dmt_ex = DB::table('gmo.domestic_certificate_request_examples')
                     ->select(DB::raw('plant_name_eng,export_qty as qty,updated_at '))
                     ->union($ex)
                     
                     ->get();
		return View::make('report/report_plant_list')
			->with('example', $dmt_ex);
	}

	
}

?>
