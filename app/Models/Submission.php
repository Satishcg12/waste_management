<?php

namespace App\Models;

use App\Jobs\DeleteSubmissionFromStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        static::deleting(function($submission){
            DeleteSubmissionFromStorage::dispatch($submission);
        });
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function thumbnail(){
        return $this->belongsTo(Thumbnail::class);
    }

    public function deleteFolder(){
        Storage::deleteDirectory('upload/submission/'.$this->folder);
    }

}
