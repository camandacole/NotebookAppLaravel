@extends('templates.master')

@section('content')
 @include('partials._alert')
             
         <section class="mymargin">
             <div class="container">
                 <div class="row">
                     <div class="col-md-7">
                             <h4> Notes</h4>
                     </div>
                     <div class="col-md-5">
                         <a href="{{route('notes.createNote', $notebook->id)}}" class="btn btn-success">
                             New Notes
                             <i class="fa fa-plus"></i>
                            </a>
                        
                     </div>
                 </div>
             </div>
         </section>
  <!---list of all notes-->
     <section class="mt-4">
             <div class="container">
          
             <div class="row">
             @foreach($notes as $note)
                 <div class="col-md-4 ">
                     <div class="card mb-4 bg-dark text-white">
                         <div class="card-header">
                              {{$note->title}} 
                              <a href="#" class="btn btn-secondary d-block">
                                  {{date('M j, Y h:ia',strtotime($note->created_at))}}
                              </a>
                         </div>
                         <div class="card-body">
                             <h4 class="card-title"> </h4>
                                 <p class="card-text">{{substr(strip_tags($note->body),0,100)}} {{strlen(strip_tags($note->body))>100 ? "...":""}}</p>
                                 <a href="{{route('note.show',$note->id)}}" class="btn btn-primary">readmore</a>
                                
                         </div>
                     </div>
                 </div>
                
                 @endforeach
             </div>
             </div>
     </section>
@stop