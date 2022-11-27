<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    public function ticket_user(){
        return $this->belongsTo(User::class,'id_creator','id');
    }
    public function ticket_support_type(){
        return $this->belongsTo(SupportType::class,'id_type','id');
    }

    public function tickets_description(){
        return $this->hasMany(TicketDescription::class,'ticket_id','id');
    }
}
