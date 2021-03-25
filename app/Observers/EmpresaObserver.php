<?php

namespace App\Observers;

use App\Models\Empresa;
use Illuminate\Support\Facades\Storage;

class EmpresaObserver
{
    public function deleting(Empresa $empresa)
    {
        if($empresa->image_path){
            Storage::delete($empresa->image_path);
        }
    }
}
