<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\File;

class FileController extends Controller
{
    public function index(Order $order)
    {
        $files = File::where('order_id', '=', $order->order_id)->get();
        return inertia(
            'Order/File/Index',
            [
                'files' => $files,
                'order' => $order
            ]
        );
    }

    public function create(Order $order)
    {
        return inertia(
            'Order/File/Create',
            ['order' => $order]
        );
    }

    public function store(Order $order, Request $request)
    {
        File::create([
            ...$request->all(),
            ...$request->validate([
                'order_id' => 'required',
                'pages_per_sheet' => 'required',
                'orientation' => 'required',
                'print_color' => 'required',
                'print_method' => 'required',
                'paper_weight' => 'required',
            ])
        ]);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                $path = $file->store('files', 'public');
            }

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseContent(file_get_contents($request->file('files')[0]));
            $metaData = $pdf->getDetails();
            round($metaData['Pages'] / $request->pages_per_sheet) < 1 ? $pagesToPrint = 1 : $pagesToPrint = round($metaData['Pages'] / $request->pages_per_sheet);

            $file = $order->file->last();
            $file->page_number = $metaData['Pages'];
            $file->pages_to_print = $pagesToPrint;
            $file->sheets_to_print = round($pagesToPrint / $request->print_method);
            $file->file_path = $path;
            $file->save();
        }
        return redirect()->back()->with('success', 'File uploaded!');
    }

    public function show(Order $order, File $file)
    {
        return response()->file('C:/sprint/public/storage/' . $file->file_path);
    }
}
