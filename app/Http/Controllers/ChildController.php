<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;


class ChildController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'child'
        );

        return view('child.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Child::select(\DB::raw('id, full_name, mykid, dob, gender, classroom'));

        return Datatables::of($site)
                         ->addColumn('operations', '
                         <input type="hidden" id="row" value="{!! $id !!}" />
                         <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'child/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                        ')
                         ->removeColumn('id')
                         ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu'  => 'child',
            'child' => Models\Child::find($id),
        );

        return view('parents.show_child', $data);
    }

}
