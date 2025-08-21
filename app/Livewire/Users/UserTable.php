<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';

    public $statusFilter = '';

    public $is_active = true;

    public $sortField = 'id';

    public $sortDirection = 'desc';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = ! $user->is_active;
        $user->save();

        $this->dispatch('showToastr', type: 'success', message: 'User status updated successfully!');
        // session()->flash('success', 'User status updated successfully!');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDelete', id: $id);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('showToastr', type: 'success', message: 'User deleted successfully!');
        // session()->flash('success', 'User deleted successfully!');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $query = User::query();

        // Search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%');
            });
        }

        // Status filter
        if ($this->statusFilter !== '') {
            $query->where('is_active', $this->statusFilter);
        }

        $users = $query->orderBy($this->sortField, $this->sortDirection)->paginate(env('PAGINATION_LIMIT'));

        return view('livewire.users.user-table', compact('users'));
    }
}
