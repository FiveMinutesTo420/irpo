<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Event;
class AdminController extends Controller
{
    public function __invoke(Request $request){
        $events = Event::orderBy('id','DESC')->get();
        return view('admin',compact('events'));
    }    
    //Функция создания мероприятия
    public function createEvent(Request $request){
        //Создание мероприятия
        $event = new Event();
        $event->title = $request->input('title');
        if($request->exists('main')){
            $event->main = 1;
        }
        $event->slug = Str::slug($request->input('title'),'-');
        $event->img = "IMG";
    
        //Сохранение в базу и возвращение
        $event->save();
        return redirect()->back()->with('message','Мероприятие успешно создано');
    }
}
