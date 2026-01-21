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
            <button class="chatbot-quick-btn" data-action="contact">Contact</button>
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
