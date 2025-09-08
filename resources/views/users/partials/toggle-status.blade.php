<div class="form-check form-switch">
    <input
        class="form-check-input toggle-status"
        type="checkbox"
        role="switch"
        data-id="{{ $user->id }}"
        {{ $user->is_active ? 'checked' : '' }}
    >
    <label class="form-check-label">
        {{ $user->is_active ? 'Active' : 'Inactive' }}
    </label>
</div>
