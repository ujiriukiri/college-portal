<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PayableService;
use App\Filters\PayableFilters;
use App\Http\Requests\PayableRequest;

class PayableController extends ApiController
{
    protected $service;

    public function __construct(PayableService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    /**
     * Get Payable by ID
     * 
     * Responds with a specific Payable by its ID
     * - Rules of Access
     *   - User owns Payable or
     *   - User can update school
     */
    public function show(Request $request, PayableFilters $filters, $id) {
        $payable = $this->service()->repo()->single($id, $filters);
        $this->authorize('view', $payable); /** ensure the current user has view rights */
        return $payable;
    }

    /**
     * Get Payables
     * 
     * Responds with a list of Payables
     * - Rules of Access
     *   - User owns Payable or
     *   - User can update school
     */
    public function index(Request $request, PayableFilters $filters) {
        $payables = $this->service()->repo()->list($request->user(), $filters);
        return $payables;
    }

    /**
     * Delete Payable
     * 
     * Removes a Payable from the System by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Payable belongs to
     */
    public function destroy(Request $request, $id) {
        $payable = $this->service()->repo()->single($id);
        $this->authorize('delete', $payable); /** ensure the current user has delete rights */
        $this->service()->repo()->delete($id);
        return $this->ok();
    }

    /**
     * Create Payable
     * 
     * Supply Payable information to create a new one
     * - Rules of Access
     *  - User can view school and
     *  - User can update the user that owns the payable
     */
    public function store(PayableRequest $request) {
        $payable = $this->service()->repo()->create(array_merge([ 'user_id' => auth()->user()->id ], $request->all()));
        return $this->created($payable);
    }

    /**
     * Update Payable
     * 
     * Modify information about an existing Payable by ID
     * - Rules of Access
     *  - User is an ADMIN or
     *  - User owns school the Payable belongs to
     */
    public function update(Request $request, $id) {
        $payable = $this->service()->repo()->single($id);
        $this->authorize('update', $payable);
        $payable = $this->service()->repo()->update($id, $request->all());
        return $this->json($payable);
    }
}
