<?php

class LabController extends BaseController {

	protected $requireLabStaff = true;
	
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function show($id) {
		$labtask = LabTask::where('reference_id' , '=', $id)->first();
		$labtaskProduct = LabTaskProduct::where('lab_task_id' , '=', $labtask->id)->first();
		$labtaskAssignment = LabTaskAssignment::where('lab_task_id' , '=', $labtask->id)->get();

		return View::make('labtask/labtask')->with('labtask',$labtask)->with('labtaskProduct',$labtaskProduct)->with('labtaskAssignment',$labtaskAssignment)->with('statuslist',$this->getTaskStatus($labtask['status']));
	}

	public function start($id) {
		$labtask = LabTask::where('reference_id' , '=', $id)->first();
		if($labtask['status'] == "Pending") {
			$labtask['status'] = "DNA Extraction";
			$labtask->save();
		}
		return Redirect::action('LabController@show', $id);
	}


	public function index() {

		$labtasks = LabTask::all();

		$labtasks_not_finish = $labtasks->filter(function($task) {
			if($task->status != 'Waiting For Approval') {
				return $task;
			}
		});

		$labtasks_waiting_for_approval = $labtasks->filter(function($task) {
			if($task->status == 'Waiting For Approval') {
				return $task;
			}
		});

		$labtasks_not_finish = $this->sortByDueDate($labtasks_not_finish);

		$labtasks_waiting_for_approval = $this->sortByDueDate($labtasks_waiting_for_approval);

		$items_not_finish = $this->getTableItem($labtasks_not_finish);
		$items_waiting_for_approval = $this->getTableItem($labtasks_waiting_for_approval);


		return View::make('labtask/index')->with('items',array($items_not_finish,$items_waiting_for_approval));
	}

	private function getTaskStatus($status) {
		$statusList = array('Pending', 'DNA Extraction','Volume & Concentration Measurement', 'Endrogenous Gene Analysis', 'Gene Analysis','Waiting For Approval');
		$statusResult = array('Pending' => '',  'DNA Extraction' => '','Volume & Concentration Measurement' => '', 'Endrogenous Gene Analysis' => '', 'Gene Analysis' => '', 'Waiting For Approval' => '');
		$index = array_search($status, $statusList);
		$statusResult[$statusList[$index]] = 'Pending';
		for ($i=$index+1; $i < sizeof($statusList); $i++) { 
			$statusResult[$statusList[$i]] = 'Waiting for above sequence';
		}

		for ($i=$index-1; $i >= 0; $i--) { 
			$statusResult[$statusList[$i]] = 'Completed';
		}
		return $statusResult;
	}

	private function sortByDueDate($labtasks) {
		$labtasks = $labtasks->sortBy(function($labtask)
		{
			$product = LabTaskProduct::find($labtask->id);
		    return $product->finish;
		});

		return $labtasks;
	}

	private function getTableItem($labtasks) {
		$items = array();
		foreach ($labtasks as $labtask) {
			$labproduct = LabTaskProduct::where('lab_task_id','=',$labtask->id)->get();
			$product_names = array();
			$due_date = '';
			foreach ($labproduct as $product) {
				$product_names[] = $product->product_name;
				$due_date = $product->finish;
			}
			$item = array(
				'taskid' => $labtask->reference_id,
				'taskname' => implode(', ', $product_names),
				'duedate' => $due_date,
				'status' => $labtask->status);
			array_push($items, $item);
		}
		return $items;
	}

	//Upload & Download Lab Result
	public function viewLabResult(){
		$labTaskProduct = LabTaskProduct::where('lab_task_id', '=', '1')->get();
		$labTask = LabTask::find('1');
		$labTaskAssignment = LabTaskAssignment::where('lab_task_id', '=', '1')->get();
		$upload = UploadLabTaskFile::find('1');
		

		return View::make('/labtask/view-lab-task')
			->with('products', $labTaskProduct)
			->with('assignees', $labTaskAssignment)
			->with('labTask', $labTask)
			->with(array(
				'file1' => $upload['file1'],
				'file2' => $upload['file2'],
				'file3' => $upload['file3'],
				'file4' => $upload['file4'],
			));
	}

	public function uploadLabResult(){
		$filenum = Input::get('filenum');
		$file = Input::file($filenum);
		$namef = Input::file($filenum)->getClientOriginalName();
		$destinationPath = 'uploads/'.str_random(8);
        $uploadSuccess = Input::file($filenum)->move($destinationPath, $namef);

        if( $uploadSuccess ) {
        	$is_success = 1;
        	$namef = $destinationPath."/".$namef;
        	$upload = UploadLabTaskFile::find('1');
        	$upload->$filenum = $namef;
        	$upload->save();
        	return Redirect::to('/staff/test')
			->with('filename', $namef)
			->with('message', "success")
			->with('is_success', $is_success);
		 // or do a redirect with some message that file was uploaded
        } else {
           return View::make('/staff_requests/test')
			->with('file', $namef)
			->with('message', "fail");
        }
	}



	public function downloadLabResult($filename){
		// print_r($destinationPath);
		// return Response::download("public/".$destinationPath);
		return Response::download($filename);
	}
	//End Upload & Download Lab Result
	
}
