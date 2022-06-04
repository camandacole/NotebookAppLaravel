<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\File;
use App\Notifications\NotebookCreated;
use Illuminate\support\Facades\Input;
use Illuminate\support\Facades\URL;
use Illuminate\support\Facades\Auth;
use App\Notebook;
use Session;
use Storage;

class NotebooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'notebook_name'=> 'required|max:50|min:4',
            'userfile' => 'required',
        ]);
            $notebook = new Notebook;
            $notebook->name = $request->notebook_name;
            $notebook->user_id = Auth::user()->id;
            $userfile = $request->file('userfile');

            
           if($userfile){
                $userfile_filename = $userfile->getClientOriginalName();
                $userfile->move(public_path('img'), $userfile_filename);
           }

           $notebook->notebook_logo = $userfile_filename;
           $notebook->save();
           ///for notification
            auth()->user()->notify(new NotebookCreated());
           Session::flash('success','Your Notebook was created successfully');
           return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //relationship
        $notebook = Notebook::find($id);
        $notes = $notebook->notes;
        return view('notes.index')->with('notes',$notes)
                                  ->with('notebook',$notebook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $notebookEdit = Notebook::find($id); //orwhere('id',$id)->first();
        return view('notebooks.edit',compact('notebookEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            // 'notebook_name'=> 'required|max:50|min:4|unique:notebooks,name',
            'notebook_name'=> 'required|max:50|min:4',
            'userfile'=> 'required',

        ]);
        $notebook = Notebook::find($id);
        $notebook->name = $request->notebook_name;
        $userfile = $request->file('userfile');
              

          
        if($userfile){
            $userfile_filename = $userfile->getClientOriginalName();
            $userfile->move(public_path('img'), $userfile_filename);

            $oldimage = $notebook->notebook_logo;
            $notebook->notebook_logo = $userfile_filename;
            Storage::delete($oldimage);
       }

         $notebook->notebook_logo = $userfile_filename;
         $notebook->save();

         Session::flash('success','Your Notebook was updated successfully');
         return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notebook = Notebook::findorFail($id);
        //$image_path = public_path().'/'.$notebook->notebook_logo;
        //unlink($image_path);
        $notebook->delete();
        Storage::delete($notebook->notebook_logo);
        $notebook->delete();
        Session::flash('success','this notebook was successfully deleted');
        return redirect()->route('home');
    }
}
