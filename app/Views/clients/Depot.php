<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Effectuer un Dépôt | Emerald Ledger</title>
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
            background-color: #F8FAFC;
            color: #191c1e;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        .deposit-type-active {
            border: 2px solid #003527;
            background-color: rgba(0, 53, 39, 0.04);
        }
    </style>
</head>

<body class="font-body-md text-body-md overflow-x-hidden">
    <?= view('partials/sidebar_client', ['active' => 'depot']); ?>
    <!-- Header / Top Bar -->
    <header
        class="flex justify-between items-center px-md w-full sticky top-0 z-30 bg-surface-container-lowest h-16 shadow-sm md:pl-[280px]">
        <div class="flex items-center gap-sm">
            <span class="material-symbols-outlined text-primary md:hidden">menu</span>
            <span class="font-label-md text-on-surface-variant">Operations / Dépôt</span>
        </div>
        <div class="flex items-center gap-md">
            <div class="relative hidden sm:block">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline scale-90">search</span>
                <input
                    class="bg-surface-container-low border-none rounded-full pl-10 pr-4 py-2 text-sm focus:ring-1 focus:ring-primary w-48 transition-all focus:w-64"
                    placeholder="Rechercher..." type="text" />
            </div>
            <span class="material-symbols-outlined text-on-surface-variant cursor-pointer">notifications</span>
            <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center overflow-hidden">
                <img class="w-full h-full object-cover"
                    data-alt="A professional headshot of a high-net-worth individual client, middle-aged, wearing a tailored navy suit with a clean, blurred office background. The lighting is soft and cinematic, conveying a sense of executive leadership and calm confidence. The overall aesthetic is sharp and luxurious, matching the boutique fintech brand identity."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlSqX8aaW3AjkxIHtie2at8Ypibmcr9k0D27TC5krmVp5mVw5OUQKhf9zAHaentfX3yBe76q-oFyzcYVZtmqTw2K5_He4rPPA-N8YjRrPecyqWwTDpHKYkyxWQB9romU2ciXJE_NmOWoni8alNpi4oCDHerheEk6UgBrFjpiMJddqnuGH_af8J2l6NzKhjJ5GgrtPl5Pxahfc_ytwBgFYdew8YYgfvsMvmICT49jql_suzKcXcwOYy" />
            </div>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="md:ml-64 p-gutter lg:p-xl flex flex-col items-center">
        <div class="w-full max-w-4xl">
            <!-- Breadcrumbs / Heading -->
            <div class="mb-lg">
                <h2 class="font-display-lg text-primary mb-xs">Effectuer un Dépôt</h2>
                <p class="font-body-lg text-on-surface-variant">Alimentez votre compte en toute sécurité avec nos
                    options flexibles.</p>
            </div>
            <!-- Main Layout Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter items-start">
                <!-- Deposit Form Column -->
                <div class="lg:col-span-2 space-y-gutter">
                    <section class="glass-card rounded-xl p-md lg:p-lg">
                        <form class="space-y-lg" method= "get"id="deposit-form" action="<?= base_url('traitement_depot')?>">
                            <!-- Method Selection -->
                            <!-- <div>
                                <label class="block font-label-md text-on-surface-variant mb-md">Mode de dépôt</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                                    <button
                                        class="deposit-type-active flex flex-col items-start p-md rounded-xl border border-outline-variant transition-all hover:border-primary/50 text-left"
                                        id="method-virement" onclick="selectMethod('virement')" type="button">
                                        <div
                                            class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center mb-sm">
                                            <span class="material-symbols-outlined text-primary"
                                                style="font-variation-settings: 'FILL' 1;">account_balance</span>
                                        </div>
                                        <span class="font-headline-md text-[16px] mb-xs">Virement Bancaire</span>
                                        <span class="font-label-sm text-on-surface-variant opacity-70">Traitement en 1-2
                                            jours ouvrables</span>
                                    </button>
                                    <button
                                        class="flex flex-col items-start p-md rounded-xl border border-outline-variant transition-all hover:border-primary/50 text-left"
                                        id="method-especes" onclick="selectMethod('especes')" type="button">
                                        <div
                                            class="w-10 h-10 bg-secondary-container/50 rounded-full flex items-center justify-center mb-sm">
                                            <span class="material-symbols-outlined text-secondary">payments</span>
                                        </div>
                                        <span class="font-headline-md text-[16px] mb-xs">Espèces</span>
                                        <span class="font-label-sm text-on-surface-variant opacity-70">Dépôt immédiat en
                                            agence</span>
                                    </button>
                                </div>
                            </div> -->
                            <!-- Amount Input -->
                            <div>
                                <label class="block font-label-md text-on-surface-variant mb-sm" for="amount">Montant à
                                    déposer</label>
                                <div class="relative">
                                    <span
                                        class="absolute left-md top-1/2 -translate-y-1/2 font-headline-md text-primary">Ar</span>
                                    <input
                                        class="w-full bg-surface-container-low border-none rounded-xl py-4 pl-12 pr-md text-headline-md focus:ring-2 focus:ring-primary transition-all"
                                        id="amount" name="amount" placeholder="0.00" step="0.01" type="number" />
                                </div>
                                <!-- <div class="flex flex-wrap gap-xs mt-sm">
                                    <button
                                        class="px-md py-xs bg-surface-container-high rounded-full font-label-sm hover:bg-primary hover:text-white transition-colors"
                                        onclick="setAmount(1000)" type="button">1 000 €</button>
                                    <button
                                        class="px-md py-xs bg-surface-container-high rounded-full font-label-sm hover:bg-primary hover:text-white transition-colors"
                                        onclick="setAmount(5000)" type="button">5 000 €</button>
                                    <button
                                        class="px-md py-xs bg-surface-container-high rounded-full font-label-sm hover:bg-primary hover:text-white transition-colors"
                                        onclick="setAmount(10000)" type="button">10 000 €</button>
                                </div> -->
                            </div>
                            <!-- Submit Button -->
                            <button
                                class="w-full h-12 bg-primary text-white rounded-xl font-headline-md text-[16px] hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-sm"
                                type="submit">
                                <span class="material-symbols-outlined">security</span>
                                Valider le dépôt
                            </button>
                        </form>
                    </section>
                    <!-- Decorative / Info Section -->
                    <div class="relative h-48 rounded-xl overflow-hidden group">
                        <div class="w-full h-full bg-cover bg-center"
                            data-alt="A macro close-up of high-quality emerald green marble texture with delicate white and gold veins. The lighting highlights the crystalline structure of the stone, creating a sense of natural luxury and permanence. The image is clean, sharp, and serves as an atmospheric background for a wealth management platform."
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC63yYPEq3ClTBF-e9ONHM9Ok3h8huotcQcRBSRKUegLJCd-NBUFf1uOm-mocBIgJBfjfTum-AC5TTWAsfflCTjb-w6jPwQ64_3tn-5d2zTa-8C6ReMVlVFiQooAzRyaSOjK6aRWMwuxTiU372QK6hQDI1yz0TPQkunv-4BzoxEsou3i4HiZMpqhmQwybt4mCR3AXw0guhrE_XMszbI26qSqDvPRCpKOtEVuo1sIVsTsilR_Lsk1JLC')">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary/80 to-transparent flex flex-col justify-center px-lg text-white">
                            <h3 class="font-headline-md mb-xs">Sécurité Maximale</h3>
                            <p class="font-label-md max-w-xs opacity-90">Vos fonds sont protégés par les protocoles de
                                sécurité les plus stricts du secteur.</p>
                        </div>
                    </div>
                </div>
                <!-- Summary Sidebar -->
                <!-- <aside class="space-y-gutter">
                    <div class="glass-card rounded-xl p-md border border-outline-variant/30">
                        <h3 class="font-label-md text-on-surface-variant uppercase tracking-wider mb-md">Récapitulatif
                        </h3>
                        <div class="space-y-md mb-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-on-surface-variant">Mode choisi</span>
                                <span class="font-bold text-primary" id="summary-method">Virement Bancaire</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-on-surface-variant">Frais de dépôt</span>
                                <span
                                    class="text-tertiary font-bold bg-tertiary-fixed-dim/20 px-2 py-0.5 rounded text-sm">Gratuit
                                    (0 €)</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-on-surface-variant">Délai estimé</span>
                                <span class="text-sm" id="summary-delay">24 - 48 Heures</span>
                            </div>
                        </div>
                        <div class="pt-md border-t border-outline-variant/30">
                            <div class="flex justify-between items-baseline mb-sm">
                                <span class="font-label-md text-on-surface-variant">Total crédité</span>
                                <span class="font-headline-md text-primary" id="summary-total">0,00 €</span>
                            </div>
                            <p class="font-label-sm text-on-surface-variant opacity-60 leading-relaxed">
                                Le montant exact sera crédité sur votre compte dès réception et validation par nos
                                équipes.
                            </p>
                        </div>
                    </div>
                    <div class="p-md rounded-xl bg-secondary-container/20 border border-secondary-container">
                        <div class="flex gap-sm items-start">
                            <span class="material-symbols-outlined text-secondary">info</span>
                            <div>
                                <h4 class="font-label-md text-secondary mb-xs">Besoin d'aide ?</h4>
                                <p class="font-label-sm text-on-secondary-container">Contactez votre conseiller dédié
                                    pour toute assistance concernant vos opérations complexes.</p>
                                <a class="inline-block mt-md text-secondary font-bold hover:underline"
                                    href="#">Contacter un expert</a>
                            </div>
                        </div>
                    </div>
                </aside> -->
            </div>
        </div>
    </main>
    <!-- Mobile Bottom Navigation (Visible only on mobile) -->
    <nav
        class="md:hidden fixed bottom-0 left-0 right-0 h-16 bg-surface-container-lowest flex items-center justify-around z-50 border-t border-outline-variant/20 px-sm">
        <a class="flex flex-col items-center gap-xs text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center gap-xs text-primary font-bold" href="#">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance</span>
            <span class="text-[10px]">Dépôt</span>
        </a>
        <a class="flex flex-col items-center gap-xs text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">history</span>
            <span class="text-[10px]">Activités</span>
        </a>
        <a class="flex flex-col items-center gap-xs text-on-surface-variant" href="#">
            <span class="material-symbols-outlined">account_circle</span>
            <span class="text-[10px]">Profil</span>
        </a>
    </nav>
    <!-- <script>
        function selectMethod(method) {
            const virementBtn = document.getElementById('method-virement');
            const especesBtn = document.getElementById('method-especes');
            const summaryMethod = document.getElementById('summary-method');
            const summaryDelay = document.getElementById('summary-delay');

            if(method === 'virement') {
                virementBtn.classList.add('deposit-type-active', 'border-primary');
                virementBtn.querySelector('div').classList.add('bg-primary/10');
                especesBtn.classList.remove('deposit-type-active', 'border-primary');
                especesBtn.querySelector('div').classList.remove('bg-primary/10');
                summaryMethod.textContent = 'Virement Bancaire';
                summaryDelay.textContent = '24 - 48 Heures';
            } else {
                especesBtn.classList.add('deposit-type-active', 'border-primary');
                especesBtn.querySelector('div').classList.add('bg-primary/10');
                virementBtn.classList.remove('deposit-type-active', 'border-primary');
                virementBtn.querySelector('div').classList.remove('bg-primary/10');
                summaryMethod.textContent = 'Espèces';
                summaryDelay.textContent = 'Immédiat';
            }
        }

        function setAmount(val) {
            const input = document.getElementById('amount');
            input.value = val;
            updateSummary();
        }

        function updateSummary() {
            const input = document.getElementById('amount');
            const summaryTotal = document.getElementById('summary-total');
            const value = parseFloat(input.value) || 0;
            summaryTotal.textContent = value.toLocaleString('fr-FR', { style: 'currency', currency: 'EUR' });
        }

        document.getElementById('amount').addEventListener('input', updateSummary);

        document.getElementById('deposit-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalContent = btn.innerHTML;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">sync</span> Traitement...';
            btn.disabled = true;
            
            setTimeout(() => {
                alert('Votre demande de dépôt a été transmise avec succès.');
                btn.innerHTML = originalContent;
                btn.disabled = false;
            }, 1500);
        });
    </script> -->
</body>

</html>