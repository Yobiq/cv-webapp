<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CvContentService;
use Illuminate\Contracts\View\View;

final class ContactController extends Controller
{
    public function page(CvContentService $cvContentService): View
    {
        return view('pages.contact', [
            'contact' => $cvContentService->contact(),
            'socials' => $cvContentService->socials(),
        ]);
    }
}
