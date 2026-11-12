<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $model = User::class;

    public function index()
    {
        $columns = $this->model::$columns;
        if (request()->ajax()) {
            $data = $this->model::all();

            return DataTables::of($data)
            ->addColumn('checkbox', function ($user) {

                return '
                    <label class="itd-checkbox">
                        <input type="checkbox"
                            class="row-checkbox custom-checkbox"
                            value="'.$user->id.'">
                        <span class="checkmark"></span>
                    </label>
                ';
            })

            ->editColumn('amount', function ($user) {
                return (string) ($user->amount ?? 100);
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

            ->rawColumns(['checkbox', 'action'])

            ->make(true);
        }
        return view('pages.user.index', compact('columns'));
    }
}