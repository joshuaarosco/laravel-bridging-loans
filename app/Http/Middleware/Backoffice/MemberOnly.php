<?php

namespace App\Http\Middleware\Backoffice;

use Illuminate\Contracts\Auth\Guard;
use App\Logic\GeneralLogic;
use Closure;

class MemberOnly
{

    /**
    * The Guard implementation.
    *
    * @var Guard
    */
    protected $auth;

    /**
    * Create a new filter instance.
    *
    * @param  Guard  $auth
    * @return void
    */
    public function __construct(Guard $auth,GeneralLogic $logic)
    {
        $this->auth = $auth;
        $this->logic = $logic;
    }

    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if (!in_array($this->auth->user()->type, ['member'])) {
            return $this->logic->redirectUser($this->auth->user()->type);
        }

        return $next($request);
    }

}
