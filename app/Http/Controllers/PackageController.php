<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class PackageController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'package'
        );
        return view('package.index', $data);
    }

    public function grid()
    {
        $site = Models\Package::select(\DB::raw('id, name, format(price, 2), limit_student, description'));

        return Datatables::of($site)
            ->addColumn('operations', '
                         <input type="hidden" id="row" value="{!! $id !!}" />
                         <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                         <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit" href="{!! \URL::to(\'package/\'.$id.\'/edit\') !!}"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'package/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'package',
            'package' => Models\Package::find($id)
        );
        return view('owner.package.show', $data);
    }

    public function create()
    {
        $subject = Models\Subject::orderBy('name')->pluck('name', 'id');

        return view('package.form', compact('id', 'subject'));
    }

    public function store()
    {
        $package = new Models\Package();
        $package->name = \Input::get('name');
        $package->price = \Input::get('price');
        $package->limit_student = \Input::get('limit_student');
        $package->description = \Input::get('description');

        $subjects = \Input::get('subject');

        if ($package->save()) {
            if (count($subjects) > 0) {
                foreach ($subjects as $subject) {
                    \DB::insert('INSERT INTO package_subject VALUES (?, ?)', array($package->id, $subject));
                }
            }
            return \Redirect::to('package')->with('success', 'Anda berjaya menyimpan rekod tersebut');
        } else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function edit($id)
    {
        $subject = Models\Subject::orderBy('name')->pluck('name', 'id');
        $package = Models\Package::find($id);
        $selected = array();
        if ($package->subjects->count() > 0) {
            foreach ($package->subjects as $sub) {
                array_push($selected, $sub->id);
            }
        }
        $data = array(
            'package' => $package,
            'subject' => $subject,
            'selected' => $selected
        );

        return view('package.form', $data);
    }

    public function update($id)
    {
        $package = Models\Package::find($id);
        $package->name = \Input::get('name');
        $package->price = \Input::get('price');
        $package->limit_student = \Input::get('limit_student');
        $package->description = \Input::get('description');

        \DB::table('package_subject')->where('package_id', '=', $id)->delete();

        $subjects = \Input::get('subject');
        if ($package->save()) {
            if (count($subjects) > 0) {
                foreach ($subjects as $subject) {
                    \DB::insert('INSERT INTO package_subject VALUES (?, ?)', array($package->id, $subject));
                }
            }
            return \Redirect::to('package')->with('success', 'Anda berjaya menyimpan rekod tersebut');
        } else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function destroy($id)
    {
        Models\Package::find($id)->forceDelete();
        return \Response::json('success');
    }
}
