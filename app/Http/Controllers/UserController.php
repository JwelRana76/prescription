<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.user.index',compact('users'));
    }
    public function getData(Request $request)
    {
        $query = User::query();

        return DataTables::eloquent($query)

            ->addIndexColumn()

            ->addColumn('checkbox', function ($user) {
                return '<input type="checkbox" class="select-user"
                        value="'.$user->id.'">';
            })

            ->addColumn('action', function ($user) {
                return '
                    <a href="'.route('user.edit', $user->id).'"
                       class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <button type="button"
                        class="btn btn-sm btn-danger delete-user"
                        data-id="'.$user->id.'">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            })

            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }
}