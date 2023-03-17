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
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('files', 'public');
            }

            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseContent(file_get_contents($request->file('files')[0]));
            $metaData = $pdf->getDetails();

            $id = $order->order_id;
            File::create([
                'order_id' => $id,
                'page_number' => $metaData['Pages'],
                'pages_per_sheet' => $request->pages_per_sheet,
                'pages_to_print' => round($metaData['Pages'] / $request->pages_per_sheet),
                'sheets_to_print' => round(($metaData['Pages'] / $request->pages_per_sheet) / $request->print_method),
                'orientation' => $request->orientation,
                'print_color' => $request->print_color,
                'print_method' => $request->print_method,
                'paper_weight' => $request->paper_weight,
                'file_path' => $path,
            ]);
        }
        return redirect()->back()->with('success', 'File uploaded!');
    }

    public function show(Order $order, File $file)
    {
        $filename = $file->file_path;
        return response()->file('C:/sprint/public/storage/' . $file->file_path);
    }

    public function destroy($id)
    {
        //
    }
}
