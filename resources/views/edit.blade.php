@extends('layouts.layout')
@section('title',"Редактировать мероприятие")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('edit.event.store',$event->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Редактировать мероприятие</h4>
            {{$event->name}}
            <input type="text" placeholder="Введите название" value="{{$event->title}}" name="title" required>
            <span>Баннер(не обязательно)</span>
            <input type="file" name="image">
            Текущее изображение: {{$event->img}}
            <img src="{{asset('img/banners/'.$event->img)}}" alt="">
            <input type="submit" value="Редактировать">
        </form>

    </section>
</main>
<script src="js/jquery.js"></script>
<script>

</script>
@endsection
