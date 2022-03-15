@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('application.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Тема :</label>
                            <input name="theme" type="text" class="form-control {{ $errors->has('theme') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" placeholder="Тема заявки">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Сообщение :</label>
                            <textarea name="message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file mt-4 mb-4">
                                <label for="exampleFileControlInput1">Картинка :</label>
                                <input name="thumbnail" type="file" class="custom-file-input {{ $errors->has('thumbnail') ? ' is-invalid' : '' }}" id="customFile">

                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
