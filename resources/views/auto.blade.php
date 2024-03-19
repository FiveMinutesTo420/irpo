@extends('layouts.layout')
@section('title',"Вход")

@section('head')
<link rel="stylesheet" href="{{asset('css/auto.css')}}">
@endsection


@section('content')
<main>
    <section class='auto_section'>
        <div class='auto'>
            <div>
                <h1>Вход</h1>
            </div>
                <!-- Форма авторизации / Путь auth.login ведет к app/http/controllers/AuthController.php -->
                <form action="{{route('auth.login')}}" method="post" class='auto_form'>
                    @csrf
                    <div class='info_input'>
                        <label for="login">Логин</label>
                        <input type="text" name='login'>
                    </div>
                    <div class='info_input'>
                        <label for="pass">Пароль</label>
                        <input type="password" name='password'>
                    </div>
                    <div>
                        <input type="submit" name='reg' value='Вход'>
                    </div>
                        @if($errors->any())
                            {{$errors->first()}}
                        @endif
                    </tr>
                </form>
        </div>
    </section>
</main>
@endsection
