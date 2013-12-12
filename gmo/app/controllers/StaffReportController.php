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


    public function reportNonGmo(){
        $desp = DB::table('gmo.export_certificate_requests')
                        ->join('gmo.users', 'gmo.users.id', '=', 'gmo.export_certificate_requests.owner_id')
                        ->get();
        $date['first'] = DB::table('gmo.export_certificate_requests')->select('updated_at')->orderBy('updated_at', 'asc')->first();
        $date['last'] = DB::table('gmo.export_certificate_requests')->select('updated_at')->orderBy('updated_at', 'desc')->first();
        $notP = DB::table('gmo.export_certificate_requests')->select('id')->where('status','=', 'Pending')->get();

        return View::make('report/report_non_gmo_list')
                ->with('datas', $desp)
                ->with('notP', $notP)
                ->with('date', $date);
    }

    public function reportDomestic(){
        $desp = DB::table('gmo.domestic_certificate_requests')
                        ->join('gmo.users', 'gmo.users.id', '=', 'gmo.domestic_certificate_requests.owner_id')
                        ->get();
        $date['first'] = DB::table('gmo.domestic_certificate_requests')->select('updated_at')->orderBy('updated_at', 'asc')->first();
        $date['last'] = DB::table('gmo.domestic_certificate_requests')->select('updated_at')->orderBy('updated_at', 'desc')->first();
        $notP = DB::table('gmo.domestic_certificate_requests')->select('id')->where('status','=', 'Pending')->get();

        return View::make('report/report_domestic_list')
                ->with('datas', $desp)
                ->with('notP', $notP)
                ->with('date', $date);
    }

	
}

?>
