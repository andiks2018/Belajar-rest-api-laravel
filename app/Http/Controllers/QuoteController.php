<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan beberapa data saja per page
        return QuoteResource::collection(Quote::paginate(5));

        // menmampilkan semua data
        // return QuoteResource::collection(Quote::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        //
        //return response()->json('hello');
        return new QuoteResource(Quote::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
        return new QuoteResource($quote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        // // Ini bisa digunakan untuk mengupdate data
        // $quote->update($request->validated());
        // return new QuoteResource($quote);

        return new QuoteResource(tap($quote) ->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
