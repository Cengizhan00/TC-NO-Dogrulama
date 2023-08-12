<?php

/*
 * This file is part of cengizhan/tc-no-dogrulama.
 *
 * Copyright (c) 2023 CengizHan.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace CengizHan\TcNoDogrulama;

use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    
     (new Extend\Routes('api'))
        ->post('/account-verification-admin', 'account-verification-admin.index.', AccountVerificationAdminController::class)
        ->post('/account-verification', 'account-verification.index', AccountVerificationController::class),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    new Extend\Locales(__DIR__.'/locale'),
     function (Dispatcher $events) {
        $events->subscribe(Listeners\UserListener::class);
    }
];
