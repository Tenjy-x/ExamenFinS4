<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin - Montants à Envoyer | AuraWealth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        body { background-color: #f7f9fb; font-family: 'Inter', sans-serif; }
        .glass-card { background: rgba(255,255,255,0.8); backdrop-filter: blur(12px); border: 1px solid rgba(226,232,240,0.8); }
        .stats-gradient-1 { background: linear-gradient(135deg, #003527 0%, #064e3b 100%); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="text-on-surface">
    <?= view('partials/sidebar_admin', ['active' => 'montants']); ?>
    <header class="w-full h-16 sticky top-0 z-30 bg-surface shadow-sm md:pl-64">
        <div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop h-full">
            <div class="flex items-center gap-sm">
                <span class="md:hidden material-symbols-outlined text-primary cursor-pointer">menu</span>
                <h2 class="font-headline-md text-headline-md font-bold text-primary">Montants à Envoyer</h2>
            </div>
        </div>
    </header>
    <main class="md:ml-64 p-margin-mobile md:p-margin-desktop min-h-[calc(100vh-64px)] pb-24 md:pb-margin-desktop">
        <div class="glass-card rounded-xl p-md shadow-sm">
            <h4 class="font-headline-md text-headline-md text-on-surface mb-sm">Montants à envoyer aux autres opérateurs</h4>
            <p class="font-body-md text-body-md text-outline mb-md">Somme des montants des transferts vers d'autres opérateurs non encore envoyés.</p>
            <?php if (isset($montants) && !empty($montants)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                <?php foreach ($montants as $m): ?>
                <div class="glass-card p-md rounded-xl shadow-sm flex justify-between items-center">
                    <div>
                        <p class="font-label-sm text-label-sm text-outline uppercase"><?= $m->nom ?></p>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><?= number_format($m->total, 0) ?> Ar</h3>
                    </div>
                    <span class="material-symbols-outlined text-4xl opacity-30">send_money</span>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="stats-gradient-1 p-md rounded-xl shadow-lg mt-xl flex justify-between items-center">
                <div>
                    <p class="font-label-sm text-label-sm opacity-80 uppercase tracking-wider">TOTAL GÉNÉRAL</p>
                    <h2 class="font-display-lg text-display-lg mt-xs text-white"><?= number_format($totalGeneral ?? 0, 0) ?> Ar</h2>
                </div>
                <span class="material-symbols-outlined text-5xl opacity-30 text-white">account_balance</span>
            </div>
            <?php else: ?>
            <p class="text-outline font-body-md">Aucun montant à envoyer pour le moment.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
