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
            <div class="experts">

            </div>

            <input type="button" value="Добавить эксперта" id="addExpert">









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
<script src="js/jquery.js"></script>
<script>
let count = 0
$('#addExpert').click(function(){
    count += 1
    $('.experts').append('<div class="expert-fields"> <p>Эксперт №' + count +'</p><input type="text" name="name[]" placeholder="Имя"><input type="text" name="surname[]"  placeholder="Фамилия"><input type="text" name="patronymic[]"  placeholder="Отчество"><textarea name="description[]" id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>    Фотография <input type="file" name="expert-image[]"></div>')
})
</script>
@endsection
