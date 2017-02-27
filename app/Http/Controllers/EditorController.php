<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EditorController extends Controller
{
    public function update(Request $request, $id)
    {

        // Validate Data
        
        $this->validate(request, array(
            'body' => 'required',
            'notes' => 'required'
        ));
        
        // Save data to the DB
        
        $sop = sop::find($id)
        
        $sop->body = $request('body');
        $sop->notes = $request('notes');
        
        $sop->save();
        
        // User feedback - success or not
        
        Session::flash('success', 'The SOP was updated!');
        
        // Redirect to SOP manager
            
        return redirect()->view('sops');
        
        
        
    }
    
    
    
}
