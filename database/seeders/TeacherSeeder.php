<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Teacher::where('id',1)->exists())
        {
            $teacher = New Teacher();
            $teacher->id = 1;
            $teacher->name = "Katie";
            $teacher->save();
        }
        if(!Teacher::where('id',2)->exists())
        {
            $teacher= New Teacher();
            $teacher->id = 2;
            $teacher->name = "Max";
            $teacher->save();
        }
    }
}
