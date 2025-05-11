<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Clear the existing courses and reset auto-increment (SQLite-specific)
        DB::statement('DELETE FROM courses');
        DB::statement('DELETE FROM sqlite_sequence WHERE name="courses"');

        $filePath = 'D:/Programming/Java/Final_Project/Enrollment-System/JavaRMI-pgsql/client/XML-Files/Course.xml';
        $xml = simplexml_load_file($filePath);

        foreach ($xml->course as $course) {
            DB::table('courses')->updateOrInsert(
                ['id' => (int)$course->{'course-id'}], // from XML tag 'course-id'

                    'title' => (string) $course->course_code,
                    'course_code' => (string)$course->{'course-code'}, // from XML tag 'course-code'
                    'description' => (string)$course->description,
            );
        }
    }
}
