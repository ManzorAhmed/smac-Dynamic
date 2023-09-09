<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PDFController extends Controller
{
    public function __construct(PDF $userObject)
    {
        $this->middleware('auth:web');
        $this->obj_user = $userObject;
    }

    public function index()
    {
        $pdfs = PDF::all(); // Retrieve all PDF files from the database

        foreach ($pdfs as $pdf) {
            $pdf->url = Storage::url($pdf->file_path); // Generate the unique URL for each file
        }

        return view('admin.pdfs.index', ['title' => 'Registered PDFs List', 'pdfs' => $pdfs]);
    }


    public function create()
    {
        return view('admin.pdfs.create', ['title' => 'Create pdf']);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'pdf_file' => 'required|mimes:pdf|max:2048', // Adjust the file size limit if needed
            'status' => '',
        ]);

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFileName = $pdfFile->getClientOriginalName();
            $destinationPath = 'public/uploads/pdf/'; // Specify the destination path where you want to store the PDF files
            $pdfFilePath = $pdfFile->storeAs($destinationPath, $pdfFileName);

            // Generate a public URL for the PDF file
            $pdfUrl = Storage::url($pdfFilePath);

            // You may want to save the file details in the database
            PDF::create([
                'title' => $pdfFileName,
                'file_path' => $pdfFilePath,
            ]);

            Session::flash('success_message', 'Great! PDF has been saved successfully!');
            return redirect()->back()->with('pdf_url', $pdfUrl);
        }

        return redirect()->back()->withErrors(['pdf_file' => 'No PDF file uploaded.']);
    }




    public function edit($id)
    {
        $pdf = PDF::find($id);
        return view('admin.pdfs.edit', compact('pdf'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // Adjust the file size limit if needed
        ]);

        $pdf = PDF::find($id);

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFileName = $pdfFile->getClientOriginalName();
            $pdfFilePath = $pdfFile->store('public/pdf'); // Store the new PDF file

            // Update the PDF file path in the database
            $pdf->pdf_path = $pdfFilePath;
            $pdf->save();

            // Generate a public URL for the updated PDF file
            $pdfUrl = asset('storage/' . $pdfFilePath);

            return redirect()->back()->with('success', 'PDF replaced successfully!');
        }

        return redirect()->back()->with('error', 'No PDF file uploaded.');
    }
    public function destroy($id)
    {
        $pdf = PDF::findOrFail($id);
        $pdf->delete();

        Session::flash('success_message', 'PDF successfully deleted!');
        return redirect()->back();
    }
    public function pdfDetail(Request $request)
    {
        $pdf = PDF::findOrfail($request->input('id'));
        return view('admin.pdfs.single', ['title' => 'Pdf Detail', 'pdf' => $pdf]);
    }
//    public function generate_pdf(Request $request)
//    {
//        $navmenu::Navbar($request->input('id'));
//
//        if(
//
//        )
//        return view(admin.navmenu.create,['title'=>'Navemenu','nav'=>$navmenu]);
//    }

}
