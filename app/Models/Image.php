<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    
    protected $table = 'image';
    protected $fillable = ['name', 'idreview'];
    
    public function review() {
        return $this->belongsTo('App\Models\Review', 'idreview');
    }
    
    public function saveInStorage($photo, $idreview) {
        $date = Carbon::parse(Carbon::now()->format('YmdHis'));
        $name = $date . $photo->getClientOriginalName();
        $photo->storeAs('/images', $name);
        $this->saveInDB($photo, $idreview, $name);
    }
    
    public function saveInDB($photo, $idreview, $name) {
        $this->name = $name;
        $this->idreview = $idreview;
        $this->save();
    }
    
    public function deleteImage($list) {
        $deleteList = explode(",", $list[0]);
        if(in_array($this->id, $deleteList)) {
            $this->deleteFromStorage();
            $this->deleteFromDB();
        }
    }
    
    public function deleteFromDB() {
        try {
            $this->delete();
        } catch(\Exception $e) {
            return back()->withErrors(
                ['default' => 'Error when deleting']);
        }
    }
    
    public function deleteFromStorage() {
        Storage::disk('local')->delete('images/' . $this->name);
    }
}
