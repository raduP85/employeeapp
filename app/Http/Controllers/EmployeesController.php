<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeSearchRequest;
use App\Http\Requests\EmployeeStoreUpdateRequest;

class EmployeesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(EmployeeSearchRequest $request)
  {
    $query = Employee::query();

    if ($request->has('search')) {
      $search = $request->input('search');
      $query->where(function($q) use ($search) {
          $q->where('name', 'like', "%{$search}%");
      });
    }

    // Sorting by two concurent criterias (job_title and salary)
    if($request->has('sort_by') && $request->has('sort_order')){
      $sortBy = $request->input('sort_by');
      $sortOrder = $request->input('sort_order');
      $query->orderBy($sortBy, $sortOrder);

      if($request->has('secondary_sort_by') && $request->has('secondary_sort_order')){
        $secondarySortBy = $request->input('secondary_sort_by');
        $secondarySortOrder = $request->input('secondary_sort_order');
        $query->orderBy($secondarySortBy, $secondarySortOrder);
      }
    }

    $employees = $query->paginate(10);

    // append query parameters to pagination links
    $employees->appends($request->query());

    return view('employees.index', compact('employees'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('employees.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(EmployeeStoreUpdateRequest $request)
  {
    Employee::create($request->validated());
       
    $notification = array(
      'message' => __('employees.successfully_created'),
      'type' => 'success',
    );

    return redirect()->route('employees.index')->with('notification', $notification);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $employee = Employee::findOrFail($id);

    return view('employees.show', compact('employee'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $employee = Employee::findOrFail($id);

    return view('employees.edit', compact('employee'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(EmployeeStoreUpdateRequest $request, string $id)
  {
    $employee = Employee::findOrFail($id);
    $employee->update($request->validated());

    $notification = array(
      'message' => __('employees.successfully_updated'),
      'type' => 'success',
    );

    return redirect()->route('employees.index')->with('notification', $notification);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Employee::findOrFail($id)->delete();
    
    $notification = array(
      'message' => __('employees.successfully_deleted'),
      'type' => 'success',
    );

    return redirect()->route('employees.index')->with('notification', $notification);
  }
}
