<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEdit extends Component
{

    use WithFileUploads;

    public $user_id, $name, $email, $is_active = true;
    public $countryId, $stateId;
    public $countries = [];
    public $states = [];
    public $profile_picture;      // Existing file (path)
    public $new_profile_picture;
    protected $rules = [
        'name' => 'required|min:3',
        // 'email' => 'required|email',
        'countryId' => 'required|exists:countries,id',
        'stateId' => 'required|exists:states,id',
        'new_profile_picture' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
    ];

    public function mount($user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active;
        $this->profile_picture = $user->profile_picture;

        $this->countries = Country::orderBy('name')->get();

        $this->countryId = $user->country_id;
        $this->stateId = $user->state_id;

        if ($this->countryId) {
            $this->states = State::where('country_id', $this->countryId)->orderBy('name')->get();
        }
    }

    public function updatedCountryId($value)
    {
        // When country changes, update states
        $this->states = State::where('country_id', $value)->orderBy('name')->get();
        $this->stateId = null; // reset state
    }


    public function update()
    {
        // $this->validate();
        $this->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user_id),
            ],
        ]);
        $user = User::findOrFail($this->user_id);

        if ($this->new_profile_picture) {
            $filename = $this->new_profile_picture->store('profiles', 'public');

            // Optionally: delete old picture
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $filename;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'is_active' => $this->is_active,
            'country_id' => $this->countryId,
            'state_id' => $this->stateId,
            'profile_picture' => $user->profile_picture,
        ]);

        session()->flash('success', 'User updated successfully!');
        // return redirect()->route('users.index');
        // return $this->redirect(route('users.index'), navigate: true);
        $this->redirectRoute('users.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}
