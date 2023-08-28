<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Brand;
use App\Models\Category;

class ShowCustomer extends Component
{
    public $customer, $brands, $categories;
    public $open =false;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->brands = Brand::get(['id', 'name']);
        $this->categories = Category::get(['id', 'name']);
    }



    public function render()
    {
        return view('livewire.customers.show-customer');
    }
}