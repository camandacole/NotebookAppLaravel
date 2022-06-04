<?php

namespace App\Http\Controllers;

use App\Note;
use Session;
use Illuminate\Http\Request;

class NoteController extends Controller
{
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
    }
    
    public function createNote($notebookId)
    {
        //
        return view('notes.create')->with('notebookId',$notebookId);
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
             'title'=>'required|max:30|min:4',
             'body'=>'required|min:5'
        ]);

        $inputData = $request->all();
        Note::create($inputData);
        $notebookId = $request->notebook_id;
        Session::flash('success', 'your note was created successfully');
       // return redirect()->route('notebook.show', ['notebookId'=>$notebookId]);
         return redirect()->route('notebook.show', compact('notebookId'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $note = Note::find($id);
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $note = Note::find($id);
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'required|max:30|min:4',
            'body'=>'required|min:5'
       ]);
        
        $note = Note::find($id);
        $inputData = $request->all();
        $note->update($inputData);
        Session::flash('success', 'your Note was successfully updated');
        return redirect()->route('note.show',$note->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $note = Note::find($id);
        $note->delete();

        session::flash('success','The task record was successfully deleted');
        return redirect()->route('notebook.show',$note->notebook_id);
    }

}
