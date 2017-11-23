<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Invoices\Core\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::find($user_id);
        $invoices = $user->invoices()->get();
        return response()->json($invoices);
    }

    /**
     * Show the specified user invoice.
     *
     * @param  int  $user_id
     * @param  int  $invoice_id
     * @return Response
     */
    public function show($user_id, $invoice_id)
    {
        $invoice = Invoice::where('user_id', $user_id)
                          ->where('id', $invoice_id)
                          ->first();
        return response()->json($invoice);
    }


    /**
     * Store a newly created Invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $invoices = $user->invoices()->create($request->all());
        return response()->json($invoices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @param  int  $invoice_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, $invoice_id)
    {
        $invoice = Invoice::where('user_id', $user_id)
                          ->where('id', $invoice_id)
                          ->first();
        $invoice->update($request->all());
        return response()->json($invoice->toArray());
    }
}
