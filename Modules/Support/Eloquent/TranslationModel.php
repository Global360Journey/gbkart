<?php

namespace Modules\Support\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class TranslationModel extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
