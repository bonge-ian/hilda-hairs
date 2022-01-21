<?php

namespace App\Http\Livewire;

use App\Models\County;
use Livewire\Component;
use Illuminate\Support\Collection;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public string $address_1 = '';

    public ?string $address_2 = '';

    public array $cartItems = [];

    public bool $createAccount = false;

    public string $county = '';

    public Collection $counties;

    public string $email = '';

    public string $firstname = '';

    public string $lastname = '';

    public ?string $orderNotes = '';

    public string $postalcode = '';

    public string $phone = '';

    public string $town = '';

    protected $messages = [
        'phone' => 'The phone number must be a Kenyan phone number.'
    ];

    public function mount()
    {
        $this->cartItems = Cart::content()->toArray();
        $this->counties = collect();

        $this->fillFromAuthenticatedUser();
    }

    public function fetchCounties(): void
    {
        $this->counties = County::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.checkout')
            ->layout('layouts.app', ['title' => 'Checkout']);
    }

    protected function fillFromAuthenticatedUser()
    {
        if (!Auth::check()) {
            return;
        }

        $this->fill([
            'firstname' => Auth::user()->firstname,
            'lastname' => Auth::user()->lastname,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
        ]);
    }

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::when(Auth::check(), ['required', 'exists:users,name'])
            ],
            'email' => [
                'required',
                'email',
                'indisposable',
                Rule::when(Auth::check(), ['required', 'email', 'exists:users,email', 'indisposable'])
            ],
            'phone' => [
                'required',
                'phone:KE',
                Rule::when(Auth::check(), ['required', 'exists:users,phone', 'phone:KE'])
            ],
            'county' => 'required|exists:counties,code|string',
            'address_1' => 'required|string|min:6|max:255',
            'address_2' => 'required_if:address_1|string|max:255',
            'orderNotes' => 'sometimes|required|string|min:3',
            'town' => 'required|string',
            'postalcode' => 'sometimes|required|string|min:5',
            'createAccount' => 'sometimes|accepted'
        ];
    }
}
