<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $boxes = $user->boxes;
        return Inertia::render('Exam/index', ['boxes' => $boxes]);
    }
    public function show_options(Box $box)
    {
        return Inertia::render('Exam/show_options', ['box' => $box]);
    }
    public function test(Box $box)
    {
        $cards = $box->cards;
        $cards = $cards->random(count($cards)-1);
        return Inertia::render('Exam/test', ['cards' => $cards]);
    }
    public function practice(Box $box)
    {
        $cards = $box->cards;
        $cards = $cards->random(count($cards)-1);
        return Inertia::render('Exam/practice', ['cards' => $cards]);
    }
}
