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
    <?= view('partials/sidebar_admin', ['active' => 'fees']); ?>
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
        <?php
        $gainRetrait = 0; $gainTransfert = 0;
        if (isset($gains)) foreach ($gains as $g) {
            if (strtolower($g->libelle) === 'retrait') $gainRetrait = $g->total_gains;
            if (strtolower($g->libelle) === 'transfert') $gainTransfert = $g->total_gains;
        }
        $totalG = $gainRetrait + $gainTransfert;
        $pctR = $totalG > 0 ? round($gainRetrait / $totalG * 100) : 0;
        $pctT = $totalG > 0 ? round($gainTransfert / $totalG * 100) : 0;
        ?>
        <!-- Summary Stats Bento -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-xl">
            <div
                class="stats-gradient-1 p-md rounded-xl text-on-primary shadow-lg flex flex-col justify-between h-40 relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="font-label-sm text-label-sm opacity-80 uppercase tracking-wider">Gain Total Système</p>
                    <h3 class="font-display-lg text-display-lg mt-xs"><?= number_format($totalGains ?? 0, 0) ?> Ar</h3>
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
                    <h3 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><?= number_format($gainRetrait, 0) ?> Ar</h3>
                </div>
                <div class="flex items-center gap-gutter">
                    <div class="h-1.5 flex-grow bg-surface-container-highest rounded-full overflow-hidden">
                        <div class="h-full bg-primary" style="width: <?= $pctR ?>%"></div>
                    </div>
                    <span class="font-label-md text-label-md text-primary"><?= $pctR ?>%</span>
                </div>
            </div>
            <div class="glass-card p-md rounded-xl shadow-sm flex flex-col justify-between h-40">
                <div>
                    <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Frais Transferts</p>
                    <h3 class="font-headline-lg text-headline-lg text-on-surface mt-xs"><?= number_format($gainTransfert, 0) ?> Ar</h3>
                </div>
                <div class="flex items-center gap-gutter">
                    <div class="h-1.5 flex-grow bg-surface-container-highest rounded-full overflow-hidden">
                        <div class="h-full bg-tertiary-fixed-dim" style="width: <?= $pctT ?>%"></div>
                    </div>
                    <span class="font-label-md text-label-md text-on-tertiary-container font-bold"><?= $pctT ?>%</span>
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
                </div>
                <div class="glass-card rounded-xl p-md shadow-sm">
                    <div class="flex gap-1 mb-3 flex-wrap">
                        <?php if (isset($types)): ?>
                        <?php foreach ($types as $t): ?>
                        <button class="px-3 py-1 rounded-md text-sm type-tab <?= $t->id === 2 ? 'bg-primary text-white font-bold' : 'bg-surface-container-high text-outline hover:bg-surface-container-higher' ?>" data-type="<?= $t->id ?>"><?= $t->libelle ?></button>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($types)): ?>
                    <?php foreach ($types as $t): ?>
                    <div class="type-content-<?= $t->id ?>" <?= $t->id !== 2 ? 'style="display:none"' : '' ?>>
                        <table class="w-full text-left">
                            <thead><tr class="border-b border-outline-variant"><th class="py-2 px-1 font-label-sm text-outline uppercase">Min (Ar)</th><th class="py-2 px-1 font-label-sm text-outline uppercase">Max (Ar)</th><th class="py-2 px-1 font-label-sm text-outline uppercase text-right">Frais (Ar)</th><th class="py-2 px-1 font-label-sm text-outline uppercase text-right">Actions</th></tr></thead>
                            <tbody class="divide-y divide-outline-variant/30">
                                <?php if (isset($tranches[$t->id])): ?>
                                <?php foreach ($tranches[$t->id] as $tr): ?>
                                <tr class="hover:bg-surface-container-low transition-colors group" id="tr-<?= $tr->id ?>">
                                    <td class="py-2 px-1 font-body-md"><span class="view-<?= $tr->id ?>"><?= number_format($tr->montant_min, 0) ?></span><input class="edit-<?= $tr->id ?> hidden w-20 bg-surface-container-high rounded px-1 py-0.5 text-sm" type="number" name="montant_min" value="<?= $tr->montant_min ?>" /></td>
                                    <td class="py-2 px-1 font-body-md"><span class="view-<?= $tr->id ?>"><?= number_format($tr->montant_max, 0) ?></span><input class="edit-<?= $tr->id ?> hidden w-20 bg-surface-container-high rounded px-1 py-0.5 text-sm" type="number" name="montant_max" value="<?= $tr->montant_max ?>" /></td>
                                    <td class="py-2 px-1 font-body-md font-bold text-right text-primary"><span class="view-<?= $tr->id ?>"><?= number_format($tr->Frais, 0) ?> Ar</span><input class="edit-<?= $tr->id ?> hidden w-20 bg-surface-container-high rounded px-1 py-0.5 text-sm text-right" type="number" name="Frais" value="<?= $tr->Frais ?>" /></td>
                                    <td class="py-2 px-1 text-right">
                                        <button class="view-<?= $tr->id ?> p-1 text-outline hover:text-primary transition-colors" onclick="editTranche(<?= $tr->id ?>)" title="Modifier"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                                        <button class="edit-<?= $tr->id ?> hidden p-1 text-primary hover:text-on-tertiary-container transition-colors" onclick="saveTranche(<?= $tr->id ?>)" title="Sauvegarder"><span class="material-symbols-outlined text-[18px]">check</span></button>
                                        <button class="edit-<?= $tr->id ?> hidden p-1 text-outline hover:text-error transition-colors" onclick="cancelEdit(<?= $tr->id ?>)" title="Annuler"><span class="material-symbols-outlined text-[18px]">close</span></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Prefix Configuration Side Panel -->
            <div class="lg:col-span-4 space-y-md">
                <h4 class="font-headline-md text-headline-md text-on-surface">Configuration Préfixes</h4>
                <div class="glass-card rounded-xl p-md shadow-sm space-y-md">
                    <p class="font-body-md text-body-md text-outline">Gérez les codes opérateurs autorisés pour les
                        transactions mobiles.</p>
                    <div class="space-y-sm">
                        <?php if (isset($prefixe)): ?>
                        <?php foreach ($prefixe as $p): ?>
                        <div
                            class="flex items-center justify-between p-sm bg-surface-container-low rounded-lg border border-outline-variant/30">
                            <div class="flex items-center gap-sm">
                                <div
                                    class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                    <?= substr($p->Prefix, -2) ?></div>
                                <span class="font-label-md text-label-md"><?= $p->Prefix ?></span>
                            </div>
                            <button class="text-error opacity-40 hover:opacity-100 transition-opacity">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
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
    <script>
    document.querySelectorAll('.type-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.type-tab').forEach(t => {
                t.classList.remove('bg-primary', 'text-white', 'font-bold');
                t.classList.add('bg-surface-container-high', 'text-outline', 'hover:bg-surface-container-higher');
            });
            this.classList.remove('bg-surface-container-high', 'text-outline', 'hover:bg-surface-container-higher');
            this.classList.add('bg-primary', 'text-white', 'font-bold');
            document.querySelectorAll('[class^="type-content-"]').forEach(d => d.style.display = 'none');
            document.querySelector('.type-content-' + this.dataset.type).style.display = '';
        });
    });

    function editTranche(id) {
        document.querySelectorAll('.view-' + id).forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.edit-' + id).forEach(el => el.classList.remove('hidden'));
    }

    function cancelEdit(id) {
        document.querySelectorAll('.edit-' + id).forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.view-' + id).forEach(el => el.classList.remove('hidden'));
    }

    function saveTranche(id) {
        const row = document.getElementById('tr-' + id);
        const inputs = row.querySelectorAll('input');
        const data = { id: id, montant_min: inputs[0].value, montant_max: inputs[1].value, Frais: inputs[2].value };
        fetch('<?= base_url('updateTranche') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(r => r.json())
        .then(r => {
            if (r.success) {
                const views = row.querySelectorAll('.view-' + id);
                views[0].textContent = Number(inputs[0].value).toLocaleString();
                views[1].textContent = Number(inputs[1].value).toLocaleString();
                views[2].textContent = Number(inputs[2].value).toLocaleString() + ' Ar';
                document.querySelectorAll('.view-' + id).forEach(el => el.classList.remove('hidden'));
                document.querySelectorAll('.edit-' + id).forEach(el => el.classList.add('hidden'));
            } else {
                alert('Erreur lors de la sauvegarde');
            }
        });
    }
    </script>
</body>

</html>