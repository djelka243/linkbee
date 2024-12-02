<x-guest-layout>
    @include('users.components.nav')
     <section class="pt-32  pb-10n relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="gsap-pricing-hero max-w-3xl mx-auto">
                <span class="inline-block px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm text-purple-300 text-sm font-medium mb-4">
                    Tarifs simples et transparents
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Choisissez le plan qui vous convient
                </h1>
                <p class="text-xl text-gray-300">
                    Des prix adaptés à vos besoins, sans frais cachés. Commencez gratuitement et évoluez avec nous.
                </p>
            </div>
        </div>

        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="gsap-circle-1 w-96 h-96 bg-purple-500 rounded-full opacity-5 absolute -top-20 -left-20"></div>
            <div class="gsap-circle-2 w-96 h-96 bg-blue-500 rounded-full opacity-5 absolute -bottom-20 -right-20"></div>
        </div>
    </section>

    <!-- Pricing Cards Section -->
    <section class="py-10 relative z-10">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Plan Gratuit -->
                <div class="pricing-card grid" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative bg-white/10 backdrop-blur-lg rounded-2xl p-8 hover:transform hover:scale-105 transition-all duration-300 border border-white/20 flex flex-col">
                        <div class="absolute -top-4 -right-4">
                            <span class="inline-block px-4 py-1 bg-purple-500 text-white text-sm rounded-full">
                                Populaire
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Gratuit</h3>
                        <div class="text-4xl font-bold text-white mb-6">
                            0$ <span class="text-lg font-normal text-gray-300">/mois</span>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                1 Bio Link
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                5 liens maximum
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Thèmes basiques
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Statistiques basiques
                            </li>
                        </ul>
                        <a href="{{ route('users.signup') }}" 
                           class="block w-full py-3 px-6 text-center text-white bg-white/20 rounded-full hover:bg-white/30 transition-all duration-300 mt-auto">
                            Commencer Gratuitement
                        </a>
                    </div>
                </div>

                <!-- Plan Pro -->
                <div class="pricing-card grid" data-aos="fade-up" data-aos-delay="200">
                    <div class="relativen bg-gradient-to-br from-purple-600/20 to-pink-600/20 backdrop-blur-lg rounded-2xl p-8 hover:transform hover:scale-105 transition-all duration-300 border border-purple-500/50 flex flex-col">
                        <div class="absolute -top-4 -right-4">
                            <span class="inline-block px-4 py-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-sm rounded-full">
                                Recommandé
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Pro</h3>
                        <div class="text-4xl font-bold text-white mb-6">
                            9.99$ <span class="text-lg font-normal text-gray-300">/mois</span>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                3 Bio Links
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Liens illimités
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Tous les thèmes
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Statistiques avancées
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Domaine personnalisé
                            </li>
                        </ul>
                        <a href="{{ route('register') }}" 
                           class="block w-full py-3 px-6 text-center text-white bg-gradient-to-r from-purple-500 to-pink-500 rounded-full hover:shadow-lg hover:shadow-purple-500/50 transition-all duration-300 mt-auto">
                            Commencer avec Pro
                        </a>
                    </div>
                </div>

                <!-- Plan Business -->
                <div class="pricing-card grid" data-aos="fade-up" data-aos-delay="300">
                    <div class="relativen bg-white/10 backdrop-blur-lg rounded-2xl p-8 hover:transform hover:scale-105 transition-all duration-300 border border-white/20 flex flex-col">
                        <h3 class="text-2xl font-bold text-white mb-4">Business</h3>
                        <div class="text-4xl font-bold text-white mb-6">
                            24.99$ <span class="text-lg font-normal text-gray-300">/mois</span>
                        </div>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                10 Bio Links
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Liens illimités
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Thèmes personnalisés
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Analytics premium
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Support prioritaire
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                API accès
                            </li>
                        </ul>
                        <a href="{{ route('register') }}" 
                           class="block w-full py-3 px-6 text-center text-white bg-white/20 rounded-full hover:bg-white/30 transition-all duration-300 mt-auto">
                            Contacter les ventes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 relative z-10">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">
                Questions Fréquentes
            </h2>
            <div class="space-y-6" x-data="{ selected: null }">
                <!-- FAQ Item 1 -->
                <div class="faq-item bg-white/10 backdrop-blur-lg rounded-xl overflow-hidden" data-aos="fade-up">
                    <button 
                        @click="selected !== 1 ? selected = 1 : selected = null"
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-white"
                    >
                        <span class="text-lg font-medium">Puis-je changer de plan à tout moment ?</span>
                        <i class="fas" :class="selected === 1 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div 
                        x-show="selected === 1"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-4 text-gray-300"
                    >
                        Oui, vous pouvez changer de plan à tout moment. La différence de prix sera calculée au prorata.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item bg-white/10 backdrop-blur-lg rounded-xl overflow-hidden" data-aos="fade-up">
                    <button 
                        @click="selected !== 2 ? selected = 2 : selected = null"
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-white"
                    >
                        <span class="text-lg font-medium">Comment fonctionne la période d'essai ?</span>
                        <i class="fas" :class="selected === 2 ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                    <div 
                        x-show="selected === 2"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-4 text-gray-300"
                    >
                        Vous pouvez essayer toutes les fonctionnalités Pro gratuitement pendant 14 jours, sans engagement.
                    </div>
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
            gsap.from('.gsap-pricing-hero', {
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

            // Pricing cards animation
            gsap.from('.pricing-card', {
                opacity: 0,
                y: 50,
                duration: 0.8,
                stagger: 0.2,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: '.pricing-card',
                    start: 'top 80%'
                }
            });
        });
    </script>
</x-guest-layout>