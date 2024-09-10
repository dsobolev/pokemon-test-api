<?php
namespace App\Services;

interface IDataExtractor
{
    public function extract(array $data): object;
}
