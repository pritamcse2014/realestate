<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function AgentDashboard() {
        // echo 'Agent';
        // die();
        return view('agent.index');
    }
}
