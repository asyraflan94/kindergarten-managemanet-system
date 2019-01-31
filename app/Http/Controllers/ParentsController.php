<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class ParentsController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'parents'
        );

        return view('parents.index', $data);
    }

    public function create()
    {
        return view('parents.form');
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Guardian::select(\DB::raw('id, father_name, mother_name, address_1, address_2, postcode, city, state'));

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                               <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                               <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit" href="{!! \URL::to(\'parents/\'.$id.\'/edit\') !!}"><i class="fa fa-pencil"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'parents/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $parents = Models\Guardian::find($id);
        $data = array(
            'parents' => $parents
        );
        return view('clerk.show_parents', $data);
    }

    //check if user already registered//
    public function store()
    {
        $parents                = new Models\Guardian();
        $parents->relationship  = \Input::get('relationship');
        $parents->father_name   = \Input::get('father_name');
        $parents->ic_father     = \Input::get('ic_father');
        $parents->occupation_f  = \Input::get('occupation_f');
        $parents->salary_f      = \Input::get('salary_f');
        $parents->nationality_f = \Input::get('nationality_f');
        $parents->tel_mobile  = \Input::get('tel_mobile_f');
        $parents->tel_home      = \Input::get('tel_home');
        $parents->email       = \Input::get('email_f');

        $parents->mother_name   = \Input::get('mother_name');
        $parents->ic_mother     = \Input::get('ic_mother');
        $parents->occupation_m  = \Input::get('occupation_m');
        $parents->salary_m      = \Input::get('salary_m');
        $parents->nationality_m = \Input::get('nationality_m');
        $parents->tel_mobile_1  = \Input::get('tel_mobile_m');
        $parents->email_2       = \Input::get('email_m');

        $parents->address_1     = \Input::get('address_1');
        $parents->address_2     = \Input::get('address_2');
        $parents->city          = \Input::get('city');
        $parents->postcode      = \Input::get('postcode');
        $parents->state         = \Input::get('state');
        $parents->country       = \Input::get('country');

        if ($parents->save()) {
            return \Redirect::to('parents');
        } else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function edit($id)
    {
        $parents = Models\Guardian::find($id);
        $data = array('parents' => $parents);
        return view('parents.form', $data);
    }

    public function update($id)
    {
        $parents                = Models\Guardian::find($id);
        $parents->relationship  = \Input::get('relationship');
        $parents->father_name   = \Input::get('father_name');
        $parents->ic_father     = \Input::get('ic_father');
        $parents->occupation_f  = \Input::get('occupation_f');
        $parents->salary_f      = \Input::get('salary_f');
        $parents->nationality_f = \Input::get('nationality_f');
        $parents->tel_mobile_f  = \Input::get('tel_mobile_f');
        $parents->tel_home      = \Input::get('tel_home');
        $parents->email_f      = \Input::get('email_f');

        $parents->mother_name   = \Input::get('mother_name');
        $parents->ic_mother     = \Input::get('ic_mother');
        $parents->occupation_m  = \Input::get('occupation_m');
        $parents->salary_m      = \Input::get('salary_m');
        $parents->nationality_m = \Input::get('nationality_m');
        $parents->tel_mobile_m  = \Input::get('tel_mobile_m');
        $parents->email_m       = \Input::get('email_m');

        $parents->address_1     = \Input::get('address_1');
        $parents->address_2     = \Input::get('address_2');
        $parents->city          = \Input::get('city');
        $parents->postcode      = \Input::get('postcode');
        $parents->state         = \Input::get('state');
        $parents->country       = \Input::get('country');

        if ($parents->save()) {
            return \Redirect::to('parents');
        } else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function destroy($id)
    {
        Models\Guardian::find($id)->forceDelete();

        return \Response::json('success');

    }
}
