<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $map = [
            'Budi Santoso' => 'NIG-0001',
            'Siti Rahayu'  => 'NIG-0002',
        ];

        foreach ($map as $name => $nig) {
            $teacher = Teacher::updateOrCreate(['name' => $name], ['nig' => $nig]);
            $user    = User::where('username', $nig)->first();
            if ($user && ! $teacher->user_id) {
                $teacher->update(['user_id' => $user->id]);
            }
        }
    }
}
