<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use DateTime;
class Student extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable=[
        'name',
        'is_male',
        'section_id',
        'weight',
        'dob',
        'height'
    ];

    protected $casts = [
        'created_at'   => 'date:M d, y',
        'updated_at'   => 'date:M d, y',
        'dob'          => 'date:m/d/Y',
    ];

    protected $appends = [
        'sectionname',
        'bmi',
        'age',
        'remark',
        'hfa',
        'status'
    ];

    public function getBmiAttribute()
        {
            $h2 =$this->height*$this->height;
            $bmi=$this->weight/$h2;
            return substr($bmi, 0, 5);
        }
    public function getRemarkAttribute()
        {
            $age=$this->age;
            if ($this->is_male) {
                switch ($age) {
                    case $age==='14'||$age==='15':
                        if ($this->height < 1.5) {
                           return 'Stunted';
                        }elseif ($this->height > 1.8) {
                           return 'Tall';
                        }
                        return 'Normal';
                        break;

                    case $age==='16'||$age==='17':
                        if ($this->height < 1.6) {
                            return 'Stunted';
                        }elseif ($this->height > 1.85) {
                            return 'Tall';
                        }
                        return 'Normal';
                        break;
                    
                    case $age >='18':
                        if ($this->height < 1.65) {
                            return 'Stunted';
                        }elseif ($this->height > 1.87) {
                            return 'Tall';
                        }
                        return 'Normal';
                        break;
                    default:
                        return 'Stunted';
                        break;
                }
            }
            switch ($age) {
                case $age==='14'||$age==='15':
                    if ($this->height < 1.5) {
                       return 'Stunted';
                    }elseif ($this->height > 1.71) {
                       return 'Tall';
                    }
                    return 'Normal';
                    break;

                case $age==='16'||$age==='17':
                    if ($this->height < 1.52) {
                        return 'Stunted';
                    }elseif ($this->height > 1.73) {
                        return 'Tall';
                    }
                    return 'Normal';
                    break;
                
                case $age >='18':
                    if ($this->height < 1.52) {
                        return 'Stunted';
                    }elseif ($this->height > 1.74) {
                        return 'Tall';
                    }
                    return 'Normal';
                    break;
                default:
                    return 'Stunted';
                    break;
                }
        }
    public function getStatusAttribute()
        {
            $bmi =floatval($this->bmi);
            if ($bmi<=18.5) {
                return  "Underweight";
            }elseif ($bmi>=18.6||$bmi<=24.9) {
                return  "Normal";
            }elseif ($bmi>=25||$bmi<=29.9) {
                return  "Overweight";
            }elseif ($bmi>=30) {
                return  "Obese";
            }
            return null;
        }    

    public function getHfaAttribute()
        {
            $age=$this->age;
            if ($this->is_male) {
                switch ($age) {
                    case $age==='14'||$age==='15':
                        return '1.5m to 1.8m';
                        break;

                    case $age==='16'||$age==='17':
                        return '1.6m to 1.85m';
                        break;
                    
                    default:
                        return '1.65m to 1.87m';
                        break;
                }
            }
            switch ($age) {
                case $age==='14'||$age==='15':
                    return '1.5m to 1.71m';
                    break;

                case $age==='16'||$age==='17':
                    return '1.52m to 1.73m';
                    break;
            
                default:
                    return ' 1.52m to 1.74m';
                    break;
                }
        }

    public function getAgeAttribute()
    {   
        $date = new DateTime($this->dob);
        $dateOfBirth= $date->format("Y-m-d");
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    }

    
    public function getSectionnameAttribute()
    {
        if ($this->section) {
            return $this->section->name;
        }
        return null;
    }
    public function section(){return $this->belongsTo(Section::class);}
}
