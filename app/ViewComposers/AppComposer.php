<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class AppComposer 
{ 

public $items = []; 

public function __construct() 
{ 
} 

public function compose(View $view) { $view->with('items', end($this->items)); }}
