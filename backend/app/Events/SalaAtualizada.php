<?php
namespace App\Events;

use App\Models\Turma;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SalaAtualizada
{
    use Dispatchable, SerializesModels;

    public $turma;

    public function __construct(Turma $turma)
    {
        $this->turma = $turma;
    }

    public function broadcastOn()
    {
        return new Channel('turmas');
    }
}
