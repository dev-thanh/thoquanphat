<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgencyBranch;
use App\Models\Agency;

class AgencyBranchController extends Controller
{
	protected function module(){
        return [
            'name' => 'Chi nhánh',
            'module' => 'agency-branch',
            'table' =>[
                'name' => [
                    'title' => 'Tên trang', 
                    'with' => '',
                ],
                'link' => [
                    'title' => 'Liên kết', 
                    'with' => '',
                ],
            ]
        ];
    }

	public function create(Request $request)
	{
		\App\Models\Agency::findOrFail($request->id);
		$data['module'] = $this->module();
		return view('backend.agency-branch.create-edit', $data);
	}

	public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên chi nhánh',
        ]);

        $agencyBranch = new AgencyBranch;
        $agencyBranch->id_agency = $request->id_agency;
        $agencyBranch->name = $request->name;
        $agencyBranch->phone = $request->phone;
        $agencyBranch->email = $request->email;
        $agencyBranch->address = $request->address;
        $agencyBranch->save();
        flash('Thêm mới thành công chi nhánh.')->success();
        return redirect()->route('agency.edit', ['id' => $agencyBranch->id_agency]);
    }


    public function edit(Request $request, $id)
    {
        \App\Models\Agency::findOrFail($request->id);
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);
        $data['data'] = AgencyBranch::findOrFail($id);

        return view('backend.agency-branch.create-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên chi nhánh',
        ]);

        \App\Models\Agency::findOrFail($request->id_agency);
        $agencyBranch = AgencyBranch::findOrFail($id);
        $agencyBranch->id_agency = $request->id_agency;
        $agencyBranch->name = $request->name;
        $agencyBranch->phone = $request->phone;
        $agencyBranch->email = $request->email;
        $agencyBranch->address = $request->address;
        $agencyBranch->save();
        flash('Cập nhật thành công chi nhánh.')->success();
        return redirect()->back();
    }

    public function destroy($id)
    {
        AgencyBranch::destroy($id);
        flash('Xóa thành công chi nhánh.')->success();
        return redirect()->back();
    }
}