<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AuraWealth - Admin - Rapports et Analyses</title>
<script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:wght@100..900&display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .tonal-elevation {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body-md text-body-md min-h-screen">
<!-- Sidebar (Desktop) -->
<aside class="h-screen w-64 fixed left-0 top-0 hidden md:flex flex-col bg-surface-container-lowest border-r border-outline-variant p-md gap-base z-50">
<div class="mb-lg px-2">
<h1 class="font-headline-md text-headline-md font-bold text-primary">AuraWealth</h1>
<p class="font-label-sm text-label-sm text-outline uppercase tracking-widest mt-1">Premium Management</p>
</div>
<nav class="flex-1 flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-secondary-container text-on-secondary-container rounded-lg font-bold" href="#">
<span class="material-symbols-outlined">swap_horiz</span>
<span class="font-label-md text-label-md">Operations</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">history</span>
<span class="font-label-md text-label-md">History</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">group</span>
<span class="font-label-md text-label-md">Clients</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">payments</span>
<span class="font-label-md text-label-md">Fees</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-md text-label-md">Settings</span>
</a>
</nav>
<div class="pt-base border-t border-outline-variant flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">help</span>
<span class="font-label-md text-label-md">Support</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all rounded-lg" href="#">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-md text-label-md">Logout</span>
</a>
</div>
</aside>
<!-- Top Navigation Bar -->
<header class="sticky top-0 z-40 w-full h-16 bg-surface shadow-sm md:pl-64 flex justify-between items-center px-margin-mobile md:px-margin-desktop transition-all">
<div class="flex items-center gap-4 flex-1">
<button class="md:hidden p-2 text-primary">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="relative w-full max-w-md hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full bg-surface-container-low border-none rounded-full pl-10 pr-4 py-2 text-body-md focus:ring-2 focus:ring-primary-container transition-all" placeholder="Rechercher des transactions, clients..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-colors relative">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="h-8 w-8 rounded-full bg-primary-fixed-dim flex items-center justify-center text-primary font-bold overflow-hidden cursor-pointer">
<img class="w-full h-full object-cover" data-alt="A professional headshot of a high-end financial advisor in a minimalist office setting. The lighting is soft and natural, emphasizing a clean and trustworthy look. The style is modern with a muted, luxurious color palette of deep emerald and soft whites." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6_rFVSMWsMBNO2qwiJIxi8qPLsPyZ_RqeXUHclgb0QQAMAgYgh3PJfromtFTjh4yLswTOu1qpsorh-2BPHEYxlyJLvKbEc1ZHXPhbS43hEqjtVTedZ8244HTaDqtgNZZe_kfUuIXgncuGMqcY9c1mUoFWmswRnL5n7WVW5MB1FiaGaJRBq6xzYkWpbSobSI-Bp4qOsX3uB7puV28MDm1OwBVNbm854_lwhEwfChO_BW4uo7AZPCV_"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="md:pl-64 min-h-screen pb-20">
<div class="p-margin-mobile md:p-margin-desktop space-y-gutter">
<!-- Page Title & Actions -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-base">
<div>
<h2 class="font-headline-lg text-headline-lg text-primary">Admin - Rapports et Analyses</h2>
<p class="text-on-surface-variant mt-1">Résumé exécutif de la performance mensuelle d'AuraWealth.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-4 py-2 border border-outline rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-sm">calendar_today</span>
                        Derniers 30 jours
                    </button>
<button class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-lg font-label-md text-label-md shadow-md hover:opacity-90 transition-all">
<span class="material-symbols-outlined text-sm">download</span>
                        Exporter
                    </button>
</div>
</div>
<!-- Executive Summary Bento Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
<!-- Revenue Card -->
<div class="glass-card p-md rounded-xl tonal-elevation flex flex-col justify-between h-40 group transition-transform hover:scale-[1.02]">
<div class="flex justify-between items-start">
<p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Revenu Total</p>
<span class="text-on-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full text-[10px] font-bold">+12.4%</span>
</div>
<div class="mt-2">
<h3 class="font-display-lg text-headline-lg text-on-surface">€ 142,500.00</h3>
<div class="h-10 mt-2">
<!-- Minimalist Sparkline Placeholder -->
<svg class="w-full h-full" viewbox="0 0 100 40">
<path d="M0,35 Q10,32 20,38 T40,30 T60,35 T80,20 T100,5" fill="none" stroke="#31c98f" stroke-width="2" vector-effect="non-scaling-stroke"></path>
</svg>
</div>
</div>
</div>
<!-- Transaction Volume Card -->
<div class="glass-card p-md rounded-xl tonal-elevation flex flex-col justify-between h-40 group transition-transform hover:scale-[1.02]">
<div class="flex justify-between items-start">
<p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Volume Transac.</p>
<span class="text-on-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full text-[10px] font-bold">+8.1%</span>
</div>
<div class="mt-2">
<h3 class="font-display-lg text-headline-lg text-on-surface">1,284</h3>
<div class="h-10 mt-2">
<svg class="w-full h-full" viewbox="0 0 100 40">
<path d="M0,30 Q10,25 20,32 T40,28 T60,20 T80,30 T100,25" fill="none" stroke="#2b6954" stroke-width="2" vector-effect="non-scaling-stroke"></path>
</svg>
</div>
</div>
</div>
<!-- New Clients Card -->
<div class="glass-card p-md rounded-xl tonal-elevation flex flex-col justify-between h-40 group transition-transform hover:scale-[1.02]">
<div class="flex justify-between items-start">
<p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Nouveaux Clients</p>
<span class="text-on-error-container bg-error-container px-2 py-0.5 rounded-full text-[10px] font-bold">-2.4%</span>
</div>
<div class="mt-2">
<h3 class="font-display-lg text-headline-lg text-on-surface">42</h3>
<div class="h-10 mt-2">
<svg class="w-full h-full" viewbox="0 0 100 40">
<path d="M0,10 Q10,15 20,12 T40,25 T60,20 T80,35 T100,38" fill="none" stroke="#ba1a1a" stroke-width="2" vector-effect="non-scaling-stroke"></path>
</svg>
</div>
</div>
</div>
<!-- Fee Income Card -->
<div class="glass-card p-md rounded-xl tonal-elevation flex flex-col justify-between h-40 group transition-transform hover:scale-[1.02]">
<div class="flex justify-between items-start">
<p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Frais de Gestion</p>
<span class="text-on-tertiary-container bg-tertiary-fixed px-2 py-0.5 rounded-full text-[10px] font-bold">+15.7%</span>
</div>
<div class="mt-2">
<h3 class="font-display-lg text-headline-lg text-on-surface">€ 18,920.00</h3>
<div class="h-10 mt-2">
<svg class="w-full h-full" viewbox="0 0 100 40">
<path d="M0,38 Q10,35 20,25 T40,20 T60,28 T80,10 T100,2" fill="none" stroke="#31c98f" stroke-width="2" vector-effect="non-scaling-stroke"></path>
</svg>
</div>
</div>
</div>
</div>
<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Large Performance Chart -->
<div class="lg:col-span-2 glass-card p-md rounded-xl tonal-elevation space-y-md">
<div class="flex justify-between items-center">
<h3 class="font-headline-md text-headline-md text-primary">Performance Mensuelle</h3>
<div class="flex gap-4">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-primary-container"></span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Revenus</span>
</div>
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-secondary-fixed-dim"></span>
<span class="text-label-sm font-label-sm text-on-surface-variant">Volume</span>
</div>
</div>
</div>
<div class="relative h-64 w-full flex items-end justify-between px-4 pb-8 border-b border-outline-variant/30">
<!-- Simplified Visualization Bars -->
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[40%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[70%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Jan</span>
</div>
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[55%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[65%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Fév</span>
</div>
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[75%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[80%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Mar</span>
</div>
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[60%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[75%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Avr</span>
</div>
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[90%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[85%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Mai</span>
</div>
<div class="w-12 bg-primary-container/20 hover:bg-primary-container/40 transition-colors rounded-t-lg h-[100%] group relative">
<div class="absolute inset-x-0 bottom-0 bg-primary-container rounded-t-lg h-[95%]"></div>
<span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-label-sm text-outline">Juin</span>
</div>
</div>
</div>
<!-- Fee Distribution -->
<div class="glass-card p-md rounded-xl tonal-elevation space-y-md">
<h3 class="font-headline-md text-headline-md text-primary">Répartition des Frais</h3>
<div class="flex flex-col gap-6 pt-4">
<div class="space-y-2">
<div class="flex justify-between items-center">
<span class="font-label-md text-label-md text-on-surface">Frais de conseil</span>
<span class="font-label-md text-label-md font-bold">55%</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-primary-container h-full rounded-full" style="width: 55%"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between items-center">
<span class="font-label-md text-label-md text-on-surface">Commissions d'échange</span>
<span class="font-label-md text-label-md font-bold">28%</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-primary h-full rounded-full" style="width: 28%"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between items-center">
<span class="font-label-md text-label-md text-on-surface">Frais de garde</span>
<span class="font-label-md text-label-md font-bold">12%</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-tertiary-fixed-dim h-full rounded-full" style="width: 12%"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between items-center">
<span class="font-label-md text-label-md text-on-surface">Autres services</span>
<span class="font-label-md text-label-md font-bold">5%</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-secondary h-full rounded-full" style="width: 5%"></div>
</div>
</div>
</div>
<div class="pt-6">
<button class="w-full py-3 bg-surface-container-low text-primary font-label-md text-label-md rounded-lg hover:bg-surface-container-high transition-colors">Voir le détail des frais</button>
</div>
</div>
</div>
<!-- Recent Transactions Table -->
<div class="glass-card rounded-xl tonal-elevation overflow-hidden">
<div class="p-md flex justify-between items-center border-b border-outline-variant">
<h3 class="font-headline-md text-headline-md text-primary">Transactions Récentes</h3>
<button class="text-primary font-label-md text-label-md hover:underline">Voir tout</button>
</div>
<div class="overflow-x-auto no-scrollbar">
<table class="w-full text-left border-collapse">
<thead class="bg-surface-container-low">
<tr>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">ID Transaction</th>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">Client</th>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">Montant</th>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">Date</th>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">Statut</th>
<th class="px-md py-3 font-label-sm text-label-sm text-outline opacity-70 uppercase">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<tr class="hover:bg-surface-container-low/50 transition-colors group">
<td class="px-md py-4 font-label-md text-label-md text-on-surface">#TRX-9482</td>
<td class="px-md py-4">
<div class="flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container text-xs font-bold">JD</div>
<span class="font-label-md text-label-md">Julien Dubois</span>
</div>
</td>
<td class="px-md py-4 font-label-md text-label-md font-bold">€ 12,450.00</td>
<td class="px-md py-4 text-on-surface-variant">14 Juin, 14:30</td>
<td class="px-md py-4">
<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-tertiary-fixed text-on-tertiary-fixed-variant uppercase tracking-wider">Complété</span>
</td>
<td class="px-md py-4">
<button class="p-2 text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors group">
<td class="px-md py-4 font-label-md text-label-md text-on-surface">#TRX-9481</td>
<td class="px-md py-4">
<div class="flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary text-xs font-bold">SM</div>
<span class="font-label-md text-label-md">Sophie Martin</span>
</div>
</td>
<td class="px-md py-4 font-label-md text-label-md font-bold">€ 4,200.00</td>
<td class="px-md py-4 text-on-surface-variant">14 Juin, 11:15</td>
<td class="px-md py-4">
<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-secondary-fixed text-on-secondary-fixed-variant uppercase tracking-wider">En attente</span>
</td>
<td class="px-md py-4">
<button class="p-2 text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors group">
<td class="px-md py-4 font-label-md text-label-md text-on-surface">#TRX-9480</td>
<td class="px-md py-4">
<div class="flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-surface-container-highest flex items-center justify-center text-on-surface text-xs font-bold">PL</div>
<span class="font-label-md text-label-md">Pierre Lefebvre</span>
</div>
</td>
<td class="px-md py-4 font-label-md text-label-md font-bold">€ 28,000.00</td>
<td class="px-md py-4 text-on-surface-variant">13 Juin, 09:45</td>
<td class="px-md py-4">
<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-tertiary-fixed text-on-tertiary-fixed-variant uppercase tracking-wider">Complété</span>
</td>
<td class="px-md py-4">
<button class="p-2 text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors group">
<td class="px-md py-4 font-label-md text-label-md text-on-surface">#TRX-9479</td>
<td class="px-md py-4">
<div class="flex items-center gap-3">
<div class="h-8 w-8 rounded-full bg-error-container flex items-center justify-center text-on-error-container text-xs font-bold">MG</div>
<span class="font-label-md text-label-md">Marc Girard</span>
</div>
</td>
<td class="px-md py-4 font-label-md text-label-md font-bold">€ 1,500.00</td>
<td class="px-md py-4 text-on-surface-variant">12 Juin, 16:20</td>
<td class="px-md py-4">
<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-error-container text-on-error-container uppercase tracking-wider">Échoué</span>
</td>
<td class="px-md py-4">
<button class="p-2 text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</main>
<!-- Bottom Navigation (Mobile Only) -->
<nav class="fixed bottom-0 w-full z-50 md:hidden bg-surface border-t border-outline-variant shadow-lg h-16 flex justify-around items-center px-margin-mobile">
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">home</span>
<span class="font-label-sm text-[10px] uppercase">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-primary font-bold active:scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">sync_alt</span>
<span class="font-label-sm text-[10px] uppercase">Transfers</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="font-label-sm text-[10px] uppercase">History</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant active:scale-90 transition-transform" href="#">
<span class="material-symbols-outlined">menu</span>
<span class="font-label-sm text-[10px] uppercase">Menu</span>
</a>
</nav>
<script src="<?= base_url('Js/Index.js') ?>"></script>
</body></html>