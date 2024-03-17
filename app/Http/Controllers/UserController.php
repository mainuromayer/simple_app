<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller {
    public function listPage() {
        return view( 'content.listcontent' );
    }

    public function getList() {
        $data = User::all();
    
        return DataTables::of($data)->addColumn('action', function () {
            return '<a href="" class="btn btn-sm btn-outline-dark"> <i class="fa fa-edit"></i> Edit</a><br>';
        })->editColumn('status', function ($data) {
            // Define badges based on status value
            $status = $data->status;
            $badgeClass = '';
            if ($status === 'active') {
                $badgeClass = 'badge badge-success';
            } elseif ($status === 'inactive') {
                $badgeClass = 'badge badge-danger';
            }
            return '<span class="' . $badgeClass . '">' . $status . '</span>';
        })->rawColumns(['action', 'status'])->make(true);
    }
    
}
