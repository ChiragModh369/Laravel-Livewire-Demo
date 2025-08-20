<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $email, $password, $is_active = true;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'is_active' => 'boolean',
    ];

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_active' => $this->is_active
        ]);

        session()->flash('success', 'User created successfully!');
        // return redirect()->route('users.index');
        return $this->redirect(route('users.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
