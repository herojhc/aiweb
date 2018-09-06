<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2018-05-31
 * Time: 15:39
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin');
    }
}