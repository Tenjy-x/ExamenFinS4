<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - Gestion des Clients | AuraWealth</title>
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
    <!-- Tailwind Configuration -->
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            background-color: #F8FAFC;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        .sidebar-active {
            background-color: #dae2fd;
            /* secondary-container */
            color: #5c647a;
            /* on-secondary-container */
        }

        .premium-shadow {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #E2E8F0;
            border-radius: 10px;
        }
    </style>
</head>

<body class="font-body-md text-on-surface">
    <?= view('partials/sidebar', ['active' => 'clients']); ?>
    <!-- Top AppBar (Mobile/Desktop) -->
    <header
        class="w-full h-16 sticky top-0 z-40 bg-surface shadow-sm flex justify-between items-center px-margin-mobile md:px-margin-desktop md:pl-[18rem]">
        <h2 class="font-headline-md text-headline-md font-bold text-primary md:hidden">AuraWealth</h2>
        <h2 class="font-headline-md text-headline-md font-bold text-primary hidden md:block">Gestion des Clients</h2>
        <div class="flex items-center gap-4">
            <div class="hidden lg:flex relative items-center">
                <span class="material-symbols-outlined absolute left-3 text-outline">search</span>
                <input
                    class="pl-10 pr-4 py-2 bg-surface-container-low rounded-full border-none focus:ring-2 focus:ring-primary w-64 text-label-md"
                    placeholder="Rechercher un client..." type="text" />
            </div>
            <button
                class="w-10 h-10 flex items-center justify-center hover:bg-surface-container-low rounded-full transition-colors">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div
                class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container overflow-hidden">
                <img class="w-full h-full object-cover"
                    data-alt="A professional headshot of a senior financial administrator for a wealth management firm. The person is smiling warmly, wearing a charcoal grey suit in a bright, modern office with soft daylight and green plants in the background. The aesthetic is clean, professional, and sophisticated."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDLTe-_x2wSuy93OkG5bXd5NfltThPYEx9o1Y1dP78YGBDsYnKJBeEZ_lWW01DsT_m-bHmaY-1HxYOHGcrD_vlqlV1KRi3bElS0rNEV_skGvk827iLgc8P92gpoBVxgyXgKwLdbJhoebJ3szurYthQ4X2ltkX4SiHmB3BO4JCCrDFLSbw_r5pCHSKtufjNCo65NtwKd50QRD3M8wL9Nsa0-Q2BvPPa2M8TanLuuTJ6OCVb9kKp_evh" />
            </div>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="md:pl-64 pb-24 md:pb-8">
        <div class="max-w-[1280px] mx-auto p-margin-mobile md:p-margin-desktop space-y-8">
            <!-- Overview Bento Grid -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <!-- Total Accounts -->
                <div class="glass-card p-md rounded-xl flex flex-col justify-between h-40">
                    <div class="flex justify-between items-start">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Comptes Totaux</p>
                        <span
                            class="material-symbols-outlined text-primary bg-primary-fixed-dim/30 p-2 rounded-lg">account_balance_wallet</span>
                    </div>
                    <div>
                        <h3 class="font-display-lg text-primary">1,284</h3>
                        <p class="text-on-tertiary-container font-label-md text-label-md flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">trending_up</span> +12% ce mois
                        </p>
                    </div>
                </div>
                <!-- Activity Rate -->
                <div class="glass-card p-md rounded-xl flex flex-col justify-between h-40">
                    <div class="flex justify-between items-start">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Taux d'Activité</p>
                        <span
                            class="material-symbols-outlined text-primary bg-primary-fixed-dim/30 p-2 rounded-lg">query_stats</span>
                    </div>
                    <div>
                        <h3 class="font-display-lg text-primary">94.2%</h3>
                        <div class="w-full bg-surface-container-high h-2 rounded-full mt-2 overflow-hidden">
                            <div class="bg-primary h-full" style="width: 94.2%"></div>
                        </div>
                    </div>
                </div>
                <!-- Cash Flow -->
                <div class="glass-card p-md rounded-xl flex flex-col justify-between h-40">
                    <div class="flex justify-between items-start">
                        <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Flux de Trésorerie
                        </p>
                        <span
                            class="material-symbols-outlined text-primary bg-primary-fixed-dim/30 p-2 rounded-lg">payments</span>
                    </div>
                    <div>
                        <h3 class="font-display-lg text-primary">4.2M €</h3>
                        <p class="font-label-md text-label-md text-outline">Liquidités disponibles</p>
                    </div>
                </div>
            </section>
            <!-- Table Header & Actions -->
            <section class="glass-card rounded-xl overflow-hidden">
                <div
                    class="p-md border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex flex-wrap items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">
                            <span class="material-symbols-outlined text-[20px]">person_add</span>
                            Nouveau Client
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 border border-outline-variant text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-surface-container-low transition-colors">
                            <span class="material-symbols-outlined text-[20px]">file_download</span>
                            Exporter CSV
                        </button>
                    </div>
                    <div class="flex items-center gap-3 bg-surface-container-low p-1 rounded-lg">
                        <button
                            class="px-4 py-1.5 bg-surface-container-lowest shadow-sm rounded-md font-label-md text-label-md text-primary font-bold">Tous</button>
                        <button
                            class="px-4 py-1.5 text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high rounded-md">Actifs</button>
                        <button
                            class="px-4 py-1.5 text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high rounded-md">Inactifs</button>
                    </div>
                </div>
                <!-- Filters -->
                <div class="p-md grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 bg-surface-container-lowest/50">
                    <div class="space-y-1">
                        <label class="font-label-sm text-label-sm text-outline ml-1">Type de Compte</label>
                        <select
                            class="w-full bg-surface border-outline-variant rounded-lg text-label-md focus:ring-primary h-11">
                            <option>Tous les types</option>
                            <option>Personnel</option>
                            <option>Business</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="font-label-sm text-label-sm text-outline ml-1">Solde Minimum</label>
                        <input
                            class="w-full bg-surface border-outline-variant rounded-lg text-label-md focus:ring-primary h-11"
                            placeholder="0 €" type="number" />
                    </div>
                    <div class="space-y-1">
                        <label class="font-label-sm text-label-sm text-outline ml-1">Dernière Activité</label>
                        <select
                            class="w-full bg-surface border-outline-variant rounded-lg text-label-md focus:ring-primary h-11">
                            <option>7 derniers jours</option>
                            <option>30 derniers jours</option>
                            <option>Cette année</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button
                            class="w-full h-11 flex items-center justify-center gap-2 border border-primary text-primary font-label-md text-label-md rounded-lg hover:bg-primary/5 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">filter_list</span>
                            Appliquer les Filtres
                        </button>
                    </div>
                </div>
                <!-- Client Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50 border-b border-outline-variant">
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">
                                    Client</th>
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">
                                    ID Client</th>
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">
                                    Type</th>
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">
                                    Status</th>
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest text-right">
                                    Solde</th>
                                <th
                                    class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/30">
                            <!-- Row 1 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed">
                                            JD</div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">Jean Dupont</p>
                                            <p class="font-label-sm text-label-sm text-outline">jean.dupont@email.com
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">#AW-92841</td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">Personnel</td>
                                <td class="p-md">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-label-sm font-bold bg-primary-fixed-dim/20 text-on-primary-fixed-variant">
                                        <span class="w-1.5 h-1.5 rounded-full bg-on-tertiary-container mr-2"></span>
                                        Actif
                                    </span>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface text-right font-bold">
                                    142,500.00 €</td>
                                <td class="p-md text-center">
                                    <button
                                        class="p-2 rounded-full hover:bg-surface-container-high text-outline group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-on-primary-fixed">
                                            ML</div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">Marie Laurent</p>
                                            <p class="font-label-sm text-label-sm text-outline">m.laurent@techcorp.fr
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">#AW-10324</td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">Business</td>
                                <td class="p-md">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-label-sm font-bold bg-primary-fixed-dim/20 text-on-primary-fixed-variant">
                                        <span class="w-1.5 h-1.5 rounded-full bg-on-tertiary-container mr-2"></span>
                                        Actif
                                    </span>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface text-right font-bold">
                                    894,210.50 €</td>
                                <td class="p-md text-center">
                                    <button
                                        class="p-2 rounded-full hover:bg-surface-container-high text-outline group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-outline">
                                            PB</div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">Pierre Bertrand</p>
                                            <p class="font-label-sm text-label-sm text-outline">p.bertrand@orange.fr</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">#AW-44129</td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">Personnel</td>
                                <td class="p-md">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-label-sm font-bold bg-error-container text-on-error-container">
                                        <span class="w-1.5 h-1.5 rounded-full bg-error mr-2"></span>
                                        Inactif
                                    </span>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface text-right font-bold">
                                    12,400.00 €</td>
                                <td class="p-md text-center">
                                    <button
                                        class="p-2 rounded-full hover:bg-surface-container-high text-outline group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-secondary-fixed-dim flex items-center justify-center font-bold text-on-secondary-fixed-variant">
                                            SC</div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">Sophie Clement</p>
                                            <p class="font-label-sm text-label-sm text-outline">s.clement@artbox.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">#AW-55210</td>
                                <td class="p-md font-label-md text-label-md text-on-surface-variant">Business</td>
                                <td class="p-md">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-label-sm font-bold bg-primary-fixed-dim/20 text-on-primary-fixed-variant">
                                        <span class="w-1.5 h-1.5 rounded-full bg-on-tertiary-container mr-2"></span>
                                        Actif
                                    </span>
                                </td>
                                <td class="p-md font-label-md text-label-md text-on-surface text-right font-bold">
                                    2,105,400.00 €</td>
                                <td class="p-md text-center">
                                    <button
                                        class="p-2 rounded-full hover:bg-surface-container-high text-outline group-hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div
                    class="p-md flex items-center justify-between bg-surface-container-low/30 border-t border-outline-variant">
                    <p class="font-label-md text-label-md text-outline">Affichage de 1-4 sur 1,284 clients</p>
                    <div class="flex gap-2">
                        <button
                            class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-high transition-colors disabled:opacity-50"
                            disabled="">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button
                            class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- Bottom Navigation (Mobile Only) -->
    <nav
        class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant flex justify-around items-center h-16 px-margin-mobile shadow-lg">
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">home</span>
            <span class="font-label-sm text-label-sm">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">sync_alt</span>
            <span class="font-label-sm text-label-sm">Transfers</span>
        </a>
        <a class="flex flex-col items-center justify-center text-primary font-bold" href="#">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
            <span class="font-label-sm text-label-sm">History</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">menu</span>
            <span class="font-label-sm text-label-sm">Menu</span>
        </a>
    </nav>
    <script src="<?= base_url('Js/Gestion_Client.js') ?>"></script>
</body>

</html>