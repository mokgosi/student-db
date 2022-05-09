<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuditResource;
use \OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuditResource::collection(Audit::with('user')
            ->orderBy('created_at', 'desc')                
            ->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // $links = Link::orderBy('created_at', 'desc')->limit(4)->get();
        return  AuditResource::collection(Audit::orderBy('created_at', 'desc')
            ->limit(5)
            ->get());
    }
}
