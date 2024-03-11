@extends('layouts.layout')
@section('title',"Главная")

@section('head')
@endsection


@section('content')

<h1>Вход</h1>
<div>
    <label for="login">Логин</label>
    <input type="text" name='login'>
</div>
<div>
    <label for="pass">Логин</label>
    <input type="password" name='pass'>
</div>
@endsection
