@extends('layouts.layout')
@section('title',"Мероприятие")

@section('head')
<link rel="stylesheet" href="{{asset('css/event.css')}}">
@endsection


@section('content')
<main>
    <div class='banner_event' style="display: ;">
        <img src="{{asset('img/event1.png')}}" alt="">
    </div>
    <div class='leaders_main'>
        <h1>Эксперты</h1>
        <div class='simposium'>
            <h3>Симпозиум 1</h3>
            <div class='section'>
                <h4>Секция 1</h4>
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
</main>
@endsection