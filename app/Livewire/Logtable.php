<?php

namespace App\Livewire;

use App\Models\Log;
use Livewire\Component;
use Dompdf\Dompdf;
use Dompdf\Options;

class Logtable extends Component
{
    public $logs;

    public function mount()
    {
        $this->logs = Log::all();
    }

    public function generatePDF()
    {
        // Logica per ottenere i dati necessari per il PDF
        $logs = Log::all();

        // Generazione del PDF
        $pdf = new Dompdf();
        $options = new Options();
        // Configura eventuali opzioni di Dompdf

        $pdf->setOptions($options);
        $pdf->loadHtml(view('pdf.log', compact('logs')));
        $pdf->render();

        // Ottieni il contenuto del PDF
        $pdfContent = $pdf->output();

        // Restituisci il file PDF al browser per il download
        return response()->streamDownload(
            function () use ($pdfContent) {
                echo $pdfContent;
            },
            'log.pdf'
        );
    }


    public function render()
    {
        return view('livewire.logtable');
    }
}
