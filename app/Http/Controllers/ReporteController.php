<?php



namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use App\Models\Becado;
use App\Models\Gasto;

use App\Models\Detallegasto;
use App\Models\user;
use App\Models\Programa;
use App\Models\Servicio;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Psy\Formatter\Formatter;
use Stringable;

class ReporteController extends Controller
{
    //


    public function index()
    {
        $becados = Becado::paginate();
        $programas = programa::all();
        $servicios = Servicio::all()->where('status', '=', 'activo');
        $estatus = [
            "Activo",
            "Baja",
            "Graduado"
        ];


        return view('reporte.index', compact('becados', 'programas', 'servicios', 'estatus'))
            ->with('i', (request()->input('page', 1) - 1) * $becados->perPage());
    }

    public function perfil($id)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becado = Becado::find($id);
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.perfilbecado', compact('becado', 'i'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('perfildebecado.pdf');
    }

    public function programa($id)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::all()->where('programa_id', '=', $id);
        $programa = programa::find($id);
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.programa', compact('becados', 'programa', 'i'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function servicio($id)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::all()->where('servicio_id', '=', $id);
        $servicio = servicio::find($id);
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.servicio', compact('becados', 'servicio', 'i'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte becados por servicio .pdf');
    }

    public function programaf($id)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::all()->where('programa_id', '=', $id);
        $programa = programa::find($id);
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.programaf', compact('becados', 'programa', 'i'))
            ->setPaper('a4');
        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function programafano($id)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::all()->where('programa_id', '=', $id);
        $programa = programa::find($id);
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.programafano', compact('becados', 'programa', 'i'))
            ->setPaper('a4');

        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }





    public function estatus($id)
    {
        $becados = Becado::all()->where('status', '=', $id);
        $becadosc = Becado::all()->where('status', '=', $id)->count();
        if (count($becados) <= 0) {


            return redirect()->route('reportes.index')
                ->with('success', 'No se encuentran becados con el estatus seleccionado.');
        } else {
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Verdana');
            $dompdf->setOptions($options);
            $i = 0;
            $estatus = $becados->first();

            $pdf = PDF::setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ])->loadView('reporte.estatus', compact('becados', 'i', 'estatus'))
                ->setPaper('a4');
            //return $pdf->download('provedores.pdf');
            return $pdf->stream('reporte programa.pdf');
        }
    }

    public function fechan()
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::all();
        $ordenados = $becados->sortBy('fecha');

        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.fechan', compact('ordenados', 'i'))
            ->setPaper('a4');
        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }

    public function graduados(Request $request)
    {

        $id = $request->get('id');
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::whereYear('AnodeGraduacion', $id)->get()
            ->where('status', '=', 'Graduado');

        $i = 0;


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.graduados', compact('becados', 'i', 'id'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function graduadosf(Request $request)
    {

        $id = $request->get('id');
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::whereYear('AnodeGraduacion', $id)->get()
            ->where('status', '=', 'Graduado');

        $i = 0;


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.graduadosf', compact('becados', 'i', 'id'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function anoiniciobeca(Request $request)
    {

        $id = $request->get('id');
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $becados = Becado::whereYear('Anoiniciobeca', $id)->get();
        $becadosc = Becado::whereYear('Anoiniciobeca', $id)->get()->count();

        //$becadosor = Becado::all()->groupBy('status');
        $i = 0;


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.anoiniciobeca', compact('becados', 'i', 'id', 'becadosc'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function gastosporano(Request $request)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);

        $id = $request->get('becado_id');
        $ano = $request->get('ano');

        $becado = Becado::find($id);
        $i = 0;

        $detalles = Detallegasto::join('gastos', 'gastos.id', '=', 'detallegastos.gasto_id')
            ->whereYear('gastos.fecha', $ano)
            /*  ->whereDate('gastos.fecha', '2023-09-02') */
            ->where('detallegastos.becado_id', $id)
            ->get(['detallegastos.*']);


        /*  $detalles = Detallegasto::all()->where('becado_id', '=', $id)->where(Gasto::whereYear('fecha', '2023'))->get(); */
        $detalle = Detallegasto::all()->where('becado_id', '=', $id)->first();
        $total = $detalles->sum('Monto');


        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.gastosporano', compact('becado', 'i', 'detalles', 'detalle', 'total'))
            ->setPaper('a4');



        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }

    public function gastoprograma(Request $request)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);


        $fecha = $request->get('fecha');
        $Mes = Carbon::parse($fecha)->Format('m');
        $ano = Carbon::parse($fecha)->Format('Y');

        $becados = Becado::all();

        $programa = $request->get('programa_id');
        $programab = programa::find($programa);

        $detalles = Detallegasto::join('gastos', 'gastos.id', '=', 'detallegastos.gasto_id')
            ->join('becados', 'becados.id', '=', 'detallegastos.becado_id')
            ->join('programas', 'programas.id', '=', 'becados.programa_id')
            ->whereYear('gastos.fecha', $ano)
            ->whereMonth('gastos.fecha', '=', $Mes)
            ->where('programas.id', $programa)
            ->get(['detallegastos.*']);

        $total = $detalles->sum('Monto');
        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.gastospormes', compact('i', 'programab', 'detalles', 'total', 'fecha', 'becados'))
            ->setPaper('legal', 'landscape');

        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
    public function gastoprogramaanual(Request $request)
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Verdana');
        $dompdf->setOptions($options);


        $fecha = $request->get('fecha');
        /*   $Mes = Carbon::parse($fecha)->Format('m'); */
        /*  $ano = Carbon::parse($fecha)->Format('Y'); */

        $becados = Becado::all();

        $programa = $request->get('programa_id');
        $programab = programa::find($programa);

        /*  $grupos = Detallegasto::join('gastos', 'gastos.id', '=', 'detallegastos.gasto_id')
            ->leftJoin('becados', 'becados.id', '=', 'detallegastos.becado_id')
            ->leftJoin('programas', 'programas.id', '=', 'becados.programa_id')


            ->whereYear('gastos.fecha', $ano)
            ->where('programas.id', $programa)
            ->selectraw(' sum(Monto) as total , becado_id as id')->groupBy('becado_id')
            ->get(); */

        $detalles = Detallegasto::join('gastos', 'gastos.id', '=', 'detallegastos.gasto_id')
            ->leftJoin('becados', 'becados.id', '=', 'detallegastos.becado_id')
            ->leftJoin('programas', 'programas.id', '=', 'becados.programa_id')
            ->whereYear('gastos.fecha', $fecha)
            ->where('programas.id', $programa)
            ->select(Detallegasto::raw('(becado_id) as becado_id'), Detallegasto::raw('SUM(Monto) as total'))->groupBy('becado_id')
            ->get();


        $totalp = $detalles->sum('total');


        $i = 0;

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('reporte.gastoprogrmaanual', compact('i', 'programab', 'fecha', 'becados', 'detalles', 'totalp'))
            ->setPaper('legal', 'landscape');

        //return $pdf->download('provedores.pdf');
        return $pdf->stream('reporte programa.pdf');
    }
}