 @extends('templates.master')

 @section('content')

   <div class="jumbotron">
  <h1 class="display-3 wow jello">WELCOME TO A DIGITAL NOTEBOOK!</h1>
  <p class="lead wow jello">Write and store notes on this web app!!</p>
  <hr class="my-4">
  <p class=" wow jello"></p>
  <p class="lead wow jello">
    <a class="btn btn-primary btn-lg" href="{{route('home')}}" role="button">your Notebooks</a>
  </p>
</div>
 @stop
