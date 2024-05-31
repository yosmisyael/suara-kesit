<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteUserModal extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.delete-user-modal', ['id' => $this->id]);
    }
}
