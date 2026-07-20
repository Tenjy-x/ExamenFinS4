<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Effectuer un Retrait | Emerald Ledger</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            background-color: #f7f9fb;
            color: #191c1e;
        }
        /* Custom scrollbar for premium feel */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>

</head>
<body class="font-body-md text-on-surface">
<?= view('partials/sidebar', ['active' => 'retrait']); ?>
<!-- Top AppBar (Mobile/Compact) -->
<header class="md:hidden flex justify-between items-center px-md w-full h-16 sticky top-0 z-50 bg-surface-container-lowest shadow-sm">
<h1 class="font-headline-md text-headline-md font-bold text-primary">Emerald Ledger</h1>
<div class="flex gap-sm">
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer">mail</span>
</div>
</header>
<!-- Main Content Canvas -->
<main class="md:ml-64 min-h-screen p-margin-mobile md:p-xl transition-all duration-300">
<div class="max-w-4xl mx-auto">
<!-- Header Section -->
<div class="mb-xl">
<div class="flex items-center gap-sm text-secondary mb-xs">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest">Retour aux opérations</span>
</div>
<h2 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary">Effectuer un Retrait</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-xs">Gérez vos liquidités en toute sécurité avec nos options de retrait instantanées.</p>
</div>
<!-- Bento Grid Layout for Withdrawal Form -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
<!-- Main Form Section -->
<div class="lg:col-span-7 bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-md md:p-lg shadow-sm">
<form class="space-y-md" id="withdrawalForm" action="<?= base_url('traitement_retrait')?>">
<!-- Step 1: Destination Selection -->
<div class="space-y-sm">
<label class="font-label-md text-label-md text-on-surface-variant">Point de retrait ou Compte de destination</label>
<!-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-sm">
<div class="cursor-pointer border-2 border-primary bg-primary-container/5 p-md rounded-xl transition-all flex flex-col gap-xs hover:border-primary" id="dest-bank" onclick="selectDestination('bank')">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">account_balance</span>
<span class="font-label-md text-label-md text-primary font-bold">Virement Bancaire</span>
<span class="text-label-sm text-on-surface-variant text-[11px]">2-3 jours ouvrables</span>
</div>
<div class="cursor-pointer border-2 border-outline-variant/30 p-md rounded-xl transition-all flex flex-col gap-xs hover:border-primary/50" id="dest-cash" onclick="selectDestination('cash')">
<span class="material-symbols-outlined text-on-secondary-container">atm</span>
<span class="font-label-md text-label-md text-on-secondary-container font-bold">Point de retrait local</span>
<span class="text-label-sm text-on-surface-variant text-[11px]">Instantanné</span>
</div>
</div> -->
</div>
<!-- Step 2: Amount Input -->
<div class="space-y-sm">
<label class="font-label-md text-label-md text-on-surface-variant" for="amount">Montant du retrait (Ar)</label>
<div class="relative">
<span class="absolute left-md top-1/2 -translate-y-1/2 font-headline-md text-primary/40 font-bold">Ar</span>
<input name="amount"class="w-full bg-surface-container-low border-none rounded-lg h-16 pl-xl pr-md text-headline-md font-bold text-primary focus:ring-2 focus:ring-primary transition-all" id="amount" oninput="calculateFees()" placeholder="0.00" type="number"/>
</div>
<div class="flex justify-between items-center text-label-sm">
<span class="text-on-surface-variant">Solde disponible: <?= $solde ?> Ar</span>
<button class="text-primary font-bold hover:underline" onclick="setMaxAmount()" type="button">Utiliser le maximum</button>
</div>
</div>
<!-- Step 3: Confirmation Toggle -->
<div class="flex items-center gap-sm p-sm bg-surface-container/30 rounded-lg">
<input class="w-5 h-5 rounded text-primary focus:ring-primary border-outline-variant" id="confirm" type="checkbox"/>
<label class="text-label-md text-on-surface-variant" for="confirm">Je confirme l'exactitude des informations fournies.</label>
</div>
<button class="w-full h-[48px] bg-primary text-on-primary font-bold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-sm mt-md" type="submit">
                            Confirmer le retrait
                            <span class="material-symbols-outlined">trending_flat</span>
</button>
</form>
</div>
<!-- Right Side Information Column (Summary & Fees) -->
<!-- <div class="lg:col-span-5 space-y-gutter">
<div class="glass-panel rounded-xl p-md md:p-lg">
<h3 class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mb-md">Détails de la transaction</h3>
<div class="space-y-md">
<div class="flex justify-between items-center pb-sm border-b border-outline-variant/10">
<span class="text-body-md text-on-surface-variant">Montant brut</span>
<span class="font-label-md text-label-md font-bold" id="summary-amount">0.00 €</span>
</div>
<div class="flex justify-between items-center pb-sm border-b border-outline-variant/10">
<span class="text-body-md text-on-surface-variant">Frais de service (<span id="fee-percent">0</span>%)</span>
<span class="font-label-md text-label-md font-bold text-error" id="summary-fees">0.00 €</span>
</div>
<div class="flex justify-between items-center pt-xs">
<span class="text-body-lg font-bold text-primary">Montant net</span>
<span class="text-headline-md font-extrabold text-primary" id="summary-net">0.00 €</span>
</div>
</div>
<div class="mt-lg p-sm bg-primary-container/10 border-l-2 border-primary rounded-r-lg">
<p class="text-label-sm text-on-primary-fixed-variant leading-relaxed">
<span class="material-symbols-outlined text-[16px] align-middle mr-xs">info</span>
                                Les frais sont calculés automatiquement selon le montant. Les retraits de plus de 50,000€ peuvent nécessiter une validation supplémentaire par votre conseiller.
                            </p>
</div>
</div> -->
<!-- Visual Security Badge -->
<!-- <div class="bg-surface-container-highest/50 rounded-xl p-md flex items-center gap-md border border-outline-variant/20">
<div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-on-primary" style="font-variation-settings: 'FILL' 1;">security</span>
</div>
<div>
<h4 class="font-label-md text-label-md text-primary font-bold">Transaction Sécurisée</h4>
<p class="text-label-sm text-on-surface-variant">Cryptage AES-256 et authentification multifacteur activés.</p>
</div>
</div>
<div class="relative h-32 rounded-xl overflow-hidden bg-primary-container group">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 opacity-40" data-alt="Close-up of a premium, deep emerald green textured fabric with soft lighting and subtle shadows, conveying luxury and exclusivity." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA0zPcm6MOfaRQypMZH7ZPV6KT-O1xsvInL713QrsXSOAWQ58EDwN5g5sP5cq6WytZtX6BLUNF96opVqBmAXnyhtZse19D5KE7QNWsbGfdT0VWuq_HfmzFuzril6Vx0UK4KkkMdxwKMKxUgDp-sL7o-N5PuPZb4A0AuZXvJ5ak3FumWo1my78IudGVfbyb3GrHlKrtGO_IRmZDyIfabnO5fusZCdWyatGK4owtV_UfZEV-BiDun0Cm-')"></div>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex items-end p-md">
<span class="text-on-primary font-label-md font-medium">Boutique Wealth Management Solutions</span>
</div>
</div>
</div>
</div>
</div>
</main> -->
<!-- Mobile Navigation Bar -->
<!-- <nav class="md:hidden fixed bottom-0 left-0 w-full bg-surface-container-lowest shadow-lg flex justify-around items-center h-16 z-50">
<div class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-[10px] font-medium">Home</span>
</div>
<div class="flex flex-col items-center gap-1 text-primary">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance</span>
<span class="text-[10px] font-bold">Ops</span>
</div>
<div class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60">
<span class="material-symbols-outlined">history</span>
<span class="text-[10px] font-medium">History</span>
</div>
<div class="flex flex-col items-center gap-1 text-on-surface-variant opacity-60">
<span class="material-symbols-outlined">settings</span>
<span class="text-[10px] font-medium">Account</span>
</div>
</nav> -->
<script>
    //     function selectDestination(type) {
    //         const bankBtn = document.getElementById('dest-bank');
    //         const cashBtn = document.getElementById('dest-cash');
            
    //         if (type === 'bank') {
    //             bankBtn.classList.replace('border-outline-variant/30', 'border-primary');
    //             bankBtn.classList.add('bg-primary-container/5');
    //             bankBtn.querySelector('span:nth-child(1)').classList.add('text-primary');
    //             bankBtn.querySelector('span:nth-child(1)').style.fontVariationSettings = "'FILL' 1";
    //             bankBtn.querySelector('span:nth-child(2)').classList.add('text-primary');

    //             cashBtn.classList.replace('border-primary', 'border-outline-variant/30');
    //             cashBtn.classList.remove('bg-primary-container/5');
    //             cashBtn.querySelector('span:nth-child(1)').classList.remove('text-primary');
    //             cashBtn.querySelector('span:nth-child(1)').style.fontVariationSettings = "'FILL' 0";
    //             cashBtn.querySelector('span:nth-child(2)').classList.remove('text-primary');
    //         } else {
    //             cashBtn.classList.replace('border-outline-variant/30', 'border-primary');
    //             cashBtn.classList.add('bg-primary-container/5');
    //             cashBtn.querySelector('span:nth-child(1)').classList.add('text-primary');
    //             cashBtn.querySelector('span:nth-child(1)').style.fontVariationSettings = "'FILL' 1";
    //             cashBtn.querySelector('span:nth-child(2)').classList.add('text-primary');

    //             bankBtn.classList.replace('border-primary', 'border-outline-variant/30');
    //             bankBtn.classList.remove('bg-primary-container/5');
    //             bankBtn.querySelector('span:nth-child(1)').classList.remove('text-primary');
    //             bankBtn.querySelector('span:nth-child(1)').style.fontVariationSettings = "'FILL' 0";
    //             bankBtn.querySelector('span:nth-child(2)').classList.remove('text-primary');
    //         }
    //     }

    //     function calculateFees() {
    //         const amountInput = document.getElementById('amount');
    //         const summaryAmount = document.getElementById('summary-amount');
    //         const summaryFees = document.getElementById('summary-fees');
    //         const summaryNet = document.getElementById('summary-net');
    //         const feePercentLabel = document.getElementById('fee-percent');

    //         let amount = parseFloat(amountInput.value) || 0;
    //         let feePercent = 0;

    //         // Logic for fee brackets
    //         if (amount <= 1000) {
    //             feePercent = 0.5;
    //         } else if (amount <= 10000) {
    //             feePercent = 0.35;
    //         } else if (amount <= 50000) {
    //             feePercent = 0.2;
    //         } else {
    //             feePercent = 0.15;
    //         }

    //         let fees = amount * (feePercent / 100);
    //         let net = amount - fees;

    //         summaryAmount.innerText = amount.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' €';
    //         summaryFees.innerText = fees.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' €';
    //         summaryNet.innerText = net.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' €';
    //         feePercentLabel.innerText = feePercent.toString();
    //     }

    //     function setMaxAmount() {
    //         document.getElementById('amount').value = 145200;
    //         calculateFees();
    //     }

    //     // Form submission animation mock
    //     document.getElementById('withdrawalForm').addEventListener('submit', function(e) {
    //         e.preventDefault();
    //         const btn = e.target.querySelector('button');
    //         const originalContent = btn.innerHTML;
            
    //         btn.disabled = true;
    //         btn.innerHTML = `<span class="animate-spin material-symbols-outlined">progress_activity</span> Traitement...`;
            
    //         setTimeout(() => {
    //             btn.innerHTML = `<span class="material-symbols-outlined">check_circle</span> Succès !`;
    //             btn.classList.replace('bg-primary', 'bg-tertiary-container');
    //             setTimeout(() => {
    //                 btn.disabled = false;
    //                 btn.innerHTML = originalContent;
    //                 btn.classList.replace('bg-tertiary-container', 'bg-primary');
    //             }, 3000);
    //         }, 1500);
    //     });
    // </script>
</body></html>