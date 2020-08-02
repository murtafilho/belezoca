<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateData1Request;
use App\Http\Requests\UpdateData1Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Data1;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class Data1Controller extends AppBaseController
{
    /**
     * Display a listing of the Data1.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Data1 $data1s */
        $data1s = Data1::all();

        return view('data1s.index')
            ->with('data1s', $data1s);
    }

    /**
     * Show the form for creating a new Data1.
     *
     * @return Response
     */
    public function create()
    {
        return view('data1s.create');
    }

    /**
     * Store a newly created Data1 in storage.
     *
     * @param CreateData1Request $request
     *
     * @return Response
     */
    public function store(CreateData1Request $request)
    {
        $input = $request->all();
        
        $input['data1'] = date_to_db($input['data1']);

        /** @var Data1 $data1 */
        $data1 = Data1::create($input);

        Flash::success('Data1 saved successfully.');

        return redirect(route('data1s.index'));
    }

    /**
     * Display the specified Data1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Data1 $data1 */
        $data1 = Data1::find($id);

        if (empty($data1)) {
            Flash::error('Data1 not found');

            return redirect(route('data1s.index'));
        }

        return view('data1s.show')->with('data1', $data1);
    }

    /**
     * Show the form for editing the specified Data1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Data1 $data1 */
        $data1 = Data1::find($id);

        if (empty($data1)) {
            Flash::error('Data1 not found');

            return redirect(route('data1s.index'));
        }

        return view('data1s.edit')->with('data1', $data1);
    }

    /**
     * Update the specified Data1 in storage.
     *
     * @param int $id
     * @param UpdateData1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateData1Request $request)
    {
        /** @var Data1 $data1 */
        $data1 = Data1::find($id);
        if (empty($data1)) {
            Flash::error('Data1 not found');

            return redirect(route('data1s.index'));
        }
    
        $input = $request->all();
        
        $input['data1'] = date_to_db($request->data1);
        
        $data1->fill($input);
        $data1->save();

        Flash::success('Data1 updated successfully.');

        return redirect(route('data1s.index'));
    }

    /**
     * Remove the specified Data1 from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Data1 $data1 */
        $data1 = Data1::find($id);

        if (empty($data1)) {
            Flash::error('Data1 not found');

            return redirect(route('data1s.index'));
        }

        $data1->delete();

        Flash::success('Data1 deleted successfully.');

        return redirect(route('data1s.index'));
    }
}
