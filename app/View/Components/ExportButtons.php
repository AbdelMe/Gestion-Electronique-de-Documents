<?php

use Illuminate\Console\View\Components\Component;

class ExportButtons extends Component
{
    public $tableId;

    public function __construct($tableId = 'getData')
    {
        $this->tableId = $tableId;
    }

    public function render()
    {
        return view('components.export-buttons');
    }
}