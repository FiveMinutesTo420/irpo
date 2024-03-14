<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class AdminController extends Controller
{
    public function __invoke(Request $request){
        $events = Event::all();
        return view('admin',compact('events'));
    }    
    //Функция создания мероприятия
    public function createEvent(Request $request){
        $data = $request->validate([
            'title'=>'required',
        ]);
        //Создание модели

        $event = new Event();
        $event->title = $data['title'];
        $event->img = "IMG";
    
        //Сохранение в базу и возвращение
        $event->save();
        return redirect()->back()->with('message','Мероприятие успешно создано');
    }
}
