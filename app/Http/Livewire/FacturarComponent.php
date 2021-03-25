<?php

namespace App\Http\Livewire;

use App\Models\Empresa;
use App\Models\MetodoPago;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FacturarComponent extends Component
{
    public $clave;
    public $permitir;
    public $mensaje;
    
    public $referencia;
    public $metodo;
    public $monto;
    public $rfc;
    public $email;

    public function mount($clave)
    {
        $this->clave = $clave;
    }

    public function render()
    {
        $empresa = Empresa::select('image_path')->where('password',$this->clave)->first();
        $metodos = MetodoPago::where('status','1')->get();
        return view('livewire.facturar-component', compact('empresa','metodos'));
    }

    public function resetInputFields()
    {
        $this->referencia = '';
        $this->metodo = '';
        $this->monto = '';
        $this->rfc = '';
        $this->email = '';
    }

    public function enviar()
    {
        $empresa = Empresa::select('endpoint', 'user', 'status')->where('password',$this->clave)->first();
        
        if(!isset($empresa->status)){
            $this->emit('empresaInactiva','Lo sentimo, esta empresa no se encuentra registrada en el sistema');
        }else if(!$empresa->status){
            $this->emit('empresaInactiva','Lo sentimo, en estos momentos no podemos facturar para esta empresa');
        }else{

            $this->validate([
                'referencia' => ['required', 'string', 'max:25'],
                'rfc' => ['required', 'string', 'min:11','max:25'],
                'metodo' => ['required', 'string', 'max:255'],
                'monto' => ['required', 'numeric'],
                'email' => ['required', 'email']
            ]);

            if(true){
                $data = array(
                    'ticket' => [
                        'referencia'=> $this->referencia,
                        'rfc'=> $this->rfc,
                        'formaPago'=> $this->metodo,
                        'monto'=> $this->monto,
                        'email'=> $this->email,
                    ]
                );
               
                $a = Http::withHeaders([
                    'user' => $empresa->user,
                    'pass' => $this->clave
                ])->post($empresa->endpoint,$data)->json();
                if (isset($a['Response'])) {
                    if($a['Response']['ok']=='1'){
                       $this-> resetInputFields();
                    }
                    $this->emit('facturacion',$a['Response']);
                }
            }
        }
        
    }

    public function validarReferencia(){
        $format = explode('-', $this->referencia);

        if(strlen($format[0])==7 && strlen($format[1])==4 && strlen($format[2])==7 && strlen($format[3])==2){ //0000000-0000-0000000-00
            $this->emit('validarReferencia','Formato correcto');
            $formato = true;
        }else{
            $this->emit('validarReferencia','No cumple con el patron requerido');
            $formato = false;
        }
        return  $formato;
    }

    public function updatedReferencia()
    {
        $this->validarReferencia();
    }
}
