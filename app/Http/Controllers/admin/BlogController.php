<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Blog::paginate(10);
        return view('admin.blog.index')->with('datas', $datas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.show')->with('data', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');

        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public\assets\images\blog'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'photo']);
        }
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        $data = Blog::create($input);
        return redirect(route('blog.index'))->with('success', 'Item added succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::find($id);
        return view('admin.blog.edit')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Blog::find($id);
        if (empty($data)) {
            return redirect(route('blog.index'));
        }

        $file = $request->file('photo');
        $input = request()->except(['_token', '_method', 'action']);
        if ($request->file('photo') && $request->file('photo')->getClientOriginalName()) {
            $input['photo'] = $request->file('photo')->getClientOriginalName();
            $file->move(base_path('public\assets\images\blog'), $file->getClientOriginalName());
        } else {
            $input = request()->except(['_token', '_method', 'action', 'picture']);
        }
        $input['updated_by'] = auth()->user()->id;
        $data = Blog::where('id', $id)->update($input);
        return redirect(route('blog.index'))->with('success', 'Item Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Blog::find($request->id);
        if (empty($data)) {
            return redirect(route('blog.index'));
        }
        $data->delete();
        return redirect(route('blog.index'));
    }
}
