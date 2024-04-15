@extends('layouts.layout')
@section('title',"Редактировать мероприятие")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('edit.event.store',$event->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Редактировать мероприятие</h4>
            {{$event->name}}
            <input type="text" placeholder="Введите название" value="{{$event->title}}" name="title" required>
            <span>Баннер(не обязательно)</span>
            <input type="file" id="fileupload" name="image">
            Текущее изображение: {{$event->img}}
            <img src="{{asset('img/banners/'.$event->img)}}" alt="">
            Выбранное изображение:
            <div id="dvPreview" style="width:200px; ">
            </div>
            <input type="submit" value="Редактировать">
        </form>

    </section>
</main>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
        $("#fileupload").change(function () {
            $("#dvPreview").html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            if (regex.test($(this).val().toLowerCase())) {
                if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                    $("#dvPreview").show();
                    $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                }
                else {
                    if (typeof (FileReader) != "undefined") {
                        $("#dvPreview").show();
                        $("#dvPreview").append("<img />");
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#dvPreview img").attr("src", e.target.result);
                            $("#dvPreview img").attr("width", "700");

                        }
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                }
            } else {
                alert("Please upload a valid image file.");
            }
        });
    </script>
@endsection
