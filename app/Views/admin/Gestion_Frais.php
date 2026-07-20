<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - Gestion des Frais | AuraWealth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .stats-gradient-1 {
            background: linear-gradient(135deg, #003527 0%, #064e3b 100%);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .active-tab {
            font-variation-settings: 'FILL' 1;
        }
    </style>
</head>

<body class="text-on-surface">
    <!-- Sidebar Navigation (Desktop) -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 hidden md:flex flex-col p-md gap-base bg-surface-container-lowest border-r border-outline-variant z-40">
        <div class="mb-lg">
            <h1 class="font-headline-md text-headline-md font-bold text-primary">AuraWealth</h1>
            <p class="font-label-sm text-label-sm text-secondary">Premium Management</p>
        </div>
        <nav class="flex flex-col gap-xs flex-grow">
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-label-md text-label-md">Dashboard</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">swap_horiz</span>
                <span class="font-label-md text-label-md">Operations</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">history</span>
                <span class="font-label-md text-label-md">History</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">group</span>
                <span class="font-label-md text-label-md">Clients</span>
            </a>
            <a class="flex items-center gap-sm p-sm bg-secondary-container text-on-secondary-container rounded-lg font-bold"
                href="#">
                <span class="material-symbols-outlined active-tab">payments</span>
                <span class="font-label-md text-label-md">Fees</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">settings</span>
                <span class="font-label-md text-label-md">Settings</span>
            </a>
        </nav>
        <div class="mt-auto flex flex-col gap-xs pt-base border-t border-outline-variant">
            <a class="flex items-center gap-sm p-sm text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">help</span>
                <span class="font-label-md text-label-md">Support</span>
            </a>
            <a class="flex items-center gap-sm p-sm text-error hover:bg-error-container transition-all rounded-lg"
                href="#">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-label-md text-label-md">Logout</span>
            </a>
        </div>
    </aside>
    <!-- Top Bar -->
    <header class="w-full h-16 sticky top-0 z-30 bg-surface shadow-sm md:pl-64">
        <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop h-full">
            <div class="flex items-center gap-sm">
                <span class="md:hidden material-symbols-outlined text-primary cursor-pointer">menu</span>
                <h2 class="font-headline-md text-headline-md font-bold text-primary">Gestion des Frais</h2>
            </div>
            <div class="flex items-center gap-md">
                <div class="hidden md:flex items-center bg-surface-container-low px-sm py-xs rounded-full">
                    <span class="material-symbols-outlined text-outline text-sm">search</span>
                    <input class="bg-transparent border-none focus:ring-0 text-body-md font-body-md w-48"
                        placeholder="Rechercher..." type="text" />
                </div>
                <div class="flex items-center gap-sm">
                    <button class="p-base hover:bg-surface-container-low rounded-full transition-colors">
                        <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                    </button>
                    <button class="p-base hover:bg-surface-container-low rounded-full transition-colors">
                        <span class="material-symbols-outlined text-on-surface-variant">account_circle</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop min-h-[calc(100vh-64px)] pb-24 md:pb-margin-desktop">
        <!-- Summary Stats Bento -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-xl">
            <div
                class="stats-gradient-1 p-md rounded-xl text-on-primary shadow-lg flex flex-col justify-between h-40 relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="font-label-sm text-label-sm opacity-80 uppercase tracking-wider">Gain Total Système</p>
                    <h3 class="font-display-lg text-display-lg mt-xs">24,500,800 Ar</h3>
                </div>
                <div class="relative z-10 flex items-center gap-xs text-on-tertiary-container">
                    <span class="material-symbols-outlined text-sm">trending_up</span>
                    <span class="font-label-md text-label-md">+12.5% ce mois</span>
                </div>
                <span
                    class="material-symbols-outlined absolute -right-4 -bottom-4 text-9xl opacity-10 group-hover:scale-110 transition-transform duration-500">payments</span>
            </div>
            <div class="glass-card p-md rounded-xl shadow-sm flex flex-col justify-between h-40">
                <div>
                    <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Frais Retraits</p>
                    <h3 class="font-headline-lg text-headline-lg text-on-surface mt-xs">8,420,000 Ar</h3>
                </div>
                <div class="flex items-center gap-gutter">
                    <div class="h-1.5 flex-grow bg-surface-container-highest rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-2/3"></div>
                    </div>
                    <span class="font-label-md text-label-md text-primary">34%</span>
                </div>
            </div>
            <div class="glass-card p-md rounded-xl shadow-sm flex flex-col justify-between h-40">
                <div>
                    <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Frais Transferts</p>
                    <h3 class="font-headline-lg text-headline-lg text-on-surface mt-xs">16,080,800 Ar</h3>
                </div>
                <div class="flex items-center gap-gutter">
                    <div class="h-1.5 flex-grow bg-surface-container-highest rounded-full overflow-hidden">
                        <div class="h-full bg-tertiary-fixed-dim w-4/5"></div>
                    </div>
                    <span class="font-label-md text-label-md text-on-tertiary-container font-bold">66%</span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Fee Brackets Table -->
            <div class="lg:col-span-8 space-y-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-headline-md text-headline-md text-on-surface">Paliers de Transaction</h4>
                        <p class="font-body-md text-body-md text-outline">Configuration des frais fixes par tranche de
                            montant.</p>
                    </div>
                    <button
                        class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md text-label-md flex items-center gap-xs hover:opacity-90 transition-opacity">
                        <span class="material-symbols-outlined">add</span>
                        Nouveau Palier
                    </button>
                </div>
                <div class="glass-card rounded-xl overflow-hidden shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low border-b border-outline-variant">
                                <th class="px-md py-sm font-label-sm text-label-sm text-outline uppercase">Tranche Min
                                    (Ar)</th>
                                <th class="px-md py-sm font-label-sm text-label-sm text-outline uppercase">Tranche Max
                                    (Ar)</th>
                                <th class="px-md py-sm font-label-sm text-label-sm text-outline uppercase">Frais Fixe
                                    (Ar)</th>
                                <th class="px-md py-sm font-label-sm text-label-sm text-outline uppercase text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant">
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-md font-body-md text-body-md">100</td>
                                <td class="px-md py-md font-body-md text-body-md">1 000</td>
                                <td class="px-md py-md font-body-md text-body-md font-bold text-primary">50 Ar</td>
                                <td class="px-md py-md text-right">
                                    <button class="p-xs text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-md font-body-md text-body-md">1 001</td>
                                <td class="px-md py-md font-body-md text-body-md">5 000</td>
                                <td class="px-md py-md font-body-md text-body-md font-bold text-primary">150 Ar</td>
                                <td class="px-md py-md text-right">
                                    <button class="p-xs text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-md font-body-md text-body-md">5 001</td>
                                <td class="px-md py-md font-body-md text-body-md">10 000</td>
                                <td class="px-md py-md font-body-md text-body-md font-bold text-primary">300 Ar</td>
                                <td class="px-md py-md text-right">
                                    <button class="p-xs text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-md font-body-md text-body-md">10 001</td>
                                <td class="px-md py-md font-body-md text-body-md">50 000</td>
                                <td class="px-md py-md font-body-md text-body-md font-bold text-primary">1 200 Ar</td>
                                <td class="px-md py-md text-right">
                                    <button class="p-xs text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-md py-md font-body-md text-body-md">50 001</td>
                                <td class="px-md py-md font-body-md text-body-md">100 000</td>
                                <td class="px-md py-md font-body-md text-body-md font-bold text-primary">2 500 Ar</td>
                                <td class="px-md py-md text-right">
                                    <button class="p-xs text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Prefix Configuration Side Panel -->
            <div class="lg:col-span-4 space-y-md">
                <h4 class="font-headline-md text-headline-md text-on-surface">Configuration Préfixes</h4>
                <div class="glass-card rounded-xl p-md shadow-sm space-y-md">
                    <p class="font-body-md text-body-md text-outline">Gérez les codes opérateurs autorisés pour les
                        transactions mobiles.</p>
                    <div class="space-y-sm">
                        <div
                            class="flex items-center justify-between p-sm bg-surface-container-low rounded-lg border border-outline-variant/30">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                    33</div>
                                <span class="font-label-md text-label-md">033 - Telma</span>
                            </div>
                            <button class="text-error opacity-40 hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                        <div
                            class="flex items-center justify-between p-sm bg-surface-container-low rounded-lg border border-outline-variant/30">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                    34</div>
                                <span class="font-label-md text-label-md">034 - Orange</span>
                            </div>
                            <button class="text-error opacity-40 hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                        <div
                            class="flex items-center justify-between p-sm bg-surface-container-low rounded-lg border border-outline-variant/30">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                    37</div>
                                <span class="font-label-md text-label-md">037 - Airtel</span>
                            </div>
                            <button class="text-error opacity-40 hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </div>
                    <div class="pt-sm space-y-xs">
                        <label class="font-label-sm text-label-sm text-outline">Ajouter un préfixe</label>
                        <div class="flex gap-xs">
                            <input
                                class="flex-grow bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/20 font-body-md text-body-md py-sm"
                                placeholder="ex: 032" type="text" />
                            <button
                                class="bg-secondary-container text-on-secondary-container px-md rounded-lg font-label-md text-label-md hover:bg-secondary-fixed transition-colors">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Quick Actions / Alerts -->
                <div class="bg-primary-container text-on-primary-container p-md rounded-xl relative overflow-hidden">
                    <span class="material-symbols-outlined absolute -right-2 -top-2 text-6xl opacity-20">info</span>
                    <h5 class="font-label-md text-label-md font-bold mb-xs">Aide au paramétrage</h5>
                    <p class="font-label-sm text-label-sm opacity-90">Les modifications des frais s'appliquent
                        instantanément à toutes les nouvelles transactions. Pensez à notifier les clients via le panneau
                        de communication.</p>
                </div>
            </div>
        </div>
    </main>
    <!-- Bottom Navigation (Mobile Only) -->
    <nav
        class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant shadow-lg h-16 flex justify-around items-center px-margin-mobile">
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">home</span>
            <span class="font-label-sm text-[10px]">Accueil</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">sync_alt</span>
            <span class="font-label-sm text-[10px]">Transfers</span>
        </a>
        <a class="flex flex-col items-center justify-center text-primary font-bold" href="#">
            <span class="material-symbols-outlined active-tab">payments</span>
            <span class="font-label-sm text-[10px]">Frais</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">menu</span>
            <span class="font-label-sm text-[10px]">Menu</span>
        </a>
    </nav>
    <!-- Floating Action Button (Only relevant on main pages) -->
    <button
        class="fixed bottom-20 right-6 md:bottom-8 md:right-8 w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-transform z-40">
        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add</span>
    </button>
    <script src="<?= base_url('Js/Gestion_Frais.js') ?>"></script>
</body>

</html>