<?php
namespace App\Console\Commands;

use App\Models\Result;
use Illuminate\Console\Command;

class UpdateResultsGrade extends Command
{
    protected $signature   = 'update:results-grade';
    protected $description = 'Update percentage and grade for results';

    public function handle()
    {
        $results = Result::all();

        foreach ($results as $result) {
            if ($result->total > 0) {
                $result->percentage = ($result->score / $result->total) * 100;

                $result->grade =
                $result->percentage >= 85 ? 'A' :
                ($result->percentage >= 75 ? 'B' :
                    ($result->percentage >= 65 ? 'C' :
                        ($result->percentage >= 50 ? 'D' : 'F')));

                $result->save();
            }
        }

        $this->info('Done successfully');
    }
}
