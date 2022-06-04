   @extends('templates.master')

   @section('content')
   @include('partials._alert')
      <section class="mt-4">
      <div class="container">
                <div class="row">
                        <div class="col-md-7">
                               <h4>note</h4>
                        </div>
                        <div class="col-md-5">
                              <a href="{{route('notebook.show', $note->notebook_id)}}" class="btn btn-success">
                                     all notes <i class="fa fa-plus"></i>
                              </a>
                        </div>
                </div>
      </div>
      </section>

      <section class="mt-4">
          <div class="container">
              <div class="row">
              <div class="col-sm-9">
                    <div class="card text-left">
                            <div class="card-header">
                              {{$note->title}}
                            </div>
                            <div class="card-body">
                              <p class="card-text">{!! $note->body !!}</p>
                            
                            </div>
                            <div class="card-footer text-muted">
                                    <a href="{{route('note.edit',$note->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{route('note.destroy',$note->id)}}" method="POST" class="d-inline-block float-right">
                                                
                                                    @csrf

                                                           {{method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger del">
                                                              <i class="fa fa-trash"></i>
                                                            </button>
                                                  
                                              </form>
                            </div>
                          </div>
              </div>
            </div>
          </div>
      </section>
      @stop
      