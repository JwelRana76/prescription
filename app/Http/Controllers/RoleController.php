<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    protected $model = Role::class;

    public function index()
    {
        $columns = $this->model::$columns;
        if (request()->ajax()) {
            $data = $this->model::all();

            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('status', function ($item) {
                return ($item->is_active == 0?'False':'True');
            })

            ->addColumn('action', function ($item) {

                return '
                    <a href="' . route('role.permission', base64_encode($item->id)) . '" class="btn btn-sm btn-primary">
                        <i class="fas fa-cog"></i>
                    </a>
                    <a href="' . route('role.edit', base64_encode($item->id)) . '" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form action="' . route('role.delete', base64_encode($item->id)) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm(\'Are you sure you want to delete this record?\')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';
            })

            ->rawColumns(['action'])

            ->make(true);
        }
        return view('pages.role', compact('columns'));
    }
    function store(Request $request){
        $data = $request->all();
        if($data['id'] == null){
            $role['name']= $data['name'];
            $this->model::create($role);
        }else{
            $role['name']= $data['name'];
            $this->model::find($data['id'])->update($role);
        }
        return redirect()->route('role.index');
    }
    function edit($id){
        $id = base64_decode($id);
        $role = $this->model::findOrFail($id);
        $columns = $this->model::$columns;
        if (request()->ajax()) {
            $data = $this->model::all();

            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('status', function ($user) {
                return ($user->is_active == 0?'False':'True');
            })

            ->addColumn('action', function ($user) {

                return '
                    <a href="' . route('role.edit', base64_encode($user->id)) . '" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })

            ->rawColumns(['action'])

            ->make(true);
        }
        return view('pages.role', compact('columns','role'));
    }
    function delete($id){
        $id = base64_decode($id);
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->route('role.index');
    }
    function permission($id){
        $id = base64_decode($id);
        $role = $this->model::findOrFail($id);
        $permission_group = PermissionGroup::get();
        $role_has_permission = RoleHasPermission::where('role_id', $id)->pluck('permission_id')->toArray();
        return view('pages.permission',compact('role','permission_group','role_has_permission'));
    }
    function permissionStore(Request $request){
        $role_id = $request->role_id;
        $permission = $request->permission;
        RoleHasPermission::where('role_id', $role_id)->delete();
        foreach ($permission as $key => $value) {
            RoleHasPermission::create([
                'role_id' => $role_id,
                'permission_id' => $value,
            ]);
        }
        return redirect()->route('role.permission', ['id' => base64_encode($role_id)]);
    }
}
