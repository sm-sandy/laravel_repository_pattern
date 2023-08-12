<?php

namespace App\Http\Controllers;

use App\Contact\UserInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $user;
    public function __construct(UserInterface $interface)
    {
        $this->user = $interface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->user->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique :users',
            'password' => 'required',
        ]);
        return  $this->user->store($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  $this->user->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  $this->user->get($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->user->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return  $this->user->delete($id);
    }
}
