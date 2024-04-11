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
            <span>Баннер</span>

            <input type="file" name="image" required>
            <div style="margin-bottom: 10px">
                <input type="checkbox" name="main" id="main">
                <span>Основное мероприятие</span>
            </div>
            <div id="mainContent" style="width:100%;">
                <div id="show-symposiums" style="margin-bottom: 5px;" >
                    <div style="padding:10px; border:1px solid black;">
                        <div style="background: gray; color:white; padding:5px; border-radius:5px;">симпозиум1 абывфаодывфола</div>
                        <div class="sections">
                            <div style="background: aqua; width:70%; color:white; padding:5px; border-radius:5px;">Секция 1 бла бла бла</div>
                        </div>
                    </div>
 
                </div>
                <div id="symposiums" style="display: flex; flex-direction:column">

                </div>
                <input type="button" value="Добавить симпозиум" id="addSymposium">

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
                        <input type="submit" value="Удалить" class="event_delete">
                    </form>
                    <form method="post" action="{{route('edit.event')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <input type="submit" value="Редактировать" class="event_edit">
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
$('#mainContent').hide();
let symposiums = []
let scount = 0

$('#addExpert').click(function(){
    count += 1
    $('.experts').append('<div class="expert-fields" id="expert'+count+'"> <p>Эксперт №' + count +' <button onclick="delete1('+count+')">Удалить</button></p><input type="text" name="name[]" required placeholder="Имя"><input type="text" name="surname[]" required  placeholder="Фамилия"><input type="text" name="patronymic[]" required  placeholder="Отчество"><textarea name="description[]" required id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>    Фотография <input type="file" required name="photo[]"></div>')
})
function deleteSymp(id){
    $('#sympall' + id).remove();
}
function addSymp(id){
    alert($('#symp'+id).val())
    $('#sympall' + id).remove();
}
$('#addSymposium').click(function(){
    scount += 1
    $('#symposiums').append('<div id ="sympall'+scount+'"><input type="text" placeholder="Название симпозиума" id="symp'+scount+'"> <button type="button" onclick="addSymp('+scount+')"> добавить </button><button type="button" onclick="deleteSymp('+scount+')"> убрать </button></div>')
})


$('#main').click(function(){
    if($('#main').is(':checked')){
        $('#mainContent').show();
    }else{
        $('#mainContent').hide();
        
    }
})

</script>
@endsection
