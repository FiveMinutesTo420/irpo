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
                <form action="" method="post">
                    <tr>
                        <td><label for="login">Логин</label></td>
                        <td><input type="text" name='login'></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Пароль</label></td>
                        <td><input type="password" name='pass'></td>
                    </tr>
                </form>
            </table>
        </div>
    </section>
</main>
@endsection
