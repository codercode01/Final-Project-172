<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Visitor;
use Illuminate\Support\Facades\Storage;


class QRCodeController extends Controller
{
    
    public function showForm()
    {
        return view('register_visitor');
    }

    public function save_visitor(Request $request)
    {
        
        $new_visit = new Visitor;
        $new_visit->visitor = $request->visitor;
        $new_visit->inmate = $request->inmate;
        $new_visit->contact = $request->contact;
        $new_visit->Save();
        return redirect('/visitor-info');
    }

    public function View_visitors(Request $request)
    {
        $search = $request ['search'] ?? "";
        if ($search != ""){
            //where
            $visitors = Visitor::where('visitor','LIKE', "%$search%")->paginate(10);
        }else {
            $visitors = Visitor::orderBy("created_at", "asc")->get();
        }
         $visitor= compact('visitors','search');
        return view('visitor')->with($visitor);
    }

    public function generateQRCode($id)
    {
        // Retrieve data from the database
        $visitors = \App\Models\Visitor::findOrFail($id);

        // Generate QR code with user data
        $qrCode = QrCode::format('png')->size(200)->generate($visitors->visitor);
        $output_file = '/img/qr-code/img-' . time() . '.png';
        Storage::disk('public')->put($output_file, $qrCode);
        // Output the QR code to the browser
        return response($qrCode)->header('Content-Type', 'image/png');
    }

    public function delete_visitor(Request $request)
    {
        $response = Visitor::find($request->id)->delete();
        return $response;
    }
    
    public function update_visitor($id)
    {
        $update_visitor = Visitor::find($id);
        return view('update-visitor', compact('update_visitor'));
    }
    public function save_update_visitor(Request $request, $id)
    {
        
        $save_visitor = Visitor::find($id);
        $save_visitor->visitor = $request->visitor;
        $save_visitor->inmate = $request->inmate;
        $save_visitor->contact = $request->contact;
        $save_visitor->Save();
        return redirect('/visitor-info');
    }
    
}
