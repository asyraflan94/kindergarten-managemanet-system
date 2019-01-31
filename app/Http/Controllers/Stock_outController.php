<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Yajra\Datatables\Datatables;

class Stock_outController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'deliver_stock'
        );
        return view('clerk.deliver_stock', $data);
    }
    public function Stock_outDataTable($id)
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Stock_out::select(\DB::raw('id, stock_name, format(price, 2), date_out'))->where('id_student', $id);

        return Datatables::of($site)
            ->addColumn('operations', '
                               <input type="hidden" id="row" value="{!! $id !!}" />
                             
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $data = array(
            'menu' => 'deliver_stock',
            'deliver_stock' => Models\Stock_out::find($id)
        );

        return view('clerk.deliver_stock', $data);
    }

    public function store()
    {
        $stock_out              = new Models\Stock_out();
        $stock_out->stock_name  = \Input::get('stock_name');
        $stock_out->price       = \Input::get('price');
        $stock_out->date_out    = \Input::get('date_out');
        $stock_out->id_student    = \Input::get('id_student');
        $stock_out->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $stock_out = Models\Stock_out::find($id);

        return \Response::json($stock_out);
        //return view('clerk.deliver_stock', $stock_out);
    }

    public function update($id)
    {
        $stock_out              = Models\Stock_out::find($id);
        $stock_out->stock_name  = \Input::get('stock_name');
        $stock_out->price       = \Input::get('price');
        $stock_out->date_out    = \Input::get('date_out');
        $stock_out->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Stock_out::find($id)->forceDelete();

        return \Response::json('success');

    }
}
