<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class EmpresaComponent extends Component
{

    use WithPagination;
    protected $paginationTheme= 'bootstrap';
    //variables de nuestro modelo
    public $name ;
    public $user;
    public $password;
    public $image_path;
    public $endpoint;
    public $status;


    //variables para fucnionalidades
    //variables para fucnionalidades
    public $selected_id, $search;
    public $createMode = true; //creando
    public $editRoleMode = false;

    public function render()
    {
        if($this->search!=''){
            $list_empresas = Empresa::where(function($query){
                $query->orwhere('name','LIKE','%'.$this->search.'%')
                ->orWhere('user','LIKE','%'.$this->search.'%');
            })
            ->latest()
            ->paginate(5);
        }else{
            $list_empresas = Empresa::latest()->paginate(5);
        }
        return view('livewire.empresa-component', compact('list_empresas'));
    }
    
    public function updatingSearch()
    {
        //otra opcion seria $this->resetPage();
        $this->gotoPage(1);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->user = '';
        $this->endpoint = '';
        $this->password = '';
        $this->image_path = '';
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
            'user' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'image_path' => ['required'],
            'endpoint' => ['required', 'url', 'max:255'],
            'status' => ['required', 'string', 'in:1,0']
        ]);
        $image = $this->image_path;
        $filename = 'empresas/'.time().str_replace(' ','',$this->password).'.'.explode('/', explode(':', substr($image,0,strpos($image, ';')))[1])[1];
        Image::make($image)->save('storage/'.$filename )->resize(300, 200);
        Empresa::create([
            'name' => $this->name,
            'user' => $this->user,
            'password' => $this->password,
            'image_path' => $filename,
            'endpoint' => $this->endpoint,
            'status' => $this->status
        ]);

        $this->resetInputFields();
        $this->emit('empresaUpdateStore','Empresa creada correctamente.'); // Close model to using to jquery
    }

    public function edit($id)
    {
        abort_if(!Auth::user(), 401);
        $empresa = Empresa::findOrFail($id);
        $this->name = $empresa->name;
        $this->user = $empresa->user;
        $this->endpoint = $empresa->endpoint;
        $this->password = $empresa->password;
        $this->status = $empresa->status;
        
        $this->selected_id = $empresa->id;
        $this->createMode = false;
        $this->emit('empresaEdit');
    }

    public function update()
    {   
        abort_if(!Auth::user(), 401);
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'endpoint' => ['required', 'url', 'max:255'],
            'status' => ['required', 'string', 'in:1,0']
        ]);
      
        if ($this->selected_id) {
            $user = Empresa::findOrFail($this->selected_id);

            $user->update([
                'name' => $this->name,
                'user' => $this->user,
                'password' => $this->password,
                'endpoint' => $this->endpoint,
                'status' => $this->status
            ]);

            if($this->image_path!=''){
                $image = $this->image_path;
                $filename = 'empresas/'.time().str_replace(' ','',$this->password).'.'.explode('/', explode(':', substr($image,0,strpos($image, ';')))[1])[1];
                Image::make($image)->save('storage/'.$filename )->resize(300, 200);        
                $user->update([
                    'image_path' => $filename,
                ]);
            }

            $this->createMode = false;
            $this->emit('empresaUpdateStore','Empresa actualizada correctamente.');
            $this->resetInputFields();
        }
    }

    public function destroy($id)
    {
        abort_if(!Auth::user(), 401);
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        $this->resetInputFields();
        $this->emit('empresaDelete');
    }

    public function handleFileUpload($imageData)
    {
        $this->image_path = $imageData;
    }
    //listeners / escuchar eventos js o php y ejecutar acciones livewire
    protected $listeners = [
        'onDeleteRow' =>'destroy',
        'fileUpload' => 'handleFileUpload'
    ];
}
