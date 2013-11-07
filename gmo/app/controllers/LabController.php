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

			$labproduct = LabTaskProduct::where('lab_task_id','=',$labtask->id)->first();
			$item = array('taskid' => $labtask->reference_id,'taskname' => $labproduct->product_name,'duedate' => $labproduct->finish,'status' => $labtask->status);
			array_push($items, $item);
		}

		return $items;
	}
	
}