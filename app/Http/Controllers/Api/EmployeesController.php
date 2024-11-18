<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreUpdateRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $employees = Employee::all();

      return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreUpdateRequest $request)
    {
      $employee = Employee::create($request->validated());

      return response()->json([
        'message' => __('employees.successfully_created'),
        'employee' => $employee,
      ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $employee = Employee::findOrFail($id);

      return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
