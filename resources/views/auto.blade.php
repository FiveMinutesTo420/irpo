@extends('layouts.layout')
@section('title',"Главная")

@section('head')
@endsection


@section('content')
<main>
    <section class='auto_section'>
        <div class='auto'>
            <div>
                <h1>Вход</h1>
   
            </div>
            <table class='auto_table'>
                <form action="{{route('auth.login')}}" method="post">
                    @csrf
                    <tr>
                        <td><label for="login">Логин</label></td>
                        <td><input type="text" name='login'></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Пароль</label></td>
                        <td><input type="password" name='password'></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name='reg' value='Вход'></td>
                    </tr>
                    <tr>
                        @if($errors->any())
                            {{$errors->first()}}
                        @endif
                    </tr>
                </form>
            </table>
        </div>
    </section>
</main>
@endsection
