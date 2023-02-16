<?php

namespace TypiCMS\Modules\Contactforms\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use TypiCMS\Modules\Contactforms\Http\Requests\FormRequest;
use TypiCMS\Modules\Contactforms\Mails\NewFormMail;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Contactforms\Models\Contactform;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        return view('contactforms::public.index');
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['lang'] = config('app.locale');
        $data['message'] = strip_tags($data['message']);

        $contactform = Contactform::create($data);

        Mail::to(config('typicms.webmaster_email'))->send(new NewFormMail($contactform));

        return back()->with('success', __('Your message has been sent'));
    }
}
