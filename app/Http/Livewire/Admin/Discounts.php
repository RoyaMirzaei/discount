<?php

namespace App\Http\Livewire\Admin;

use App\Models\Discount;
use Livewire\Component;
use Livewire\WithFileUploads;

class Discounts extends Component
{
    use WithFileUploads;
    public $discounts, $code,$type_discount,$type_value,$value_percent,$value_fixed,$max_discount,$title, $count_user, $count_discount, $expiry_date, $status;
    public $isOpen = 0;

    public function render()
    {
        $this->discounts = Discount::all();
//        return view('livewire.discounts',compact('discounts','$isOpen'));
        return view('livewire.admin.discounts')->layout('layouts.base');
    }
}
