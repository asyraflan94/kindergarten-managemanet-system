<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{
    use Tadika;

    public function create()
    {
        return view('clerk.new_student');
    }

    public function index()
    {
        $data = array(
            'menu' => 'student'
        );
        return view('student.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Student::select(\DB::raw('id, full_name, classroom, package, created_at'));

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                               <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                               <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit" href="{!! \URL::to(\'edit/student/\'.$id) !!}"><i class="fa fa-pencil"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Stock" href="{!! \URL::to(\'deliver_stock/\'.$id) !!}"><i class="fa fa-shopping-cart"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'show/student/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $pelajar = Models\Student::find($id);
        $data = array(
            'pelajar' => $pelajar
        );

        return view('clerk.show_student_details', $data);
    }

    public function store()
    {
        $pelajar                = new Models\Student();
        $pelajar->full_name     = \Input::get('full_name');
        $pelajar->classroom     = \Input::get('classroom');
        $pelajar->package       = \Input::get('package');
        $pelajar->dob           = \Input::get('dob');
        $pelajar->birthplace    = \Input::get('birthplace');
        $pelajar->mykid         = \Input::get('mykid');
        $pelajar->race          = \Input::get('race');
        $pelajar->gender        = \Input::get('gender');
        $pelajar->religion      = \Input::get('religion');
        $pelajar->nationality   = \Input::get('nationality');

        if ($pelajar->save()) {
            return \Redirect::to('pelajar')->with('success', 'Anda berjaya menyimpan rekod tersebut');
        }
        else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function edit($id)
    {
        $pelajar = Models\Student::find($id);
        $data = array('pelajar' => $pelajar);
        return view('clerk.new_student', $data);
    }

    public function update($id)
    {
        $pelajar                = Models\Student::find($id);
        $pelajar->full_name     = \Input::get('full_name');
        $pelajar->classroom     = \Input::get('classroom');
        $pelajar->mykid         = \Input::get('mykid');
        $pelajar->dob           = \Input::get('dob');
        $pelajar->birthplace   	= \Input::get('birthplace');
        $pelajar->package       = \Input::get('package');
        $pelajar->gender        = \Input::get('gender');
        $pelajar->race        	= \Input::get('race');
        $pelajar->religion      = \Input::get('religion');
        $pelajar->nationality   = \Input::get('nationality');

        if ($pelajar->save()) {
            return \Redirect::to('pelajar/'.$id)->with('success', 'Anda berjaya menyimpan rekod tersebut');
        }
        else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function destroy($id)
    {
        Models\Student::find($id)->forceDelete();

        return \Response::json('success');

    }
}



