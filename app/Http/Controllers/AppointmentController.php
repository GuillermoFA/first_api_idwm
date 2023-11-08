<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments=Appointment::get();
        return response()->json($appointments,200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //POST
    {
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'required',
                'date'=>'nullable',
                'symptoms'=>'nullable',
                'user_id'=>'required'
            ]);

            $appointment=Appointment::create([
                'name'=>$fields['name'],
                'date'=>$fields['date'],
                'symptoms'=>$fields['symptoms'],
                'user_id'=>$fields['user_id']
            ]);
            DB::commit();
            return response()->json($appointment,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment) // SHOW
    {
        //
        try {
            return response()->json($appointment,200);
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        try{
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'date' => 'nullable',
                'symptoms' => 'nullable',
                'user_id' => 'required',
            ]);
            $appointment->update($request->only(['name','user_id']));
            DB::commit();
            return response()->json($appointment,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        try{
            DB::beginTransaction();
            $appointment->delete();
            DB::commit();
            return response()->json('Deleted success',200);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
