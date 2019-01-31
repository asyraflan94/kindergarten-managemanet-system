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
class StockController extends Controller
{

    use Tadika;

    public function index()
    {
        $data = array(
            'menu' => 'stock'
        );

        return view('stock.index', $data);
    }

    public function grid()
    {
        /*
         * Perlu fluent query dengan left join kerana nak maintain bil column yang akan return
         */
        $site = Models\Stock::select(\DB::raw('id, stock_name, format(price, 2), quantity, created_at '));

        return Datatables::of($site)
            ->addColumn('operations', '
                <input type="hidden" id="row" value="{!! $id !!}" />
                <button class="m-delete btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Hapus"><i class="fa fa-trash"></i></button>
                <button class="m-edit btn btn-info btn-xs pull-right" style="margin-right: 3px;"  rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></button>
                <a class="btn btn-info btn-xs pull-right" style="margin-right: 3px;" rel="tooltip" data-placement="top" data-original-title="View" href="{!! \URL::to(\'stock/\'.$id) !!}"><i class="fa fa-eye"></i></a>
                    ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id) //panggil dari model
    {
        $data = array(
            'menu' => 'stock_in',
            'stock_in' => Models\Stock_in::find($id)
        );

        return view('clerk.show_stock', $data);
    }

    public function store()
    {
        $stock_in               = new Models\Stock_in();
        $stock_in->stock_name   = \Input::get('stock_name');
        $stock_in->quantity     = \Input::get('quantity');
        $stock_in->description  = \Input::get('description');
        $stock_in->price        = \Input::get('price');
        $stock_in->save();

        return \Response::json('success');
    }

    public function edit($id)
    {
        $stock = Models\Stock::find($id);
        return \Response::json($stock);
    }

    public function update($id)
    {
        $stock_in               = Models\Stock::find($id);
        $stock_in->stock_name   = \Input::get('stock_name');
        $stock_in->quantity     = \Input::get('quantity');
        $stock_in->description  = \Input::get('description');
        $stock_in->price        = \Input::get('price');
        $stock_in->save();

        return \Response::json(array('result' => 'succeed'));
    }

    public function destroy($id)
    {
        Models\Stock_in::find($id)->forceDelete();

        return \Response::json('success');
    }
}
