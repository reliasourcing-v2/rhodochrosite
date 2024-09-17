<?php

namespace App\Imports\Traits;

trait RendersFailure
{
    public function hasFailure()
    {
        return $this->failures()->count() !== 0;
    }

    public function failuresHtml(): string
    {
        $errorMessage = 'Import conflict occured. Refer to the details below: <br>';

        foreach ($this->failures() as $failure) {
            $errorMessage .= "<br>Row #{$failure->row()}, Column: {$failure->attribute()}, Reason: {$failure->errors()[0]}";
        }

        $errorMessage .= '<br><br>Note: Other rows have been imported.';

        return $errorMessage;
    }
}
