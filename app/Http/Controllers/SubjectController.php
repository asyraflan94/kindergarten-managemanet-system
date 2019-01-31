<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class SubjectController extends Controller{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'subject'
        );

        return view('subject.index', $data);
    }

    public function grid()
    {
        $site = Models\Subject::select(\DB::raw('id, code, name, type_subject, format(price, 2), description'));

        return Datatables::of($site)
            ->addColumn('operations', '
                           <input type="hidden" id="row" value="{!! $id !!}" />
                           <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                           <button class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></button>
                           <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'subject/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                            ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'subject',
            'subject' => Models\Subject::find($id)
        );

        return view('owner.show_subject', $data);
    }

    public function store()
    {
        $subject              = new Models\Subject();
        $subject->code        = \Input::get('code');
        $subject->name        = \Input::get('name');
        $subject->description = \Input::get('description');
        $subject->price       = \Input::get('price');
        $subject->type_subject= \Input::get('type_subject');
        $subject->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $subject = Models\Subject::find($id);

        return \Response::json($subject);
    }

    public function update($id)
    {
        $subject              = Models\Subject::find($id);
        $subject->code        = \Input::get('code');
        $subject->name        = \Input::get('name');
        $subject->description = \Input::get('description');
        $subject->price       = \Input::get('price');
        $subject->type_subject= \Input::get('type_subject');
        $subject->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Subject::find($id)->forceDelete();

        return \Response::json('success');

    }
}
