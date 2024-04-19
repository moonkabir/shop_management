<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory, Searchable;

    /**
        * Get the indexable data array for the model.
        *
        * @return array<string, mixed>
    */

    public function toSearchableArray()
    {
        return [
            'idNo' => $this->idNo,
            'name' => $this->name,
            'personal_contact_no' => $this->personal_contact_no,
            'address' => $this->address,
        ];
    }


}
