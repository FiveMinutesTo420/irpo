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

            <input type="file" name="image" required>
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
            @forelse($events as $event)
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
            @empty
            <p>Нет мероприятий</p>
            @endforelse
        </div>
    </section>
</main>
<script src="js/jquery.js"></script>
<script>
function delete1(id){
    $('#expert' + id).remove();
}
let count = 0

$('#addExpert').click(function(){
    count += 1
    $('.experts').append('<div class="expert-fields" id="expert'+count+'"> <p>Эксперт №' + count +' <button onclick="delete1('+count+')">Удалить</button></p><input type="text" name="name[]" required placeholder="Имя"><input type="text" name="surname[]" required  placeholder="Фамилия"><input type="text" name="patronymic[]" required  placeholder="Отчество"><textarea name="description[]" required id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>    Фотография <input type="file" required name="photo[]"></div>')
})

</script>
@endsection
