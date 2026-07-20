<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AuraWealth - Opérations et Transferts</title>
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.4);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body-md min-h-screen">
    <?= view('partials/sidebar_client', ['active' => 'depot']); ?>
    <!-- TopAppBar (Mobile & Shared Context) -->
    <header
        class="w-full h-16 sticky top-0 z-40 bg-surface shadow-sm flex justify-between items-center px-margin-mobile md:pl-[280px] md:pr-margin-desktop">
        <h1 class="font-headline-md text-headline-md font-bold text-primary">Opérations</h1>
        <div class="flex items-center gap-base">
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-surface-container-low transition-colors text-primary">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div class="w-10 h-10 rounded-full overflow-hidden border border-outline-variant">
                <img class="w-full h-full object-cover"
                    data-alt="A professional studio portrait of a high-net-worth individual, a middle-aged woman with a confident and serene expression, wearing a tailored navy blue blazer. The lighting is soft and cinematic, with a clean, minimalist off-white background that evokes a sense of modern luxury and financial security. The aesthetic is sharp, high-end, and perfectly aligned with a premium wealth management identity."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCN8k8fS1rY-3Lbv9fDDvyXxsVVR3JP9SLCbSgD-HwBleUfcwFZU5CWsQsr5I4uumQMiv2VnM8zQbdaLSkFHszYHBCvnoL4gJdbD5JbUYVtrf6NJjbtTlocvz91Js3hEaUSUW7E6eqxsmsp8MuiQVt2ZuiWW5bjXvDJzje2zVmZlP9WVt3g5tsN4OADtmcUE-5tlP1LwajSAdgAq2kWSQet0O3Ja-EgHeH2eqZD8SQQHOuUE4fNLZ9y" />
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop pb-24 md:pb-margin-desktop">
        <!-- Balance Display -->
        <section class="mb-lg">
            <div class="relative overflow-hidden rounded-xl bg-primary-container p-xl text-on-primary">
                <div class="relative z-10">
                    <p class="font-label-md text-on-primary-container mb-xs">Solde Disponible</p>
                    <div class="flex items-end gap-base">
                        <h2 class="font-display-lg text-display-lg">1,284,500.00</h2>
                        <span class="font-headline-md text-headline-md mb-base">EUR</span>
                    </div>
                    <div class="mt-md flex gap-gutter">
                        <div>
                            <p class="font-label-sm text-on-primary-container opacity-80 uppercase">Compte Courant</p>
                            <p class="font-label-md">**** 4421</p>
                        </div>
                        <div>
                            <p class="font-label-sm text-on-primary-container opacity-80 uppercase">Dernière Opération
                            </p>
                            <p class="font-label-md">-12,400.00 EUR (Hier)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Two Column Layout: Form & Favorites -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
            <!-- Transfer Form -->
            <div class="lg:col-span-2 space-y-gutter">
                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm">
                    <div class="flex flex-col gap-md mb-md">
                        <div class="flex items-center gap-base">
                            <span class="material-symbols-outlined text-primary">account_balance_wallet</span>
                            <h3 class="font-headline-md text-headline-md">Nouvelle Opération</h3>
                        </div>
                        <div class="flex bg-surface-container-low p-1 rounded-lg w-full md:w-fit">
                            <button
                                class="flex-1 md:px-6 py-2 bg-primary text-on-primary rounded-md font-label-md transition-all shadow-sm">Transfert</button>
                            <button
                                class="flex-1 md:px-6 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-md font-label-md transition-all">Dépôt</button>
                            <button
                                class="flex-1 md:px-6 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-md font-label-md transition-all">Retrait</button>
                        </div>
                    </div>
                    <form class="space-y-md" id="transfer-form">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <!-- Recipient -->
                            <div class="space-y-xs">
                                <label class="font-label-md text-on-surface-variant ml-1">Bénéficiaire ou Compte</label>
                                <div class="relative">
                                    <span
                                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">account_balance</span>
                                    <input
                                        class="w-full h-12 pl-12 pr-4 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-surface-tint transition-all font-body-md"
                                        placeholder="IBAN, N° de compte ou téléphone" type="text" />
                                </div>
                            </div>
                            <!-- Amount -->
                            <div class="space-y-xs">
                                <label class="font-label-md text-on-surface-variant ml-1">Montant</label>
                                <div class="relative">
                                    <span
                                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">euro</span>
                                    <input
                                        class="w-full h-12 pl-12 pr-4 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-surface-tint transition-all font-body-md"
                                        id="transfer-amount" placeholder="0.00" type="number" />
                                </div>
                            </div>
                        </div>
                        <!-- Reason -->
                        <div class="space-y-xs">
                            <label class="font-label-md text-on-surface-variant ml-1">Motif du transfert</label>
                            <input
                                class="w-full h-12 px-4 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-surface-tint transition-all font-body-md"
                                placeholder="ex: Facture de gestion trimestrielle" type="text" />
                        </div>
                        <!-- Fee Estimation Box -->
                        <div
                            class="bg-surface-container p-md rounded-lg flex items-center justify-between border-l-4 border-primary">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-on-surface-variant">info</span>
                                <div>
                                    <p class="font-label-sm text-on-surface-variant">Estimation des frais</p>
                                    <p class="font-body-md font-semibold text-primary">Standard (24-48h)</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-headline-md text-headline-md font-bold" id="fee-display">0.00 EUR</p>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex gap-md pt-md">
                            <button
                                class="flex-1 h-12 border border-outline text-on-surface font-label-md rounded-lg hover:bg-surface-container-high transition-colors"
                                type="button">
                                Annuler
                            </button>
                            <button
                                class="flex-[2] h-12 bg-primary text-on-primary font-label-md rounded-lg hover:opacity-90 transition-all flex items-center justify-center gap-sm"
                                type="submit">Confirmer l'opération <span
                                    class="material-symbols-outlined">arrow_forward</span></button>
                        </div>
                    </form>
                </div>
                <!-- Recent Activity (Asymmetric Bento Element) -->
                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md">
                    <h4 class="font-label-md text-on-surface-variant uppercase tracking-wider mb-md">Transferts Récents
                    </h4>
                    <div class="space-y-2">
                        <div
                            class="flex items-center justify-between p-base hover:bg-surface-container-low rounded-lg transition-colors group">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-on-secondary-container">trending_down</span>
                                </div>
                                <div>
                                    <p class="font-label-md">Cabinet Lefebvre &amp; Associés</p>
                                    <p class="font-label-sm text-outline">Hier, 14:30</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-label-md font-bold text-error">-2,450.00 EUR</p>
                                <span
                                    class="font-label-sm text-on-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full">Complété</span>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between p-base hover:bg-surface-container-low rounded-lg transition-colors group">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center">
                                    <span
                                        class="material-symbols-outlined text-on-secondary-container">trending_down</span>
                                </div>
                                <div>
                                    <p class="font-label-md">Acquisition Immobilière - Lyon</p>
                                    <p class="font-label-sm text-outline">12 Oct 2023</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-label-md font-bold text-error">-45,000.00 EUR</p>
                                <span
                                    class="font-label-sm text-on-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full">Complété</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Favorites Sidebar -->
            <div class="lg:col-span-1">
                <div
                    class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md shadow-sm sticky top-24">
                    <div class="flex items-center justify-between mb-md">
                        <h3 class="font-label-md font-bold text-primary flex items-center gap-xs">
                            <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                            Favoris
                        </h3>
                        <button class="text-primary hover:underline font-label-sm">Gérer</button>
                    </div>
                    <div class="space-y-sm">
                        <button
                            class="w-full flex items-center gap-sm p-3 border border-outline-variant rounded-lg hover:border-primary hover:bg-primary-fixed transition-all group text-left">
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img class="w-full h-full object-cover"
                                    data-alt="A clean, minimalist portrait of a professional male architect, late 30s, wearing glasses and a simple white t-shirt. The background is a soft, architectural gray with subtle lines, reflecting a modern and creative profession. The lighting is natural and bright, conveying accessibility and trust in a premium financial dashboard environment."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmZU5_1o_Wl8YIdlxLuKzw3TgDLySZNSn9QWFb2g72Pda4VuYpSvIGIcUJoRRJjlP87L9dq__FBOohWxaXzvvKwHybTXwTYAyaL3rbvKjHUJGMYGGHpchYddUpi21b1FGlPMiVrDqstvvoXGjt8sPNDc_tj-rSKy8c45baG1nN3A5wN103-c0g5mVwwkwZJLLzQIhOtqoqZr2pu5Or9CPUXOZoDWAIg9fmReWHOUMUqeZYiyol101D" />
                            </div>
                            <div class="flex-grow overflow-hidden">
                                <p class="font-label-md truncate">Jean-Marc Vallet</p>
                                <p class="font-label-sm text-outline truncate">Architecte Conseil</p>
                            </div>
                            <span class="material-symbols-outlined text-outline group-hover:text-primary">bolt</span>
                        </button>
                        <button
                            class="w-full flex items-center gap-sm p-3 border border-outline-variant rounded-lg hover:border-primary hover:bg-primary-fixed transition-all group text-left">
                            <div
                                class="w-12 h-12 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary-container font-bold">
                                JD
                            </div>
                            <div class="flex-grow overflow-hidden">
                                <p class="font-label-md truncate">Julien Dupont</p>
                                <p class="font-label-sm text-outline truncate">Gestionnaire Patrimoine</p>
                            </div>
                            <span class="material-symbols-outlined text-outline group-hover:text-primary">bolt</span>
                        </button>
                        <button
                            class="w-full flex items-center gap-sm p-3 border border-outline-variant rounded-lg hover:border-primary hover:bg-primary-fixed transition-all group text-left">
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img class="w-full h-full object-cover"
                                    data-alt="A serene portrait of a high-end interior designer, a woman with stylish bob haircut and professional attire. The backdrop is a blurred, luxury modern interior with warm ambient lighting. The color palette is composed of soft beige and charcoal tones, maintaining a sophisticated, trustworthy atmosphere for a boutique fintech app."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8QahpQ3lZgUqO-O1VfLYbuMdTZjM24y5nPXhKVwwG1eDckE8w-KZ8Uw3n12pdvMPEed6QAWYUvjPs1Jgv0mK7olXM60z4A94OE0Z3dzyvOrAikgciTadtTQzRfIZ13k8O46mRLmetg7CrGOHb22lNr5OrF29KFMjjlVzFDETjI2QvI3K4I4790NoDMgskPzhxoO_p81rNVxqotQKoeJjJ1fzbNluKIsQb6sTJUbi-GZ4a_rJbIvKK" />
                            </div>
                            <div class="flex-grow overflow-hidden">
                                <p class="font-label-md truncate">Marie Castain</p>
                                <p class="font-label-sm text-outline truncate">Design Intérieur</p>
                            </div>
                            <span class="material-symbols-outlined text-outline group-hover:text-primary">bolt</span>
                        </button>
                        <button
                            class="w-full flex items-center justify-center gap-sm p-3 border-2 border-dashed border-outline-variant rounded-lg hover:border-primary hover:text-primary transition-all text-outline font-label-md">
                            <span class="material-symbols-outlined">add_circle</span>
                            Ajouter un favori
                        </button>
                    </div>
                    <div class="mt-xl p-md bg-secondary-container/30 rounded-lg border border-secondary-container">
                        <p class="font-label-sm text-on-secondary-container mb-base">CONSEIL DE SÉCURITÉ</p>
                        <p class="font-body-md text-sm text-on-secondary-fixed opacity-90 leading-relaxed">
                            Vérifiez toujours le nom du bénéficiaire avant de confirmer votre virement. AuraWealth ne
                            vous demandera jamais votre code secret par SMS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- BottomNavBar (Mobile) -->
    <nav
        class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant shadow-lg flex justify-around items-center h-16 px-margin-mobile">
        <a class="flex flex-col items-center justify-center text-on-surface-variant font-label-sm text-[10px]" href="#">
            <span class="material-symbols-outlined">home</span>
            Home
        </a>
        <a class="flex flex-col items-center justify-center text-primary font-bold font-label-sm text-[10px]" href="#">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">sync_alt</span>
            Transfers
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant font-label-sm text-[10px]" href="#">
            <span class="material-symbols-outlined">receipt_long</span>
            History
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant font-label-sm text-[10px]" href="#">
            <span class="material-symbols-outlined">menu</span>
            Menu
        </a>
    </nav>
    <script src="<?= base_url('Js/Operations.js') ?>"></script>
</body>

</html>