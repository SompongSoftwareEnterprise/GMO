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
	
	public function reportLabRequest() {		
                     
        $lab = DB::table('lab_tasks')
            ->join('lab_task_products', 'lab_tasks.export_certificate_request_id', '=', 'lab_task_products.lab_task_id')
            ->groupBy('product_code')
            ->select('lab_task_id','product_code','product_name','created_at','status')
            ->get();             
                     
		return View::make('report/report_lab_request')
			->with('lab', $lab);
	}
	
	public function reportDestinationCountry() {		
                     
        $dest = DB::table('export_certificate_request_info_forms')
            ->select('export_certificate_request_id','final_destination','port_of_entry','created_at')
            ->get();             
                     
		return View::make('report/report_destination_country')
			->with('dest', $dest);
	}


	
}

?>
