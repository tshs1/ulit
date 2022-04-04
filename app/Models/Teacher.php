<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\Student;
class Teacher extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable=[
        'name',
        'advisory_id',
    ];
    protected $appends = [
        'advisory',
        'students',
        'underweight',
        'normal',
        'overweight',
        'obese',
    ];
    public function getAdvisoryAttribute()
        {
            if ($this->advisories) {
                return $this->advisories->name;
            }
            return null;
        }

    public function getStudentsAttribute()
        {
            if ($this->advisories) {
                $id=intval($this->advisory_id);
            $students = Student::where('section_id', 'LIKE', $id)->whereRoleId(3)->count();
                return $students;
            }
            return null;
        }
        
    public function getUnderweightAttribute()
        {
            if ($this->advisories) {
                $underweight=[];
                $id=intval($this->advisory_id);
                $students = Student::where('section_id', 'LIKE', $id)->get();
                foreach ($students as $student) {
                    if ($student->status === "Underweight") {
                        array_push($underweight,$student);
                    }
                }
                return count($underweight);
            }
            return null;
        }

    public function getNormalAttribute()
        {
            if ($this->advisories) {
                $normal=[];
                $id=intval($this->advisory_id);
                $students = Student::where('section_id', 'LIKE', $id)->get();
                foreach ($students as $student) {
                    if ($student->status === "Normal") {
                        array_push($normal,$student);
                    }
                }
                return count($normal);
            }
            return null;
        } 

    public function getOverweightAttribute()
    {
        if ($this->advisories) {
            $overweight=[];
            $id=intval($this->advisory_id);
            $students = Student::where('section_id', 'LIKE', $id)->get();
            foreach ($students as $student) {
                if ($student->status === "Overweight") {
                    array_push($overweight,$student);
                }
            }
            return count($overweight);
        }
        return null;
    }
    
    public function getObeseAttribute()
        {
            if ($this->advisories) {
                $obese=[];
                $id=intval($this->advisory_id);
                $students = Student::where('section_id', 'LIKE', $id)->get();
                foreach ($students as $student) {
                    if ($student->status === "Obese") {
                        array_push($obese,$student);
                    }
                }
                return count($obese);
            }
            return null;
        }
    public function advisories(){return $this->hasOne(Section::class,"teacher_id");}

}
