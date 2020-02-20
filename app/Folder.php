<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Folder extends Model
{
    protected $fillable = ['name'];

    public function __construct(array $attributes = array())
    {
        if(Auth::user()){
            $this->user = Auth::id();
        }
        parent::__construct($attributes);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope());
    }

    public function user(){
        return $this->hasOne('App\user', 'user');
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'folder');
    }

    public function folders(){
        return $this->hasMany(Folder::class, 'folder');
    }

    public function parent(){
        return $this->belongsTo(Folder::class, 'folder');
    }
}
