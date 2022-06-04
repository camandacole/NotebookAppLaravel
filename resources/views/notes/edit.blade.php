@extends('templates.master')

@section('content')
<section class="mt-4">
          <div class="container">
                <div class="row">
                  <div class="col-md-7 offset-md-2">
                        <form action="{{route('note.update',$note->id)}}" method="POST">
                          @csrf
                          {{method_field('PUT')}}
                                <div class="form-group">
                                  <label for="note_title">note title</label>
                                  <input type="text" class="form-control" name="title" value="{{$note->title}}" >
                                </div>
                                @if ($errors->has('title'))
                                     <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                                
                                     <div class="form-group">
                                            <label for="note_date">notes</label>
                                            <textarea class="form-control" name="body" id="summernote" rows="3">{!!$note->body!!}</textarea>
                                       </div>
                                       @if ($errors->has('body'))
                                     <span class="text-danger">{{$errors->first('body')}}</span>
                                  @endif
                                
                                    
                            
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                  </div>
              <div>
         </div>

      </section>
@stop