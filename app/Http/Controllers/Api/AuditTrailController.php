<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAuditTrailRequest;
use App\Http\Requests\UpdateAuditTrailRequest;
use App\Http\Resources\AuditTrailResource;
use App\Http\Controllers\Controller;
use App\Models\AuditTrail;

class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuditTrailResource::collection(AuditTrail::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuditTrailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuditTrailRequest $request)
    {
        $auditTrail = AuditTrail::create($request->validated());

        return new AuditTrailResource($auditTrail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(AuditTrail $auditTrail)
    {
        return new AuditTrailResource($auditTrail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuditTrailRequest  $request
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuditTrailRequest $request, AuditTrail $auditTrail)
    {
        $auditTrail->update($request->validated());

        return new AuditTrailResource($auditTrail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditTrail $auditTrail)
    {
        $auditTrail->delete();

        return response()->noContent();
    }
}
