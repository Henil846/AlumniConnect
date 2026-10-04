<?php
namespace App\Controllers;

use App\Core\View;

class LegalController {
    public function terms() {
        return View::render('legal/terms', [
            'title' => 'Terms of Service',
            'activePage' => 'terms',
            'extraCss' => '/assets/css/extended.css'
        ], 'app');
    }

    public function privacy() {
        return View::render('legal/privacy', [
            'title' => 'Privacy Policy',
            'activePage' => 'privacy',
            'extraCss' => '/assets/css/extended.css'
        ], 'app');
    }
}
