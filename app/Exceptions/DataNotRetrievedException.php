<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Debug\ShouldntReport;

class DataNotRetrievedException extends Exception implements ShouldntReport
{
    //
}
