<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Sucursales\SucursalRepo;
use App\Repositories\Branch\BranchRepo;


class SucursalesController extends CRUDController
{
    protected $module = 'sucursales';
    protected $branchRepo = null;

    public function __construct(SucursalRepo $sucursalRepo, BranchRepo $branchRepo)
    {
        $this->repo = $sucursalRepo;
        $this->branchRepo = $branchRepo;
    }

    public function index()
    {
        $data = $this->repo->getWithRelations();
        return view($this->root . '/' . $this->module  .'/list',compact('data'));

    }

}
