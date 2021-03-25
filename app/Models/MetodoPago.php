<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'clave',
        'description',
        'status',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
       'status_html'
    ];

    public function getStatusHtmlAttribute()
    {
        if($this->status){
            return '<span class="btn btn-sm btn-success">Activo</span>';
        }else{
            return '<span class="btn btn-sm btn-danger">Inactivo</span>';;
        }
    }
}
