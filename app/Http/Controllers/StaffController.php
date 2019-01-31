<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;
use Input;
use Validator;
use Redirect;
use Session;

class StaffController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'staff'
        );

        return view('staff.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Staff::select(\DB::raw('id, full_name, branch_name, role, tel_mobile'));

        return Datatables::of($site)
                         ->addColumn('operations', '
                         <input type="hidden" id="row" value="{!! $id !!}" />
                         <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                         <a class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit" href="{!! \URL::to(\'edit/staff/\'.$id) !!}"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'show/staff/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Activate" href="{!! \URL::to(\'staff/\'.$id) !!}"><i class="fa fa-key"></i></a>
                        ')
                         ->removeColumn('id')
                         ->make();
    }

    //check if user already registered
    public function create()
    {
        return view('staff.form');
    }

    //check if user already registered//
    public function store()
    {
        $staff              = new Models\Staff();

        $staff->full_name   = \Input::get('full_name');
        $staff->class_name  = \Input::get('class_name');
        $staff->branch_name = \Input::get('branch_name');

        $staff->dob            = \Input::get('dob');
        $staff->no_ic          = \Input::get('no_ic');
        $staff->gender         = \Input::get('gender');
        $staff->nationality    = \Input::get('nationality');
        $staff->marital_status = \Input::get('marital_status');
        $staff->religion       = \Input::get('religion');

        $staff->address_1 = \Input::get('address_1');
        $staff->address_2 = \Input::get('address_2');
        $staff->city      = \Input::get('city');
        $staff->postcode  = \Input::get('postcode');
        $staff->state     = \Input::get('state');
        $staff->country   = \Input::get('country');

        $staff->tel_mobile = \Input::get('tel_mobile');
        $staff->email      = \Input::get('email');
        $staff->role       = \Input::get('role');

        $staff->salary     = \Input::get('salary');
        $staff->no_account = \Input::get('no_account');
        $staff->bank_name  = \Input::get('bank_name');

        $file = \Input::file('file');
        if ($file != null) {
            $file->move(public_path('upload'), $file->getClientOriginalName());
            $staff->image = $file->getClientOriginalName();
        }

        if ($staff->save()) {
            return \Redirect::to('show/staff')->with('success', 'Anda berjaya menyimpan rekod tersebut');
        }
        else {
            return \Redirect::back()->with('error', 'Woit..ada error lah');
        }
    }

    public function show($id)
    {
        $data = array(
            'menu'  => 'staff',
            'staff' => Models\Staff::find($id),
        );

        return view('owner.staff.show', $data);
    }

    public function edit($id)
    {
        $staff = Models\Staff::find($id);
        $data = array('staff' => $staff);
        
        return view('staff.form', $data);
    }

    public function update($id)
    {
        $staff = Models\Staff::find($id);

        $staff->full_name   = \Input::get('full_name');
        $staff->class_name  = \Input::get('class_name');
        $staff->branch_name = \Input::get('branch_name');

        $staff->dob            = \Input::get('dob');
        $staff->no_ic          = \Input::get('no_ic');
        $staff->gender         = \Input::get('gender');
        $staff->nationality    = \Input::get('nationality');
        $staff->marital_status = \Input::get('marital_status');
        $staff->religion       = \Input::get('religion');

        $staff->address_1 = \Input::get('address_1');
        $staff->address_2 = \Input::get('address_2');
        $staff->city      = \Input::get('city');
        $staff->postcode  = \Input::get('postcode');
        $staff->state     = \Input::get('state');
        $staff->country   = \Input::get('country');

        $staff->tel_mobile = \Input::get('tel_mobile');
        $staff->email      = \Input::get('email');
        $staff->role       = \Input::get('role');

        $staff->salary     = \Input::get('salary');
        $staff->no_account = \Input::get('no_account');
        $staff->bank_name  = \Input::get('bank_name');

        $file = \Input::file('file');
        if ($file != null) {
            $file->move(public_path('upload'), $file->getClientOriginalName());
            $staff->image = $file->getClientOriginalName();
        }

        if ($staff->save()) {
            return \Redirect::to('show/staff/'.$id)->with('success', 'Anda berjaya menyimpan rekod tersebut');
        }
        else {
            return \Redirect::back()->withInput()->with('error', 'Woit..ada error lah');
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
        Models\Staff::find($id)->forceDelete();

        return \Response::json('success');

    }
}
