<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;

class InicioComponent extends Component
{

    use WithPagination;
    protected $paginationTheme= 'bootstrap';
    //variables de nuestro modelo

    public function render()
    {
        $listado_empresas = Empresa::select('id','name','image_path', 'password')->where('status','1')
            ->orderBy('name','asc')
            ->get();
        return view('livewire.inicio-component', compact('listado_empresas'));
    }
}
