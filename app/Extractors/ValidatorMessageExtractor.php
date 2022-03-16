<?php

namespace App\Extractors;



use Illuminate\Validation\Validator;

class ValidatorMessageExtractor
{
    public static function extract(Validator $validator): array
    {
        $messages = $validator->errors()->getMessages();
        $extractErrors = [];
        foreach ($messages as $oneField) {
            foreach ($oneField as $message) {
                $extractErrors[] = $message;
            }
        }

        return $extractErrors;
    }
}
