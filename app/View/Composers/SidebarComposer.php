<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\HomeSetting;
use App\Models\FooterSetting;

class SidebarComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with([
            'homeSetting' => HomeSetting::getInstance(),
            'footerSetting' => FooterSetting::getInstance(),
        ]);
    }
}
