<?php

namespace App\Exports;

use App\Models\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegisterExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Register::select('name', 'email', 'number', 'course', 'country', 'university', 'intake', 'qualification', 'academic_score', 'english_score', 'passed_year', 'event')->get();
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Number', 'Course', 'Country', 'University', 'Intake', 'Qualification', 'Academic Score', 'English Score', 'Passed Year', 'Event'];
    }
}