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
class  MessageController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'message'
        );

        return view('teacher.message_list', $data);
    }

    public function MessageDataTable()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Message::select(\DB::raw('id, full_name, gender, classroom'));

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />                   
                               <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="Mesej" href="{!! \URL::to(\'message/\'.$id) !!}"><i class="fa fa-envelope fa-align-center"></i></a>')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'message',
            'message' => Models\Message::find($id)
        );

        return view('teacher.message', $data);
    }

    public function store()
    {
        $message                = new Models\Message();
        $message->full_name     = \Input::get('full_name');
        $message->mykid         = \Input::get('mykid');
        $message->gender        = \Input::get('gender');
        $message->dob           = \Input::get('dob');
        $message->id            = \Input::get('id');
        $message->id_parents    = \Input::get('id_parents');
        $message->classroom     = \Input::get('classroom');
        $message->reg_date      = \Input::get('reg_date');
        $message->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $message = Models\Message::find($id);
        $data = array('message' => $message);

        return view('teacher.show_grade', $data);

    }

    public function update($id)
    {
        $message                = Models\Message::find($id);
        $message->full_name     = \Input::get('full_name');
        $message->mykid         = \Input::get('mykid');
        $message->gender        = \Input::get('gender');
        $message->dob           = \Input::get('dob');
        $message->id            = \Input::get('id');
        $message->id_parents    = \Input::get('id_parents');
        $message->classroom     = \Input::get('classroom');
        $message->reg_date      = \Input::get('reg_date');
        $message->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Message::find($id)->forceDelete();

        return \Response::json('success');

    }
}
