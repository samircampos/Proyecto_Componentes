<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Productos;
use App\Facturas;
use App\Detalle;
use App\Compania;
use DB;
use PDF;
use Illuminate\Http\Request;

class FacturasController extends Controller
{

    public function index(Request $request)
    {
        $data=$request->all();
        $desde=date('Y-m-d');
        $hasta=date('Y-m-d');
        if (isset($data['desde'])) {
            $desde=$data['desde'];
            $hasta=$data['hasta'];
        }
        // $facturas=DB::select("SELECT * FROM factura f JOIN clientes c ON f.cli_id=c.cli_id");
        $facturas=DB::select("
            SELECT * FROM factura f
            JOIN clientes c ON f.cli_id=c.cli_id
            JOIN factura_detalle fd ON f.fac_id=fd.fac_id
            WHERE f.fac_fecha BETWEEN '$desde' AND '$hasta'");

        if (isset($data['btn_pdf'])) {
            $data=['facturas'=>$facturas];
            $pdf=PDF::loadView('facturas.reporte', $data);
            return $pdf->stream('invoice.pdf');
        }

        // $clientes=Clientes::all();
        // $compania=Compania::all();
        return view('facturas.index')
        ->with('facturas',$facturas)
        ->with('desde',$desde)
        ->with('hasta',$hasta);
    }

    public function create()
    {
        $clientes=Clientes::all();
        $productos=Productos::all();
        return view('facturas.create')->with('clientes',$clientes)->with('productos',$productos);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $facturas=Facturas::create($data);
        return redirect(route('facturas.edit',$facturas->fac_id))->with('E','e');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $facturas=Facturas::find($id);
        $clientes=Clientes::all();
        $productos=Productos::all();
        $detalle=DB::select("SELECT * FROM factura_detalle fd
                                            JOIN productos p ON fd.pro_id=p.pro_id
                                            WHERE fd.fac_id=$id");
        return view('facturas.edit')
        ->with('facturas',$facturas)
        ->with('clientes',$clientes)
        ->with('productos',$productos)
        ->with('detalle',$detalle);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

        // $facturas=DB::select("delete from factura where fac_id =$id");
        // return redirect()->route("facturas.index")->with('facturas',$facturas);
    }

     public function detalle(Request $request)
    {
        $datos=$request->all();
        $fac_id=$datos['fac_id'];

        if (isset($datos['btn_detalle']) == 'btn_detalle') {
            //guardar el detalle
            $datos['fact_vt'];
            Detalle::create($datos);
        }

        if (isset($datos['btn_eliminar']) >0) {
            //Elimino el detalle
            $fact_id=$datos['btn_eliminar'];
            Detalle::destroy($fact_id);
            // dd($fact_id);

        }

        return redirect(route('facturas.edit',$fac_id))->with('SI','Si')->with('NO','No');
    }

    public function facturas_pdf($fac_id){
        // dd('aqui');
        $factura=DB::select("SELECT * FROM factura f 
                            JOIN clientes c ON c.cli_id=f.cli_id 
                            WHERE f.fac_id=$fac_id");

        $detalle=DB::select("SELECT * FROM factura_detalle d 
                            JOIN  productos p ON  p.pro_id=d.pro_id
                            WHERE d.fac_id=$fac_id");

        $compania=DB::select("SELECT * FROM compania");
        
        $pdf = PDF::loadView('facturas.pdf',['factura'=>$factura[0],'detalle'=>$detalle,'compania'=>$compania]); 
        return $pdf->stream('factura.pdf');   
    }

    public function facturas_anular($fac_id){
        DB::select("UPDATE factura SET fac_estado=2 WHERE fac_id=$fac_id");
        return redirect(route('facturas.index'))->with('A','a');
    }


}