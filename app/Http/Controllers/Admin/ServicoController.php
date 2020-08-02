<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateServicoRequest;
use App\Http\Requests\Admin\UpdateServicoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Cliente;
use App\Models\Admin\Servico;
use App\Models\Admin\Status;
use App\Models\Admin\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class ServicoController extends AppBaseController
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
        
        $servicos = Servico::join('pets','pets.id','=','servicos.pet_id')
        ->join('clientes','clientes.id','=','pets.cliente_id')
        ->select('servicos.*','clientes.id as cid');

        
        if($request->has('searchdata') && !is_null($request->searchdata)){
            
           $servicos = $servicos->where('data_servico','>=',date_to_db($request->searchdata));
        }

        if($request->has('nomepet') && !is_null($request->nomepet)){
            $servicos = $servicos->where('pets.nome','like',"%$request->nomepet%");
        }    

        
        if($request->has('nomecliente') && !is_null($request->nomecliente)){
            $servicos = $servicos->where('clientes.nome','like',"%$request->nomecliente%");
        }    


        if($request->has('status_id') && !is_null($request->status_id)){
            $servicos = $servicos->where('servicos.status_id',$request->status_id);
        }  

       
        $servicos = $servicos->paginate(5);

        
        return view('admin.servicos.index')
            ->with('servicos', $servicos);
    }

    public function create($pet_id = null)
    {
        $pets = $this->customPet();
        $servicos = ['BANHO' =>'BANHO','TOSA' => 'TOSA','BANHO + TOSA' => 'BANHO + TOSA'];
        $status = $this->status->pluck('status','id');
        return view('admin.servicos.create',compact('pets','servicos','status','pet_id'));
    }
    

    public function store(CreateServicoRequest $request)
    {
        $input = $request->all();
        $input['data_servico'] = date_to_db($input['data_servico']);
        $servico = Servico::create($input);
        if($servico){
            Flash::success('Servico registrado com sucesso.');
        }
        
        return redirect(route('admin.servicos.index'));
    }

    /**
     * Display the specified Servico.
     *
     * @param int $id
     *
     * @return Response
     * 
     */
    public function show($id)
    {
        /** @var Servico $servico */
        $servico = Servico::find($id);
        

        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('admin.servicos.index'));
        }

        return view('admin.servicos.show')->with('servico', $servico);
    }

    /**
     * Show the form for editing the specified Servico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servico = Servico::find($id);

        $servico['preco'] = $servico['preco'] * 100;

        $pets = $this->customPet();

        $status = $this->status->pluck('status','id');

        $servicos = ['BANHO' =>'BANHO','BANHO + TOSA' => 'BANHO + TOSA'];

        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('admin.servicos.index'));
        }

        return view('admin.servicos.edit',compact('servicos','pets','servico','status'));
    }

    /**
     * Update the specified Servico in storage.
     *
     * @param int $id
     * @param UpdateServicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicoRequest $request)
    {
        /** @var Servico $servico */
        $servico = Servico::find($id);

        if (empty($servico)) {
            Flash::error('Servico not found');
            return redirect(route('admin.servicos.index'));
        }

        $input = $request->all();
        $input['data_servico'] = date_to_db($request->data_servico);
        $servico->fill($input);
        $servico->save();

        Flash::success('Servico atualizado com sucesso.');

        return redirect(route('admin.servicos.index'));
    }

    /**
     * Remove the specified Servico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Servico $servico */
        $servico = Servico::find($id);

        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('admin.servicos.index'));
        }

        $servico->delete();

        Flash::success('Servico deleted successfully.');

        return redirect()->back();
    }
}
