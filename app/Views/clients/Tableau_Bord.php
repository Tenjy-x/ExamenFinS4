<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Client - Tableau de Bord | AuraWealth</title>
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
            background-color: #F8FAFC;
            color: #191C1E;
            -webkit-font-smoothing: antialiased;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.5);
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        .nav-active {
            background-color: #DAE2FD;
            color: #5C647A;
            border-radius: 8px;
            font-weight: bold;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .tap-highlight-none {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="font-body-md text-body-md overflow-x-hidden">
    <!-- Desktop Side Navigation Shell -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 hidden md:flex flex-col p-md gap-base bg-surface-container-lowest border-r border-outline-variant z-40"
        id="sidebar">
        <div class="font-headline-md text-headline-md font-bold text-primary mb-lg px-xs">
            AuraWealth
            <div class="font-label-sm text-outline font-normal uppercase tracking-widest mt-1">Premium Management</div>
        </div>
        <nav class="flex flex-col gap-xs flex-grow">
            <a class="flex items-center gap-sm p-sm bg-secondary-container text-on-secondary-container rounded-lg font-bold transition-all duration-200"
                href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">swap_horiz</span>
                <span class="font-label-md text-label-md">Operations</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">history</span>
                <span class="font-label-md text-label-md">History</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">group</span>
                <span class="font-label-md text-label-md">Clients</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">payments</span>
                <span class="font-label-md text-label-md">Fees</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-label-md text-label-md">Settings</span>
            </a>
        </nav>
        <div class="mt-auto flex flex-col gap-xs">
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">help</span>
                <span class="font-label-md text-label-md">Support</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-error hover:bg-error-container/20 rounded-lg transition-all"
                href="#">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label-md text-label-md">Logout</span>
            </a>
        </div>
    </aside>
    <!-- Top AppBar Mobile/Desktop Header -->
    <header
        class="w-full h-16 sticky top-0 z-50 bg-surface shadow-sm md:ml-64 md:w-[calc(100%-16rem)] flex justify-between items-center px-margin-mobile md:px-margin-desktop">
        <h1 class="font-headline-md text-headline-md font-bold text-primary">Tableau de Bord</h1>
        <div class="flex items-center gap-base">
            <button class="p-sm rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div
                class="h-10 w-10 rounded-full bg-primary-fixed-dim flex items-center justify-center text-primary font-bold overflow-hidden cursor-pointer">
                <img class="w-full h-full object-cover"
                    data-alt="A professional portrait of a high-net-worth client, looking confident and serene, with a soft-focus minimalist interior office background. The lighting is sophisticated and warm, aligning with the premium AuraWealth brand identity of quiet luxury and institutional stability. The color palette features soft neutrals and deep emerald tones."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDV2JyOY01g6HPPbLe_n3pss7Ty7aXSG-ec_D30rhtOMsfzgSgrEIT8Dqv7Use1ftRMRotoJptpCpWjorWVqmmbezUs4tWf_theXFc99jTv3-YHwr5z9AFGXXdBTNpam1RkCqZMesreJ7Jo8wxHHz1Gf0qbEa-MwtICMKf7rLE8Y5g8n9JbnqGxCb0mTUAS307zoRm0gbwHCUtrClzlPtQXcU0CbKcUo-ASVaKj4WG2iFheYFY5vPEr" />
            </div>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop min-h-[calc(100vh-4rem)] flex flex-col gap-lg">
        <!-- Balance Hero Section -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
            <div
                class="lg:col-span-2 relative overflow-hidden rounded-xl bg-primary text-on-primary p-xl shadow-lg group">

                <div class="relative z-10 flex flex-col gap-base">
                    <span class="font-label-sm text-primary-fixed-dim uppercase tracking-[0.2em]">Solde
                        Disponible</span>
                    <h2 class="font-display-lg text-display-lg">1,482,900.00 €</h2>
                    <div class="flex items-center gap-sm mt-md">
                        <span
                            class="px-sm py-xs bg-tertiary-container text-on-tertiary-container rounded-full font-label-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">trending_up</span>
                            +2.4%
                        </span>
                        <span class="text-primary-fixed-dim font-label-md">vs mois dernier</span>
                    </div>
                </div>
                <div class="absolute right-xl bottom-xl hidden md:block opacity-10 scale-150 rotate-12">
                    <span class="material-symbols-outlined text-[120px]">account_balance_wallet</span>
                </div>
            </div>
            <div class="glass-card rounded-xl p-md flex flex-col justify-between">
                <div>
                    <h3 class="font-label-sm text-outline uppercase mb-md">Flux Mensuel</h3>
                    <div class="space-y-lg">
                        <div class="space-y-xs">
                            <div class="flex justify-between items-end">
                                <span class="font-label-md text-on-surface-variant">Entrées</span>
                                <span class="font-headline-md text-primary">+ 12,450 €</span>
                            </div>
                            <div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="h-full bg-on-tertiary-container w-[75%] rounded-full"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-end">
                                <span class="font-label-md text-on-surface-variant">Sorties</span>
                                <span class="font-headline-md text-error">- 4,200 €</span>
                            </div>
                            <div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="h-full bg-error w-[30%] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full py-sm text-primary font-label-md flex items-center justify-center gap-xs hover:bg-surface-container-low transition-all rounded-lg mt-md">
                    Voir les détails <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </section>
        <!-- Quick Actions -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
            <button
                class="group flex flex-col items-center justify-center gap-sm p-xl rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all duration-200">
                <div
                    class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">add_circle</span>
                </div>
                <span class="font-label-md text-on-surface">Dépôt</span>
            </button>
            <button
                class="group flex flex-col items-center justify-center gap-sm p-xl rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all duration-200">
                <div
                    class="w-12 h-12 rounded-full bg-surface-container-highest text-primary flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">remove_circle</span>
                </div>
                <span class="font-label-md text-on-surface">Retrait</span>
            </button>
            <button
                class="group flex flex-col items-center justify-center gap-sm p-xl rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all duration-200">
                <div
                    class="w-12 h-12 rounded-full bg-surface-container-highest text-primary flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">send</span>
                </div>
                <span class="font-label-md text-on-surface">Transfert</span>
            </button>
            <button
                class="group flex flex-col items-center justify-center gap-sm p-xl rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all duration-200">
                <div
                    class="w-12 h-12 rounded-full bg-surface-container-highest text-primary flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">list_alt</span>
                </div>
                <span class="font-label-md text-on-surface">Historique</span>
            </button>
        </section>
        <!-- Recent Activity & Performance -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-gutter pb-xl">
            <!-- Recent Activity List -->
            <div class="lg:col-span-2 glass-card rounded-xl p-md">
                <div class="flex justify-between items-center mb-xl">
                    <h3 class="font-headline-md text-primary">Activité Récente</h3>
                    <button class="text-on-tertiary-fixed-variant font-label-md hover:underline">Voir tout</button>
                </div>
                <div class="space-y-1">
                    <!-- Item 1 -->
                    <div
                        class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded-lg transition-colors cursor-pointer group">
                        <div class="flex items-center gap-md">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">shopping_bag</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">Luxe Maison Boutique</p>
                                <p class="font-label-sm text-outline">Achat • Hier, 14:20</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-label-md text-on-surface font-bold">- 1,240.00 €</p>
                            <p class="font-label-sm text-outline">Confirmé</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div
                        class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded-lg transition-colors cursor-pointer">
                        <div class="flex items-center gap-md">
                            <div
                                class="w-10 h-10 rounded-full bg-tertiary-container/10 flex items-center justify-center text-on-tertiary-container">
                                <span class="material-symbols-outlined">payments</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">Salaire AuraWealth</p>
                                <p class="font-label-sm text-outline">Dépôt • 24 Mai, 09:00</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-label-md text-on-tertiary-container font-bold">+ 15,000.00 €</p>
                            <p class="font-label-sm text-on-tertiary-container font-bold">Réception</p>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div
                        class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded-lg transition-colors cursor-pointer">
                        <div class="flex items-center gap-md">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">restaurant</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">Le Gourmet Restaurant</p>
                                <p class="font-label-sm text-outline">Achat • 23 Mai, 20:45</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-label-md text-on-surface font-bold">- 450.00 €</p>
                            <p class="font-label-sm text-outline">Confirmé</p>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div
                        class="flex items-center justify-between p-sm hover:bg-surface-container-low rounded-lg transition-colors cursor-pointer">
                        <div class="flex items-center gap-md">
                            <div
                                class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">flight</span>
                            </div>
                            <div>
                                <p class="font-label-md text-on-surface">Air France Premium</p>
                                <p class="font-label-sm text-outline">Transport • 21 Mai, 11:30</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-label-md text-on-surface font-bold">- 2,890.00 €</p>
                            <p class="font-label-sm text-outline">En attente</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contextual Card / Insights -->
            <div class="flex flex-col gap-gutter">
                <div
                    class="bg-secondary-fixed text-on-secondary-fixed rounded-xl p-md border border-outline-variant/30 flex flex-col gap-base">
                    <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                    <h4 class="font-headline-md">Assurance Luxe</h4>
                    <p class="font-body-md opacity-80">Protégez vos actifs avec notre couverture premium exclusive.</p>
                    <button
                        class="mt-md px-md py-sm bg-on-secondary-fixed text-white rounded-lg font-label-md w-fit hover:opacity-90 transition-all">En
                        savoir plus</button>
                </div>
                <div class="glass-card rounded-xl p-md border-l-4 border-l-on-tertiary-container">
                    <h4 class="font-label-md text-on-surface font-bold">Conseil IA</h4>
                    <p class="font-body-md text-on-surface-variant mt-xs italic">"Votre solde d'épargne pourrait générer
                        4% de rendement supplémentaire en étant réalloué."</p>
                </div>
            </div>
        </section>
    </main>
    <!-- Mobile Navigation Shell -->
    <nav
        class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant shadow-lg h-16 flex justify-around items-center px-margin-mobile">
        <a class="flex flex-col items-center justify-center text-primary font-bold transition-transform active:scale-90 tap-highlight-none"
            href="#">
            <span class="material-symbols-outlined">home</span>
            <span class="font-label-sm text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant transition-transform active:scale-90 tap-highlight-none"
            href="#">
            <span class="material-symbols-outlined">sync_alt</span>
            <span class="font-label-sm text-[10px]">Transfers</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant transition-transform active:scale-90 tap-highlight-none"
            href="#">
            <span class="material-symbols-outlined">receipt_long</span>
            <span class="font-label-sm text-[10px]">History</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant transition-transform active:scale-90 tap-highlight-none"
            href="#">
            <span class="material-symbols-outlined">menu</span>
            <span class="font-label-sm text-[10px]">Menu</span>
        </a>
    </nav>
    <!-- Floating Action Button (Only on Mobile Dashboard) -->
    <button
        class="fixed right-6 bottom-24 md:hidden w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center z-40 active:scale-95 transition-all">
        <span class="material-symbols-outlined text-2xl">add</span>
    </button>
    <script src="<?= base_url('Js/Tableau_Bord.js') ?>"></script>
</body>

</html>