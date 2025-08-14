Route::get('/test-industries', function () {
    $industries = \App\Models\Industry::all();
    return response()->json([
        'count' => $industries->count(),
        'industries' => $industries->pluck('name', 'slug')
    ]);
});
