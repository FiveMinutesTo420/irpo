@extends('layouts.layout')
@section('title',"Главная")
@section('head')

@endsection

@section('content')
        <main class='main'>
            <div class='banner' style="display: ;">
                <img src="{{asset('img/banner.png')}}" alt="">
            </div>
            <!--<div class='bg_main'>
                <div class='bg_main_info'>
                    <h1>ШАГ В БУДУЩУЮ <br>ПРОФЕССИЮ</h1>
                    <p>
                    это образовательный проект, направленный на развитие духовно-нравственного, 
                    интеллектуального и творческого потенциала подрастающего поколения. 
                    Целевая аудитория – молодые исследователи в сфере среднего профессионального 
                    образования, представители научной и педагогической общественности.
                    </p>
                </div>
            </div>-->
                <div class='competitions'>
                    <!--<h1>АКТУАЛЬНЫЕ КОНКУРСЫ</h1>-->
                    <div class='actual_competitions'>
                        @foreach($events as $event)
                        <a href="" class='competition_a'>
                            <div class='competition'>
                                    <div class='competition_bg'></div>
                                    <div class='competition_info'>
                                        <span>{{$event->title}}</span>
                                    </div>
                            </div>
                        </a>
                        @endforeach

    
                    </div>
                </div>
            <div class='orgs_main'>
                <h1>ОРГАНИЗАЦИИ</h1>
                <div class='orgs'>
                    <div class='org'>
                        <img src="{{asset('img/org1.png')}}" alt="Организации">
                    </div>
                    <div class='org'>
                        <img src="{{asset('img/org2.png')}}" alt="Организации">
                    </div>
                    <div class='org'>
                        <img src="{{asset('img/org3.png')}}" alt="Организации">
                    </div>
                    <div class='org'>
                        <img src="{{asset('img/org4.png')}}" alt="Организации">
                    </div>
                    <div class='org'>
                        <img src="{{asset('img/org5.png')}}" alt="Организации">
                    </div>
                </div>
                <hr>
            </div>
            <div class='partns_main'>
                <h1>ПАРТНЕРЫ</h1>
                <div class='partns'>
                    <div class='partn'>
                        <img src="{{asset('img/partn1.png')}}" alt="Партнеры">
                    </div>
                    <div class='partn'>
                        <img src="{{asset('img/partn2.png')}}" alt="Партнеры">
                    </div>
                    <div class='partn'>
                        <img src="{{asset('img/partn3.png')}}" alt="Партнеры">
                    </div>
                </div>
                <hr>
            </div>
            <div class='leaders_main'>
                <h1>ОБЩЕЕ РУКОВОДСТВО</h1>
                <div class='leaders'>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/org2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/partn3.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='leaders_main' id="coords">
                <div class='leaders_h1'>
                    <h1>КООРДИНАТОРЫ МЕРОПРИЯТИЙ</h1>
                </div>
                <div class='leaders'>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("../img/leader2.png");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>Алексеев Алексей Евгеньевич</h3>
                            <p>описание описание описание описание</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur" />    
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                    <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                </filter>
            </defs>
        </svg>
        <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="goo1"><feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />    
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo1" />
                    <feComposite in="SourceGraphic" in2="goo1" operator="atop"/>
                </filter>
            </defs>
        </svg>
@endsection
