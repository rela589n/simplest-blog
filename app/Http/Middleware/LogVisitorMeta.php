<?php

namespace App\Http\Middleware;

use App\Models\VisitorMeta;
use Closure;
use Jenssegers\Agent\Agent;

class LogVisitorMeta
{
    /**
     * @var Agent
     */
    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->agent->setUserAgent($request->userAgent());

        $visitor = VisitorMeta::updateOrCreate(
            ['ip' => $request->ip()],
            ['browser' => $this->agent->browser()]
        );

        $visitor->touch();

        return $next($request);
    }
}
