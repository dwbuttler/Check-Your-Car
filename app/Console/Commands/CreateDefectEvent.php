<?php

namespace App\Console\Commands;

use App\Defect;
use App\Http\Controllers\DefectNotificationAction;
use Illuminate\Console\Command;

class CreateDefectEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:defect
                            {make : The make of the vehicle affected}
                            {model : The model of the vehicle affected}
                            {year : The year of the vehicle affected}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a defect event for a desired vehicle of specified make, model and year';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $defect                 = new Defect;
        $defect->description    = $this->ask('What is the description of the defect?');
        $defect->make           = $this->argument('make');
        $defect->model          = $this->argument('model');
        $defect->year           = $this->argument('year');

        $defect->save();

        (new DefectNotificationAction())->execute();

        return 1;
    }
}
