 @if ($errors->any())
 @foreach ($errors->all() as $error)
 <div class="text-center">
     <div class="alert alert-warning">{{$error}}</div>
 </div>
 @endforeach
 @endif
