<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user',
        'password',
        'image_path',
        'endpoint',
        'status',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'url_imagen', 'status_html'
    ];

    public function getUrlImagenAttribute()
    {
        if($this->image_path){
            return $this->image_path;
        }else{
            return 'empresas/default.jpg';
        }
    }

    public function getStatusHtmlAttribute()
    {
        if($this->status){
            return '<span class="btn btn-sm btn-success">Activa</span>';
        }else{
            return '<span class="btn btn-sm btn-danger">Inactiva</span>';;
        }
    }
}
