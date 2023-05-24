<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileHeader extends Component
{
    
    public $name,$email;

    public function __construct()
    {
        $data= User::find(Auth::user()->id)->first();
        $this->name = $data->name;
        $this->email = $data->email;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-header');
    }
}
