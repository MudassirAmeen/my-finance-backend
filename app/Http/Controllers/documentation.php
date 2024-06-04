<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class documentation extends Controller
{
    public function indexIncome(){
        return view('documentation.income_api');
    }

    public function indexExpense(){
        return view('documentation.expense_api');
    }

    public function indexAuth(){
        return view('documentation.auth_api');
    }
}
