<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CvContentService;
use Illuminate\Contracts\View\View;

final class ProjectController extends Controller
{
    public function page(CvContentService $cvContentService): View
    {
        return view('pages.projects', [
            'projects' => $cvContentService->projects(),
        ]);
    }
}
