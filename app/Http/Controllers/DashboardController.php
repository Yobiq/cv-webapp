<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Verwijder de strikte controle die 403 veroorzaakt
        // We controleren in de methoden zelf
    }

    public function index()
    {
        // Debug sessie
        Log::info('Dashboard toegang', ['session' => Session::all()]);
        
        // Controleer admin login, maar stuur door naar login als niet ingelogd
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Log in als admin om toegang te krijgen');
        }
        
        $resumeInfo = DB::table('resumes')->first();
        
        return view('dashboard.index', compact('resumeInfo'));
    }

    public function updateResume(Request $request)
    {
        // Controleer admin login
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        // Valideer de input
        $request->validate([
            'resume_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        try {
            // Upload het nieuwe bestand
            $file = $request->file('resume_file');
            $originalFilename = $file->getClientOriginalName();
            $filename = time() . '_' . \Illuminate\Support\Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('resumes', $filename, 'public');
            
            // Haal het huidige CV op
            $currentResume = DB::table('resumes')->first();
            
            // Verwijder oude bestand als er een is
            if ($currentResume && !empty($currentResume->file_path)) {
                Storage::disk('public')->delete($currentResume->file_path);
            }

            // Update de database - behoud het bestaande wachtwoord als dat er is
            $password = null;
            $isProtected = false;
            
            if ($currentResume && $currentResume->password) {
                $password = $currentResume->password;
                $isProtected = $currentResume->is_protected;
            }
            
            DB::table('resumes')->truncate();
            
            DB::table('resumes')->insert([
                'dwonloadLink' => '',
                'file_path' => $filePath,
                'original_filename' => $originalFilename,
                'password' => $password,
                'is_protected' => $isProtected,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect('/dashboard')->with('success', 'CV "' . $originalFilename . '" is succesvol geüpload. Je kunt nu een wachtwoord instellen als je wilt.');

        } catch (\Exception $e) {
            Log::error('Fout bij uploaden CV: ' . $e->getMessage());
            return redirect('/dashboard')->with('error', 'Fout bij uploaden: ' . $e->getMessage());
        }
    }
    
    public function updatePassword(Request $request)
    {
        // Controleer admin login
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        // Debug: Log alle inkomende gegevens
        Log::info('Wachtwoord update request ontvangen', [
            'all_input' => $request->all(),
            'is_protected_input' => $request->input('is_protected'),
            'is_protected_submitted' => $request->input('is_protected_submitted'),
            'password_input' => $request->filled('password') ? 'Wachtwoord ingevuld' : 'Geen wachtwoord'
        ]);
        
        // Valideer de input
        $request->validate([
            'password' => 'required_if:is_protected,1|string|min:4',
            'is_protected' => 'nullable|boolean',
            'is_protected_submitted' => 'required|in:1',
        ]);

        try {
            // Haal het huidige CV op
            $resume = DB::table('resumes')->first();
            
            if (!$resume) {
                return redirect('/dashboard')->with('error', 'Upload eerst een CV voordat je een wachtwoord instelt.');
            }
            
            // Debug: Log de huidige waarden
            Log::info('Huidige resume waarden:', [
                'id' => $resume->id,
                'is_protected' => $resume->is_protected,
                'has_password' => !empty($resume->password)
            ]);
            
            // Bepaal of het beveiligd is - forceer naar boolean
            // Als is_protected_submitted aanwezig is maar is_protected niet, dan is de checkbox niet aangevinkt
            $isProtected = $request->has('is_protected');
            
            Log::info('Is protected waarde na conversie', ['is_protected' => $isProtected]);
            
            // Bepaal het wachtwoord
            $password = null;
            if ($isProtected) {
                if (empty($request->password)) {
                    return redirect('/dashboard')->with('error', 'Wachtwoord is verplicht als beveiliging is ingeschakeld.');
                }
                $password = Hash::make($request->password);
                Log::info('Nieuw wachtwoord gehashed', ['password_hash' => $password]);
            }
            
            // Update alleen het wachtwoord en de beveiliging
            $updateData = [
                'password' => $password,
                'is_protected' => $isProtected,
                'updated_at' => now()
            ];
            
            Log::info('Update data', $updateData);
            
            DB::table('resumes')
                ->where('id', $resume->id)
                ->update($updateData);
            
            // Log de update voor debugging
            Log::info('Wachtwoord bijgewerkt', [
                'is_protected' => $isProtected,
                'has_password' => !empty($password)
            ]);
            
            // Controleer of de update is gelukt
            $updatedResume = DB::table('resumes')->find($resume->id);
            Log::info('Resume na update:', [
                'is_protected' => $updatedResume->is_protected,
                'has_password' => !empty($updatedResume->password),
                'password_hash_length' => $updatedResume->password ? strlen($updatedResume->password) : 0
            ]);
            
            if ($isProtected) {
                return redirect('/dashboard')->with('success', '✅ Wachtwoordbeveiliging succesvol ingesteld! Bezoekers moeten nu het wachtwoord invoeren om je CV te kunnen downloaden.');
            } else {
                return redirect('/dashboard')->with('success', '🔓 Wachtwoordbeveiliging is uitgeschakeld. Je CV kan nu zonder wachtwoord gedownload worden.');
            }
        } catch (\Exception $e) {
            Log::error('Fout bij instellen wachtwoord: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/dashboard')->with('error', 'Fout bij instellen wachtwoord: ' . $e->getMessage());
        }
    }
    
    // Debug route om de huidige wachtwoord status te controleren
    public function checkPasswordStatus()
    {
        if (!Session::get('admin_logged_in')) {
            return response()->json(['error' => 'Geen toegang'], 403);
        }
        
        $resume = DB::table('resumes')->first();
        
        if (!$resume) {
            return response()->json(['error' => 'Geen CV gevonden'], 404);
        }
        
        // Debug SQL query om te zien wat er precies in de database staat
        $rawData = DB::select('SELECT * FROM resumes WHERE id = ?', [$resume->id]);
        
        return response()->json([
            'id' => $resume->id,
            'is_protected' => (bool)$resume->is_protected,
            'is_protected_raw' => $resume->is_protected,
            'has_password' => !empty($resume->password),
            'password_hash' => $resume->password ? substr($resume->password, 0, 20) . '...' : null,
            'password_hash_length' => $resume->password ? strlen($resume->password) : 0,
            'raw_data' => $rawData[0] ?? null
        ]);
    }
    
    public function deleteResume()
    {
        // Controleer admin login
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        try {
            // Haal het huidige CV op
            $resume = DB::table('resumes')->first();
            
            if ($resume && !empty($resume->file_path)) {
                // Verwijder het bestand uit de opslag
                Storage::disk('public')->delete($resume->file_path);
            }
            
            // Verwijder het record uit de database
            DB::table('resumes')->truncate();
            
            return redirect('/dashboard')->with('success', 'CV succesvol verwijderd');
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'Fout bij verwijderen: ' . $e->getMessage());
        }
    }
}
