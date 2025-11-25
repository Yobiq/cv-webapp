<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CvContentService;
use Illuminate\Contracts\View\View;

final class HomeController extends Controller
{
    public function page(CvContentService $cvContentService): View
    {
        return view('pages.home', [
            'hero' => $cvContentService->hero(),
        ]);
    }

    public function aboutPage(CvContentService $cvContentService): View
    {
        return view('pages.about', [
            'about' => $cvContentService->about(),
        ]);
    }
}
