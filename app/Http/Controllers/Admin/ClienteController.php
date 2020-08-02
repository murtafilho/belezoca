<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateClienteRequest;
use App\Http\Requests\Admin\UpdateClienteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Cliente;
use Illuminate\Http\Request;
use Flash;
use Response;

class ClienteController extends AppBaseController
{
    /**
     * Display a listing of the Cliente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
    
        $clientes = new Cliente;
      
        if($request->has('searchcliente')){
            $clientes = $clientes->where('nome','like',"%$request->searchcliente%");
            
        }

        $clientes = $clientes->paginate(10);
        return view('admin.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();

        /** @var Cliente $cliente */
        $cliente = Cliente::create($input);

        Flash::success('Cliente saved successfully.');

        return redirect(route('admin.clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('admin.clientes.index'));
        }

        return view('admin.clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('admin.clientes.index'));
        }

        return view('admin.clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param int $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('admin.clientes.index'));
        }

        $cliente->fill($request->all());
        $cliente->save();

        Flash::success('Cliente updated successfully.');

        return redirect(route('admin.clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('admin.clientes.index'));
        }

        $cliente->delete();

        Flash::success('Cliente deleted successfully.');

        return redirect(route('admin.clientes.index'));
    }


}
