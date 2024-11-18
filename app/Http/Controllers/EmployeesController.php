<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeSearchRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
