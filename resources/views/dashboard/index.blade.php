@extends('app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-primary fw-bolder">Admin Dashboard</h1>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Uitloggen</button>
                </form>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                </div>
            @endif

            <!-- Resume Management -->
            <div class="card shadow border-0 rounded-4 mb-5">
                <div class="card-body p-5">
                    <h3 class="fw-bolder mb-4">CV Beheer</h3>
                    
                    @if($resumeInfo)
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Huidige CV:</strong> {{ $resumeInfo->original_filename }}
                                @if($resumeInfo->is_protected && $resumeInfo->password)
                                    <span class="badge bg-warning ms-2">
                                        <i class="bi bi-lock-fill me-1"></i>Beveiligd met wachtwoord
                                    </span>
                                @else
                                    <span class="badge bg-secondary ms-2">
                                        <i class="bi bi-unlock me-1"></i>Geen wachtwoord
                                    </span>
                                @endif
                                
                                <div class="mt-2 small">
                                    <strong>Status:</strong> 
                                    @if($resumeInfo->is_protected && $resumeInfo->password)
                                        <span class="text-success">Wachtwoord ingesteld en beveiliging ingeschakeld</span>
                                    @elseif($resumeInfo->password && !$resumeInfo->is_protected)
                                        <span class="text-warning">Wachtwoord ingesteld maar beveiliging uitgeschakeld</span>
                                    @elseif($resumeInfo->is_protected && !$resumeInfo->password)
                                        <span class="text-danger">Beveiliging ingeschakeld maar geen wachtwoord ingesteld</span>
                                    @else
                                        <span class="text-secondary">Geen wachtwoordbeveiliging</span>
                                    @endif
                                </div>
                            </div>
                            <form method="POST" action="{{ route('resume.delete') }}" onsubmit="return confirm('Weet je zeker dat je het CV wilt verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Verwijderen</button>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <strong>Geen CV geüpload</strong>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('resume.update') }}" enctype="multipart/form-data" id="resumeForm">
                        @csrf
                        <div class="mb-3">
                            <label for="resume_file" class="form-label">CV Bestand</label>
                            <input type="file" class="form-control" id="resume_file" name="resume_file" accept=".pdf,.doc,.docx" required>
                            <div class="form-text">Alleen PDF, DOC, DOCX bestanden toegestaan (max 10MB)</div>
                        </div>
                        <button type="submit" class="btn btn-primary">CV Uploaden</button>
                    </form>
                </div>
            </div>

            <!-- Password Management -->
            <div class="card shadow border-0 rounded-4 mb-5">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bolder mb-0">
                            <i class="bi bi-shield-lock me-2"></i>Wachtwoord Beveiliging
                        </h3>
                        <button type="button" class="btn btn-sm btn-outline-info" id="checkPasswordStatusBtn">
                            <i class="bi bi-info-circle me-1"></i>Controleer Status
                        </button>
                    </div>
                    
                    <div id="passwordStatusInfo" class="alert alert-info mb-4" style="display: none;">
                        <h5>Wachtwoord Status:</h5>
                        <div id="passwordStatusDetails"></div>
                    </div>
                    
                    @if(!$resumeInfo)
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Upload eerst een CV voordat je een wachtwoord kunt instellen.</strong>
                        </div>
                    @else
                        <form method="POST" action="{{ route('resume.password.update') }}" id="passwordForm">
                            @csrf
                            <!-- Hidden input om ervoor te zorgen dat we altijd weten of de checkbox is aangevinkt -->
                            <input type="hidden" name="is_protected_submitted" value="1">
                            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_protected" name="is_protected" value="1" {{ $resumeInfo && $resumeInfo->is_protected && $resumeInfo->password ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_protected">
                                        <i class="bi {{ $resumeInfo && $resumeInfo->is_protected && $resumeInfo->password ? 'bi-lock-fill' : 'bi-unlock' }} me-1"></i>
                                        Beveilig CV met wachtwoord
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3" id="passwordField" style="{{ $resumeInfo && $resumeInfo->is_protected && $resumeInfo->password ? 'display: block;' : 'display: none;' }}">
                                <label for="password" class="form-label">
                                    <i class="bi bi-key me-1"></i>Wachtwoord
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" minlength="4">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="form-text">Minimaal 4 karakters. Dit wachtwoord is nodig om het CV te downloaden.</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="passwordSubmitBtn">
                                <i class="bi bi-shield-check me-1"></i>Wachtwoord Instellen
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Instructions -->
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="fw-bolder mb-4">
                        <i class="bi bi-info-circle me-2"></i>Instructies
                    </h3>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Voor bezoekers:</h5>
                            <ul>
                                <li>Iedereen kan de resume pagina bekijken</li>
                                <li>Om te downloaden moet het wachtwoord worden ingevoerd</li>
                                <li>Het wachtwoord kun je privé naar bedrijven sturen</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Voor jou (admin):</h5>
                            <ul>
                                <li>Upload eerst je CV</li>
                                <li>Stel daarna een wachtwoord in als je wilt</li>
                                <li>Deel het wachtwoord privé met bedrijven</li>
                                <li>Je kunt het CV verwijderen met de verwijderknop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Wachtwoord veld toggle
    document.addEventListener('DOMContentLoaded', function() {
        const isProtectedCheckbox = document.getElementById('is_protected');
        const passwordField = document.getElementById('passwordField');
        const passwordInput = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        
        if (isProtectedCheckbox) {
            // Event listener voor checkbox
            isProtectedCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    passwordField.style.display = 'block';
                    passwordInput.required = true;
                    
                    // Verander het icon
                    const label = this.nextElementSibling.querySelector('i');
                    if (label) {
                        label.className = 'bi bi-lock-fill me-1';
                    }
                } else {
                    passwordField.style.display = 'none';
                    passwordInput.required = false;
                    passwordInput.value = ''; // Leeg het wachtwoord veld
                    
                    // Verander het icon
                    const label = this.nextElementSibling.querySelector('i');
                    if (label) {
                        label.className = 'bi bi-unlock me-1';
                    }
                }
            });
        }
        
        // Wachtwoord tonen/verbergen
        if (togglePasswordBtn) {
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Verander het icon
                const icon = this.querySelector('i');
                icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
            });
        }
        
        // Form submit validatie
        const passwordForm = document.getElementById('passwordForm');
        if (passwordForm) {
            passwordForm.addEventListener('submit', function(event) {
                const isProtected = isProtectedCheckbox.checked;
                const password = passwordInput.value.trim();
                
                console.log('Form submit', { isProtected, hasPassword: password.length > 0 });
                
                if (isProtected && password.length < 4) {
                    event.preventDefault();
                    alert('Voer een wachtwoord in van minimaal 4 karakters');
                    return false;
                }
                
                const submitBtn = document.getElementById('passwordSubmitBtn');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Instellen...';
                }
                
                return true;
            });
        }
        
        // Check password status button
        const checkPasswordStatusBtn = document.getElementById('checkPasswordStatusBtn');
        const passwordStatusInfo = document.getElementById('passwordStatusInfo');
        const passwordStatusDetails = document.getElementById('passwordStatusDetails');
        
        if (checkPasswordStatusBtn) {
            checkPasswordStatusBtn.addEventListener('click', async function() {
                try {
                    checkPasswordStatusBtn.disabled = true;
                    checkPasswordStatusBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Controleren...';
                    
                    const response = await fetch('/dashboard/check-password');
                    const data = await response.json();
                    
                    console.log('Password status data:', data);
                    
                    let html = '<ul class="mb-0">';
                    if (data.error) {
                        html += `<li class="text-danger">${data.error}</li>`;
                    } else {
                        html += `<li><strong>CV ID:</strong> ${data.id}</li>`;
                        html += `<li><strong>Beveiliging ingeschakeld:</strong> ${data.is_protected ? 'Ja' : 'Nee'} (ruwe waarde: ${data.is_protected_raw})</li>`;
                        html += `<li><strong>Wachtwoord ingesteld:</strong> ${data.has_password ? 'Ja' : 'Nee'}</li>`;
                        if (data.password_hash) {
                            html += `<li><strong>Wachtwoord hash:</strong> ${data.password_hash}</li>`;
                            html += `<li><strong>Hash lengte:</strong> ${data.password_hash_length} tekens</li>`;
                        }
                        
                        // Toon ruwe data
                        if (data.raw_data) {
                            html += `<li><strong>Ruwe data:</strong> <pre class="mt-2 bg-light p-2">${JSON.stringify(data.raw_data, null, 2)}</pre></li>`;
                        }
                    }
                    html += '</ul>';
                    
                    passwordStatusDetails.innerHTML = html;
                    passwordStatusInfo.style.display = 'block';
                } catch (error) {
                    console.error('Fout bij ophalen wachtwoord status:', error);
                    passwordStatusDetails.innerHTML = '<div class="text-danger">Fout bij ophalen wachtwoord status</div>';
                    passwordStatusInfo.style.display = 'block';
                } finally {
                    checkPasswordStatusBtn.disabled = false;
                    checkPasswordStatusBtn.innerHTML = '<i class="bi bi-info-circle me-1"></i>Controleer Status';
                }
            });
        }
    });
</script>
@endsection 