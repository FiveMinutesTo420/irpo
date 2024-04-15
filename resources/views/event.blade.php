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
            @if($event->main == 1)
            @foreach($event->symposiums as $symp)
            
            <div class='simposium'>
                <div class='simposium_h'>
                    <h3>{{$symp->name}}</h3>
                </div>
                @foreach($symp->sections as $sec)
                <div class='section'>
                    <div class='section_h'>
                        <h4>{{$sec->name}}</h4>
                    </div>

                    <div class='leaders'>
                        @foreach($sec->organizers as $org)
                        <div class='leader'>
                            <div class='hex_bg_main'>
                                <div class='hex_bg'>
                                    <div class='hex_bg_inside' style='--image: url("{{asset('img/avatars/'.$org->photo)}}");'>
                                    </div>
                                </div>
                            </div>
                            <div class='leader_info'>
                                <h3>{{$org->surname}}  {{$org->name}}  {{$org->patronymic}} </h3>
                                <p>{{$org->description}} </p>
                            </div>
                        </div>
                            
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
    

                @else
                <div class='leaders'>
                    @foreach($event->organizers as $org)
                    <div class='leader'>
                        <div class='hex_bg_main'>
                            <div class='hex_bg'>
                                <div class='hex_bg_inside' style='--image: url("{{asset('img/avatars/'.$org->photo)}}");'>
                                </div>
                            </div>
                        </div>
                        <div class='leader_info'>
                            <h3>{{$org->surname}}  {{$org->name}}  {{$org->patronymic}} </h3>
                            <p>{{$org->description}} </p>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
                @endif
            
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