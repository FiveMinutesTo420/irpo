@extends('layouts.layout')
@section('title',"Редактировать координатора")

@section('head')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<main>
    <section>
        <form action="{{route('edit.coordinator.store',$coord->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <p>Редактировать координатора</p>
                
            <input type="text" name="name" value="{{$coord->name}}" required placeholder="Имя">
            <input type="text" name="surname" value="{{$coord->surname}}" required  placeholder="Фамилия">
            <input type="text" name="patronymic" value="{{$coord->patronymic}}" required  placeholder="Отчество">
            <textarea name="description" required id="" cols="30" rows="6"  placeholder="Добавьте описание">{{$coord->description}}</textarea>
            Фотография                     
            <input type="file" id="fileupload" name="photo">
            Текущее изображение: {{$coord->photo}}
            <img src="{{asset('img/avatars/'.$coord->photo)}}" width="100" alt="">
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
                            $("#dvPreview img").attr("width", "100");

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
