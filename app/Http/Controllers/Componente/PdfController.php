<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dompdf\Dompdf;
use \PDF;

class PdfController extends Controller
{
    public function user(Request $request){
        
        $users = User::all();
        $datos = [
        'title' => "Lista de Usuarios",
        'date' => date('d/m/Y'),
        'users' => $users
        ];
       
        $pdf = PDF::loadView('admin.users.userspdf', $datos);
        return $pdf->download('users.pdf');
        //return $pdf->stream('users.pdf');

       /*  $pdf = PDF::loadView('pdf.reclamos', ['reclamos' => $aux, 'datos' => $datos, 'cant' => $cant, 'filtro' => $filtro, 'config' => $config]);
        $y = $pdf->getDomPDF()->get_canvas()->get_height() - 35;
        $pdf->getDomPDF()->get_canvas()->page_text(500, $y, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        return $pdf->stream('reclamos.pdf'); */
    }
}
