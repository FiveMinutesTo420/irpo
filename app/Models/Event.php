<?php

namespace App\Models;
use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    public function organizers(){
        return $this->hasMany(Organizer::class);
    }
}
