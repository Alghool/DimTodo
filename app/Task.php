<?php

namespace App;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use SoftDeletes;

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


    public function folder(){
        return $this->belongsTo(Folder::class, 'folder');
    }

}
