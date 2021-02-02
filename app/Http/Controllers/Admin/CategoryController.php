<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{

    protected function fields()
    {
        return [
            'name' => "required",
            'slug' => "required",
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống.', 
            'slug.required' => 'Đường dẫn tĩnh không được bỏ trống.',
        ];
    }


    protected function module(){
        return [
            'name' => 'Danh mục dự án',
            'module' => 'category',
            'table' =>[
                'name' => [
                    'title' => 'Tiêu đề', 
                    'with' => '',
                ],
                'slug' => [
                    'title' => 'Liên kết', 
                    'with' => '',
                ],
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['module'] = $this->module();

        $type = $request->type;

        $data['data'] = Categories::where('type', $type)->get();

        return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['module'] = $this->module();

        $type = $request->type;

        $data['categories'] = Categories::where('type', $type)->get();

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $type = $request->type;

        $this->validate($request, $this->fields(), $this->messages());

        $post_check_sulg = Categories::where('slug', $request->slug)->where('type', $type)->first();
        if (!empty($post_check_sulg)) {

            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);

        }

        $input = $request->all();

        $input['type'] = $type;

        $data = Categories::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route("{$this->module()['module']}.index",['type'=>$type]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $type = $request->type;

        $data['categories'] = Categories::where('id', '!=', $id)->where('type', $type)->get();

        $data['data'] = Categories::findOrFail($id);

        return view("backend.{$this->module()['module']}.create-edit", $data);
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
        $type = $request->type;

        $this->validate($request, $this->fields(), $this->messages());

        $post_check_sulg = Categories::where('slug', $request->slug)->where('id', '!=', $id)->where('type', $type)->first();

        if (!empty($post_check_sulg)) {

            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);

        }

        $input = $request->all();

        $cate = Categories::findOrFail($id)->update($input);

        $this->updateOrder($id);

        flash('Cập nhật thành công.')->success();

        return back();
    }

    public function updateOrder($id)
    {
        $category = Categories::findOrFail($id);

        if ($category->parent_id != 0) {

            $data = Categories::where('parent_id', '!=', 0)->where('parent_id', $category->parent_id)->orderBy('order')->orderBy('updated_at', 'DESC')->get();

        } else {

            $data = Categories::where('parent_id', '==', 0)->orderBy('order')->orderBy('updated_at', 'DESC')->get();

        }
        
        $index = 0;

        foreach ($data as $cate) {
            $index = $index + 1;
            $update = Categories::find($cate->id);
            $update->order = $index;
            $update->save();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->get_child_cate();

        if(count($category)){

            flash('Không thể xóa danh mục này vì danh mục này đang có danh mục con.')->error();

            return redirect()->route('category.index');

        }else {

            Categories::destroy($id);

            flash('Xóa thành công.')->success();

            return redirect()->route('category.index');

        }
    }

}
