<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\FAQResource;
use App\FAQ;

class FAQsController extends Controller
{
    public function display()
    {
        $faqs = FAQ::where(['active' => 1])->get();

        return FAQResource::collection($faqs);
    }

    public function index()
    {
        return FAQResource::collection(FAQ::paginate(10));
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
            'active' => 'required'
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
