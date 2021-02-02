<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banks;
use DataTables;
use Carbon\Carbon;

class BankController extends Controller
{
    protected function module(){
        return [
            'name' => 'Tài khoản ngân hàng',
            'module' => 'banks',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '70px',
                ],
                'name_bank' => [
                    'title' => 'Tên ngân hàng', 
                    'with' => '',
                ],
                'name_account' => [
                    'title' => 'Tên chủ thẻ', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '100px',
                ],
            ]
        ];
    }


    protected function fields()
    {
        return [
            'name_bank' => 'required',
            'name_account' => 'required',
            'bank_number' => 'required',
            'image' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name_bank.required' => 'Tên ngân hàng không được bỏ trống.',
            'name_account.required' => 'Tên chủ thẻ không được bỏ trống.',
            'bank_number.required' => 'Số tài khoản không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho công trình.',
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
            $list_bank = Banks::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_bank)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name_bank', function ($data) {
                    return $data->name_bank;
                })->addColumn('name_account', function ($data) {
                    return $data->name_account;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('banks.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('banks.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })
                ->rawColumns(['checkbox', 'image', 'status', 'action', 'name_bank', 'name_account'])
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
    public function create()
    {
        $data['module'] = $this->module();
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
        
        $input = $request->all();
        $input['status'] = $request->status == 1 ? 1 : null;

        $payment = Banks::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.edit', $payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);
        $data['data'] = Banks::findOrFail($id);
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
        $this->validate($request, $this->fields(), $this->messages());
        $input = $request->all();
        $input['status'] = $request->status == 1 ? 1 : null;

        $payment = Banks::findOrFail($id)->update($input);

        flash('Cập nhật thành công.')->success();

        return redirect()->back();

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

        Banks::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Banks::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    
}
