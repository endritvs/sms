<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Application\Actions\CreateStudentAction;
use App\Application\Actions\FetchStudentsAction;
use App\Application\Actions\FetchSingleStudentAction;
use App\Application\Actions\UpdateStudentAction;
use App\Application\Actions\DeleteStudentAction;

class StudentController extends Controller
{
    public function index(FetchStudentsAction $action)
    {
        $students = $action->execute();
        return Inertia::render('Students/Index', ['students' => $students]);
    }

    public function show($id, FetchSingleStudentAction $action)
    {
        $student = $action->execute($id);
        return Inertia::render('Students/Show', ['student' => $student]);
    }

    public function store(StoreStudentRequest $request, CreateStudentAction $action)
    {
        $validated = $request->validated();
        $action->execute($validated);
        return to_route('students.index');
    }

    public function update(UpdateStudentRequest $request, $id, UpdateStudentAction $action)
    {
        $validated = $request->validated();
        $action->execute($id, $validated);
        return to_route('students.index');
    }

    public function destroy($id, DeleteStudentAction $action)
    {
        $action->execute($id);
        return to_route('students.index');
    }
}

