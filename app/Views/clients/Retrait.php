<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Retrait | AuraWealth</title>
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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .tap-highlight-none {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>

<body class="font-body-md text-body-md overflow-x-hidden">
    <?= view('partials/sidebar_client', ['active' => 'retrait']); ?>
    <!-- Top AppBar Mobile/Desktop Header -->
    <header
        class="w-full h-16 sticky top-0 z-50 bg-surface shadow-sm md:ml-64 md:w-[calc(100%-16rem)] flex justify-between items-center px-margin-mobile md:px-margin-desktop">
        <h1 class="font-headline-md text-headline-md font-bold text-primary">Retrait</h1>
        <div class="flex items-center gap-base">
            <button class="p-sm rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div
                class="h-10 w-10 rounded-full bg-primary-fixed-dim flex items-center justify-center text-primary font-bold overflow-hidden cursor-pointer">
                <img class="w-full h-full object-cover"
                    data-alt="Professional portrait of a client."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDV2JyOY01g6HPPbLe_n3pss7Ty7aXSG-ec_D30rhtOMsfzgSgrEIT8Dqv7Use1ftRMRotoJptpCpWjorWVqmmbezUs4tWf_theXFc99jTv3-YHwr5z9AFGXXdBTNpam1RkCqZMesreJ7Jo8wxHHz1Gf0qbEa-MwtICMKf7rLE8Y5g8n9JbnqGxCb0mTUAS307zoRm0gbwHCUtrClzlPtQXcU0CbKcUo-ASVaKj4WG2iFheYFY5vPEr" />
            </div>
        </div>
    </header>
    <!-- Main Content Canvas -->
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop min-h-[calc(100vh-4rem)] flex flex-col gap-lg">
        <!-- Balance Display -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
            <div
                class="lg:col-span-2 relative overflow-hidden rounded-xl bg-primary text-on-primary p-xl shadow-lg group">
                <div class="relative z-10 flex flex-col gap-base">
                    <span class="font-label-sm text-primary-fixed-dim uppercase tracking-[0.2em]">Solde Disponible</span>
                    <h2 class="font-display-lg text-display-lg"><?= $solde ?> Ar</h2>
                    <div class="flex items-center gap-sm mt-md">
                        <span class="px-sm py-xs bg-tertiary-container text-on-tertiary-container rounded-full font-label-sm flex items-center gap-1">
                            <?= $user['numero']?>
                        </span>
                        <span class="text-primary-fixed-dim font-label-md">vs mois dernier</span>
                    </div>
                </div>
                <div class="absolute right-xl bottom-xl hidden md:block opacity-10 scale-150 rotate-12">
                    <span class="material-symbols-outlined text-[120px]">remove_circle</span>
                </div>
            </div>
            <div class="glass-card rounded-xl p-md flex flex-col justify-between">
                <div>
                    <h3 class="font-label-sm text-outline uppercase mb-md">Flux Mensuel</h3>
                    <div class="space-y-lg">
                        <div class="space-y-xs">
                            <div class="flex justify-between items-end">
                                <span class="font-label-md text-on-surface-variant">Entrées</span>
                                <span class="font-headline-md text-primary">+ 0 Ar</span>
                            </div>
                            <div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="h-full bg-on-tertiary-container w-[0%] rounded-full"></div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <div class="flex justify-between items-end">
                                <span class="font-label-md text-on-surface-variant">Sorties</span>
                                <span class="font-headline-md text-error">- 0 Ar</span>
                            </div>
                            <div class="w-full h-2 bg-surface-container-highest rounded-full overflow-hidden">
                                <div class="h-full bg-error w-[0%] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Retrait Form -->
        <div class="glass-card rounded-xl p-md lg:p-lg max-w-2xl">
            <div class="flex items-center gap-sm mb-lg">
                <div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-tertiary-container">remove_circle</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-primary">Effectuer un Retrait</h3>
                    <p class="font-body-md text-on-surface-variant">Gérez vos liquidités en toute sécurité.</p>
                </div>
            </div>
            <?php $erreur = session()->getFlashdata('error'); ?>
            <?php if ($erreur): ?>
                <div class="flex items-center gap-sm rounded-lg border border-red-200 bg-red-50 px-md py-sm text-red-700 font-body-md mb-md">
                    <span class="material-symbols-outlined text-[20px]">error</span>
                    <?= $erreur ?>
                </div>
            <?php endif; ?>
            <form class="space-y-md" id="withdrawalForm" action="<?= base_url('traitement_retrait')?>">
                <div class="space-y-sm">
                    <label class="font-label-md text-on-surface-variant" for="amount">Montant du retrait (Ar)</label>
                    <div class="relative">
                        <span class="absolute left-md top-1/2 -translate-y-1/2 font-headline-md text-primary/40 font-bold">Ar</span>
                        <input name="amount"
                            class="w-full bg-surface-container-low border-none rounded-lg h-16 pl-xl pr-md text-headline-md font-bold text-primary focus:ring-2 focus:ring-primary transition-all"
                            id="amount" placeholder="0.00" type="number" />
                    </div>
                    <div class="flex justify-between items-center text-label-sm">
                        <span class="text-on-surface-variant">Solde disponible: <?= $solde ?> Ar</span>
                    </div>
                </div>
                <div class="flex items-center gap-sm p-sm bg-surface-container/30 rounded-lg">
                    <input class="w-5 h-5 rounded text-primary focus:ring-primary border-outline-variant" id="confirm" type="checkbox" />
                    <label class="text-label-md text-on-surface-variant" for="confirm">Je confirme l'exactitude des informations fournies.</label>
                </div>
                <button
                    class="w-full h-12 bg-primary text-white rounded-lg font-headline-md text-[16px] hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-sm mt-md"
                    type="submit">
                    Confirmer le retrait
                    <span class="material-symbols-outlined">trending_flat</span>
                </button>
            </form>
        </div>
    </main>
    <!-- Mobile Navigation Shell -->
    <nav
        class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant shadow-lg h-16 flex justify-around items-center px-margin-mobile">
        <a class="flex flex-col items-center justify-center text-primary font-bold transition-transform active:scale-90 tap-highlight-none"
            href="<?= base_url('/index') ?>">
            <span class="material-symbols-outlined">home</span>
            <span class="font-label-sm text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant transition-transform active:scale-90 tap-highlight-none"
            href="<?= base_url('/transfert') ?>">
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
    <script src="<?= base_url('Js/Retrait.js') ?>"></script>
</body>

</html>
