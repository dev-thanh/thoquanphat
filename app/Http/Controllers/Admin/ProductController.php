<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductCategory;
use DataTables;
use Carbon\Carbon;

class ProductController extends Controller
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
            'name.required' => 'Tên sản phẩm không được bỏ trống.',
            'category.required' => 'Bạn chưa chọn danh mục sản phẩm.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho sản phẩm.',
            // 'price.required' => 'Bạn chưa nhập giá cho sản phẩm.',
            
        ];
    }

    protected function module(){
        return [
            'name' => 'Danh sách sản phẩm',
            'module' => 'products',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tên sản phẩm', 
                    'with' => '',
                ],

                'category' => [
                    'title' => 'Danh mục sản phẩm', 
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
            $type = $request->type;
            $list_products = Products::where('type',$type)->orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_products)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' .url('').'/'.$data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                    if($data->type=='gift'){
                        return '<p>' . $data->name . '</p>'

                    .'<a href="'.url('').'/san-pham-gift/'.$data->slug.'" target="_blank">'.url('').'/san-pham-gift/'.$data->slug.'</a>';
                    }else{

                        return '<p>' . $data->name . '</p>'

                        .'<a href="'.url('').'/san-pham/'.$data->slug.'" target="_blank">'.url('').'/san-pham/'.$data->slug.'</a>';
                    }
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
                    return '<a href="' . route('products.edit', ['id' => $data->id,'type'=>request()->type ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('products.destroy', $data->id) . '"
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
        $type = $request->type =='gift' ? 'gift' : 'product_category';

        $data['module'] = $this->module();

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
        $this->validate($request, $this->fields(), $this->messages());
        
        $data = $request->all();

        $data['slug'] = $this->createSlug(str_slug($request->name));

        $data['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;

        $data['hot'] = $request->hot == 1 ? 1 : null;

        $data['is_new'] = $request->is_new == 1 ? 1 : null;

        $data['is_sale'] = $request->is_sale == 1 ? 1 : null;

        $data['is_selling'] = $request->is_selling == 1 ? 1 : null;

        $data['status'] = $request->status == 1 ? 1 : null;

        $data['type'] = $request->type == 'gift' ? 'gift' : 'product';

        $data['price_priority'] = !is_null($request->price_sale) && intval($request->price_sale) >= 0 ? $request->price_sale : $request->price;

        $sale = !is_null($request->price_sale) && intval($request->price_sale) >= 0 && intval($request->price) >= 0 ? (1 -intval($request->price_sale) / intval($request->price)) * 100 : 0;
        
        $input['percent_sale'] = $sale;

        $product = Products::create($data);

        $this->updateOrder();

        if(!empty($request->category)){
            foreach ($request->category as $item) {
                ProductCategory::create(['id_category'=> $item, 'id_product'=> $product->id]);
            }
        }

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.index',['type'=>$request->type]);
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

        $type = $request->type == 'gift' ? 'gift' : 'product_category';

        $data['categories'] = Categories::where('type',$type)->get();

        $data['data'] = Products::findOrFail($id);

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    
    public function update(Request $request, $id)
    {
    	$fields        = $this->fields();

        $fields['code'] = 'required|unique:products,code,' . $id;

        $this->validate($request, $fields, $this->messages());

        $input = $request->all();

        //dd($input);

        $sale = !is_null($request->price_sale) && intval($request->price_sale) >= 0 && intval($request->price) >= 0 ? (1 -intval($request->price_sale) / intval($request->price)) * 100 : 0;
        
        $input['percent_sale'] = $sale;

        $input['price_priority'] = !is_null($request->price_sale) && intval($request->price_sale) >= 0 ? $request->price_sale : $request->price;

        $input['more_image'] = !empty($request->gallery) ? json_encode($request->gallery) : null;

        $input['hot'] = $request->hot == 1 ? 1 : null;

        $input['is_new'] = $request->is_new == 1 ? 1 : null;

        $input['is_sale'] = $request->is_sale == 1 ? 1 : null;

        $input['is_selling'] = $request->is_selling == 1 ? 1 : null;

        $input['status'] = $request->status == 1 ? 1 : null;
        
        $product = Products::findOrFail($id)->update($input);

        $this->updateOrder();

        if(!empty($request->category)){

            ProductCategory::where('id_product', $id )->delete();

            foreach ($request->category as $item) {

                ProductCategory::create(['id_category'=> $item, 'id_product'=> $id ]);

            }
        }

        flash('Cập nhật thành công.')->success();

        return redirect()->route($this->module()['module'].'.index',['type'=>$request->type]);

    }

    public function updateOrder()
    {
        $data = Products::orderBy('stt')->orderBy('updated_at', 'DESC')->get();
        $index = 0;
        foreach ($data as $cate) {
            $index = $index + 1;
            $update = Products::find($cate->id);
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

        Products::destroy($id);

        ProductCategory::where('id_product', $id )->delete();

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {

        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Products::destroy($id);
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
        $post = Products::find($id);
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
            $count = Products::where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else{
            $count = Products::where('slug', $slug)->count();
            return $count > 0;
        }
    }



}
