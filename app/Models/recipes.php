<?php

namespace App\Models;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class recipes extends Model
{

	use SoftDeletes;
    protected $dates = ['deleted_at'];
	protected $table = 'recipes';
	protected $fillable = [ 'name', 'description', 'main_ingredient', 'minor_ingredient', 'price', 'is_special', 'status', 'created_at' , 'created_by' , 'updated_at', 'updated_by', 'deleted_by'];

    public static function boot(){
        parent::boot();


        static::updating(function ($model) {


             if(Auth::user()){

                $usrID=Auth::user()->id;

             }else {

                $usrID=0;

             }

            $model->updated_by = $usrID;

          
        });
        static::deleting(function ($model) {


             if(Auth::user()){

                $usrID=Auth::user()->id;

             }else {

                $usrID=0;

             }

            $model->deleted_by = $usrID;
            $model->save();
           
        });
        static::saving(function ($model) {



             if(Auth::user()){

                $usrID=Auth::user()->id;

             }else {

                $usrID=0;

             }


            $model->created_by = $usrID;

            
          
        });


    }


}