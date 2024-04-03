<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Organizer;

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

        //Докончить добавление множества экспертов. 

   
        $event->title = $request->input('title');
        if($request->exists('main')){
            $event->main = 1;
        }

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img/banners'), $imageName);

        

        $event->slug = Str::slug($request->input('title'),'-');
        $event->img = $imageName;
    
        //Сохранение в базу и возвращение
        $event->save();
        foreach($request->name as $name){
            
            $expert = new Organizer();
            $expert->name = $name;
            $expert->surname = $request->surname[array_search($name,$request->name)];
            $expert->patronymic = $request->patronymic[array_search($name,$request->name)];
            $expert->description = $request->description[array_search($name,$request->name)];

            $imageName = $expert->name.'_'.$expert->surname.'_'.$expert->patronymic.'_'.time().'.'.$request->photo[array_search($name,$request->name)]->getClientOriginalExtension();
            $request->photo[array_search($name,$request->name)]->move(public_path('/img/avatars'), $imageName);
            $expert->photo = $imageName;
            $expert->type_id = 1;
            $expert->event_id = $event->id;
            $expert->save();
        }
        
        return redirect()->back()->with('message','Мероприятие успешно создано');

    }
    public function deleteEvent(Request $request){
        $data = $request->validate([
            'id' => 'required'
        ]);
        $event = Event::find($data['id']);
        $event->delete();
        return redirect()->back();
    }
    public function editEvent(Request $request){
        dd("Hello");
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}