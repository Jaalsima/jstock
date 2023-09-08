<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;

use App\Models\Customer;

class ShowCustomer extends Component
{
    public $customer;
    public $open_show =false;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        return view('livewire.customers.show-customer');
    }
}