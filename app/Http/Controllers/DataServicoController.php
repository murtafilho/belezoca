<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataServicoRequest;
use App\Http\Requests\UpdateDataServicoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DataServico;
use Illuminate\Http\Request;
use Flash;
use Response;

class DataServicoController extends AppBaseController
{
    /**
     * Display a listing of the DataServico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var DataServico $dataServicos */
        $dataServicos = DataServico::all();

        return view('data_servicos.index')
            ->with('dataServicos', $dataServicos);
    }

    /**
     * Show the form for creating a new DataServico.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_servicos.create');
    }

    /**
     * Store a newly created DataServico in storage.
     *
     * @param CreateDataServicoRequest $request
     *
     * @return Response
     */
    public function store(CreateDataServicoRequest $request)
    {
        $input = $request->all();

        /** @var DataServico $dataServico */
        $dataServico = DataServico::create($input);

        Flash::success('Data Servico saved successfully.');

        return redirect(route('dataServicos.index'));
    }

    /**
     * Display the specified DataServico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataServico $dataServico */
        $dataServico = DataServico::find($id);

        if (empty($dataServico)) {
            Flash::error('Data Servico not found');

            return redirect(route('dataServicos.index'));
        }

        return view('data_servicos.show')->with('dataServico', $dataServico);
    }

    /**
     * Show the form for editing the specified DataServico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DataServico $dataServico */
        $dataServico = DataServico::find($id);

        if (empty($dataServico)) {
            Flash::error('Data Servico not found');

            return redirect(route('dataServicos.index'));
        }

        return view('data_servicos.edit')->with('dataServico', $dataServico);
    }

    /**
     * Update the specified DataServico in storage.
     *
     * @param int $id
     * @param UpdateDataServicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataServicoRequest $request)
    {
        /** @var DataServico $dataServico */
        $dataServico = DataServico::find($id);

        if (empty($dataServico)) {
            Flash::error('Data Servico not found');

            return redirect(route('dataServicos.index'));
        }

        $dataServico->fill($request->all());
        $dataServico->save();

        Flash::success('Data Servico updated successfully.');

        return redirect(route('dataServicos.index'));
    }

    /**
     * Remove the specified DataServico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataServico $dataServico */
        $dataServico = DataServico::find($id);

        if (empty($dataServico)) {
            Flash::error('Data Servico not found');

            return redirect(route('dataServicos.index'));
        }

        $dataServico->delete();

        Flash::success('Data Servico deleted successfully.');

        return redirect(route('dataServicos.index'));
    }
}
