<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Campus;
use App\StudentInscription;
use App\Student;
use App\Http\Controllers\Controller;
use App\PaymentForm;
use App\Variable;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class BankController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bank = Bank::all();

        return view('backEnd.admin.bank.index', compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $payments_forms = PaymentForm::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        return view('backEnd.admin.bank.create')
            ->with('payments_forms', $payments_forms)
            ->with('campuses', $campuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'company_number' => 'required|max:40', 'payment_form_id' => 'required', 'base_year' => 'required', 'campus_id' => 'required']);
        $payments_form = PaymentForm::find($request->input('payment_form_id'));
        $input = $request->all();
        $input['payment_form'] = $payments_form->name;

        Bank::create($input);

        Session::flash('message', 'Banco agregado.');
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
        $bank = Bank::findOrFail($id);
        $variable = $bank->variable;

        return view('backEnd.admin.bank.show', compact('bank', 'variable'));
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
        $payments_forms = PaymentForm::pluck('name', 'id');
        $campuses = Campus::pluck('name', 'id');
        $bank = Bank::findOrFail($id);

        return view('backEnd.admin.bank.edit', compact('bank', 'payments_forms', 'campuses'));
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
        $this->validate($request, ['name' => 'required', 'company_number' => 'required', 'payment_form_id' => 'required', 'base_year' => 'required', 'campus_id' => 'required']);

        $bank = Bank::findOrFail($id);
        $bank->update($request->all());

        Session::flash('message', 'Banco actualizado.');
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
        $bank = Bank::findOrFail($id);

        $bank->delete();

        Session::flash('message', 'Banco eliminado.');
        Session::flash('status', 'success');

        return redirect('admin/bank');
    }

    public function testCadenas()
    {
        $cadena = "juan carlos";
        echo password_generator();
    }

    public function addVar($id)
    {
        $bank = Bank::findOrFail($id);
        return view('backEnd.admin.variable.create')
            ->with('bank', $bank);
    }

    public function layout()
    {
        $banks = Bank::pluck('name', 'id');
        return view('backEnd.layoutBank.layout', compact('banks'));
    }

    public function processLayout(Request $request)
    {   
        $this->validate($request, ['layout' => 'required', 'name_bank' => 'required', 'bank' => 'required']);

        try {
            $bank = Bank::find($request->input('bank'));
            $vars = $bank->variable;
            $name_bank = $request->input('name_bank');

            $replace = str_replace(' ', '', $bank->name);
            $name = $replace . '_' . date("Y.m.d");
            $file = $request->file('layout');
            $destinationPath = storage_path('app/public/layouts');
            $file->move($destinationPath, $name . '_' . $file->getClientOriginalName());

            //process txt file
            $file_path = storage_path('app/public/layouts/' . $name . '_' . $file->getClientOriginalName());
            $lines = (file($file_path));
            echo "**********************";
            echo "<br>";
            echo "**********************";
            echo "<br>";

            if ($name_bank = 2) {
                foreach ($lines as $key => $line) {
                    if (substr($line, 0, 2) === '20') {
                        $date = substr($line, $vars->date_start, $vars->date_length);
                        $year = substr($date, 0, 4);
                        $month = substr($date, 4, 2);
                        $day = substr($date, 6, 2);
                        $date_complete = $year . '-' . $month . '-' . $day;

                        echo "# de Banco: " . substr($line, $vars->bank_start, $vars->bank_length);
                        echo "<br/>";
                        echo "Monto: " . substr($line, $vars->amount_start, $vars->amount_length);
                        echo "<br/>";
                        echo "Fecha: " . $date_complete;
                        echo "<br/>";
                        echo "Número de pago: " . substr($line, $vars->payment_start, $vars->payment_length);
                        echo "<br>";
                        echo "Ciclo: " . substr($line, $vars->cycle_start, $vars->cycle_length);
                        echo "<br>";
                        echo "**********************";
                        echo "<br>";
                        echo "**********************";
                        echo "<br>";
                    }
                }
            }
            if ($name_bank = 1) {
                foreach ($lines as $key => $line) {
                    $date = substr($line, $vars->date_start, $vars->date_length);
                    $year = substr($date, 4, 4);
                    $month = substr($date, 2, 2);
                    $day = substr($date, 0, 2);
                    $knownDate = Carbon::create($year, $month, $day);
                    $date_complete = $knownDate->toDateString();
                    $number = substr($line, $vars->bank_start, $vars->bank_length);

                    //$student_inscription = StudentInscription::where('bank_number', $number)->first();
                    $student_inscription = DB::table('student_inscription')->where([
                        ['bank_number', '=', $number],
                        ])->first();
                    
                    $student = Student::find($student_inscription->student_id);

                    echo "# de Banco: " . substr($line, $vars->bank_start, $vars->bank_length);
                    echo "<br/>";
                    echo "Monto: " . substr($line, $vars->amount_start, $vars->amount_length);
                    echo "<br/>";
                    echo "Fecha: " . $date_complete;
                    echo "<br/>";
                    echo "Número de pago: " . substr($line, $vars->payment_start, $vars->payment_length);
                    echo "<br>";
                    echo "Ciclo: " . substr($line, $vars->cycle_start, $vars->cycle_length);
                    echo "<br>";
                    echo "**********************";
                    echo "<br>";
                    echo "**********************";
                    echo "<br>";
                    echo "Alumno: "."<b>". $student->name.' '.$student->last_name.' '.$student->second_lastname."</b>";
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
