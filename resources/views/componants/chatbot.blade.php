<!-- Modern AI Chatbot -->
<div id="chatbot-container" class="chatbot-container">
    <!-- Chatbot Button -->
    <button id="chatbot-toggle" class="chatbot-toggle" aria-label="Open chatbot">
        <i class="bi bi-chat-dots-fill"></i>
        <span class="chatbot-pulse"></span>
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="chatbot-window">
        <!-- Header -->
        <div class="chatbot-header">
            <div class="chatbot-header-content">
                <div class="chatbot-avatar">
                    <i class="bi bi-robot"></i>
                </div>
                <div class="chatbot-header-text">
                    <h6 class="chatbot-name">EG Assistant</h6>
                    <span class="chatbot-status">Online · Typing...</span>
                </div>
            </div>
            <button id="chatbot-close" class="chatbot-close" aria-label="Close chatbot">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Messages Container -->
        <div id="chatbot-messages" class="chatbot-messages">
            <div class="chatbot-message chatbot-message-bot">
                <div class="chatbot-avatar-small">
                    <i class="bi bi-robot"></i>
                </div>
                <div class="chatbot-message-content">
                    <p>Hallo! 👋 Ik ben EG Assistant, je persoonlijke consultant voor web development en digitale oplossingen.</p>
                    <p>Hoe kan ik je vandaag helpen? Je kunt vragen stellen over:</p>
                    <ul class="chatbot-suggestions">
                        <li>🎯 Projecten & Portfolio</li>
                        <li>💼 Diensten & Consultancy</li>
                        <li>📅 Beschikbaarheid</li>
                        <li>💰 Prijzen & Offertes</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div id="chatbot-quick-actions" class="chatbot-quick-actions">
            <button class="chatbot-quick-btn" data-action="services">Diensten</button>
            <button class="chatbot-quick-btn" data-action="portfolio">Portfolio</button>
            <button class="chatbot-quick-btn" data-action="wizard">✨ Project Wizard</button>
        </div>

        <!-- Consulting Wizard Form -->
        <div id="chatbot-wizard" class="chatbot-wizard" style="display: none;">
            <div class="wizard-header">
                <h6>Project Consultancy Wizard</h6>
                <button id="wizard-close" class="wizard-close-btn">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            
            <div class="wizard-progress">
                <div class="wizard-progress-bar" id="wizard-progress-bar"></div>
            </div>
            
            <div class="wizard-steps">
                <!-- Step 1: Project Type -->
                <div class="wizard-step active" data-step="1">
                    <h6>Wat voor project heb je in gedachten?</h6>
                    <div class="wizard-options">
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="website">
                            <div class="wizard-option-content">
                                <i class="bi bi-globe"></i>
                                <span>Website</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="webapp">
                            <div class="wizard-option-content">
                                <i class="bi bi-app"></i>
                                <span>Web App</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="ecommerce">
                            <div class="wizard-option-content">
                                <i class="bi bi-cart"></i>
                                <span>E-commerce</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="mobile">
                            <div class="wizard-option-content">
                                <i class="bi bi-phone"></i>
                                <span>Mobile App</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="saas">
                            <div class="wizard-option-content">
                                <i class="bi bi-cloud"></i>
                                <span>SaaS Platform</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="project_type" value="other">
                            <div class="wizard-option-content">
                                <i class="bi bi-question-circle"></i>
                                <span>Anders</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 2: Budget -->
                <div class="wizard-step" data-step="2">
                    <h6>Wat is je geschatte budget?</h6>
                    <div class="wizard-options">
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="under-2k">
                            <div class="wizard-option-content">
                                <span>Onder €2.000</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="2k-5k">
                            <div class="wizard-option-content">
                                <span>€2.000 - €5.000</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="5k-10k">
                            <div class="wizard-option-content">
                                <span>€5.000 - €10.000</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="10k-25k">
                            <div class="wizard-option-content">
                                <span>€10.000 - €25.000</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="25k-plus">
                            <div class="wizard-option-content">
                                <span>€25.000+</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="budget" value="discuss">
                            <div class="wizard-option-content">
                                <span>Liever bespreken</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 3: Timeline -->
                <div class="wizard-step" data-step="3">
                    <h6>Wanneer wil je starten?</h6>
                    <div class="wizard-options">
                        <label class="wizard-option">
                            <input type="radio" name="timeline" value="asap">
                            <div class="wizard-option-content">
                                <span>Zo snel mogelijk</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="timeline" value="1-month">
                            <div class="wizard-option-content">
                                <span>Binnen 1 maand</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="timeline" value="3-months">
                            <div class="wizard-option-content">
                                <span>Binnen 3 maanden</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="timeline" value="6-months">
                            <div class="wizard-option-content">
                                <span>Binnen 6 maanden</span>
                            </div>
                        </label>
                        <label class="wizard-option">
                            <input type="radio" name="timeline" value="flexible">
                            <div class="wizard-option-content">
                                <span>Flexibel</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 4: Features -->
                <div class="wizard-step" data-step="4">
                    <h6>Welke features zijn belangrijk? (meerdere opties mogelijk)</h6>
                    <div class="wizard-checkboxes">
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="responsive">
                            <span>Responsive Design</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="cms">
                            <span>Content Management (CMS)</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="payment">
                            <span>Payment Integratie</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="booking">
                            <span>Booking/Reservering Systeem</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="auth">
                            <span>Gebruikersaccounts</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="api">
                            <span>API Integraties</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="seo">
                            <span>SEO Optimalisatie</span>
                        </label>
                        <label class="wizard-checkbox">
                            <input type="checkbox" name="features[]" value="analytics">
                            <span>Analytics & Tracking</span>
                        </label>
                    </div>
                </div>

                <!-- Step 5: Contact Info -->
                <div class="wizard-step" data-step="5">
                    <h6>Laat je contactgegevens achter</h6>
                    <div class="wizard-form-fields">
                        <div class="wizard-field">
                            <label>Naam *</label>
                            <input type="text" name="name" required placeholder="Je volledige naam">
                        </div>
                        <div class="wizard-field">
                            <label>Email *</label>
                            <input type="email" name="email" required placeholder="je@email.nl">
                        </div>
                        <div class="wizard-field">
                            <label>Telefoon</label>
                            <input type="tel" name="phone" placeholder="+31 6 12345678">
                        </div>
                        <div class="wizard-field">
                            <label>Bedrijf</label>
                            <input type="text" name="company" placeholder="Je bedrijfsnaam">
                        </div>
                        <div class="wizard-field">
                            <label>Extra informatie</label>
                            <textarea name="message" rows="3" placeholder="Vertel meer over je project..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Summary -->
                <div class="wizard-step" data-step="6">
                    <h6>Samenvatting</h6>
                    <div class="wizard-summary" id="wizard-summary">
                        <!-- Summary will be generated here -->
                    </div>
                </div>
            </div>

            <div class="wizard-actions">
                <button id="wizard-prev" class="wizard-btn wizard-btn-secondary" style="display: none;">
                    <i class="bi bi-arrow-left"></i> Vorige
                </button>
                <button id="wizard-next" class="wizard-btn wizard-btn-primary">
                    Volgende <i class="bi bi-arrow-right"></i>
                </button>
                <button id="wizard-submit" class="wizard-btn wizard-btn-primary" style="display: none;">
                    <i class="bi bi-send"></i> Verstuur
                </button>
            </div>
        </div>

        <!-- Input Area -->
        <div class="chatbot-input-area">
            <input type="text" id="chatbot-input" class="chatbot-input" placeholder="Type je vraag..." autocomplete="off">
            <button id="chatbot-send" class="chatbot-send-btn" aria-label="Send message">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>
</div>

<style>
.chatbot-container {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

.chatbot-toggle {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(var(--color-primary-rgb), 0.4);
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 30px rgba(var(--color-primary-rgb), 0.5);
}

.chatbot-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: var(--color-primary);
    animation: pulse 2s infinite;
    opacity: 0.6;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 0.6;
    }
    50% {
        transform: scale(1.2);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}

.chatbot-window {
    position: absolute;
    bottom: 80px;
    right: 0;
    width: 380px;
    max-width: calc(100vw - 48px);
    height: 600px;
    max-height: calc(100vh - 120px);
    background: var(--color-card-bg);
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    display: none;
    flex-direction: column;
    overflow: hidden;
    border: 1px solid rgba(var(--color-primary-rgb), 0.1);
}

.chatbot-window.active {
    display: flex;
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.chatbot-header {
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-header-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.chatbot-header-text {
    display: flex;
    flex-direction: column;
}

.chatbot-name {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.chatbot-status {
    font-size: 12px;
    opacity: 0.9;
}

.chatbot-close {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.chatbot-close:hover {
    background: rgba(255, 255, 255, 0.3);
}

.chatbot-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    background: var(--color-bg);
}

.chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: transparent;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: rgba(var(--color-primary-rgb), 0.2);
    border-radius: 3px;
}

.chatbot-message {
    display: flex;
    gap: 12px;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.chatbot-message-user {
    flex-direction: row-reverse;
}

.chatbot-avatar-small {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.chatbot-message-user .chatbot-avatar-small {
    background: var(--color-text);
}

.chatbot-message-content {
    max-width: 75%;
    padding: 12px 16px;
    border-radius: 18px;
    background: var(--color-bg-alt);
    color: var(--color-text);
    line-height: 1.5;
}

.chatbot-message-user .chatbot-message-content {
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
}

.chatbot-message-content p {
    margin: 0 0 8px 0;
}

.chatbot-message-content p:last-child {
    margin-bottom: 0;
}

.chatbot-message-content ul {
    margin: 8px 0 0 0;
    padding-left: 20px;
}

.chatbot-suggestions {
    list-style: none;
    padding: 0;
    margin: 8px 0 0 0;
}

.chatbot-suggestions li {
    padding: 4px 0;
    font-size: 14px;
}

.chatbot-quick-actions {
    display: flex;
    gap: 8px;
    padding: 12px 20px;
    background: var(--color-bg-alt);
    border-top: 1px solid rgba(var(--color-primary-rgb), 0.1);
}

.chatbot-quick-btn {
    flex: 1;
    padding: 8px 12px;
    background: var(--color-card-bg);
    border: 1px solid rgba(var(--color-primary-rgb), 0.2);
    border-radius: 12px;
    color: var(--color-text);
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
}

.chatbot-quick-btn:hover {
    background: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
    transform: translateY(-2px);
}

.chatbot-input-area {
    display: flex;
    gap: 8px;
    padding: 16px 20px;
    background: var(--color-card-bg);
    border-top: 1px solid rgba(var(--color-primary-rgb), 0.1);
}

.chatbot-input {
    flex: 1;
    padding: 12px 16px;
    border: 1px solid rgba(var(--color-primary-rgb), 0.2);
    border-radius: 24px;
    background: var(--color-bg);
    color: var(--color-text);
    font-size: 14px;
    outline: none;
    transition: all 0.2s;
}

.chatbot-input:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
}

.chatbot-send-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    border: none;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.chatbot-send-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(var(--color-primary-rgb), 0.4);
}

.chatbot-typing {
    display: flex;
    gap: 4px;
    padding: 12px 16px;
}

.chatbot-typing span {
    width: 8px;
    height: 8px;
    background: var(--color-primary);
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.chatbot-typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.chatbot-typing span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
        opacity: 0.7;
    }
    30% {
        transform: translateY(-10px);
        opacity: 1;
    }
}

/* Wizard Form Styles */
.chatbot-wizard {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--color-card-bg);
    display: flex;
    flex-direction: column;
    z-index: 10;
}

.wizard-header {
    padding: 16px 20px;
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.wizard-header h6 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.wizard-close-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.wizard-close-btn:hover {
    background: rgba(255, 255, 255, 0.3);
}

.wizard-progress {
    height: 4px;
    background: var(--color-bg-alt);
    position: relative;
}

.wizard-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--color-primary), var(--color-primary-alt));
    transition: width 0.3s ease;
    width: 16.66%;
}

.wizard-steps {
    flex: 1;
    overflow-y: auto;
    padding: 24px 20px;
}

.wizard-step {
    display: none;
    animation: fadeIn 0.3s ease;
}

.wizard-step.active {
    display: block;
}

.wizard-step h6 {
    margin: 0 0 20px 0;
    font-size: 16px;
    font-weight: 600;
    color: var(--color-text);
}

.wizard-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

.wizard-option {
    cursor: pointer;
    margin: 0;
}

.wizard-option input[type="radio"] {
    display: none;
}

.wizard-option-content {
    padding: 16px;
    border: 2px solid rgba(var(--color-primary-rgb), 0.2);
    border-radius: 12px;
    background: var(--color-bg);
    color: var(--color-text);
    text-align: center;
    transition: all 0.2s;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.wizard-option-content i {
    font-size: 24px;
    color: var(--color-primary);
}

.wizard-option input[type="radio"]:checked + .wizard-option-content {
    border-color: var(--color-primary);
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(var(--color-primary-rgb), 0.3);
}

.wizard-option input[type="radio"]:checked + .wizard-option-content i {
    color: white;
}

.wizard-checkboxes {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.wizard-checkbox {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border: 2px solid rgba(var(--color-primary-rgb), 0.2);
    border-radius: 12px;
    background: var(--color-bg);
    cursor: pointer;
    transition: all 0.2s;
}

.wizard-checkbox:hover {
    border-color: var(--color-primary);
    background: var(--color-bg-alt);
}

.wizard-checkbox input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: var(--color-primary);
}

.wizard-checkbox input[type="checkbox"]:checked + span {
    color: var(--color-primary);
    font-weight: 600;
}

.wizard-form-fields {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.wizard-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.wizard-field label {
    font-size: 14px;
    font-weight: 600;
    color: var(--color-text);
}

.wizard-field input,
.wizard-field textarea {
    padding: 12px 16px;
    border: 2px solid rgba(var(--color-primary-rgb), 0.2);
    border-radius: 12px;
    background: var(--color-bg);
    color: var(--color-text);
    font-size: 14px;
    font-family: inherit;
    transition: all 0.2s;
    outline: none;
}

.wizard-field input:focus,
.wizard-field textarea:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.1);
}

.wizard-field textarea {
    resize: vertical;
    min-height: 80px;
}

.wizard-summary {
    background: var(--color-bg-alt);
    border-radius: 12px;
    padding: 20px;
}

.wizard-summary-item {
    padding: 12px 0;
    border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.1);
}

.wizard-summary-item:last-child {
    border-bottom: none;
}

.wizard-summary-label {
    font-weight: 600;
    color: var(--color-primary);
    font-size: 13px;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.wizard-summary-value {
    color: var(--color-text);
    font-size: 14px;
}

.wizard-actions {
    padding: 16px 20px;
    background: var(--color-card-bg);
    border-top: 1px solid rgba(var(--color-primary-rgb), 0.1);
    display: flex;
    gap: 12px;
    justify-content: space-between;
}

.wizard-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.wizard-btn-primary {
    background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
    color: white;
    flex: 1;
    justify-content: center;
}

.wizard-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(var(--color-primary-rgb), 0.4);
}

.wizard-btn-secondary {
    background: var(--color-bg-alt);
    color: var(--color-text);
    border: 2px solid rgba(var(--color-primary-rgb), 0.2);
}

.wizard-btn-secondary:hover {
    border-color: var(--color-primary);
    background: var(--color-bg);
}

.wizard-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

@media (max-width: 768px) {
    .chatbot-container {
        bottom: 16px;
        right: 16px;
    }
    
    .chatbot-window {
        width: calc(100vw - 32px);
        height: calc(100vh - 100px);
        bottom: 80px;
    }
    
    .wizard-options {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
(function() {
    const chatbot = {
        isOpen: false,
        knowledgeBase: {
            services: {
                keywords: ['diensten', 'services', 'wat bied je', 'wat kan je', 'aanbod', 'wat doe je'],
                response: 'Ik bied premium web development, UI/UX design en e-commerce oplossingen. Mijn diensten omvatten:\n\n✨ **Web Development**\n- Next.js & Laravel platforms\n- React Native mobile apps\n- Custom SaaS oplossingen\n\n🎨 **Design & Branding**\n- UI/UX design\n- Brand identity\n- Design systems\n\n🛒 **E-commerce**\n- Shopify development\n- Custom webshops\n- Payment integraties\n\nWil je meer weten over een specifieke dienst?'
            },
            portfolio: {
                keywords: ['portfolio', 'projecten', 'werk', 'voorbeelden', 'cases', 'wat heb je gemaakt'],
                response: 'Ik heb gewerkt aan diverse projecten:\n\n🎯 **OnTourly** - Tourmanagement platform\n📱 **Mobile Apps** - React Native & Expo\n🍽️ **Restaurant Websites** - Massawa, Moso Basmara, Savanna\n💼 **Business Platforms** - Alpha Group, MARCOFIC\n⏰ **SaaS Producten** - Awet Clok System, E-boekhouding\n\nBekijk mijn volledige portfolio op de website voor meer details!'
            },
            contact: {
                keywords: ['contact', 'bereikbaar', 'email', 'telefoon', 'afspraak', 'meeting'],
                response: 'Je kunt me bereiken via:\n\n📧 **Email:** Eyobielgoitom10@gmail.com\n📱 **Telefoon:** +31 6 0000 0000\n📍 **Locatie:** Zweedsestraat 8a, 16 · 7418 BG Deventer\n⏰ **Beschikbaarheid:** Ma–Vr 09:00–18:00 · weekend op afspraak\n\nOf gebruik het contactformulier op de website voor een directe vraag!'
            },
            pricing: {
                keywords: ['prijs', 'prijzen', 'kosten', 'tarief', 'offerte', 'quote', 'budget', 'hoeveel'],
                response: 'Prijzen zijn afhankelijk van project scope en complexiteit:\n\n💡 **Consultancy** - Vanaf €75/uur\n🌐 **Website Development** - Vanaf €1.500\n📱 **Mobile Apps** - Vanaf €3.000\n🛒 **E-commerce** - Vanaf €2.500\n💼 **SaaS Platforms** - Op maat\n\nIk bied altijd een vrijblijvende offerte op basis van jouw specifieke behoeften. Laten we een gesprek inplannen?'
            },
            availability: {
                keywords: ['beschikbaar', 'availability', 'wanneer', 'tijd', 'planning', 'capaciteit'],
                response: 'Mijn beschikbaarheid:\n\n✅ **Standaard:** Ma–Vr 09:00–18:00\n📅 **Weekend:** Op afspraak\n🚀 **Nieuwe projecten:** Momenteel beschikbaar\n\nVoor urgente projecten of specifieke deadlines, neem contact op voor een gepersonaliseerde planning!'
            },
            technology: {
                keywords: ['technologie', 'tech stack', 'welke technologie', 'programmeertaal', 'framework'],
                response: 'Mijn tech stack:\n\n⚡ **Frontend:** Next.js, React, TypeScript, Tailwind CSS\n🔧 **Backend:** Laravel, PHP 8.x, Node.js\n📱 **Mobile:** React Native, Expo\n💾 **Database:** PostgreSQL, MySQL, MongoDB, Supabase\n☁️ **Cloud:** Vercel, Render, AWS\n🛒 **E-commerce:** Shopify, Stripe\n\nIk kies altijd de beste technologie voor jouw specifieke project!'
            },
            default: {
                response: 'Bedankt voor je vraag! Ik help je graag verder. Je kunt vragen stellen over:\n\n• Mijn diensten en expertise\n• Portfolio en projecten\n• Beschikbaarheid en planning\n• Prijzen en offertes\n• Technologieën die ik gebruik\n\nOf gebruik de quick action buttons hieronder voor snelle antwoorden!'
            }
        },

        init: function() {
            const toggle = document.getElementById('chatbot-toggle');
            const close = document.getElementById('chatbot-close');
            const window = document.getElementById('chatbot-window');
            const sendBtn = document.getElementById('chatbot-send');
            const input = document.getElementById('chatbot-input');
            const quickActions = document.querySelectorAll('.chatbot-quick-btn');

            toggle?.addEventListener('click', () => this.toggle());
            close?.addEventListener('click', () => this.close());
            sendBtn?.addEventListener('click', () => this.sendMessage());
            input?.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') this.sendMessage();
            });

            quickActions.forEach(btn => {
                btn.addEventListener('click', () => {
                    const action = btn.dataset.action;
                    this.handleQuickAction(action);
                });
            });
        },

        toggle: function() {
            const window = document.getElementById('chatbot-window');
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                window.classList.add('active');
                document.getElementById('chatbot-input')?.focus();
            } else {
                this.close();
            }
        },

        close: function() {
            const window = document.getElementById('chatbot-window');
            this.isOpen = false;
            window.classList.remove('active');
        },

        sendMessage: function() {
            const input = document.getElementById('chatbot-input');
            const message = input?.value.trim();
            if (!message) return;

            this.addMessage(message, 'user');
            input.value = '';

            // Show typing indicator
            this.showTyping();

            // Simulate thinking time
            setTimeout(() => {
                this.hideTyping();
                const response = this.getResponse(message);
                this.addMessage(response, 'bot');
            }, 1000 + Math.random() * 1000);
        },

        addMessage: function(text, type) {
            const messages = document.getElementById('chatbot-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `chatbot-message chatbot-message-${type}`;

            if (type === 'bot') {
                messageDiv.innerHTML = `
                    <div class="chatbot-avatar-small">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div class="chatbot-message-content">
                        ${this.formatMessage(text)}
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="chatbot-avatar-small">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="chatbot-message-content">
                        ${this.escapeHtml(text)}
                    </div>
                `;
            }

            messages.appendChild(messageDiv);
            messages.scrollTop = messages.scrollHeight;
        },

        formatMessage: function(text) {
            // Convert markdown-like formatting to HTML
            return text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\n/g, '<br>')
                .replace(/^• /gm, '• ');
        },

        escapeHtml: function(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        },

        showTyping: function() {
            const messages = document.getElementById('chatbot-messages');
            const typingDiv = document.createElement('div');
            typingDiv.className = 'chatbot-message chatbot-message-bot';
            typingDiv.id = 'chatbot-typing-indicator';
            typingDiv.innerHTML = `
                <div class="chatbot-avatar-small">
                    <i class="bi bi-robot"></i>
                </div>
                <div class="chatbot-message-content">
                    <div class="chatbot-typing">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            `;
            messages.appendChild(typingDiv);
            messages.scrollTop = messages.scrollHeight;
        },

        hideTyping: function() {
            const typing = document.getElementById('chatbot-typing-indicator');
            typing?.remove();
        },

        getResponse: function(message) {
            const lowerMessage = message.toLowerCase();
            
            // Check each knowledge base category
            for (const [key, data] of Object.entries(this.knowledgeBase)) {
                if (key === 'default') continue;
                
                const matches = data.keywords.some(keyword => 
                    lowerMessage.includes(keyword)
                );
                
                if (matches) {
                    return data.response;
                }
            }

            // Default response
            return this.knowledgeBase.default.response;
        },

        handleQuickAction: function(action) {
            if (action === 'wizard') {
                this.startWizard();
                return;
            }

            const responses = {
                services: this.knowledgeBase.services.response,
                portfolio: this.knowledgeBase.portfolio.response,
                contact: this.knowledgeBase.contact.response
            };

            this.showTyping();
            setTimeout(() => {
                this.hideTyping();
                this.addMessage(responses[action] || this.knowledgeBase.default.response, 'bot');
            }, 800);
        },

        startWizard: function() {
            const wizard = document.getElementById('chatbot-wizard');
            const messages = document.getElementById('chatbot-messages');
            const quickActions = document.getElementById('chatbot-quick-actions');
            const inputArea = document.querySelector('.chatbot-input-area');

            if (wizard && messages && quickActions && inputArea) {
                messages.style.display = 'none';
                quickActions.style.display = 'none';
                inputArea.style.display = 'none';
                wizard.style.display = 'flex';
                wizardManager.init();
            }
        },

        closeWizard: function() {
            const wizard = document.getElementById('chatbot-wizard');
            const messages = document.getElementById('chatbot-messages');
            const quickActions = document.getElementById('chatbot-quick-actions');
            const inputArea = document.querySelector('.chatbot-input-area');

            if (wizard && messages && quickActions && inputArea) {
                wizard.style.display = 'none';
                messages.style.display = 'flex';
                quickActions.style.display = 'flex';
                inputArea.style.display = 'flex';
                wizardManager.reset();
            }
        }
    };

    // Wizard Manager
    const wizardManager = {
        currentStep: 1,
        totalSteps: 6,
        formData: {},

        init: function() {
            const closeBtn = document.getElementById('wizard-close');
            const prevBtn = document.getElementById('wizard-prev');
            const nextBtn = document.getElementById('wizard-next');
            const submitBtn = document.getElementById('wizard-submit');

            closeBtn?.addEventListener('click', () => chatbot.closeWizard());
            prevBtn?.addEventListener('click', () => this.prevStep());
            nextBtn?.addEventListener('click', () => this.nextStep());
            submitBtn?.addEventListener('click', () => this.submitForm());

            this.updateProgress();
            this.updateButtons();
        },

        reset: function() {
            this.currentStep = 1;
            this.formData = {};
            const steps = document.querySelectorAll('.wizard-step');
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === 0);
            });
            this.updateProgress();
            this.updateButtons();
        },

        nextStep: function() {
            if (!this.validateStep()) return;

            if (this.currentStep < this.totalSteps) {
                // Save step data
                this.saveStepData();

                // Move to next step
                const currentStepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep}"]`);
                const nextStepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep + 1}"]`);

                currentStepEl?.classList.remove('active');
                nextStepEl?.classList.add('active');

                this.currentStep++;
                this.updateProgress();
                this.updateButtons();

                // Generate summary on last step
                if (this.currentStep === this.totalSteps) {
                    this.generateSummary();
                }
            }
        },

        prevStep: function() {
            if (this.currentStep > 1) {
                const currentStepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep}"]`);
                const prevStepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep - 1}"]`);

                currentStepEl?.classList.remove('active');
                prevStepEl?.classList.add('active');

                this.currentStep--;
                this.updateProgress();
                this.updateButtons();
            }
        },

        validateStep: function() {
            const stepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep}"]`);
            if (!stepEl) return false;

            // Step 1: Project Type
            if (this.currentStep === 1) {
                const selected = stepEl.querySelector('input[name="project_type"]:checked');
                if (!selected) {
                    alert('Selecteer een projecttype om door te gaan.');
                    return false;
                }
            }

            // Step 2: Budget
            if (this.currentStep === 2) {
                const selected = stepEl.querySelector('input[name="budget"]:checked');
                if (!selected) {
                    alert('Selecteer een budget om door te gaan.');
                    return false;
                }
            }

            // Step 3: Timeline
            if (this.currentStep === 3) {
                const selected = stepEl.querySelector('input[name="timeline"]:checked');
                if (!selected) {
                    alert('Selecteer een tijdlijn om door te gaan.');
                    return false;
                }
            }

            // Step 5: Contact Info
            if (this.currentStep === 5) {
                const name = stepEl.querySelector('input[name="name"]')?.value.trim();
                const email = stepEl.querySelector('input[name="email"]')?.value.trim();
                
                if (!name || !email) {
                    alert('Vul ten minste naam en email in om door te gaan.');
                    return false;
                }

                // Validate email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert('Voer een geldig emailadres in.');
                    return false;
                }
            }

            return true;
        },

        saveStepData: function() {
            const stepEl = document.querySelector(`.wizard-step[data-step="${this.currentStep}"]`);
            if (!stepEl) return;

            // Save radio buttons
            const radios = stepEl.querySelectorAll('input[type="radio"]:checked');
            radios.forEach(radio => {
                this.formData[radio.name] = radio.value;
            });

            // Save checkboxes
            const checkboxes = stepEl.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length > 0) {
                this.formData['features'] = Array.from(checkboxes).map(cb => cb.value);
            }

            // Save text inputs
            const inputs = stepEl.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea');
            inputs.forEach(input => {
                if (input.value.trim()) {
                    this.formData[input.name] = input.value.trim();
                }
            });
        },

        generateSummary: function() {
            const summaryEl = document.getElementById('wizard-summary');
            if (!summaryEl) return;

            const projectTypes = {
                'website': 'Website',
                'webapp': 'Web App',
                'ecommerce': 'E-commerce',
                'mobile': 'Mobile App',
                'saas': 'SaaS Platform',
                'other': 'Anders'
            };

            const budgets = {
                'under-2k': 'Onder €2.000',
                '2k-5k': '€2.000 - €5.000',
                '5k-10k': '€5.000 - €10.000',
                '10k-25k': '€10.000 - €25.000',
                '25k-plus': '€25.000+',
                'discuss': 'Liever bespreken'
            };

            const timelines = {
                'asap': 'Zo snel mogelijk',
                '1-month': 'Binnen 1 maand',
                '3-months': 'Binnen 3 maanden',
                '6-months': 'Binnen 6 maanden',
                'flexible': 'Flexibel'
            };

            const features = {
                'responsive': 'Responsive Design',
                'cms': 'Content Management (CMS)',
                'payment': 'Payment Integratie',
                'booking': 'Booking/Reservering Systeem',
                'auth': 'Gebruikersaccounts',
                'api': 'API Integraties',
                'seo': 'SEO Optimalisatie',
                'analytics': 'Analytics & Tracking'
            };

            let html = '';
            
            if (this.formData.project_type) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Project Type</div>
                    <div class="wizard-summary-value">${projectTypes[this.formData.project_type] || this.formData.project_type}</div>
                </div>`;
            }

            if (this.formData.budget) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Budget</div>
                    <div class="wizard-summary-value">${budgets[this.formData.budget] || this.formData.budget}</div>
                </div>`;
            }

            if (this.formData.timeline) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Timeline</div>
                    <div class="wizard-summary-value">${timelines[this.formData.timeline] || this.formData.timeline}</div>
                </div>`;
            }

            if (this.formData.features && this.formData.features.length > 0) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Features</div>
                    <div class="wizard-summary-value">${this.formData.features.map(f => features[f] || f).join(', ')}</div>
                </div>`;
            }

            if (this.formData.name) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Naam</div>
                    <div class="wizard-summary-value">${this.formData.name}</div>
                </div>`;
            }

            if (this.formData.email) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Email</div>
                    <div class="wizard-summary-value">${this.formData.email}</div>
                </div>`;
            }

            if (this.formData.phone) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Telefoon</div>
                    <div class="wizard-summary-value">${this.formData.phone}</div>
                </div>`;
            }

            if (this.formData.company) {
                html += `<div class="wizard-summary-item">
                    <div class="wizard-summary-label">Bedrijf</div>
                    <div class="wizard-summary-value">${this.formData.company}</div>
                </div>`;
            }

            summaryEl.innerHTML = html || '<p>Geen gegevens beschikbaar.</p>';
        },

        updateProgress: function() {
            const progressBar = document.getElementById('wizard-progress-bar');
            if (progressBar) {
                const percentage = (this.currentStep / this.totalSteps) * 100;
                progressBar.style.width = percentage + '%';
            }
        },

        updateButtons: function() {
            const prevBtn = document.getElementById('wizard-prev');
            const nextBtn = document.getElementById('wizard-next');
            const submitBtn = document.getElementById('wizard-submit');

            if (prevBtn) {
                prevBtn.style.display = this.currentStep > 1 ? 'flex' : 'none';
            }

            if (nextBtn && submitBtn) {
                if (this.currentStep === this.totalSteps) {
                    nextBtn.style.display = 'none';
                    submitBtn.style.display = 'flex';
                } else {
                    nextBtn.style.display = 'flex';
                    submitBtn.style.display = 'none';
                }
            }
        },

        submitForm: function() {
            // Save final step data
            this.saveStepData();

            // Build message from form data
            let message = 'Nieuwe project consultatie aanvraag:\n\n';
            message += `Project Type: ${this.formData.project_type || 'Niet opgegeven'}\n`;
            message += `Budget: ${this.formData.budget || 'Niet opgegeven'}\n`;
            message += `Timeline: ${this.formData.timeline || 'Niet opgegeven'}\n`;
            
            if (this.formData.features && this.formData.features.length > 0) {
                message += `Features: ${this.formData.features.join(', ')}\n`;
            }
            
            message += `\nContactgegevens:\n`;
            message += `Naam: ${this.formData.name || 'Niet opgegeven'}\n`;
            message += `Email: ${this.formData.email || 'Niet opgegeven'}\n`;
            if (this.formData.phone) message += `Telefoon: ${this.formData.phone}\n`;
            if (this.formData.company) message += `Bedrijf: ${this.formData.company}\n`;
            if (this.formData.message) message += `\nExtra info: ${this.formData.message}\n`;

            // Submit via contact form
            const formData = new FormData();
            formData.append('name', this.formData.name || '');
            formData.append('email', this.formData.email || '');
            formData.append('subject', 'Project Consultatie via Chatbot Wizard');
            formData.append('message', message);

            // Show loading
            const submitBtn = document.getElementById('wizard-submit');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Verzenden...';
            }

            const contactRoute = document.querySelector('meta[name="contact-route"]')?.content || '/contact';
            fetch(contactRoute, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok || response.redirected) {
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="bi bi-check-circle"></i> Verzonden!';
                        submitBtn.style.background = '#10b981';
                    }

                    setTimeout(() => {
                        chatbot.closeWizard();
                        chatbot.addMessage('Bedankt! Je project consultatie is verzonden. Ik neem zo snel mogelijk contact met je op! 🎉', 'bot');
                    }, 1500);
                } else {
                    throw new Error('Submission failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="bi bi-send"></i> Verstuur';
                }
                alert('Er is een fout opgetreden. Probeer het later opnieuw of gebruik het contactformulier.');
            });
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => chatbot.init());
    } else {
        chatbot.init();
    }
})();
</script>
