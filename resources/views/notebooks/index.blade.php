@extends('templates.master')

@section('content')

         <section class="mt-4">
             <div class="container">
             <section class="text-center">
             <h4>@include('partials._alert')</h4>
             </section>
                 <div class="row">
                     <div class="col-md-7">
                             <h4>your Notebooks</h4>
                     </div>
                     <div class="col-md-5">
                         <a href="{{route('notebook.create')}}" class="btn btn-success">
                             New Notebook
                             <i class="fa fa-plus"></i>
                            </a>
                        
                     </div>
                 </div>
             </div>
         </section>


         <section class="mt-4">
                <div class="container">
                    <div class="row">
                        <!---card1-->
                        @foreach($notebooks as $notebook)
                        <div class="col-md-4 mb-4">
                               <div class="card" style="width: 20rem;">
                                       <img class="card-img-top" src="{{asset('img/'.$notebook->notebook_logo)}}" alt="Card image cap">
                                       <div class="card-body">
                                         <a class="btn btn-dark btn-block card-title text-white" href="{{route('notebook.show', $notebook->id)}}">{{$notebook->name}}</a>
                                         <a href="{{route('notebook.edit', $notebook->id)}}" class="btn btn-primary btn">edit</a>
                                        

                                         <form action="{{route('notebook.destroy', $notebook->id)}}" method="POST" class="d-inline-block">
                                         @csrf
                                           <input type="hidden" name="_method" value="DELETE">
                                           <button href="#" class="del btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                           </buttton>
                                         </form>
                                       </div>
                                     </div>
                        </div>
                        @endforeach
                     
                    </div>
                </div>
                </div>   
        </section>

      
         <section class="mt-4">
                <div class="container">
                    <div class="row">
                        <!---card1-->
                        @foreach($notebooks as $notebook)
                        <div class="col-md-4 mb-4">
                               <div class="card" style="width: 20rem;">
                                       <img class="card-img-top" src="{{asset('img/'.$notebook->notebook_logo)}}" alt="Card image cap">
                                       <div class="card-body">
                                         <a class="btn btn-dark btn-block card-title text-white" href="{{route('notebook.show', $notebook->id)}}">{{$notebook->name}}</a>
                                         <a href="{{route('notebook.edit', $notebook->id)}}" class="btn btn-primary btn">edit</a>
                                        

                                         <form action="{{route('notebook.destroy', $notebook->id)}}" method="POST" class="d-inline-block">
                                         @csrf
                                           <input type="hidden" name="_method" value="DELETE">
                                           <button href="#" class="del btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                           </buttton>
                                         </form>
                                       </div>
                                     </div>
                        </div>
                        @endforeach
                     
                    </div>
                </div>
                </div>   
        </section>

      
@stop
