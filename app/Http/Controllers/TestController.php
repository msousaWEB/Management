<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(int $p1, int $p2){
        // echo "The sum of the $p1 and $p2 ​​is: ".($p1+$p2);
        // return view('site.test', ['x' => $p1, 'y' => $p2]); ARRAY ASSOCIATIVO

        // return view('site.test', compact('p1', 'p2')); COMPACT

        return view('site.test')->with('a', $p1)->with('b', $p2);
    }
}
