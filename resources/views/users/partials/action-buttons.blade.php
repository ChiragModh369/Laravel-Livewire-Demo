<div class="gap-1">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Edit">
        <i class="bi bi-pencil-square"></i>
    </a>
     <button type="button"
            class="btn btn-sm btn-danger delete-user"
            data-url="{{ route('users.destroy', $user->id) }}"
            title="Delete">
        <i class="bi bi-trash"></i>
    </button>
</div>
