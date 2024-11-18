<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\EmployeeStoreUpdateRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $employees = Employee::paginate(10);

      return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreUpdateRequest $request)
    {
      try{
          $employee = Employee::create($request->validated());
    
          return response()->json([
            'message' => 'Employee successfully created.',
            'employee' => $employee,
          ], 201);

      } catch(ValidationException $e){
          
          return response()->json([
            'errors' => $e->errors(),
          ], 422);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      try{
        $employee = Employee::findOrFail($id);
        
        return response()->json([
          'message' => 'Employee found.',
          'employee' => $employee,
        ], 200);
      }catch(ModelNotFoundException $e){
        
        return response()->json([
          'error' => 'Employee not found',
        ], 404);
      }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeStoreUpdateRequest $request, string $id)
    {
      try{
          $employee = Employee::findOrFail($id);
          $employee->update($request->validated());

          return response()->json([
            'message' => 'Employee successfully updated.',
            'employee' => $employee,
          ], 200);

      } catch(ValidationException $e){
          
          return response()->json([
            'errors' => $e->errors(),
          ], 422);
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      try{
          Employee::findOrFail($id)->delete();
    
          return response()->json([
            'message' => 'Employee successfully deleted.',
          ], 200);

      } catch(ValidationException $e){
          
          return response()->json([
            'errors' => $e->errors(),
          ], 422);
      }
    }
}
