@extends('layouts.layout')
@section('title',"Админ панель")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('create.event')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Создать мероприятие</h4>
            <input type="text" placeholder="Введите название" name="title" required>
            <span>Баннер</span>

            <input type="file" name="image" required>
            <div style="margin-bottom: 10px">
                <input type="checkbox" name="main" id="main">
                <span>Основное мероприятие</span>
            </div>
            <div id="mainContent" style="width:100%;">
                <div id="show-symposiums" style="margin-bottom: 5px;" >
      
 
                </div>
                <div id="symposiums" style="display: flex; flex-direction:column">

                </div>
                <input type="button" value="Добавить симпозиум" id="addSymposium">

            </div>
            <div class="experts">

            </div>






            <input type="button" value="Добавить эксперта" id="addExpert">
            <br>
            <input type="submit" value="Создать мероприятие" class="create_event_button">
        </form>
        <div class="events-list">
            <h4>Список мероприятий | <a target="_blank" href="http://127.0.0.1/openserver/phpmyadmin/index.php?route=/&route=%2F&db=irposakha&table=organizers">Редактировать экспертов, симпозиумы, секции</a></h4>
            @forelse($events as $event)
            <div class="event">
                <a href="{{route('event',$event->slug)}}">{{$event->title}} | {{$event->created_at}}</a>
                <div class="event-control-buttons">
                    <form method="post" action="{{route('delete.event')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <input type="submit" value="Удалить" class="event_delete">
                    </form>
     
                    <a class="event_edit" href="{{route('edit.event',$event->id)}}">Редактировать</a>
                </div>
            </div>
            @empty
            <p>Нет мероприятий</p>
            @endforelse
        </div>
        
    </section>
    <hr>
    <section>
        <form action="{{route('create.coordinator')}}" method="post" enctype="multipart/form-data">
            @csrf
                <p>Добавить координатора</p>
                <input type="text" name="surname" required  placeholder="Фамилия">
                <input type="text" name="name" required placeholder="Имя">
                <input type="text" name="patronymic" required  placeholder="Отчество">
                <textarea name="description" required id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>
                Фотография                     
                <input type="file" required name="photo">
                <input type="submit" value="Добавить">
        </form>
        <div class="events-list">
            <h4>Список координаторов</h4>
            @forelse($coords as $coord)
            <div class="coordinator">
                <p>{{$coord->surname}} {{$coord->name}} {{$coord->patronymic}} | {{$coord->created_at}}</p>
                <div class="event-control-buttons">
                    <form method="post" action="{{route('delete.coordinator',$coord->id)}}">
                        @csrf
                        <input type="submit" value="Удалить" class="event_delete">
                    </form>
     
                    <a class="event_edit" href="{{route('edit.coordinator',$coord->id)}}">Редактировать</a>
                </div>
            </div>
            @empty
            <p>Нет координаторов</p>
            @endforelse
        </div>
    </section>
</main>
<script src="js/jquery.js"></script>
<script>
function delete1(id){
    $('#expert' + id).remove();
}
let count = 0
$('#mainContent').hide();
$("#sympsec").hide();

let symposiums = new Map();
let scount = 0
function changeSections(obj,id){
    $("#idSectionSymps" + id).empty()
    symposiums.get(obj.value).forEach((el)=>{
        $("#idSectionSymps" + id).append("<option>"+el+"</option>")

    })
}
$('#addExpert').click(function(){
    count += 1
    if($('#main').is(':checked')){
        $('.experts').append('                <div class="expert-fields" id="expert'+count+'">                      <p>Эксперт №' + count +' <button onclick="delete1('+count+')">Удалить</button></p>                                          <input type="text" name="surname[]" required  placeholder="Фамилия"><input type="text" name="name[]" required placeholder="Имя">                     <input type="text" name="patronymic[]" required  placeholder="Отчество">                     <textarea name="description[]" required id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>                     Фотография                     <input type="file" required name="photo[]">                     Симпозиум                     <select id="idExpertSymps'+count+'" onchange="changeSections(this,'+count+')" class="expert-symps" name="symposiumExpert[]">                      </select>                     Секция                     <select id="idSectionSymps'+count+'" class="expert-sections" name="sectionExpert[]">                      </select>                     </div>')

        symposiums.forEach(function(value,key){
            $('#idExpertSymps' + count).append("<option>"+key+"</option>")
            
        });
      
        symposiums.get(symposiums.keys().next().value).forEach((el)=>{
            $("#idSectionSymps" + count).append("<option>"+el+"</option>")
        })
    }else{
        $('.experts').append('<div class="expert-fields" id="expert'+count+'"> <p>Эксперт №' + count +' <button onclick="delete1('+count+')">Удалить</button></p><input type="text" name="surname[]" required  placeholder="Фамилия"><input type="text" name="name[]" required placeholder="Имя"><input type="text" name="patronymic[]" required  placeholder="Отчество"><textarea name="description[]" required id="" cols="30" rows="6"  placeholder="Добавьте описание"></textarea>    Фотография <input type="file" required name="photo[]"></div>')

    }
})
function deleteSymp(id){
    $('#sympall' + id).remove();
}
function addSymp(id){
    let addedSymp = $('#symp'+id).val()
    symposiums.set(addedSymp,[])
    let abas = "'" + addedSymp + "'"
    //let idSymp = symposiums.findIndex((element)=>element==addedSymp)
    $('#show-symposiums').append('<div style="padding:10px; border:1px solid black;"><div style="background: gray; color:white; padding:5px; border-radius:5px;">'+addedSymp+'</div><div class="sections"><div id="added-sections'+id+'"></div><div style="background: aqua; width:70%; color:white; padding:5px; border-radius:5px;"><input type="text" id="sectionInput'+id+'" placeholder="Добавить секцию"><button onclick="addSection('+abas+','+id+')" type="button">Добавить</button></div></div></div>')
    $('#sympall' + id).remove();
    $('.expert-symps').append("<option>"+addedSymp+"</option>")
}
$('#addSymposium').click(function(){
    scount += 1
    $('#symposiums').append('<div id ="sympall'+scount+'"><input type="text" placeholder="Название симпозиума" id="symp'+scount+'"> <button type="button" onclick="addSymp('+scount+')"> добавить </button><button type="button" onclick="deleteSymp('+scount+')"> убрать </button></div>')
})

function addSection(key,id){
    symposiums.get(key).push($('#sectionInput'+id).val());
    $('#added-sections'+id).append("<div>"+$('#sectionInput'+id).val()+"</div>")
    var els = $('.expert-symps')
    Array.prototype.forEach.call(els,function(el){
        if(el.value == key){
            var idEl = el.id.replace(/^\D+/g, '');
            $('#idSectionSymps'+idEl).append("<option>"+$('#sectionInput'+id).val()+"</option>")
        }
    })
    $('#sectionInput'+id).val("")

}
$('#main').click(function(){
    if($('#main').is(':checked')){
        $('#mainContent').show();
        $("#sympsec").show();
    }else{
        $('#mainContent').hide();
        $("#sympsec").hide();
        
    }
})

</script>
@endsection
