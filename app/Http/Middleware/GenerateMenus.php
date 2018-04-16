<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('MyNavBar', function($menu){

            // As you see, you need to pass the second parameter as an associative array:
            $menu->add('Home',     ['class' => 'navbar navbar-home', 'id' => 'home']);
            
            // $menu->add('About',    ['class' => 'navbar navbar-about dropdown']);
            

            $about = $menu->add('About',    ['class' => 'navbar navbar-about dropdown']);

            $menu->about->attr(['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'])
            ->append(' <b class="caret"></b>')
            ->prepend('<span class="glyphicon glyphicon-user"></span> ');
            $menu->about->add('Who We are', 'who-we-are');
            $menu->get('about')->add('What We Do', 'what-we-do');

            $menu->item('about')->add('Our Goals', 'our-goals');
            $menu->add('services');
            $menu->add('Contact',  'contact');

        });
        return $next($request);
    }
}
