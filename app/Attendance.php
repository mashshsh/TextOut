<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // id, created_at 以外の絡むを更新可能とする
    protected $fillable = [
    	'name',
    	'email',
    	'body',
    	'flagged_at',
    	'updated-at',
    ];

    public function scopeIgnoreFlagged($query) {
    	return $query->where('flagged_at', null);
    }

    public function flag(){
    	return $this->update(['flagged_at' => Carbon::now() ] );
    }

    public function getAvatarAttribute(){
    	return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5( strtolower( trim($this -> email ) ) ) );
    }
}
