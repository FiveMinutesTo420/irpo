<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Section;
use App\Models\Symposium;

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
        }else{
            $event->main = 0;
        }

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img/banners'), $imageName);

        

        $event->slug = Str::slug($request->input('title'),'-');
        $event->img = $imageName;
    
        //Сохранение в базу и возвращение
        $event->save();
        if($event->main == 0){
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
        }else{
            foreach($request->name as $name){
                $expert = new Organizer();

                $findSymp = Symposium::where("name","=",$request->symposiumExpert[array_search($name,$request->name)])->first();
                if($findSymp == null){
                    $symposium = new Symposium();
                    $symposium->name = $request->symposiumExpert[array_search($name,$request->name)];
                    $symposium->event_id = $event->id;
                    $symposium->save();

                    $section = new Section();
                    $section->name = $request->sectionExpert[array_search($name,$request->name)];
                    $section->symposium_id = $symposium->id;
                    $section->save();
                    
                    $expert->symposium_id = $symposium->id;
                    $expert->section_id = $section->id;

                }else{
                    $expert->symposium_id = $findSymp->id;
                    $findSection = Section::where("symposium_id",'=',$findSymp->id)->where("name","=",$request->sectionExpert[array_search($name,$request->name)])->first();
                    if($findSection == null){
                        $section = new Section();
                        $section->name = $request->sectionExpert[array_search($name,$request->name)];
                        $section->symposium_id = $findSymp->id;
                        $section->save();
                        $expert->section_id = $section->id;

                    }else{
                    $expert->section_id = $findSection->id;

                    }

                }

            
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
    public function editEvent(Request $request, Event $event){
        return view('edit',compact('event'));
    }
    public function storeEditEvent(Request $request, Event $event){
        if($request->image != null){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/img/banners'), $imageName);
    
            
    
            $event->img = $imageName;
        
     
        }
        $event->title = $request->title;
        $event->slug = Str::slug($request->input('title'),'-');

        $event->save();
        return redirect()->route('event',$event->slug);
        
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}