<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function thumbnail(){
        return $this->belongsTo(Thumbnail::class);
    }

    public function deleteFile(){


        if (Storage::exists('upload/submission/' . $this->folder . '/' . $this->filename)) {
            Storage::deleteDirectory('upload/submission/' . $this->folder);
            return true;
        }
        return false;



    }

}
