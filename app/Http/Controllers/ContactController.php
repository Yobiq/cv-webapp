<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CvContentService;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

final class ContactController extends Controller
{
    public function page(CvContentService $cvContentService): View
    {
        return view('pages.contact', [
            'contact' => $cvContentService->contact(),
            'socials' => $cvContentService->socials(),
        ]);
    }

    public function send(ContactRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $resendConfig = Config::get('services.resend');

        Http::withToken((string) ($resendConfig['key'] ?? ''))
            ->post('https://api.resend.com/emails', [
                'from' => $resendConfig['from'],
                'to' => [$resendConfig['to']],
                'subject' => sprintf('[EG Web Solutions] %s', $payload['subject']),
                'html' => view('emails.contact', [
                    'name' => $payload['name'],
                    'email' => $payload['email'],
                    'subject' => $payload['subject'],
                    'message' => $payload['message'],
                ])->render(),
            ])->throw();

        return back()->with('status', 'Bedankt, je bericht is succesvol verzonden.');
    }
}
