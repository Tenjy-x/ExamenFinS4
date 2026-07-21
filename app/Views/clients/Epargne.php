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
    <?= view('partials/sidebar_client', ['active' => 'dashboard']); ?>
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
                    <span class="font-label-sm text-primary-fixed-dim uppercase tracking-[0.2em]">Pourcentage
                        Epargne</span>
                    <h2 class="font-display-lg text-display-lg"><?= $epargne ?> %</h2>
                    <div class="flex items-center gap-sm mt-md">
                        <span
                            class="px-sm py-xs bg-tertiary-container text-on-tertiary-container rounded-full font-label-sm flex items-center gap-1">
                            <!-- <span class="material-symbols-outlined text-[14px]">trending_up</span> -->
                            <?= $user['numero']?>
                        </span>
                       
                    </div>
                </div>
               
    <!-- Floating Action Button (Only on Mobile Dashboard) -->
    <button
        class="fixed right-6 bottom-24 md:hidden w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center z-40 active:scale-95 transition-all">
        <span class="material-symbols-outlined text-2xl">add</span>
    </button>
    <script src="<?= base_url('Js/Tableau_Bord.js') ?>"></script>
</body>

</html>