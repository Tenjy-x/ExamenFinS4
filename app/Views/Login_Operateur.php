<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Emerald Ledger - Connexion Opérateur</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="<?= base_url('Js/tailwind-config.js') ?>"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Plus+Jakarta+Sans:wght@100..900&amp;display=swap"
        rel="stylesheet" />
    <style>
        body {
            background-color: #f7f9fb;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }

        .custom-input:focus {
            outline: none;
            border-color: #2b6954;
            box-shadow: 0 0 0 2px rgba(43, 105, 84, 0.2);
        }
    </style>
</head>

<body class="antialiased text-on-surface">
    <main class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Side: Premium Image Section -->
        <div class="hidden md:flex md:w-1/2 lg:w-3/5 relative overflow-hidden bg-primary">
            <div class="absolute inset-0 z-0">
                <img class="w-full h-full object-cover opacity-90"
                    data-alt="A high-end, minimalist architectural shot of a modern financial district building with clean lines and glass surfaces. The lighting is early morning soft blue and green tones, reflecting a quiet luxury aesthetic. Subtle emerald green glass panels catch the light, creating a sense of transparency and institutional stability for a wealth management brand."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDscqw1m036nAXykDdVjlKE-1YlsNm5XIBW9KmWzIW4I4EgTDY9qMbmh9qu88p_sLXdFInIG0shpEvgSHag1ZejpIFXtLaEaOt-m3hfEopsuR8zKkuocY8O2fBSkL5j6RhJQ_vh1PLaEZEEuwpZwzou5WthFvIpwazlHEVXNjKeINpvF65XFVqsw0BDBrNIypqHFgrDJyRbR1MKetIs_M4SQhJR2gdH8cQ4DfyldcknUX9p4REU0q1F" />
            </div>
            <!-- Overlay Content -->
            <div
                class="relative z-10 p-xl flex flex-col justify-between h-full bg-gradient-to-t from-primary/60 to-transparent">
                <div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-primary-fixed text-4xl"
                            style="font-variation-settings: 'FILL' 1;">account_balance</span>
                        <h1 class="font-headline-lg text-headline-lg text-white font-extrabold tracking-tight">Emerald
                            Ledger</h1>
                    </div>
                </div>
                <div class="max-w-md">
                    <p class="font-display-lg text-display-lg text-white mb-md">L'excellence dans la gestion de
                        patrimoine.</p>
                    <p class="font-body-lg text-body-lg text-primary-fixed opacity-90">Une interface sécurisée pour
                        piloter vos opérations financières avec une précision absolue.</p>
                </div>
            </div>
        </div>
        <!-- Right Side: Login Form Section -->
        <div
            class="w-full md:w-1/2 lg:w-2/5 flex flex-col justify-center items-center p-margin-mobile md:p-xl bg-surface-container-lowest">
            <div class="w-full max-w-md space-y-lg">
                <!-- Branding for Mobile -->
                <div class="md:hidden flex items-center justify-center gap-xs mb-lg">
                    <span class="material-symbols-outlined text-primary text-3xl">account_balance</span>
                    <span class="font-headline-md text-headline-md font-bold text-primary">Emerald Ledger</span>
                </div>
                <!-- Header -->
                <div class="text-center md:text-left">
                    <h2 class="font-headline-lg text-headline-lg text-primary font-bold mb-xs">Espace Opérateur</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Accédez à votre console de gestion</p>
                    <?php if (isset($error)): ?>
                    <div class="bg-error-container text-on-error-container p-sm rounded-lg font-label-md text-label-md mt-sm"><?= $error ?></div>
                    <?php endif; ?>
                </div>
                <!-- Form Card -->
                <form class="space-y-md" action="<?= base_url('auth_operateur') ?>" method="POST">
                    <!-- Nom Field -->
                    <div class="space-y-xs">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block"
                            for="nom">Nom d'utilisateur</label>
                        <div class="relative">
                            <input name="nom"
                                class="custom-input w-full h-[56px] px-md pl-12 bg-surface-container-low border border-outline-variant rounded-lg font-body-md"
                                id="nom" placeholder="admin" type="text" />
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant">person</span>
                        </div>
                    </div>
                    <!-- Password Field -->
                    <div class="space-y-xs">
                        <label
                            class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block"
                            for="mot_de_passe">Mot de passe</label>
                        <div class="relative">
                            <input name="mot_de_passe"
                                class="custom-input w-full h-[56px] px-md pl-12 bg-surface-container-low border border-outline-variant rounded-lg font-body-md"
                                id="mot_de_passe" placeholder="••••••••" type="password" />
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant">lock</span>
                        </div>
                    </div>
                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-xs cursor-pointer group">
                            <input class="w-4 h-4 rounded border-outline text-primary focus:ring-primary"
                                type="checkbox" />
                            <span
                                class="font-label-md text-label-md text-on-surface-variant group-hover:text-primary transition-colors">Se
                                souvenir de moi</span>
                        </label>
                        <a class="font-label-md text-label-md text-primary font-semibold hover:underline" href="#">Mot
                            de passe oublié ?</a>
                    </div>
                    <!-- Action Button -->
                    <button
                        class="w-full h-[56px] bg-primary text-white font-label-md text-label-md font-bold rounded-lg hover:bg-primary-container transition-all duration-200 active:scale-[0.98] shadow-md flex items-center justify-center gap-sm"
                        type="submit">
                        <span>Se connecter</span>
                        <span class="material-symbols-outlined text-[20px]">login</span>
                    </button>
                </form>
                <!-- Secondary Action -->
                <div class="pt-md border-t border-outline-variant/30 text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Vous êtes un client ?
                        <a class="text-primary font-bold hover:text-surface-tint transition-colors ml-xs flex inline-flex items-center gap-xs"
                            href="<?= base_url('')?>">
                            Accès Client <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Footer Small Print -->
            <div class="mt-xl text-center md:absolute md:bottom-md">
                <p class="font-label-sm text-label-sm text-on-surface-variant/60">
                    © 2024 Emerald Ledger Wealth Management. <br class="md:hidden" /> Tous droits réservés.
                </p>
            </div>
        </div>
    </main>
</body>

</html>