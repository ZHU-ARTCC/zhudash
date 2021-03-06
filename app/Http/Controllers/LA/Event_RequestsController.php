<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Mail;

use App\Models\Event_Request;

class Event_RequestsController extends Controller
{
	public $show_action = true;
	public $view_col = 'event_request';
	public $listing_cols = ['id', 'ctl_name', 'event_request', 'position_request', 'comments'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Event_Requests', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Event_Requests', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Event_Requests.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Event_Requests');
		
		if(Module::hasAccess($module->id)) {
			return View('la.event_requests.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new event_request.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created event_request in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Event_Requests", "create")) {
		
			$rules = Module::validateRules("Event_Requests", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
            $data = array(
            'email' => $request->email,
            'name' => $request->ctl_name,
            'event' => $request->event_request,
            'position' => $request->position_request,
        );
        
         Mail::send('emails.eventsoconfirm', $data, function($message) use ($data){
            $message->from('wguisbond@gmail.com');
            $message->to($data['email'], 'ec@zhuartcc.org');
            $message->subject('Event Sign-Up Confirmation');
        });
            
			$insert_id = Module::insert("Event_Requests", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.event_requests.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified event_request.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Event_Requests", "view")) {
			
			$event_request = Event_Request::find($id);
			if(isset($event_request->id)) {
				$module = Module::get('Event_Requests');
				$module->row = $event_request;
				
				return view('la.event_requests.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('event_request', $event_request);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("event_request"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified event_request.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Event_Requests", "edit")) {			
			$event_request = Event_Request::find($id);
			if(isset($event_request->id)) {	
				$module = Module::get('Event_Requests');
				
				$module->row = $event_request;
				
				return view('la.event_requests.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('event_request', $event_request);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("event_request"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified event_request in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Event_Requests", "edit")) {
			
			$rules = Module::validateRules("Event_Requests", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
            
			$insert_id = Module::updateRow("Event_Requests", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.event_requests.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified event_request from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Event_Requests", "delete")) {
			Event_Request::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.event_requests.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('event_requests')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Event_Requests');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/event_requests/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Event_Requests", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/event_requests/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Event_Requests", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.event_requests.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
