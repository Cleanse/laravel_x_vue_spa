<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\FAQResource;
use App\FAQ;

class FAQsController extends Controller
{
    public function index()
    {
        return FAQ::where('active', '=', 1)->get();
    }

    public function show(FAQ $faq)
    {
        return new FAQResource($faq);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subj' => 'required',
            'answer' => 'required'
        ]);

        return new FAQResource(FAQ::create([
            'subj' => $data['subj'],
            'answer' => $data['answer']
        ]));
    }

    public function update(FAQ $faq, Request $request)
    {
        $data = $request->validate([
            'subj' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($data);

        return new FAQResource($faq);
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return response(null, 204);
    }
}
