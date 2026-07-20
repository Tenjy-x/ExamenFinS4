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
    <?= view('partials/sidebar_admin', ['active' => 'clients']); ?>
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
            <!-- Total Clients -->
            <div class="glass-card p-md rounded-xl flex flex-col justify-between h-32 max-w-xs">
                <p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Total Clients</p>
                <h3 class="font-display-lg text-primary"><?= $count ?? 0 ?></h3>
            </div>
            <!-- Client Table -->
            <div class="glass-card rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50 border-b border-outline-variant">
                                <th class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">#</th>
                                <th class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest">Téléphone</th>
                                <th class="p-md font-label-sm text-label-sm text-outline opacity-70 uppercase tracking-widest text-right">Solde</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/30">
                            <?php if (isset($clients)): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($clients as $c): ?>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="p-md font-label-md text-label-md text-on-surface-variant"><?= $i++ ?></td>
                                <td class="p-md font-label-md text-label-md text-on-surface"><?= $c->numero ?? '' ?></td>
                                <td class="p-md font-label-md text-label-md text-on-surface text-right font-bold"><?= number_format($c->solde ?? 0, 0) ?> Ar</td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>