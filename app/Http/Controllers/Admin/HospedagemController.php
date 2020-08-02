<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateHospedagemRequest;
use App\Http\Requests\Admin\UpdateHospedagemRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Hospedagem;
use App\Models\Admin\Status;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class HospedagemController extends AppBaseController
{
    protected $status;
    public function __construct(Status $status){
        $this->status = Status::all();
    }

    public function customPet(){
        $pets = DB::table('pets')
        ->select(DB::raw("pets.id, concat(pets.nome,' - de: ',clientes.nome) as valor"))
        ->join('clientes','clientes.id', '=', 'pets.cliente_id')
        ->orderBy('pets.nome','asc')
        ->orderBy('clientes.nome','asc')
        ->pluck('valor','id');
        return $pets;
    }

    public function index(Request $request)
    {
        /** @var Hospedagem $hospedagens */
        $hospedagens = Hospedagem::orderBy('data_entrada','asc')->join('pets','hospedagens.pet_id','=','pets.id')
        ->join('clientes','pets.cliente_id','=','clientes.id')
        ->select('hospedagens.*','clientes.nome as nome_cliente','pets.nome as nome_pet')->atuais();
      

        if($request->has('searchentrada')  && !is_null($request->searchentrada)){
            $hospedagens = $hospedagens->where('data_entrada','>=',date_to_db($request->searchentrada));
        }
        
        if($request->has('searchsaida')  && !is_null($request->searchsaida)){
            $hospedagens = $hospedagens->where('data_saida','<=',date_to_db($request->searchsaida));
        }
  
        if($request->has('nomepet')  && !is_null($request->nomepet)){
            $hospedagens = $hospedagens->where('pets.nome','like',"%$request->nomepet%");
        }
        
        if($request->has('nomecliente')  && !is_null($request->nomecliente)){
            $hospedagens = $hospedagens->where('clientes.nome','like',"%$request->nomecliente%");
        }

        if($request->has('status_id') && !is_null($request->status_id)){
            $hospedagens = $hospedagens->where('hospedagens.status_id',$request->status_id);
        }

        if($request->has('atuais') && $request->atuais == 0){
        
        }

        $hospedagens = $hospedagens->orderBy('horario','asc')->paginate(10);
       

        return view('admin.hospedagens.index')
            ->with('hospedagens', $hospedagens);
    }


    public function create($pet_id = null)
    {
        $pets = $this->customPet();

        $hospedagens = ['HOSPEDAGEM' =>'HOSPEDAGEM'];

        $status = $this->status->pluck('status','id');
        
        return view('admin.hospedagens.create',compact('pets','hospedagens','status','pet_id'));
    }
    

    public function store(CreateHospedagemRequest $request)
    {
        $input = $request->all();
        $input['data_entrada'] = date_to_db($request->data_entrada);
        $input['data_saida'] = date_to_db($request->data_saida); 
        $hospedagem = Hospedagem::create($input);
        Flash::success('Hospedagem cadastrada com sucesso.');
        return redirect(route('admin.hospedagens.index'));
    }


    public function show($id)
    {

        $hospedagem = Hospedagem::find($id);

        if (empty($hospedagem)) {
            Flash::error('Hospedagem not found');

            return redirect(route('admin.hospedagens.index'));
        }

        return view('admin.hospedagens.show')->with('hospedagem', $hospedagem);
    }

    public function edit($id)
    {
        $hospedagem = Hospedagem::find($id);
        $hospedagem->preco_dia = $hospedagem->preco_dia*100;
        $pets = $this->customPet();
        $status = $this->status->pluck('status','id');


        $hospedagens = ['HOSPEDAGEM' => 'HOSPEDAGEM'];

        if (empty($hospedagem)) {
            Flash::error('Hospedagem not found');

            return redirect(route('admin.hospedagens.index'));
        }

        return view('admin.hospedagens.edit',compact('hospedagens','pets','hospedagem','status'));
    }

    public function update($id, UpdateHospedagemRequest $request)
    {
        /** @var Hospedagem $hospedagem */
        $hospedagem = Hospedagem::find($id);
        $input = $request->all();
        $input['data_entrada'] = date_to_db($input['data_entrada']);
        $input['data_saida'] = date_to_db($input['data_saida']);
        if (empty($hospedagem)) {
            Flash::error('Hospedagem not found');

            return redirect(route('admin.hospedagens.index'));
        }

        $hospedagem->fill($input);
        $hospedagem->save();

        Flash::success('Hospedagem atualizada com sucesso.');

        return redirect(route('admin.hospedagens.index'));
    }

    public function destroy($id)
    {
        $hospedagem = Hospedagem::find($id);

        if (empty($hospedagem)) {
            Flash::error('Hospedagem not found');

            return redirect(route('admin.hospedagens.index'));
        }

        $hospedagem->delete();

        Flash::success('Hospedagem deleted successfully.');

        return redirect(route('admin.hospedagens.index'));
    }
}
