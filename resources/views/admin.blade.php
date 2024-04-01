@extends('layouts.layout')
@section('title',"Админ панель")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('create.event')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Создать мероприятие</h4>
            <input type="text" placeholder="Введите название" name="title" required>
            Баннер

            <input type="file" name="image">
            <div style="margin-bottom: 10px">
                <input type="checkbox" name="main">
                Основное мероприятие
            </div>

            <input type="submit" value="Создать">
        </form>
        <div class="events-list">
            <h4>Список мероприятий</h4>
            
            @foreach($events as $event)
            <div class="event">
                <a href="{{route('event',$event->slug)}}">{{$event->title}} | {{$event->created_at}}</a>
                <div class="event-control-buttons">
                    <form method="post" action="{{route('delete.event')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <input type="submit" value="Удалить" style="background: red">
                    </form>
                    <form method="post" action="{{route('edit.event')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <input type="submit" value="Редактировать" style="background: green">
                    </form>
 
                </div>

            </div>
            @endforeach
        </div>
    </section>

</main>
@endsection
