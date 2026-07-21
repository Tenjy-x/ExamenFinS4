<?php
$active = $active ?? 'dashboard';
$user = session()->get('user');

$navItems = [
    'dashboard'  => ['icon' => 'dashboard', 'label' => 'Tableau de Bord', 'url' => base_url('/index')],
    'depot'      => ['icon' => 'add_circle', 'label' => 'Dépôt', 'url' => base_url('/depot')],
    'retrait'    => ['icon' => 'remove_circle', 'label' => 'Retrait', 'url' => base_url('/retrait')],
    'transfert'  => ['icon' => 'send', 'label' => 'Transfert', 'url' => base_url('/transfert')],
    'historique' => ['icon' => 'list_alt', 'label' => 'Historique', 'url' => base_url('/historique')],
];

$bottomItems = [
    'logout'  => ['icon' => 'logout', 'label' => 'Déconnexion', 'url' => base_url('/logoutClient')],
];
?>

<aside class="hidden md:flex flex-col h-screen w-64 fixed left-0 top-0 bg-surface border-r border-outline-variant/30 py-md px-sm z-50">
    <div class="flex items-center gap-sm px-sm mb-lg">
        <div>
            <h1 class="font-headline-md text-[18px] font-bold text-primary">AuraWealth</h1>
            <?php if ($user): ?>
                <p class="font-label-sm text-outline"><?= $user['numero'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <nav class="flex-1 space-y-xs">
        <?php foreach ($navItems as $key => $item): ?>
        <a class="flex items-center gap-sm px-sm py-md rounded-xl transition-all duration-200 <?= $active === $key ? 'text-primary bg-primary/5 font-bold' : 'text-on-secondary-container hover:bg-secondary-container/20' ?>"
            href="<?= $item['url'] ?>">
            <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
            <span class="font-label-md"><?= $item['label'] ?></span>
        </a>
        <?php endforeach; ?>
    </nav>
    <div class="pt-md border-t border-outline-variant/30 space-y-xs">
        <?php foreach ($bottomItems as $key => $item): ?>
        <a class="flex items-center gap-sm px-sm py-md rounded-xl transition-all duration-200 <?= $key === 'logout' ? 'text-error hover:bg-error/5' : 'text-on-secondary-container hover:bg-secondary-container/20' ?>"
            href="<?= $item['url'] ?>">
            <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
            <span class="font-label-md"><?= $item['label'] ?></span>
        </a>
        <?php endforeach; ?>
    </div>
</aside>
