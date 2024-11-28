<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderByDesc('id')->get();
        return view('welcome', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(StoreEmployeeRequest $request)
    {
        DB::transaction(function () use ($request){

            $validated = $request->validated();

            if($request->hasFile('ktp_image')) {
                $ktp_imagePath = $request->file('ktp_image')->store('ktp_images', 'public'); 
                $validated['ktp_image'] = $ktp_imagePath;
            } else {
                $ktp_imagePath = 'images/icon-default.png'; 
            }

            $validated['ktp_image'] = $ktp_imagePath;            

            $employee = Employee::create($validated);
        });

        return redirect()->route('welcome')->with('success', 'Congrats! You successfully added new employee.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        DB::transaction(function () use ($request, $employee) {
            $validated = $request->validated();

            if ($request->hasFile('ktp_image')) {
                $ktp_imagePath = $request->file('ktp_image')->store('ktp_images', 'public'); 
                $validated['ktp_image'] = $ktp_imagePath;
            } else {
                $validated['ktp_image'] = $employee->ktp_image; 
            }

            $employee->update($validated);
        });

        return redirect()->route('welcome')->with('success', 'Congrats! You successfully edited the employee.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        DB::beginTransaction();

        try {
            $employee->delete(); 
            DB::commit(); 

            return redirect()->route('welcome')->with('success', 'Congrats! You successfully delete employee.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('welcome')->with('error', 'something error')->with('error', 'something error'); 
        }
    }
}
