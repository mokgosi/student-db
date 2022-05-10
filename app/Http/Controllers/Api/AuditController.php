<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuditResource;
use \OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuditResource::collection(
            // Audit::with('user')
            // ->orderBy('created_at', 'desc')                
            // ->get());

            Audit::select('audits.*', 'users.name as user', 
            DB::raw("CONCAT(students.first_name,' ',students.last_name) AS student"),
            DB::raw('DATE_FORMAT(audits.updated_at, "%Y/%m/%d %H:%i:%s") as update_date'))
            ->join('users', 'users.id', '=', 'audits.user_id')
            ->leftJoin('students', 'students.id', '=', 'audits.auditable_id')
            ->orderBy('audits.created_at', 'desc')   
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
