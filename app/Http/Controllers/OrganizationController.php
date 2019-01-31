<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;
use Input;
use Validator;
use Redirect;
use Session;

class OrganizationController extends Controller{
    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'organization'
        );

        return view('organization.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Organization::select(\DB::raw('id, organization_name, own_by, tel_office, email, type'));

        return Datatables::of($site)
                         ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                               <a class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete" href="#"><i class="fa fa-trash"></i></button>
                               <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'show/organization/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
                         ->removeColumn('id')
                         ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'organization',
            'organization' => Models\Organization::find($id)
        );

        return view('super_admin.show_organization', $data);
    }

    public function store()
    {
        $organization                    = new Models\Organization();
        $organization->organization_name = \Input::get('organization_name');
        $organization->type              = \Input::get('type');
        $organization->own_by            = \Input::get('own_by');
        $organization->address_1         = \Input::get('address_1');
        $organization->address_2         = \Input::get('address_2');
        $organization->city              = \Input::get('city');
        $organization->postcode          = \Input::get('postcode');
        $organization->state             = \Input::get('state');
        $organization->country           = \Input::get('country');
        $organization->tel_mobile        = \Input::get('tel_mobile');
        $organization->tel_office        = \Input::get('tel_office');
        $organization->email             = \Input::get('email');

        $file[0] = \Input::file('file');
        if ($file[0] != null) {
            $file[0]->move(public_path('upload'), $file[0]->getClientOriginalName());
            $organization->image = $file[0]->getClientOriginalName();
        }

        $organization->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $organization = Models\Organization::find($id);

        return \Response::json($organization);
    }

    public function update($id)
    {
        $organization                    = Models\Organization::find($id);
        $organization->organization_name = \Input::get('organization_name');
        $organization->type              = \Input::get('type');
        $organization->own_by            = \Input::get('own_by');
        $organization->address_1         = \Input::get('address_1');
        $organization->address_2         = \Input::get('address_2');
        $organization->city              = \Input::get('city');
        $organization->postcode          = \Input::get('postcode');
        $organization->state             = \Input::get('state');
        $organization->country           = \Input::get('country');
        $organization->tel_mobile        = \Input::get('tel_mobile');
        $organization->tel_office        = \Input::get('tel_office');
        $organization->email             = \Input::get('email');

        $file[0] = \Input::file('file');
        if ($file[0] != null) {
            $file[0]->move(public_path('upload'), $file[0]->getClientOriginalName());
            $organization->image = $file[0]->getClientOriginalName();
        }

        $organization->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function upload() {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Redirect::to('upload');
            }
            else {
                return \Redirect::back()->with('error', 'Woit..ada error lah');
            }
        }
    }

    public function destroy($id)
    {
        Models\Organization::find($id)->forceDelete();

        return \Response::json('success');

    }
}
