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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $auditTrail)
    {
        $auditTrail->delete();

        return response()->noContent();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // $links = Link::orderBy('created_at', 'desc')->limit(4)->get();
        return  AuditResource::collection(Audit::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get());
    }
}
