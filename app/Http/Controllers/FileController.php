<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\File;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{

    public function index()
    {
        //
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
                'page_no' => $metaData['Pages'],
                'pages_per_sheet' => $request->pages_per_sheet,
                'pages_to_print' => $metaData['Pages'] / $request->pages_per_sheet,
                'print_color' => $request->print_color,
                'print_method' => $request->print_method,
                'paper_weight' => $request->paper_weight,
                'file_path' => $path,
            ]);
        }
        return redirect()->back()->with('success', 'File uploaded!');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
