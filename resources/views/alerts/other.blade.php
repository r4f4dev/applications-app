@if (Session::has('message'))
<div class="text-center">
    <p class="alert alert-info">{{ Session::get('message') }}</p>
</div>
@endif
