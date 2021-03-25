<?php

namespace App\Http\Livewire;

use App\Models\MetodoPago;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MetodoPagoComponent extends Component
{

    use WithPagination;
    protected $paginationTheme= 'bootstrap';
    //variables de nuestro modelo
    public $clave ;
    public $name;
    public $description;
    public $status='1';


    //variables para fucnionalidades
    //variables para fucnionalidades
    public $selected_id, $search;
    public $createMode = true; //creando
    public $editRoleMode = false;

    public function render()
    {
        if($this->search!=''){
            $list_metodos = MetodoPago::where(function($query){
                $query->orwhere('name','LIKE','%'.$this->search.'%')
                ->orWhere('clave','LIKE','%'.$this->search.'%');
            })
            ->latest()
            ->paginate();
        }else{
            $list_metodos = MetodoPago::latest()->paginate();
        }
        return view('livewire.metodo-pago-component', compact('list_metodos'));
    }
    
    public function updatingSearch()
    {
        //otra opcion seria $this->resetPage();
        $this->gotoPage(1);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->clave = '';
        $this->description = '';
        $this->status = '';

        $this->selected_id = null;
        $this->createMode = true;
    }

    public function store()
    {
        abort_if(!Auth::user(), 401);
        //validar informacion
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'clave' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:1,0']
        ]);

        MetodoPago::create([
            'name' => $this->name,
            'clave' => $this->clave,
            'description' => $this->description,
            'status' => $this->status
        ]);

        $this->resetInputFields();
        $this->emit('metodopagoUpdateStore','Metodo de Pago creado correctamente.'); // Close model to using to jquery
    }

    public function edit($id)
    {
        abort_if(!Auth::user(), 401);
        $metodopago = MetodoPago::findOrFail($id);
        $this->name = $metodopago->name;
        $this->clave = $metodopago->clave;
        $this->description = $metodopago->description;
        $this->status = $metodopago->status;
        
        $this->selected_id = $metodopago->id;
        $this->createMode = false;
        $this->emit('metodopagoEdit');
    }

    public function update()
    {   
        abort_if(!Auth::user(), 401);
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'clave' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:1,0']
        ]);
      
        if ($this->selected_id) {
            $user = MetodoPago::findOrFail($this->selected_id);

            $user->update([
                'name' => $this->name,
                'clave' => $this->clave,
                'description' => $this->description,
                'status' => $this->status
            ]);

            $this->createMode = false;
            $this->emit('metodopagoUpdateStore','Metodo de Pago actualizado correctamente.');
            $this->resetInputFields();
        }
    }

    public function destroy($id)
    {
        abort_if(!Auth::user(), 401);
        $metodopago = MetodoPago::findOrFail($id);
        $metodopago->delete();
        $this->resetInputFields();
        $this->emit('metodopagoDelete');
    }

    //listeners / escuchar eventos js o php y ejecutar acciones livewire
    protected $listeners = [
        'onDeleteRow' =>'destroy',
    ];
}
