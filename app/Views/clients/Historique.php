<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Client - Historique | AuraWealth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
    </style>
</head>
<body class="font-body-md text-body-md overflow-x-hidden">
    <?= view('partials/sidebar_client', ['active' => 'historique']); ?>
    <header
        class="w-full h-16 sticky top-0 z-50 bg-surface shadow-sm md:ml-64 md:w-[calc(100%-16rem)] flex justify-between items-center px-margin-mobile md:px-margin-desktop">
        <h1 class="font-headline-md text-headline-md font-bold text-primary">Historique</h1>
        <div class="flex items-center gap-base">
            <button class="p-sm rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <div
                class="h-10 w-10 rounded-full bg-primary-fixed-dim flex items-center justify-center text-primary font-bold overflow-hidden cursor-pointer">
                <img class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDV2JyOY01g6HPPbLe_n3pss7Ty7aXSG-ec_D30rhtOMsfzgSgrEIT8Dqv7Use1ftRMRotoJptpCpWjorWVqmmbezUs4tWf_theXFc99jTv3-YHwr5z9AFGXXdBTNpam1RkCqZMesreJ7Jo8wxHHz1Gf0qbEa-MwtICMKf7rLE8Y5g8n9JbnqGxCb0mTUAS307zoRm0gbwHCUtrClzlPtQXcU0CbKcUo-ASVaKj4WG2iFheYFY5vPEr" />
            </div>
        </div>
    </header>
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop min-h-[calc(100vh-4rem)] flex flex-col gap-lg">
        <section class="glass-card rounded-xl p-md overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-outline-variant/30 text-label-sm text-outline uppercase">
                        <th class="py-md px-sm">ID</th>
                        <th class="py-md px-sm">Type</th>
                        <th class="py-md px-sm">Montant</th>
                        <th class="py-md px-sm">Frais</th>
                        <th class="py-md px-sm">Bénéficiaire</th>
                        <!-- <th class="py-md px-sm">Statut</th> -->
                        <th class="py-md px-sm">Commission</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($historique)): ?>
                        <tr>
                            <td colspan="6" class="py-xl text-center text-outline font-label-md">Aucune transaction trouvée.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($historique as $t): ?>
                        <tr class="border-b border-outline-variant/10 hover:bg-surface-container-low transition-colors">
                            <td class="py-md px-sm font-label-md text-on-surface">#<?= $t->id ?></td>
                            <td class="py-md px-sm">
                                <span class="inline-flex items-center gap-xs px-sm py-xs rounded-full font-label-sm
                                    <?= $t->id_type == 1 ? 'bg-primary/10 text-primary' : ($t->id_type == 2 ? 'bg-error/10 text-error' : 'bg-tertiary-container/10 text-on-tertiary-container') ?>">
                                    <span class="material-symbols-outlined text-[14px]">
                                        <?= $t->id_type == 1 ? 'add_circle' : ($t->id_type == 2 ? 'remove_circle' : 'send') ?>
                                    </span>
                                    <?= $t->type_libelle ?>
                                </span>
                            </td>
                            <td class="py-md px-sm font-label-md font-bold <?= $t->id_type == 1 ? 'text-primary' : ($t->id_type == 2 ? 'text-error' : 'text-on-surface') ?>">
                                <?= number_format($t->montant, 2, ',', ' ') ?> Ar
                            </td>
                            <td class="py-md px-sm font-label-md text-outline">
                                <?= $t->frais > 0 ? number_format($t->frais, 2, ',', ' ') . ' Ar' : '-' ?>
                            </td>
                            <td class="py-md px-sm font-label-md text-on-surface-variant">
                                <?= $t->client2_numero ?? '-' ?>
                            </td>
                            <!-- <td class="py-md px-sm">
                                <span class="inline-flex items-center gap-xs px-sm py-xs rounded-full font-label-sm bg-primary/5 text-primary">
                                    <span class="material-symbols-outlined text-[14px]">check_circle</span>
                                    Effectué
                                </span>
                            </td> -->
                            <td class="py-md px-sm font-label-md text-on-surface-variant">
                                <?= $t->commission_inter_operateur ?? '0' ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
