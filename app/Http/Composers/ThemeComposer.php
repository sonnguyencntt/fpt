<?php

namespace App\Http\Composers;

use App\Repositories\category\CategoryRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
use Illuminate\View\View;

class ThemeComposer
{
    
    public function __construct(ThemeRepositoryInterface $themeRepo)
    {
 
        $this->themeRepo=$themeRepo->first();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('themeView', $this->themeRepo);
        
    }
}