<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;
use Input;
use Validator;
use Redirect;
use Session;

class OwnerController extends Controller
{

    use Tadika;

    //check if user already registered
    public function create(){
        return view('owner.form');
    }

    public function index(){
        $data = array(
            'menu' => 'owner'
        );

        return view('owner.index', $data);
    }

    public function grid(){
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Owner::select(\DB::raw('id, full_name, organization_name, tel_mobile, email'));

        return Datatables::of($site)
            ->addColumn('operations', '
                         <input type="hidden" id="row" value="{!! $id !!}" />
                         <a class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                         <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit" href="{!! \URL::to(\'edit/owner/\'.$id) !!}"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'show/owner/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Activate" href="{!! \URL::to(\'owner/\'.$id) !!}"><i class="fa fa-key"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }


    public function show($id)
    {
        $owner = Models\Owner::find($id);
        $organization = Models\Organization::find($id);
        $data = array(
            'owner' => $owner,
            'organization' => $organization
        );

        return view('super_admin.show_owner', $data);
    }

    //check if user already registered//
    public function store(){
        $owner                     = new Models\Owner();
        $owner->full_name          = \Input::get('full_name');
        $owner->organization_name  = \Input::get('organization_name');

        $owner->dob            = \Input::get('dob');
        $owner->no_ic          = \Input::get('no_ic');
        $owner->gender         = \Input::get('gender');
        $owner->nationality    = \Input::get('nationality');
        $owner->marital_status = \Input::get('marital_status');
        $owner->religion       = \Input::get('religion');

        $owner->address_1 = \Input::get('address_1');
        $owner->address_2 = \Input::get('address_2');
        $owner->city      = \Input::get('city');
        $owner->postcode  = \Input::get('postcode');
        $owner->state     = \Input::get('state');
        $owner->country   = \Input::get('country');

        $owner->tel_mobile = \Input::get('tel_mobile');
        $owner->email      = \Input::get('email');
        $owner->role       = \Input::get('role');

        $file = \Input::file('file');
        if ($file != null) {
            $file->move(public_path('upload'), $file->getClientOriginalName());
            $owner->image = $file->getClientOriginalName();
        }

        if ($owner->save()) {
            return \Redirect::to('owner')->with('success', 'Anda berjaya menyimpan rekod tersebut');
        } else {
            return \Redirect::back()->with('error', 'Wait..ada error lah bro');
        }
    }

    public function edit($id)
    {
        $owner = Models\Owner::find($id);
        $data = array('owner' => $owner);
        return view('owner.form', $data);
    }

    public function update($id)
    {
        $owner = Models\Owner::find($id);

        $owner->full_name         = \Input::get('full_name');
        $owner->organization_name = \Input::get('organization_name');

        $owner->dob            = \Input::get('dob');
        $owner->no_ic          = \Input::get('no_ic');
        $owner->gender         = \Input::get('gender');
        $owner->nationality    = \Input::get('nationality');
        $owner->marital_status = \Input::get('marital_status');
        $owner->religion       = \Input::get('religion');

        $owner->address_1   = \Input::get('address_1');
        $owner->address_2   = \Input::get('address_2');
        $owner->city        = \Input::get('city');
        $owner->postcode    = \Input::get('postcode');
        $owner->state       = \Input::get('state');
        $owner->country     = \Input::get('country');

        $owner->tel_mobile  = \Input::get('tel_mobile');
        $owner->email       = \Input::get('email');
        $owner->role        = \Input::get('role');

        $file = \Input::file('file');
        if ($file != null) {
            $file->move(public_path('upload'), $file->getClientOriginalName());
            $owner->image = $file->getClientOriginalName();
        }

        if ($owner->save()) {
            return \Redirect::to('show/owner/'.$id)->with('success', 'Anda berjaya menyimpan rekod tersebut');
        }
        else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
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
        Models\Owner::find($id)->forceDelete();

        return \Response::json('success');

    }
}
