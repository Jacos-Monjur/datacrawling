<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-users', [
            'users' => DB::table('merchant_acc')->where('Businessname', $this->search)->get(),
        ]);
    }
}
