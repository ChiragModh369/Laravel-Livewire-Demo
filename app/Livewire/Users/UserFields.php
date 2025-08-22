<?php
namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserFields extends Component
{
    public Collection $users;

    protected $rules = [
        'users.*.name' => 'required|string|min:3',
        'users.*.email' => 'required|email',
        'users.*.password' => 'required|min:6',
        'users.*.is_active' => 'required|in:0,1',
    ];

    public function mount()
    {
        $this->users = collect([[
            'name' => '',
            'email' => '',
            'password' => '',
            'is_active' => '1',
        ]]);
    }

    public function addUser()
    {
        $this->users->push([
            'name' => '',
            'email' => '',
            'password' => '',
            'is_active' => '1',
        ]);
    }

    public function removeUser($key)
    {
        $this->users->forget($key);
    }

    public function store()
    {
        $this->validate();
        // Example: Save to database
        foreach ($this->users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'is_active' => $user['is_active'],
            ]);
        }
        $this->users = collect([[
            'name' => '',
            'email' => '',
            'password' => '',
            'is_active' => '1',
        ]]);
        session()->flash('success', 'Users saved successfully!');
        $this->redirectRoute('users.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.users.user-fields');
    }
}
