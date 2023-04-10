<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function section()
    {
        return view('admin.section.index', [
            'sections' => Section::all()
        ]);
        // echo 'ada';
    }

    public function addsection()
    {
        return view('admin.section.add_section');
        // echo 'ada';
    }
    public function addsectionpost(Request $request)
    {
        Section::insert([
            'name' => $request->section_name,
        ]);
        return back()->with('success_message', 'Your Section Added Successfully');
    }

    public function EditSection($section_id)
    {
        return view('admin.section.edit', [
            'section_info' => Section::find($section_id),

        ]);
    }
    public function EditSectionPost(Request $request)
    {

        $rules = [
            'name' => 'required|unique:sections,name,' . $request->section_id,
        ];

        $customMessages = [
            'name.required' => 'The Section Name field is required.',
        ];

        $this->validate($request, $rules, $customMessages);

        // print_r($request->all());
        Section::find($request->section_id)->update([
            'name' => $request->name,
        ]);


        return back()->with('success_message', $request->name . ' Section Updated sucessfully');;
    }


    public function updateSectionStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo '<pre>';
            // print_r($data);
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'section_id' => $data['section_id']]);
        }
    }

    public function DeleteSection($section_id)
    {
        Section::where('id', $section_id)->delete();
        return back()->with('success_message', 'Section deleted Successfully!');
    }
}
