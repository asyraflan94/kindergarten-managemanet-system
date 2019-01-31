<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class BranchController extends Controller{
    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'branch'
        );

        return view('branch.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Branch::select(\DB::raw('id, branch_name, state, tel_mobile, tel_office, email'));

        return Datatables::of($site)
                         ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                               <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                               <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'show/branch/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
                         ->removeColumn('id')
                         ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'branch',
            'branch' => Models\Branch::find($id)
        );

        return view('owner.show_branch', $data);
    }

    public function store()
    {
        $branch                    = new Models\Branch();
        $branch->branch_name       = \Input::get('branch_name');
        $branch->organization_name = \Input::get('organization_name');

        $branch->address_1         = \Input::get('address_1');
        $branch->address_2         = \Input::get('address_2');
        $branch->city              = \Input::get('city');
        $branch->postcode          = \Input::get('postcode');
        $branch->state             = \Input::get('state');
        $branch->country           = \Input::get('country');
        $branch->tel_mobile        = \Input::get('tel_mobile');
        $branch->tel_office        = \Input::get('tel_office');
        $branch->email             = \Input::get('email');
        $branch->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $branch = Models\Branch::find($id);

        return \Response::json($branch);
    }

    public function update($id)
    {
        $branch                    = Models\Branch::find($id);
        $branch->branch_name       = \Input::get('branch_name');
        $branch->organization_name = \Input::get('organization_name');

        $branch->address_1         = \Input::get('address_1');
        $branch->address_2         = \Input::get('address_2');
        $branch->city              = \Input::get('city');
        $branch->postcode          = \Input::get('postcode');
        $branch->state             = \Input::get('state');
        $branch->country           = \Input::get('country');
        $branch->tel_mobile        = \Input::get('tel_mobile');
        $branch->tel_office        = \Input::get('tel_office');
        $branch->email             = \Input::get('email');
        $branch->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Branch::find($id)->forceDelete();

        return \Response::json('success');

    }
}
