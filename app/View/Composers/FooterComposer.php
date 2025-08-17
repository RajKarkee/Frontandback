<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\FooterSetting;

class FooterComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('footerSetting', FooterSetting::getInstance());
    }
}
