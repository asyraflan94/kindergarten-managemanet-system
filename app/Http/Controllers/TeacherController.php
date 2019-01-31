<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Jenssegers\Agent\Agent;
use Ramsey\Uuid\Uuid;
use Yajra\Datatables\Datatables;

/**
 * PenggunaController Class
 *
 * Implements actions regarding user management
 */
class TeacherController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'student_list'
        );

        return view('teacher.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Teacher::select(\DB::raw('id, full_name, gender, classroom'));

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />                    
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Akademik" href="{!! \URL::to(\'student_list/\'.$id.\') !!}"><i class="fa fa-graduation-cap fa-align-center"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Butiran" href="{!! \URL::to(\'student_list/\'.$id) !!}"><i class="fa fa-eye fa-align-center"></i></a>')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'student_list',
            'student_list' => Models\Teacher::find($id)
        );

        return view('teacher.show_details', $data);
    }

    public function store()
    {
        $teacher                = new Models\Teacher();
        $teacher->full_name     = \Input::get('full_name');
        $teacher->mykid         = \Input::get('mykid');
        $teacher->gender        = \Input::get('gender');
        $teacher->dob           = \Input::get('dob');
        $teacher->id            = \Input::get('id');
        $teacher->id_parents    = \Input::get('id_parents');
        $teacher->classroom     = \Input::get('classroom');
        $teacher->reg_date      = \Input::get('reg_date');
        $teacher->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $teacher = Models\Teacher::find($id);
        $data = array('teacher' => $teacher);

        $grade = Models\Grade::find($id);
        $data2 = array('show_grade' => $grade);

        return view('teacher.show_grade', $data, $data2);

    }

    public function update($id)
    {
        $teacher                = Models\Teacher::find($id);
        $teacher->full_name     = \Input::get('full_name');
        $teacher->mykid         = \Input::get('mykid');
        $teacher->gender        = \Input::get('gender');
        $teacher->dob           = \Input::get('dob');
        $teacher->id            = \Input::get('id');
        $teacher->id_parents    = \Input::get('id_parents');
        $teacher->classroom     = \Input::get('classroom');
        $teacher->reg_date      = \Input::get('reg_date');
        
        $teacher->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Teacher::find($id)->forceDelete();

        return \Response::json('success');

    }
}
