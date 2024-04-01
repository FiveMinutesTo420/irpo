@extends('layouts.layout')
@section('title',$event->title)

@section('head')
<link rel="stylesheet" href="{{asset('css/event.css')}}">
@endsection


@section('content')
<main>
    <section class='event'>
        <div class='banner_event' style="display: ;">
            <img src="{{asset('img/banners/'.$event->img)}}" alt="">
        </div>
        <div class='event_input'>
            <input type="submit" value='Подать заявку'>
        </div>
        <div class='leaders_main'>
            <h1>Эксперты</h1>
            <hr>
            <div class='simposium'>
                <div class='simposium_h'>
                    <h3>Симпозиум 1. Инженерные науки в техносфере настоящего и будущего</h3>
                </div>
                <div class='section'>
                    <div class='section_h'>
                        <h4>Секция 1. «Металлообработка и транспортные средства». «Машиностроение»</h4>
                    </div>
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
            </div>
        </div>
    </section>
    <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="goo1"><feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />    
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo1" />
                    <feComposite in="SourceGraphic" in2="goo1" operator="atop"/>
                </filter>
            </defs>
        </svg>
</main>
@endsection