<?php

namespace App\View\Components\Main;

use App\Models\VisitorMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Footer extends Component
{
    public function visits()
    {
        return DB::table(VisitorMeta::tableName())
            ->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.main.footer');
    }
}
