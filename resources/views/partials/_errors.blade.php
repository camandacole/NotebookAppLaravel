@if (isset($errors) && count($errors)>0)
   <div class="alert alert-dismissable alert-danger fade show">
    <button type="button" class="close" data-dismiss="alert" arial-label="close">
    <span arial-hidden="true">&times;</span>
    </button>
     @foreach ($errors->all() as $errors)
     <li><strong>{{!! $error !!}}</strong></li>
     @endforeach
   </div>
   @endif