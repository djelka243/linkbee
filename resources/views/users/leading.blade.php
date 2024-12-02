<x-guest-layout>

    @include('users.components.nav')
   <!-- Hero Section -->
   <section class="relative h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated background circles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="gsap-circle-1 w-96 h-96 bg-purple-500 rounded-full opacity-10 absolute -top-20 -left-20"></div>
        <div class="gsap-circle-2 w-96 h-96 bg-blue-500 rounded-full opacity-10 absolute -bottom-20 -right-20"></div>
    </div>

    <!-- Hero content -->
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="gsap-hero-content space-y-6">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Créez Votre <span class="text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-600">Lofran Linkbee</span> unique
            </h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Rassemblez tous vos liens importants en un seul endroit élégant et personnalisable.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <a href="{{ route('users.signup') }}" 
                   class="gsap-cta-primary px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Commencer Gratuitement
                </a>
                <a href="#features" 
                   class="gsap-cta-secondary px-8 py-4 bg-white/10 text-white rounded-full font-semibold backdrop-blur-sm hover:bg-white/20 transition-all duration-300">
                    Découvrir Plus
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="gsap-scroll-indicator absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="w-6 h-10 border-2 flex justify-center border-white rounded-full p-1">
            <div class="w-1 h-3 bg-white rounded-full animate-scroll"></div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 relative overflow-hidden">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-white text-center mb-16" data-aos="fade-up">
            Fonctionnalités Exceptionnelles
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature Card 1 -->
            <div class="feature-card grid" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 hover:transform hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-paint-brush text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Design Personnalisable</h3>
                    <p class="text-gray-300">Créez une page unique qui reflète votre personnalité avec nos outils de personnalisation avancés.</p>
                </div>
            </div>

            <!-- Feature Card 2 -->
            <div class="feature-card grid" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 hover:transform hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Analyses Détaillées</h3>
                    <p class="text-gray-300">Suivez vos performances avec des statistiques détaillées et des insights en temps réel.</p>
                </div>
            </div>

            <!-- Feature Card 3 -->
            <div class="feature-card grid" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 hover:transform hover:scale-105 transition-all duration-300">
                    <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">100% Responsive</h3>
                    <p class="text-gray-300">Une expérience parfaite sur tous les appareils, du mobile au desktop.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 relative">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8 text-center">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="gsap-counter text-5xl font-bold text-white mb-2" data-target="1000">0</div>
                <p class="text-gray-300">Utilisateurs Actifs</p>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="gsap-counter text-5xl font-bold text-white mb-2" data-target="5000">0</div>
                <p class="text-gray-300">Links Créés</p>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="gsap-counter text-5xl font-bold text-white mb-2" data-target="100000">0</div>
                <p class="text-gray-300">Visiteurs Mensuels</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Initialisation AOS
    AOS.init({
        duration: 1000,
        once: true
    });

    // Animations GSAP
    document.addEventListener('DOMContentLoaded', () => {
        // Hero animations
        gsap.from('.gsap-hero-content', {
            opacity: 0,
            y: 100,
            duration: 1,
            ease: 'power4.out'
        });

        // Floating circles animation
        gsap.to('.gsap-circle-1', {
            x: 100,
            y: 100,
            duration: 20,
            repeat: -1,
            yoyo: true,
            ease: 'none'
        });

        gsap.to('.gsap-circle-2', {
            x: -100,
            y: -100,
            duration: 15,
            repeat: -1,
            yoyo: true,
            ease: 'none'
        });

        // Counter animation
        const counters = document.querySelectorAll('.gsap-counter');
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            
            gsap.to(counter, {
                innerHTML: target,
                duration: 2,
                ease: 'power1.out',
                snap: { innerHTML: 1 },
                scrollTrigger: {
                    trigger: counter,
                    start: 'top 80%'
                }
            });
        });

        // Feature cards stagger animation
        gsap.from('.feature-card', {
            opacity: 0,
            y: 50,
            duration: 0.8,
            stagger: 0.2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.feature-card',
                start: 'top 80%'
            }
        });
    });
</script>

<style>
    @keyframes scroll {
        0% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(100%); opacity: 0; }
    }

    .animate-scroll {
        animation: scroll 1.5s infinite;
    }

    .text-gradient {
        background-size: 200% 200%;
        animation: gradient 4s ease infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

</x-guest-layout>




{{--    <FeatureCard icon={{<Zap size={32} />}}
                title="Rapide et facile"
                description="Créez votre page en quelques clics. Aucune compétence technique requise."
                />
                <FeatureCard icon={{<a size={32} />}}
                title="Personnalisable"
                description="Choisissez parmi plusieurs thèmes et personnalisez votre page à votre image."
                />
                <FeatureCard icon={{Shield size={32} />}}
                title="Sécurisé"
                description="Vos données sont en sécurité avec notre hébergement sécurisé et fiable."
                /> --}}
