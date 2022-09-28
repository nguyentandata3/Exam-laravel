<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    protected $website = 'admin.';
    protected $view = null;
    protected $modules = null;
    public $db;

    public function __construct($modules) {
        $this->modules = $modules;
        $this->view = $this->website . ".modules." .$modules;
        $this->db = DB::table($modules);
    }

    public function view_admin(string $page, array $data = []) {
        return view($this->view . "." . $page, $data);
    }

    public function route_admin(string $page, array $params = [], array $flash = []) {
        if(empty($flash)) {
            return redirect()->route($this->website . $this->modules . "." . $page, $params);
        }
        else {
            return redirect()->route($this->website . $this->modules . "." . $page, $params)->with($flash); 
        }
    }
}
