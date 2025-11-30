<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CvContentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

final class ResumeController extends Controller
{
    public function page(CvContentService $cvContentService): View
    {
        $resumeMeta = $cvContentService->resume();
        $isAuthenticated = Session::get('cv_authenticated', false);
        
        return view('pages.resume', [
            'resumeMeta' => $resumeMeta,
            'isAuthenticated' => $isAuthenticated,
        ]);
    }

    public function verifyPassword(Request $request, CvContentService $cvContentService): RedirectResponse
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $resumeMeta = $cvContentService->resume();
        $correctPassword = $resumeMeta['password'] ?? null;
        $passwordEnabled = $resumeMeta['password_enabled'] ?? false;

        if (!$passwordEnabled) {
            Session::put('cv_authenticated', true);
            return redirect()->route('resume');
        }

        if ($request->password === $correctPassword) {
            Session::put('cv_authenticated', true);
            return redirect()->route('resume')->with('success', 'Toegang verleend. Je kunt nu je CV downloaden.');
        }

        return back()->withErrors(['password' => 'Onjuist wachtwoord. Probeer het opnieuw.']);
    }

    public function download(CvContentService $cvContentService)
    {
        if (!Session::get('cv_authenticated', false)) {
            return redirect()->route('resume')->withErrors(['error' => 'Je moet eerst het wachtwoord invoeren.']);
        }

        $resumeMeta = $cvContentService->resume();
        $downloadPath = $resumeMeta['download_path'] ?? null;

        if (!$downloadPath) {
            abort(404, 'CV niet gevonden.');
        }

        $filePath = public_path($downloadPath);

        if (!file_exists($filePath)) {
            abort(404, 'CV bestand niet gevonden.');
        }

        return response()->download($filePath, basename($downloadPath));
    }

    public function preview(CvContentService $cvContentService)
    {
        if (!Session::get('cv_authenticated', false)) {
            return redirect()->route('resume')->withErrors(['error' => 'Je moet eerst het wachtwoord invoeren.']);
        }

        $resumeMeta = $cvContentService->resume();
        $downloadPath = $resumeMeta['download_path'] ?? null;

        if (!$downloadPath) {
            abort(404, 'CV niet gevonden.');
        }

        $filePath = public_path($downloadPath);

        if (!file_exists($filePath)) {
            abort(404, 'CV bestand niet gevonden.');
        }

        return response()->file($filePath);
    }
}
