<?php


namespace App\Http\Requests\CustomFilters;


class EscapeEmail implements \Elegant\Sanitizer\Contracts\Filter
{
    public function apply($value, array $options = [])
    {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }
}
