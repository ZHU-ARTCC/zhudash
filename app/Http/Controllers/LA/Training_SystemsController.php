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

use App\Models\Training_System;


class Training_SystemsController extends Controller
{
	public $show_action = true;
	public $view_col = 'ctl_name';
	public $listing_cols = ['id', ];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Training_Systems', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Training_Systems', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Training_Systems.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Training_Systems');
		
		if(Module::hasAccess($module->id)) {
			return View('la.training_systems.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new training_system.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function pick(Request $request, $id)
	{
		$this->validate($request, array(
            'mtr_name' => 'required',

        ));
        
        $session = Training_system::find($id);
        
            $session->email = $request->input('email');
            $session->ctl_name = $request->input('ctl_name');
            $session->ctl_cid = $request->input('ctl_cid');
            $session->airport = $request->input('airport');
            $session->position = $request->input('position');
            $session->idate = $request->input('idate');
            $session->timestartblock = $request->input('timestartblock');
            $session->timeendblock = $request->input('timeendblock');
            $session->mtr_name = $request->input('mtr_name');
        
        $session->save();
        
	}

	/**
	 * Store a newly created training_system in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, array(
            'airport' => 'required',
            'position' => 'required',
            'idate' => 'required|date|after:today',

        ));
        
        $session = new Training_system;
          
            $session->email = $request->email;
            $session->ctl_name = $request->ctl_name;
            $session->ctl_cid = $request->ctl_cid;
            $session->airport = $request->airport;
            $session->position = $request->position;
            $session->idate = $request->idate;
            $session->timestartblock = $request->timestartblock;
            $session->timeendblock = $request->timeendblock;
            
  
        $session->save();
        
        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'airport' => $request->airport,
            'position' => $request->position,
            'date' => $request->idate,
            'start' => $request->timestartblock,
            'end' => $request->timeendblock
        );
        
         Mail::send('emails.trainingrequest', $data, function($message) use ($data){
            $message->from('wguisbond@gmail.com');
            $message->to($data['email']);
            $message->subject('Training Request Confirmation');
        });
        
        return view('la.training_systems.index');

	}
    
    

	/**
	 * Display the specified training_system.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Training_Systems", "view")) {
			
			$training_system = Training_System::find($id);
			if(isset($training_system->id)) {
				$module = Module::get('Training_Systems');
				$module->row = $training_system;
				
				return view('la.training_systems.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('training_system', $training_system);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("training_system"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified training_system.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Training_Systems", "edit")) {			
			$training_system = Training_System::find($id);
			if(isset($training_system->id)) {	
				$module = Module::get('Training_Systems');
				
				$module->row = $training_system;
				
				return view('la.training_systems.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('training_system', $training_system);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("training_system"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified training_system in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Training_Systems", "edit")) {
			
			$rules = Module::validateRules("Training_Systems", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Training_Systems", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.training_systems.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified training_system from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		
			Training_system::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.training_systems.index');
			return redirect(config('laraadmin.adminRoute')."/");
		
	}
	
    public function finalize($id)
	{
		
			$sess =Training_system::where('id',$id)->first();
        
            if ($sess != null) {
            $sess->delete();
           return redirect()->route(config('laraadmin.adminRoute') . '.training_systems.index');
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
		$values = DB::table('training_systems')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Training_Systems');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/training_systems/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Training_Systems", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/training_systems/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Training_Systems", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.training_systems.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
