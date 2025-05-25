<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicant';
    protected $primaryKey = 'applicantID';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'applicantID', 'applicantName', 'gender', 'religion', 'dateOfBirth', 'age', 'civilStatus',
        'placeOfBirth', 'citizenship', 'permanentAddress', 'telephone', 'emailAddress', 'fbAccount',
        'hsName', 'hsAddress', 'generalAverage', 'yearOfCompletion'
    ];
}
