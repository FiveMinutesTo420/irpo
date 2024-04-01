<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img/banners'), $imageName);

        

        $event->slug = Str::slug($request->input('title'),'-');
        $event->img = $imageName;
    
        //Сохранение в базу и возвращение
        $event->save();
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
