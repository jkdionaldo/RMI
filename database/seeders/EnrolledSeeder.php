<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class EnrolledSeeder extends Seeder
{
    public function run()
    {
        $filePath = 'D:/Programming/Java/Final_Project/Enrollment-System/JavaRMI-pgsql/client/XML-Files/Enrolled.xml';
        $xml = simplexml_load_file($filePath);

        foreach ($xml->enrolled as $enrolled) {
            DB::table('enrolled_students')->updateOrInsert([
                'id' => (int)$enrolled->id,
                'student_id' => (int)$enrolled->student_id,
                'course_id' => (int)$enrolled->course,
            ]);
        }
    }
}
