<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePetRequest;
use App\Http\Requests\Admin\UpdatePetRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Pet;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Admin\Cliente;
use Illuminate\Support\Facades\DB;

class PetController extends AppBaseController
{
    protected $clientes;

    public function __construct(Cliente $cliente)
    {
        $this->clientes = $cliente->all();
    }

    public function index(Request $request)
    {
        $pets = new Pet;
        $pets = $pets->join('clientes','pets.cliente_id','=','clientes.id')->orderBy('pets.nome')
        ->select('pets.*','clientes.nome as nome_cliente');
        
        
        if($request->has('searchpets')){
            $pets = $pets
            ->where('clientes.nome','like',"%$request->searchpets%")
            ->orWhere('pets.nome','like',"%$request->searchpets%");
        }

        if($request->has('cliente_id')){
            $pets = $pets
            ->where('pets.cliente_id','=',$request->cliente_id);
        }

        $pets = $pets->paginate(5);
        return view('admin.pets.index')
            ->with('pets', $pets);
    }

    public function create()
    {
        $clientes = $this->clientes->pluck('nome', 'id');
        return view('admin.pets.create', compact('clientes'));
    }

    public function store(CreatePetRequest $request)
    {
        $input = $request->all();
        $pet = Pet::create($input);
        $this->storeImage($pet);
        Flash::success('Pet registrado com sucesso.');
        return redirect(route('admin.pets.index'));
    }

    public function show($id)
    {
        $pet = Pet::find($id);
        if (empty($pet)) {
            Flash::error('Pet not found');
            return redirect(route('admin.pets.index'));
        }
        return view('admin.pets.show')->with('pet', $pet);
    }


    public function edit($id)
    {
        $pet = Pet::find($id);

        $clientes = $this->clientes->pluck('nome', 'id');
        if (empty($pet)) {
            Flash::error('Pet not found');
            return redirect(route('admin.pets.index'));
        }
        return view('admin.pets.edit', compact('pet', 'clientes'));
    }

    public function update($id, UpdatePetRequest $request)
    {
        $pet = Pet::find($id);

        
        if (empty($pet)) {
            Flash::error('Pet não encontrado');
            return redirect(route('admin.pets.index'));
        }
        $pet->fill($request->all());

        $pet->save();
        $this->storeImage($pet);
        Flash::success('Pet atualizado com sucesso.');

        return redirect(route('admin.pets.index'));
    }

    public function destroy($id)
    {
        $pet = Pet::find($id);

        if (empty($pet)) {
            Flash::error('Pet not found');
            return redirect(route('admin.pets.index'));
        }

        $pet->delete();

        Flash::success('Pet deleted successfully.');

        return redirect(route('admin.pets.index'));
    }

    private function validadeRequest()
    {
        return tap(
            request()->validate(
                [
                    'cliente_id' => '|integer',
                    'nome' => 'required|min:3',
                    'raca' => 'required',
                    'sexo' => 'required',
                    'castrado' => 'required',
                    'porte' => 'required',
                ]
            ),
            function () {
                if (request()->hasFile('img')) {
                    request()->validate([
                        'image' => 'file|image|max:5000'
                    ]);
                }
            }
        );
    }

    private function storeImage($pet)
    {
        if (request()->has('img')) {
            $pet->update(
                ['img' => request()->img->store('pets')]
            );
        }
    }

    public function pets_sugest(Request $request){
        
        $pets = DB::table('pets')
        ->select(DB::raw("pets.id as id, concat(pets.nome,' - de: ',clientes.nome) as text"))
        ->join('clientes','clientes.id', '=', 'pets.cliente_id')
        ->where('pets.nome','like',"%$search%")
        ->orderBy('pets.nome','asc')
        ->orderBy('clientes.nome','asc')->get();
        echo $pets->toJson();
        exit;
    }


    public function imagem($id,$size){
        $pet = Pet::find($id);
        return view('admin.pets.imagem',compact('id','size','pet'));
    }

}
