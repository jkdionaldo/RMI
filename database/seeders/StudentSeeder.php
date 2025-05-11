<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class StudentSeeder extends Seeder
{
    public function run()
    {
    $filePath = 'D:/Programming/Java/Final_Project/Enrollment-System/JavaRMI-pgsql/client/XML-Files/Student.xml';
    $xml = simplexml_load_file($filePath);
        foreach ($xml->student as $student) {
            DB::table('students')->updateOrInsert([
                'id' => (int)$student->id,
                'name' => (string)$student->name,
                'program' => (string)$student->program,
                'age' => (int)$student->age,
                'address' => (string)$student->address,
                'contact' => (string)$student->contact,
            ]);
        }
    }
}
