<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class TrashedCourseControler extends Controller
{
    public function index()
    {
        return view('course.trashed.index', [
            'courses' => Course::onlyTrashed(),
        ]);
    }

    public function recover(string $id)
    {
        if (Course::withTrashed()->find($id)->restore()) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function delete(string $id)
    {
        if (Course::withTrashed()->find($id)->forceDelete()) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
