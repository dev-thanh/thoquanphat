<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Quotes;
use App\Models\QuotesCategory;
use DataTables;
use Carbon\Carbon;

class QuotesController extends Controller
{
	protected function fields()
    {
        return [
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            
        ];
    }
   
    protected function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống.',
            'category.required' => 'Bạn chưa chọn danh mục.',
            'image.required' => 'Bạn chưa chọn hình ảnh.',
            // 'price.required' => 'Bạn chưa nhập giá cho sản phẩm.',
            
        ];
    }

    protected function module(){
        return [
            'name' => 'Danh sách',
            'module' => 'quotes',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tên dịch vụ', 
                    'with' => '',
                ],

                'category' => [
                    'title' => 'Danh mục dịch vụ', 
                    'with' => '',
                ],
                
                // 'price' => [
                //     'title' => 'Giá', 
                //     'with' => '100px',
                // ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '100px',
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
        if ($request->ajax()) {

            $list_products = Quotes::orderBy('created_at', 'DESC')->get();

            return Datatables::of($list_products)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' .url('').'/'.$data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                    

                    return '<p>' . $data->name . '</p>'

                    .'<a href="'.url('').'/bao-gia-quy-trinh/'.$data->slug.'" target="_blank">'.url('').'/bao-gia-quy-trinh/'.$data->slug.'</a>';
                    
                })->addColumn('category', function ($data) {
                    $label = null;

                    if(count($data->category)){

                        foreach ($data->category as $item) {

                            $label = $label. '<span class="label label-success">'.$item->name.'</span><br>';

                        }

                    }

                    return $label;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    if ($data->hot) {
                        $status = $status . ' <span class="label label-primary">Nổi bật</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('quotes.edit', ['id' => $data->id]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('quotes.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })->rawColumns(['checkbox', 'image', 'status', 'action', 'name', 'category'])
                ->addIndexColumn()
                ->make(true);
        }
        $data['module'] = $this->module();
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

        $data['categories'] = Categories::where('type', 'category_quotes')->get();
        
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
        $this->validate($request, $this->fields(), $this->messages());
        
        $data = $request->all();

        $data['slug'] = $this->createSlug(str_slug($request->name));

        $data['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;

        $data['status'] = $request->status == 1 ? 1 : null;

        $product = Quotes::create($data);

        $this->updateOrder();

        if(!empty($request->category)){
            foreach ($request->category as $item) {
                QuotesCategory::create(['id_category'=> $item, 'id_quotes'=> $product->id]);
            }
        }

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $data['categories'] = Categories::where('type','category_quotes')->get();

        $data['data'] = Quotes::findOrFail($id);

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    
    public function update(Request $request, $id)
    {
    	$fields        = $this->fields();

        $this->validate($request, $fields, $this->messages());

        $input = $request->all();

        $input['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;

        $input['status'] = $request->status == 1 ? 1 : null;
        
        $product = Quotes::findOrFail($id)->update($input);

        $this->updateOrder();

        if(!empty($request->category)){

            QuotesCategory::where('id_quotes', $id )->delete();

            foreach ($request->category as $item) {

                QuotesCategory::create(['id_category'=> $item, 'id_quotes'=> $id ]);

            }
        }

        flash('Cập nhật thành công.')->success();

        return redirect()->route($this->module()['module'].'.index',['type'=>$request->type]);

    }

    public function updateOrder()
    {
        $data = Quotes::orderBy('stt')->orderBy('updated_at', 'DESC')->get();
        $index = 0;
        foreach ($data as $cate) {
            $index = $index + 1;
            $update = Quotes::find($cate->id);
            $update->stt = $index;
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
        flash('Xóa thành công.')->success();

        Quotes::destroy($id);

        QuotesCategory::where('id_quotes', $id )->delete();

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {

        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Quotes::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }


    public function getAjaxSlug(Request $request)
    {
        $slug = str_slug($request->slug);
        $id = $request->id;
        $post = Quotes::find($id);
        $post->slug = $this->createSlug($slug, $id);
        $post->save();
        return $this->createSlug($slug, $id);
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug = $slugPost;
        $index = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }


    public function checkIfExistedSlug($slug, $id = null)
    {
        if($id != null) {
            $count = Quotes::where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else{
            $count = Quotes::where('slug', $slug)->count();
            return $count > 0;
        }
    }



}
