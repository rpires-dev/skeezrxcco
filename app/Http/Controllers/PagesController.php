<?php

namespace App\Http\Controllers;

use App\Page as AppPage;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
    public function show($slug)
    {

        if ($page = AppPage::findBySlug($slug)) {
            return view(
                'page.show',
                [
                    'page' => $page,
                ]
            );
        }

        return abort('errors.404');
    }
}
