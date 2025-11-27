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

        $resendConfig = Config::get('services.resend', []);
        $apiKey = (string) ($resendConfig['key'] ?? '');
        $from = $resendConfig['from'] ?? null;
        $to = $resendConfig['to'] ?? null;

        if ($apiKey === '' || $from === null || $to === null) {
            return back()
                ->withErrors([
                    'contact' => 'Het contactformulier is tijdelijk niet beschikbaar. Mail rechtstreeks naar Eyobielgoitom10@gmail.com.',
                ])
                ->withInput();
        }

        try {
            Http::withToken($apiKey)
                ->post('https://api.resend.com/emails', [
                    'from' => $from,
                    'to' => [$to],
                    'subject' => sprintf('[EG Web Solutions] %s', $payload['subject']),
                    'html' => view('emails.contact', [
                        'name' => $payload['name'],
                        'email' => $payload['email'],
                        'subject' => $payload['subject'],
                        'message' => $payload['message'],
                    ])->render(),
                ])->throw();
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withErrors([
                    'contact' => 'Bericht versturen is mislukt. Probeer het later nog eens of mail naar Eyobielgoitom10@gmail.com.',
                ])
                ->withInput();
        }

        return back()->with('status', 'Bedankt, je bericht is succesvol verzonden.');
    }
}
