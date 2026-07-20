<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Nouveau Transfert - Emerald Ledger</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        body {
            background-color: #f7f9fb;
            color: #191c1e;
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.6);
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        .sidebar-active {
            color: #003527;
            background: rgba(218, 226, 253, 0.2);
            font-weight: 700;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .filled-icon {
            font-variation-settings: 'FILL' 1;
        }
    </style>
</head>

<body class="min-h-screen flex">
    <?= view('partials/sidebar', ['active' => 'transfert']); ?>
    <!-- Main Canvas -->
    <main class="flex-1 md:ml-64 bg-background min-h-screen">
        <!-- TopNavBar (Authority Source: JSON) -->
        <header
            class="flex justify-between items-center px-md md:px-xl w-full h-16 sticky top-0 z-40 bg-surface-container-lowest shadow-sm">
            <div class="flex items-center gap-md">
                <h2 class="font-headline-md text-headline-md font-bold text-primary">Nouveau Transfert</h2>
            </div>
            <div class="flex items-center gap-md">
                <div class="hidden md:flex bg-surface-container-low rounded-full px-md py-xs items-center gap-sm w-80">
                    <span class="material-symbols-outlined text-outline">search</span>
                    <input class="bg-transparent border-none focus:ring-0 text-body-md w-full"
                        placeholder="Rechercher une opération..." type="text" />
                </div>
                <div class="flex items-center gap-sm">
                    <button
                        class="p-2 rounded-full hover:bg-surface-container transition-colors text-on-surface-variant">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button
                        class="p-2 rounded-full hover:bg-surface-container transition-colors text-on-surface-variant">
                        <span class="material-symbols-outlined">mail</span>
                    </button>
                    <div
                        class="w-10 h-10 rounded-full border border-outline-variant overflow-hidden cursor-pointer active:opacity-80">
                        <img class="w-full h-full object-cover"
                            data-alt="Close-up professional portrait of a high-net-worth bank client, clean minimalist lighting, soft focus background of a modern luxury office space. The aesthetic is professional, quiet luxury, with a palette of soft grays and deep emerald greens, reflecting institutional stability and sophisticated boutique finance."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrYaCiYHSJa2wnrG3qzszGrnXEa2imkCgbXzq7PaYMa-cLFe4UfYDFOmfFW3witntCsdPpr1ZBOzr66VTEYmpBspIB0lTLtgCFmLd2gYpD-EYOVIb9kr2wMAjaZn5FyKeEbnqvtjE-FSYkYkKTRXJ8UeXcglVs0x74sdPlN6YM0d7HX6HLEl4DiN1J0B-ecU6SxIJpPUndaKXHjV6InY8FNK43epV47Q6LLNNtMxF-ZJaHIPNlF_VQ" />
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <div class="p-md md:p-xl max-w-[1200px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
                <!-- Left: Transfer Form (8 Columns) -->
                <div class="lg:col-span-8 space-y-gutter">
                    <div class="glass-card rounded-xl p-md md:p-lg">
                        <div class="flex items-center gap-sm mb-lg">
                            <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-tertiary-container">send</span>
                            </div>
                            <div>
                                <h3 class="font-headline-md text-primary">Détails de la transaction</h3>
                                <p class="font-body-md text-on-surface-variant">Effectuez un transfert sécurisé vers un
                                    compte externe ou interne.</p>
                            </div>
                        </div>
                        <form class="space-y-md">
                            <!-- Beneficiary Selection -->
                            <div class="space-y-xs">
                                <label class="font-label-md text-on-surface-variant">Bénéficiaire / IBAN</label>
                                <div class="relative">
                                    <input
                                        class="w-full h-12 bg-surface-container-low border-none rounded-lg px-md focus:ring-2 focus:ring-primary/20 text-body-md"
                                        placeholder="Entrez le nom ou l'IBAN" type="text" />
                                    <span
                                        class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 text-outline">search</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                                <!-- Amount -->
                                <div class="space-y-xs">
                                    <label class="font-label-md text-on-surface-variant">Montant du transfert</label>
                                    <div class="relative">
                                        <input
                                            class="w-full h-12 bg-surface-container-low border-none rounded-lg px-md pr-16 focus:ring-2 focus:ring-primary/20 text-headline-md font-bold text-primary"
                                            placeholder="0.00" type="number" />
                                        <span
                                            class="absolute right-md top-1/2 -translate-y-1/2 font-bold text-primary">EUR</span>
                                    </div>
                                    <p class="font-label-sm text-outline-variant">Solde disponible : 142 500,00 €</p>
                                </div>
                                <!-- Date/Frequency -->
                                <div class="space-y-xs">
                                    <label class="font-label-md text-on-surface-variant">Exécution</label>
                                    <select
                                        class="w-full h-12 bg-surface-container-low border-none rounded-lg px-md focus:ring-2 focus:ring-primary/20 text-body-md appearance-none">
                                        <option>Immédiate (Instantané)</option>
                                        <option>Programmée</option>
                                        <option>Récurrente (Mensuel)</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Motif -->
                            <div class="space-y-xs">
                                <label class="font-label-md text-on-surface-variant">Motif du transfert
                                    (Optionnel)</label>
                                <textarea
                                    class="w-full bg-surface-container-low border-none rounded-lg p-md focus:ring-2 focus:ring-primary/20 text-body-md resize-none"
                                    placeholder="Ex: Achat immobilier, Honoraires conseil..." rows="3"></textarea>
                            </div>
                            <!-- Fees Estimation (Optimized Box) -->
                            <div
                                class="bg-surface-container-highest/30 border border-outline-variant/30 rounded-xl p-md">
                                <h4 class="font-label-md text-primary mb-sm flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-[18px]">info</span>
                                    Estimation des frais
                                </h4>
                                <div class="space-y-xs">
                                    <div class="flex justify-between text-label-md">
                                        <span class="text-on-surface-variant">Frais de traitement Emerald Luxe</span>
                                        <span class="font-bold">0,00 €</span>
                                    </div>
                                    <div class="flex justify-between text-label-md">
                                        <span class="text-on-surface-variant">Commission réseau (SEPA Instant)</span>
                                        <span class="font-bold">0,45 €</span>
                                    </div>
                                    <div
                                        class="border-t border-outline-variant/20 pt-xs mt-xs flex justify-between text-body-md font-bold">
                                        <span class="text-primary">Total estimé</span>
                                        <span class="text-primary">0,45 €</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Action Button -->
                            <button
                                class="w-full h-12 bg-primary text-white rounded-lg font-headline-md text-[16px] hover:bg-primary-container transition-all active:scale-[0.98] flex items-center justify-center gap-sm">
                                <span>Confirmer le transfert</span>
                                <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Right: Favorites & Info (4 Columns) -->
                <div class="lg:col-span-4 space-y-gutter">
                    <!-- Favorites Section -->
                    <div class="glass-card rounded-xl p-md">
                        <div class="flex items-center justify-between mb-md">
                            <h3 class="font-label-md text-primary uppercase tracking-wider">Favoris récents</h3>
                            <button class="text-primary font-label-sm hover:underline">Voir tout</button>
                        </div>
                        <div class="space-y-sm">
                            <!-- Favorite Item -->
                            <div
                                class="flex items-center gap-md p-sm rounded-lg hover:bg-surface-container transition-colors cursor-pointer group">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-outline-variant">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Minimalist abstract avatar of a corporate executive, clean facial features, neutral lighting, high-end professional headshot style. Emerald and soft gray tones in the background to match a premium wealth management UI. Modern and sophisticated aesthetic."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAo8hSo72hnFAsZyvIiKpk1J1QdzP-xnYpoTTBAgYKREJxrTjC0cqAojFBa4uNGr86-nBjKLojeYPvmvHHJF9JxMPeXXtgyzwCreGj5818k_0hJAIu1i3A4FHsG22ZtA1c7w260nArKogaXYFan8duAhpJ3o1Sv2Izcg9fKt9RdZRk658j-gYLupqXJwU6bWUWu-a6QQmiv6UoSDVRNNnuZLY2O_1Gv76tM5NVJYSDR3zfYfxko_Skn" />
                                </div>
                                <div class="flex-1">
                                    <p class="font-label-md text-on-surface">Jean-Luc Moreau</p>
                                    <p class="font-label-sm text-outline-variant">FR76 1234 ... 5678</p>
                                </div>
                                <span
                                    class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">bolt</span>
                            </div>
                            <div
                                class="flex items-center gap-md p-sm rounded-lg hover:bg-surface-container transition-colors cursor-pointer group">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-outline-variant">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Abstract modern logo of a luxury property group, clean geometric lines, metallic emerald finish on a white background. High-contrast, sophisticated branding suitable for a high-net-worth financial interface."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDf796KGcDU_yPMsCkDhWNQgPFx_6BGlk-RCyD_7o--gFVEs22q4tsWMb1ekSEYiwFEveBTlunx1AFOuGRVmTl_x4hrzVH055IBPBLd2FpEJSTYVp4ETYOaIJoNZM-X7jWq9CmAqBfz3uYykT0f2ofWE2__0SlZxrDrXi1ptkx0rWD9x03MrKur-QnnhF9Y9ne-YL0Zaq73DqG4fQAxh3cvaOVdfWIlrHrs0z6S6EkV_2eeH8DF9GWM" />
                                </div>
                                <div class="flex-1">
                                    <p class="font-label-md text-on-surface">Luxe Realty SA</p>
                                    <p class="font-label-sm text-outline-variant">LU34 9876 ... 1122</p>
                                </div>
                                <span
                                    class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">bolt</span>
                            </div>
                            <div
                                class="flex items-center gap-md p-sm rounded-lg hover:bg-surface-container transition-colors cursor-pointer group">
                                <div class="w-10 h-10 rounded-full overflow-hidden bg-outline-variant">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Sophisticated female professional portrait for a luxury bank app, soft natural lighting, elegant minimalist business attire, deep green background accents. Crisp and high-quality photography."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnmS_qVISJWTzaZjzs1M6ss2sYOW9MtVmi5_m0L0EzVT5245yrVIp7efphFE4Yw_yeoTRSIF-Scok0Qs0DPTCLuP0WixM28Fq23C_JOVScEImUZyRKTtL4ZS_OvlCr_miuw9vuC24YclKI-dOjKuQPxDjV-ji8JlayP647hE-bGxHYJCYWyitNY4reHEVDZijxyY4Ln2d6FROgJab9AXk484irFIha-aLR1BluQnceycYoDzIze2bt" />
                                </div>
                                <div class="flex-1">
                                    <p class="font-label-md text-on-surface">Sarah Bernhardt</p>
                                    <p class="font-label-sm text-outline-variant">FR12 4455 ... 9900</p>
                                </div>
                                <span
                                    class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">bolt</span>
                            </div>
                        </div>
                    </div>
                    <!-- Transfer Policy / Security -->
                    <div class="bg-primary text-white rounded-xl p-md relative overflow-hidden">
                        <!-- Subtle Pattern Overlay -->
                        <div class="absolute inset-0 opacity-10 pointer-events-none"
                            style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;">
                        </div>
                        <div class="relative z-10">
                            <span
                                class="material-symbols-outlined text-on-tertiary-container mb-sm text-[32px] filled-icon">verified_user</span>
                            <h4 class="font-headline-md text-[18px] mb-xs">Sécurité Emerald Luxe</h4>
                            <p class="font-body-md text-sm text-primary-fixed opacity-90 leading-relaxed">
                                Chaque transfert est protégé par notre cryptage de grade institutionnel. Un code de
                                validation peut vous être demandé sur votre application mobile Emerald pour finaliser
                                l'opération.
                            </p>
                            <div class="mt-md flex items-center gap-xs text-on-tertiary-container font-label-sm">
                                <span class="material-symbols-outlined text-[16px]">lock</span>
                                <span>Certifié PCI-DSS Level 1</span>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Support -->
                    <div class="border border-outline-variant/30 rounded-xl p-md flex items-center gap-md">
                        <div class="bg-surface-container-high p-sm rounded-lg">
                            <span class="material-symbols-outlined text-primary">contact_support</span>
                        </div>
                        <div>
                            <p class="font-label-md text-on-surface">Besoin d'aide ?</p>
                            <p class="font-label-sm text-outline-variant">Contactez votre conseiller dédié.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Background Atmospheric Effect -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute -top-[10%] -right-[5%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-[10%] -left-[5%] w-[30%] h-[30%] bg-tertiary/5 rounded-full blur-[100px]"></div>
    </div>
    <script>
        // Micro-interaction for inputs
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.closest('.glass-card')?.classList.add('shadow-md');
            });
            input.addEventListener('blur', () => {
                input.parentElement.closest('.glass-card')?.classList.remove('shadow-md');
            });
        });

        // Numeric animation for balance (simple version)
        function animateValue(id, start, end, duration) {
            // Implementation if needed for premium feel
        }
    </script>
</body>

</html>