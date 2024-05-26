<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        return view('admin.pages.settings.categories')->extends('layouts.admin');
    }
}
