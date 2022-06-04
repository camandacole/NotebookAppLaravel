@extends('templates.master')

@section('content')


      <section class="mt-4">
          <div class="container">
                <div class="row">
                <h4>@include('partials._alert')</h4>
                  <div class="col-md-7 offset-md-2">
                        <form action="{{route('notebook.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                                <div class="form-group">
                                  <label for="notebook">notebook name</label>
                                  <input type="text" class="form-control" value="{{old('notebook_name')}}" name="notebook_name" >
                                  @if($errors->has('notebook_name')) 
                                          <span  class="text-danger">{{$errors->first('notebook_name')}}</span>
                                          @endif
                                </div>
                                

                                       <div class="form-group">
                                          <label for="exampleFormControlFile1">Example file input</label>
                                          <input type="file" name="userfile" class="form-control-file" id="exampleFormControlFile1">
                                          @if($errors->has('userfile')) 
                                          <span  class="text-danger">{{$errors->first('userfile')}}</span>
                                          @endif
                                     </div>
                                    
                            
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                  </div>
              <div>
         </div>

      </section>

      
    

@stop