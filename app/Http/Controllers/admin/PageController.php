<?php

namespace App\Http\Controllers\admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = Page::latest();

        if(!empty($request->get('keyword'))) {
            $pages = $pages->where("name", "like", '%'.$request->get("keyword").'%');
        }
        $pages = $pages->paginate(10);

        $data['pages'] = $pages;
        return view('admin.pages.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'slug' => 'required|unique:pages,slug',
        ]);

        if($validator->passes()) {
            $pages = new Page;
            $pages->name = $request->name;
            $pages->slug = $request->slug;
            $pages->content = $request->content;
            $pages->save();

            $message = 'Page added Successfully';
            session()->flash('success', $message);
            return response()->json([
                  'status' => true,
                  'message' => $message
            ]);

        }else{
            return response()->json([
              'status' => false,
               'errors' => $validator->errors()
            ]);
        }
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
        $pages = Page::find($id);
        if($pages == null) {
            session()->flash('error', 'Page not found');
            return response()->json([
                'status' => true,
          ]);
        }
        $data['pages'] = $pages;
        return view('admin.pages.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pages = Page::find($id);

        if($pages == null) {
            session()->flash('error', 'Page not found');

            return redirect()->route('pages.index');
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id.',id',
          ]);
  
          if($validator->passes()) {
              $pages->name = $request->name;
              $pages->slug = $request->slug;
              $pages->content = $request->content;
              $pages->save();
  
              $message = 'Page Updated Successfully';
              session()->flash('success', $message);
              return response()->json([
                    'status' => true,
                    'message' => $message
              ]);
  
          }else{
              return response()->json([
                'status' => false,
                 'errors' => $validator->errors()
              ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pages = Page::find($id);
       if($pages == null) {
            session()->flash('error', 'Page not found');
            return response()->json([
                'status' => true,
          ]);

        }
        $pages->delete();


        $message = 'Page Deleted Successfully';
        session()->flash('success', $message);
        return response()->json([
              'status' => true,
              'message' => $message
        ]);
    }
}
