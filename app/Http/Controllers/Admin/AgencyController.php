<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use DataTables;

class AgencyController extends Controller
{
    protected function module(){
        return [
            'name' => 'Đại lý',
            'module' => 'agency',
            'table' =>[
                'name' => [
                    'title' => 'Tên đại lý', 
                    'with' => '',
                ], 
                'area' => [
                    'title' => 'Khu vực', 
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }


    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống.',
            'address.required' => 'Địa chỉ không được bỏ trống.',
            'phone.required' => 'Số điện thoại không được bỏ trống.',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request) {
        if ($request->ajax()) {
            $list_quote = Agency::orderBy('created_at', 'DESC')->get();

            return Datatables::of($list_quote)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('name', function ($data) {
                        return $data->name;
                })->addColumn('area', function ($data) {
                    if ($data->area == 'mien-bac') {
                        $area = 'Miền Bắc';
                    } else if ($data->area == 'mien-trung') {
                        $area = 'Miền Trung';
                    } else {
                        $area = 'Miền Nam';
                    }
                    return $area;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('agency.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('agency.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })->rawColumns(['checkbox', 'status', 'action', 'name', 'area'])
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $input['branch'] = !empty($request->branch) ? json_encode($request->branch) : null;

        $input['status'] = $request->status == 1 ? 1 : null;

        $agency = Agency::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route($this->module()['module'].'.index');
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
        $data['data'] = Agency::findOrFail($id);
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

        $agency = Agency::find($id)->update($input);

        flash('Cập nhật thành công.')->success();

        return redirect()->route($this->module()['module'].'.index');

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

        Agency::destroy($id);

        return redirect()->back();
    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Agency::destroy($id);
            }
            flash('Xóa thành công.')->success();
            return back();
        }
        flash('Bạn chưa chọn dữ liệu cần xóa.')->error();
        return back();
    }
    
}