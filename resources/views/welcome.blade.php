@extends('layouts.layout')
@section('title',"Главная")
@section('head')

@endsection

@section('content')
    <section class='bg'>
        <main class='main'>
            <div class='bg_main'>
                <div class='bg_main_info'>
                    <h1>ШАГ В БУДУЩУЮ <br>ПРОФЕССИЮ</h1>
                    <p>
                    это образовательный проект, направленный на развитие духовно-нравственного, 
                    интеллектуального и творческого потенциала подрастающего поколения. 
                    Целевая аудитория – молодые исследователи в сфере среднего профессионального 
                    образования, представители научной и педагогической общественности.
                    </p>
                </div>
            </div>
            <div class='competitions_bg'>
                <div class='competitions'>
                    <h1>АКТУАЛЬНЫЕ КОНКУРСЫ</h1>
                    <div class='actual_competitions'>
                        <div class='competition'>
                            <div class='competition_bg' style='background-image: url("../img/comp1.png"); background-size: cover;'></div>
                                <div class='competition_info'>
                                    <p>Научно-практическая конференция</p>
                                    <hr>
                                </div>
                        </div>
                        <div class='competition'>
                            <div class='competition_bg' style='background-image: url("../img/"); background-size: cover;'></div>
                                <div class='competition_info'>
                                    <p>Командная деловая игра марафон бизнес-идей</p>
                                    <hr>
                                </div>
                        </div>
                        <div class='competition'>
                            <div class='competition_bg' style='background-image: url("../img/"); background-size: cover;'></div>
                                <div class='competition_info'>
                                    <p>Республиканская интернет-олимпиада</p>
                                    <hr>
                                </div>
                        </div>
                        <div class='competition'>
                            <div class='competition_bg' style='background-image: url("../img/"); background-size: cover;'></div>
                                <div class='competition_info'>
                                    <p>Выставка инженерных проектов #Автобот.2023</p>
                                    <hr>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
