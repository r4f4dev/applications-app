@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Заявки</div>
                <div class="card-body">
                    @if(count($apps))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тема</th>
                                <th scope="col">От кого</th>
                                <th scope="col">Почта</th>
                                <th scope="col">Сообщение</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apps as $app)
                            <tr>
                                <th scope="row">{{ $app->id }}</th>
                                <td>{{ $app->theme }}</td>
                                <td>{{ $app->user->name }}</td>
                                <td>{{ $app->user->email }}</td>
                                <td>{{ $app->message }}</td>
                                <td><img src="{{ $app->getImage() }}" class="img-thumbnail" alt="..."></td>
                                <td>{{ $app->created_at }}</td>
                                <td>@if($app->isChecked())
                                    <span class="badge bg-success">Прочитан</span>
                                    @else
                                    <span class="badge bg-warning">Не прочитан</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('manager.check', ['id' => $app->id]) }}"><button class="btn btn-primary btn-sm">Отметить как прочитанный</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        Пока пусто...
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
