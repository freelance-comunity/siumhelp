<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Variable;
use App\Bank;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class VariableController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $variable = Variable::all();

        return view('backEnd.admin.variable.index', compact('variable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.variable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['bank_start' => 'required', 'bank_length' => 'required', 'date_start' => 'required', 'date_length' => 'required', 'amount_start' => 'required', 'amount_length' => 'required', ]);

        
        Variable::create($request->all());

        Session::flash('message', 'Variables añadidas.');
        Session::flash('status', 'success');

        return redirect('admin/bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $variable = Variable::findOrFail($id);

        return view('backEnd.admin.variable.show', compact('variable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $variable = Variable::findOrFail($id);

        return view('backEnd.admin.variable.edit', compact('variable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['bank_start' => 'required', 'bank_length' => 'required', 'date_start' => 'required', 'bank_length' => 'required', 'amount_start' => 'required', 'amount_length' => 'required', 'payment_start' => 'required', 'payment_length' => 'required', 'cycle_start' => 'required', 'cycle_length' => 'required']);

        $variable = Variable::findOrFail($id);
        $variable->update($request->all());

        Session::flash('message', 'Variables actualizadas.');
        Session::flash('status', 'success');

        return redirect('admin/bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $variable = Variable::findOrFail($id);

        $variable->delete();

        Session::flash('message', 'Variable deleted!');
        Session::flash('status', 'success');

        return redirect('admin/variable');
    }

}
