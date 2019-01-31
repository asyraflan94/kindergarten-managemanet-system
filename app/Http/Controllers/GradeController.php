<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class GradeController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'show_grade'
        );

        return view('teacher.show_grade', $data);
    }

    public function create()
    {
        return view('teacher.show_grade');
    }

    public function GradeDataTable($id)
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */

        $site = Models\Grade::select(\DB::raw('id, subject_name, id_subject, grade, mark, review'))->where('id_student', $id);

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                               <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Kemaskini"><i class="fa fa-pencil fa-align-center"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'show_grade',
            'show_grade' => Models\Grade::find($id)
        );

        return view('teacher.show_grade', $data);
    }

    public function edit($id)
    {
        $grade = Models\Grade::find($id);

        return \Response::json($grade);

    }

    public function store()
    {
        $grade                  = new Models\Grade();
        $grade->subject_name    = \Input::get('subject_name');
        $grade->id_subject      = \Input::get('id_subject');
        $grade->mark            = \Input::get('mark');
        $grade->grade           = \Input::get('grade');
        $grade->review          = \Input::get('review');
        $grade->id_student      = \Input::get('id_student');
        $grade->save();

        return \Response::json('success');

    }

    public function update($id)
    {
        $grade                  = Models\Grade::find($id);
        $grade->subject_name    = \Input::get('subject_name');
        $grade->id_subject      = \Input::get('id_subject');
        $grade->mark            = \Input::get('mark');
        $grade->grade           = \Input::get('grade');
        $grade->review          = \Input::get('review');
        $grade->id_student      = \Input::get('id_student');
        $grade->save();

        return \Response::json('success');


    }


}
