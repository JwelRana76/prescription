<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
            ->editColumn('status', function ($user) {
                return ($user->is_active == 0?'False':'True');
            })

            ->addColumn('action', function ($user) {

                return '
                    <button class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
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
        return back();
    }
}
