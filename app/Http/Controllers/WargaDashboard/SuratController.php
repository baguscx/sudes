<?php

namespace App\Http\Controllers\WargaDashboard;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
// use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Spatie\Browsershot\Browsershot;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pdf()
    {
        $user = Auth::user();
        $pdf = Pdf::loadView('warga.surat.pdf', compact('user'))->setPaper('a4', 'potrait');
        $pdfPath = public_path('invoice.pdf');
        $pdf->save($pdfPath);
        return response()->file($pdfPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice.pdf"',
        ]);


    // $data = [
    //     [
    //         'quantity' => 1,
    //         'description' => '1 Year Subscription',
    //         'price' => '129.00'
    //     ]
    // ];

    // $pdf = Pdf::loadView('warga.surat.doc', ['data' => $data]);

    // return $pdf->download();


    // $pdf = Pdf::loadView('warga.surat.pdf', compact('user'));

    // return $pdf->stream();

        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml(view('warga.surat.pdf'));

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
        // $mpdf = new \Mpdf\Mpdf();
        // $mpdf->WriteHTML(view('warga.surat.pdf'));
        // $mpdf->Output('asu.pdf', 'D');
        return view('warga.surat.pdf', compact('user'));
    }
}
