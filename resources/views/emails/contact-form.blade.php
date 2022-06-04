@extends('templates.master')

@section('content')
<section class="mt-4">
<h4>@include('partials._alert')</h4>
          <div class="container">
                <div class="row">
                  <div class="col-md-7 offset-md-2">
                   <h2 class="text-center">Get In Touch</h2>
                    <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                     <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                                
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email"  value="{{old('email')}}">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    @if ($errors->has('email'))
                                     <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                                
                                </div>
                                
                                <div class="form-group">
                                    <label for="subject">subject</label>
                                    <input type="text" class="form-control" name="subject"  value="{{old('subject')}}">
                                    @if ($errors->has('subject'))
                                     <span class="text-danger">{{$errors->first('subject')}}</span>
                                @endif
                                
                                </div>
                               
                             <div class="form-group">
                            <label for="message">message</label>
                            <textarea class="form-control" name="message" rows="3">{{old('message')}}</textarea>
                            @if ($errors->has('message'))
                                     <span class="text-danger">{{$errors->first('message')}}</span>
                                @endif
                                
                        </div>
                                <button type="submit" class="btn btn-danger">Submit</button>
                   </form>
                  </div>
              <div>
         </div>

      </section>

      
@stop