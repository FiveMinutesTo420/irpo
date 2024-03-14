@extends('layouts.layout')
@section('title',"Админ панель")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('create.event')}}" method="post">
            @csrf
            <h4>Создать мероприятие</h4>
            <input type="text" placeholder="Введите название" name="title">
            <input type="submit" value="Создать">
        </form>
        <div class="events-list">
            <h4>Список мероприятий</h4>
            123
            {{$events->count()}}
        </div>
    </section>

</main>
@endsection
